<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 29.01.2018
 * Time: 17:40
 */

namespace ScheduledEvent\Model\Manager;


use ScheduledEvent\Model\Message\MessageInterface;

interface QueueManagerInterface
{
    public function publish(MessageInterface $message);

    public function consume();
}