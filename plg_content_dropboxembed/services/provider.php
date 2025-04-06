<?php
/**
 * @package    Dropbox Embed Plugin
 * @license    GNU General Public License version 2
 */

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Joomla\Event\DispatcherInterface;
use Naftee\Plugin\Content\Dropboxembed\Extension\Dropboxembed;

return new class() implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                
                $config = (array) PluginHelper::getPlugin('content', 'dropboxembed');
                $subject = $container->get(DispatcherInterface::class);
                $app = Factory::getApplication();
                
                $plugin = new Dropboxembed($subject, $config);
                $plugin->setApplication($app);

                return $plugin;
            }
        );
    }
};