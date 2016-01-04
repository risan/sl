<?php

namespace Sl;

use Sl\Contracts\Foundation\Departure as DepartureInterface;

class Departure implements DepartureInterface
{
    /**
     * Departure's id.
     *
     * @var string
     */
    private $id;

    /**
     * Departure's type.
     *
     * @var string
     */
    private $type;

    /**
     * Departure's subtype.
     *
     * @var string|null
     */
    private $subType;

    /**
     * Departure's destination.
     *
     * @var string
     */
    private $destination;

    /**
     * Departure's display time.
     *
     * @var string
     */
    private $displayTime;

    /**
     * Create a new instance of Departure.
     *
     * @param string      $id
     * @param string      $type
     * @param string|null $subType
     * @param string      $destination
     * @param string      $displayTime
     */
    public function __construct($id, $type, $subType, $destination, $displayTime)
    {
        $this->id = $id;
        $this->type = $type;
        $this->destination = $destination;
        $this->displayTime = $displayTime;
        $this->subType = $subType;
    }

    /**
     * Get departure's id.
     *
     * @return string
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get departure's type.
     *
     * @return string
     */
    public function type()
    {
        return $this->type;
    }

    /**
     * Get departure's subtype.
     *
     * @return string|null
     */
    public function subType()
    {
        return $this->subType;
    }

    /**
     * Get departure's destination.
     *
     * @return string
     */
    public function destination()
    {
        return $this->destination;
    }

    /**
     * Get departure's display time.
     *
     * @return string
     */
    public function displayTime()
    {
        return $this->displayTime;
    }
}
