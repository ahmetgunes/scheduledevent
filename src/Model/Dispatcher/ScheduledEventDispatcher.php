<?php
/**
 * Created by PhpStorm.
 * User: ahmetgunes
 * Date: 03/07/2017
 * Time: 19:57
 */

namespace ScheduledEvent\Model\Dispatcher;


use ScheduledEvent\Model\Event\ScheduledEvent;
use ScheduledEvent\Model\Message\AbstractMessage;
use ScheduledEvent\Model\Publisher\PublisherInterface;


/**
 * Class ScheduledEventDispatcher
 * @package ScheduledEvent\Model\ScheduledEvent\Dispatcher
 */
class ScheduledEventDispatcher implements EventDispatcherInterface
{
    /**
     * @var PublisherInterface
     */
    protected $publisher;

    /**
     * ScheduledEventDispatcher constructor.
     * @param PublisherInterface $publisher
     */
    public function __construct(PublisherInterface $publisher)
    {
        $this->publisher = $publisher;
    }

    public function dispatch(ScheduledEvent $event): bool
    {
        $message = $this->convertEventToMessage($event);
        return $this->publisher->publish($message);
    }

    public function convertEventToMessage(ScheduledEvent $event): AbstractMessage
    {
        $message = $event->getMessage();
        $message->setPriority($event->getPriority());
        $message->setDesignatedDate($event->getDesignatedDate());

        return $message;
    }
}