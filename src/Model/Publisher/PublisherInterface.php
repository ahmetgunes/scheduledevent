<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 10.01.2018
 * Time: 19:57
 */

namespace ScheduledEvent\Model\Publisher;


use ScheduledEvent\Model\Message\MessageInterface;

interface PublisherInterface
{
    public function publish(MessageInterface $message):bool;
}