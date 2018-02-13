<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 12.02.2018
 * Time: 23:51
 */

namespace ScheduledEvent\Managers\RabbitMQ;


use PhpAmqpLib\Message\AMQPMessage;
use ScheduledEvent\Model\Exception\ScheduledEventException;
use ScheduledEvent\Model\Message\AbstractMessage;

class RabbitMQMessage extends AbstractMessage
{
    public function convert()
    {
        $body = $this->toJsonObject();
        $amqpMessage = new AMQPMessage($body);
        if (!is_null($this->priority)) {
            $amqpMessage->set('priority', $this->priority);
        }

        return $amqpMessage;
    }

    public static function deConvert($message)
    {
        if ($message instanceof AMQPMessage) {
            $mqMessage = new RabbitMQMessage();
            $mqMessage->toObject($message->getBody());

            return $mqMessage;
        } else {
            throw new ScheduledEventException('Message must be an instance of AMQPMessage');
        }
    }
}