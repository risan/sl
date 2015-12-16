<?php

namespace Sl;

use Sl\Contracts\Foundation\Station as StationInterface;

class Station implements StationInterface {
    /**
     * Station's id.
     *
     * @var int
     */
    private $id;

    /**
     * Station's name.
     *
     * @var string
     */
    private $name;

    /**
     * Create a new instance of Station.
     *
     * @param int $id
     * @param String $name
     */
    public function __construct($id, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Get station's id.
     *
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Get station's name.
     *
     * @return string|null
     */
    public function name()
    {
        return $this->name;
    }
}
