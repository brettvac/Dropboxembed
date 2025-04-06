<?php
/**
 * @package    Dropbox Embed Plugin
 * @license    GNU General Public License version 2
 */

namespace Naftee\Plugin\Content\Dropboxembed\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\CMS\Event\Content\ContentPrepareEvent;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Factory;

class Dropboxembed extends CMSPlugin implements SubscriberInterface
  {
  protected $autoloadLanguage = true;
  private $scriptLoaded = false;

  public static function getSubscribedEvents() : array
    {
    //Register the method to be triggered when the Joomla event occurs
    return
      [
      'onContentPrepare' => 'replaceDropboxTags',
      ];
    }

  public function replaceDropboxTags(ContentPrepareEvent $event)
    {
    if (!$this->getApplication()->isClient('site'))
      {
      return; //Exit if this request is from the backend (administrator)
      }

    $context = $event->getContext();
    $item = $event->getItem();
    $params = $event->getParams();

    if ($context === 'com_finder.indexer')
      {
      return; //Exit if the content is being processed by Joomla's Smart Search (Finder) indexer
      }

    /*
     * Get the Dropbox app key from plugin parameters
     * Exit early if no app key is provided, as the embed won’t work without it
     */
    $appKey = $this->params->get('app_key', '');
    if (empty($appKey))
      {
      return;
      }

    // Determine the content text based on context (module or article)
    if ($context === 'com_modules.module')
      {
      $text = $params->get('content', '');
      }
    else
      {
      if (!isset($item->text))
        {
        return;
        }
      $text = &$item->text;
      }

    // Early exit if there are no {dropbox} tags to process
    if (strpos($text, '{dropbox}') === false)
      {
      return;
      }

    $offset = 0;

    while (($start = strpos($text, "{dropbox}", $offset)) !== false)
      {
      if (($end = strpos($text, "{/dropbox}", $start)) === false)
        {
        break; // Skip if no closing {/dropbox} tag is found
        }

      /*
       * Calculate the full length of the tag including both {dropbox} (9 chars) and {/dropbox} (10 chars)
       * 10 accounts for the length of {/dropbox}, ensuring we replace the entire tag
       */
      $tagLength = $end - $start + 10;

      /*
       * Extract the content between {dropbox} and {/dropbox}
       * $start + 9 skips the 9 characters of "{dropbox}"
       * $end - $start - 9 gives the length of the content between the tags
       * trim() removes any leading/trailing whitespace
       */
      $tagContent = trim(substr($text, $start + 9, $end - $start - 9));

      // Initialize $dropboxUrl with $tagContent as a fallback. This ensures $dropboxUrl has a value if no | separator is present
      $height = '100%';
      $width = '100%';
      $dropboxUrl = $tagContent;

      // Check if the tag content includes options (e.g., URL|height|width)
      if (strpos($tagContent, '|') !== false)
        {
        $parts = explode('|', $tagContent);
        
        // Decode the URL part to preserve query parameters like ?rlkey
        $dropboxUrl = htmlspecialchars_decode($parts[0], ENT_QUOTES);
        
        if (isset($parts[1]) && is_numeric($parts[1]))
          {
          $height = $parts[1] . 'px'; // Set height if provided and numeric
          }
        if (isset($parts[2]) && is_numeric($parts[2]))
          {
          $width = $parts[2] . 'px'; // Set width if provided and numeric
          }
        }
      else
        {
        // Decode the full tag content as the URL if no options are provided
        $dropboxUrl = htmlspecialchars_decode($tagContent, ENT_QUOTES);
        }

      // Get plugin parameters with empty string defaults
      $zoom = $this->params->get('zoom', '');
      $view = $this->params->get('view', '');
      $headerSize = $this->params->get('headerSize', '');

      // Generate a unique ID for the embed element
      $contextBase = str_replace(['com_', '.', '_'], '', $context);
      $itemId = isset($item->id) ? $item->id : 0;
      $randomNum = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
      $embedId = 'dl' . $contextBase . $itemId . $randomNum;

      // Build the embed HTML and JavaScript using heredoc
      $embedScript = <<<HTML
<div id="$embedId" style="width: $width; height: $height;">
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            var options = {
                link: "$dropboxUrl",
                file: { zoom: "$zoom" },
                folder: { view: "$view", headerSize: "$headerSize" }
            };
            Dropbox.embed(options, document.getElementById("$embedId"));
        });
    </script>
</div>
HTML;

      // Load the Dropbox embed script once, only if an app key is present
      if (!$this->scriptLoaded && !empty($appKey))
        {
        $doc = Factory::getDocument();
        $doc->addScript(
          'https://www.dropbox.com/static/api/2/dropins.js',
          [],
          ['id' => 'dropboxjs', 'data-app-key' => $appKey]
          );
        $this->scriptLoaded = true;
        }

      // Replace the original tag with the embed code in the text
      $text = substr_replace($text, $embedScript, $start, $tagLength);
      $offset = $start + strlen($embedScript);
      }

    // Update the content based on context
    if ($context !== 'com_modules.module' && isset($item->text))
      {
      $item->text = $text;
      }
    if ($context === 'com_modules.module')
      {
      $params->set('content', $text);
      }
    }
  }