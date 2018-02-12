<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 13.02.2018
 * Time: 00:02
 */

namespace ScheduledEvent\Model\Router;


use ScheduledEvent\Model\Message\MessageInterface;

interface RouterInterface
{
    public function route(MessageInterface $message);
}