<?php
/**
 * @package     Dropbox Embed Plugin
 * @copyright   (C) Brett Vachon
 * @license     GNU General Public License version 2
 */

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Installer\InstallerAdapter;
use Joomla\CMS\Installer\InstallerScriptInterface;
use Joomla\Database\DatabaseInterface;
use Joomla\CMS\Language\Text;

return new class () implements InstallerScriptInterface {

    private string $minimumJoomla = '4.4.0';
    private string $minimumPhp    = '7.4.0';
    private DatabaseInterface $db;

    public function __construct()
    {
        $this->db = Factory::getContainer()->get(DatabaseInterface::class);
    }

    public function install(InstallerAdapter $adapter): bool
    {
        // Enable the plugin on installation
        $query = $this->db->getQuery(true)
            ->update($this->db->quoteName('#__extensions'))
            ->set($this->db->quoteName('enabled') . ' = 1')
            ->where($this->db->quoteName('type') . ' = ' . $this->db->quote('plugin'))
            ->where($this->db->quoteName('folder') . ' = ' . $this->db->quote($adapter->group))
            ->where($this->db->quoteName('element') . ' = ' . $this->db->quote($adapter->element));
        $this->db->setQuery($query)->execute();

        return true;
    }

    public function update(InstallerAdapter $adapter): bool
    {
        echo Text::_('PLG_CONTENT_DROPBOXEMBED_UPDATE') . "<br>";
        return true;
    }

    public function uninstall(InstallerAdapter $adapter): bool
    {
        echo Text::_('PLG_CONTENT_DROPBOXEMBED_UNINSTALL') . "<br>";
        return true;
    }

    public function preflight(string $type, InstallerAdapter $adapter): bool
    {
        // Basic check to ensure we're in Joomla
        if (!defined('_JEXEC')) {
            return false;
        }

        if (version_compare(PHP_VERSION, $this->minimumPhp, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_PHP'), $this->minimumPhp), 'error');
            return false;
        }

        if (version_compare(JVERSION, $this->minimumJoomla, '<')) {
            Factory::getApplication()->enqueueMessage(sprintf(Text::_('JLIB_INSTALLER_MINIMUM_JOOMLA'), $this->minimumJoomla), 'error');
            return false;
        }
        return true;
    }

    public function postflight(string $type, InstallerAdapter $adapter): bool
    {
        echo Text::_('PLG_CONTENT_DROPBOXEMBED_POSTFLIGHT') . "<br>";
        return true;
    }
};