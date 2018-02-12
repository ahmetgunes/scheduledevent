<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 10.01.2018
 * Time: 19:50
 */

namespace ScheduledEvent\Model\Dispatcher;


use ScheduledEvent\Model\Event\ScheduledEvent;
use ScheduledEvent\Model\Message\AbstractMessage;

interface EventDispatcherInterface
{
    public function dispatch(ScheduledEvent $event): bool;

    public function convertEventToMessage(ScheduledEvent $event): AbstractMessage;
}