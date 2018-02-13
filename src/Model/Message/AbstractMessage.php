<?php
/**
 * Created by A.
 * User: ahmetgunes
 * Date: 10.01.2018
 * Time: 19:52
 */

namespace ScheduledEvent\Model\Message;


use ScheduledEvent\Traits\ConvertibleTrait;

abstract class AbstractMessage
{
    use ConvertibleTrait;

    /**
     * @var int|null
     */
    protected $designatedDate;

    /**
     * @var int|null
     */
    protected $priority;

    /**
     * @var int|null
     */
    protected $type;

    /**
     * AbstractMessage constructor.
     * @param int|null $designatedDate
     * @param int|null $priority
     * @param int|null $type
     */
    public function __construct(?int $designatedDate = null, ?int $priority = null, ?int $type = null)
    {
        $this->designatedDate = $designatedDate;
        $this->priority = $priority;
        $this->type = $type;
    }

    /**
     * @return int|null
     */
    public function getDesignatedDate(): ?int
    {
        return $this->designatedDate;
    }

    /**
     * @param int|null $designatedDate
     */
    public function setDesignatedDate(?int $designatedDate): void
    {
        $this->designatedDate = $designatedDate;
    }

    /**
     * @return int|null
     */
    public function getPriority(): ?int
    {
        return $this->priority;
    }

    /**
     * @param int|null $priority
     */
    public function setPriority(?int $priority): void
    {
        $this->priority = $priority;
    }

    /**
     * @return int|null
     */
    public function getType(): ?int
    {
        return $this->type;
    }

    /**
     * @param int|null $type
     */
    public function setType(?int $type): void
    {
        $this->type = $type;
    }
}
