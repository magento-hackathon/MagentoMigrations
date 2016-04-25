<?php

namespace MagentoHackathon\MagentoMigrations\Cli\Subscriber;

use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Class UpgradeSubscriber
 *
 * @author Gabriel Somoza <gabriel.somoza@cu.be>
 */
class UpgradeSubscriber implements EventSubscriberInterface
{

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2')))
     *
     * @return array The event names to listen to
     */
    public static function getSubscribedEvents()
    {
        return [
            ConsoleEvents::COMMAND => 'afterSetupUpgrade',
        ];
    }

    /**
     * afterSetupUpgrade
     * @return void
     */
    public function afterSetupUpgrade()
    {
        echo 'here';
    }
}
