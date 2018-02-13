<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 12.02.2018
 * Time: 23:35
 */

namespace ScheduledEvent\Model\Message;


interface MessageSerializerInterface
{
    public static function convert($message);

    public static function deConvert($message);
}