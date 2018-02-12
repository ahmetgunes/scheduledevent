<?php
/**
 * Created by PhpStorm.
 * User: ahmetgunes
 * Date: 03/07/2017
 * Time: 19:54
 */

namespace ScheduledEvent\Model\Event;

use ScheduledEvent\Model\Message\AbstractMessage;
use ScheduledEvent\Traits\ConvertibleTrait;

class ScheduledEvent
{
    use ConvertibleTrait;

    /**
     * @var AbstractMessage
     */
    protected $message;

    /**
     * @var \DateTime
     */
    protected $designatedDate;

    /**
     * @var int
     */
    protected $priority;

    /**
     * ScheduledEvent constructor.
     * @param AbstractMessage $message
     * @param \DateTime $designatedDate
     * @param int $priority
     */
    public function __construct(AbstractMessage $message, \DateTime $designatedDate, int $priority)
    {
        $this->message = $message;
        $this->designatedDate = $designatedDate;
        $this->priority = $priority;
    }

    /**
     * @return AbstractMessage
     */
    public function getMessage(): AbstractMessage
    {
        return $this->message;
    }

    /**
     * @param AbstractMessage $message
     */
    public function setMessage(AbstractMessage $message): void
    {
        $this->message = $message;
    }

    /**
     * @return \DateTime
     */
    public function getDesignatedDate(): \DateTime
    {
        return $this->designatedDate;
    }

    /**
     * @param \DateTime $designatedDate
     */
    public function setDesignatedDate(\DateTime $designatedDate): void
    {
        $this->designatedDate = $designatedDate;
    }

    /**
     * @return int
     */
    public function getPriority(): int
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority(int $priority): void
    {
        $this->priority = $priority;
    }
}
