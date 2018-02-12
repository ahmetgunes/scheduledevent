<?php
/**
 * Created by PhpStorm.
 * User: ahmetgunes
 * Date: 03/07/2017
 * Time: 20:07
 */

namespace ScheduledEvent\Model\Event\Listener;

/**
 * Interface
 * @package ScheduledEvent\Model\ScheduledEvent\Listener
 */
interface ScheduledEventListenerInterface
{
    /**
     * @param $message
     */
    public function route($message);
}