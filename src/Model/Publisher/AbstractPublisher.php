<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 10.01.2018
 * Time: 19:58
 */

namespace ScheduledEvent\Model\Publisher;


use ScheduledEvent\Model\Manager\QueueManagerInterface;
use ScheduledEvent\Model\Message\MessageInterface;

class AbstractPublisher implements PublisherInterface
{
    /**
     * @var QueueManagerInterface
     */
    protected $queueManager;

    /**
     * AbstractPublisher constructor.
     * @param QueueManagerInterface $queueManager
     */
    public function __construct(QueueManagerInterface $queueManager)
    {
        $this->queueManager = $queueManager;
    }

    /**
     * @param MessageInterface $message
     * @return bool
     */
    public function publish(MessageInterface $message): bool
    {
        return $this->queueManager->publish($message);
    }
}