<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 10.01.2018
 * Time: 19:52
 */

namespace ScheduledEvent\Model\Message;


use ScheduledEvent\Traits\ConvertibleTrait;

abstract class AbstractMessage implements MessageInterface
{
    use ConvertibleTrait;

    /**
     * @var \DateTime
     */
    protected $designatedDate;

    /**
     * @var int
     */
    protected $priority;

    /**
     * @var int
     */
    protected $type;

    /**
     * AbstractMessage constructor.
     * @param int $type
     * @param \DateTime|null $designatedDate
     * @param int|null $priority
     */
    public function __construct(int $type, \DateTime $designatedDate = null, int $priority = null)
    {
        $this->type = $type;
        $this->designatedDate = $designatedDate;
        $this->priority = $priority;
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

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }
}
