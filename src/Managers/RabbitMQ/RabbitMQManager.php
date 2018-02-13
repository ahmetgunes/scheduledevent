<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 12.02.2018
 * Time: 23:42
 */

namespace ScheduledEvent\Managers\RabbitMQ;


use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;
use ScheduledEvent\Model\Exception\ScheduledEventException;
use ScheduledEvent\Model\Manager\QueueManagerInterface;
use ScheduledEvent\Model\Message\MessageInterface;
use ScheduledEvent\Model\Router\RouterInterface;

class RabbitMQManager implements QueueManagerInterface
{
    /**
     * @var AMQPStreamConnection
     */
    protected $mq;

    /**
     * @var string|null
     */
    protected $channelId;

    /**
     * @var RouterInterface
     */
    protected $router;

    /**
     * @var string
     */
    protected $queue;

    /**
     * @var bool
     */
    protected $noLocal;

    /**
     * @var bool
     */
    protected $noAck;

    /**
     * @var bool
     */
    protected $exclusive;

    /**
     * @var bool
     */
    protected $noWait;

    /**
     * RabbitMQManager constructor.
     * @param RouterInterface $router
     * @param AMQPStreamConnection $mq
     * @param string $queue
     * @param null|string $channelId
     * @param bool $noLocal
     * @param bool $noAck
     * @param bool $exclusive
     * @param bool $noWait
     */
    public function __construct(RouterInterface $router, AMQPStreamConnection $mq, string $queue, ?string $channelId = null, bool $noLocal = false, bool $noAck = true, bool $exclusive = false, bool $noWait = false)
    {
        $this->mq = $mq;
        $this->channelId = $channelId;
        $this->router = $router;
        $this->queue = $queue;
        $this->noLocal = $noLocal;
        $this->noAck = $noAck;
        $this->exclusive = $exclusive;
        $this->noWait = $noWait;
    }

    public function publish(MessageInterface $message): bool
    {
        if (!$message instanceof RabbitMQMessage) {
            throw new ScheduledEventException('Wrong formatted message is passed to the manager.');
        }
        $convertedMessage = $message->convert();
        if ($convertedMessage instanceof AMQPMessage) {
            $this->mq->channel($this->channelId)->basic_publish($convertedMessage, '', $this->queue);

            return true;
        } else {
            throw new ScheduledEventException('Message couldn\'t be converted to AMQPMessage successfully.');
        }
    }

    public function consume()
    {
        $channel = $this->mq->channel($this->channelId);
        $router = $this->router;

        $callback = function (AMQPMessage $message) use ($router) {
            $message = RabbitMQMessage::deConvert($message);
            if (!is_null($message->getDesignatedDate()) && $message->getDesignatedDate() > time()) {
                $this->publish($message);
            } else {
                $router->route($message);
            }
        };

        $channel->basic_consume($this->queue, 'se_consumer', $this->noLocal, $this->noAck, $this->exclusive, $this->noWait, $callback);

        while (count($channel->callbacks)) {
            $channel->wait();
        }
    }
}