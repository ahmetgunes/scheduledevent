<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 13.02.2018
 * Time: 00:02
 */

namespace ScheduledEvent\Model\Router;


use ScheduledEvent\Model\Message\AbstractMessage;

interface RouterInterface
{
    public function route(AbstractMessage $message);
}