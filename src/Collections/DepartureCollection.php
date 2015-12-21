<?php

namespace Sl\Collections;

use Sl\Contracts\Collections\DepartureCollection as DepartureCollectionInterface;

class DepartureCollection extends Collection implements DepartureCollectionInterface {
    /**
     * Filter by departure's type.
     *
     * @param  string $type
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function type($type)
    {
        return $this->filter(function($departure) use($type) {
            return $departure->type() === $type;
        });
    }

    /**
     * Busses group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function busses()
    {
        return $this->type('bus');
    }

    /**
     * Trains group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function trains()
    {
        return $this->type('train');
    }

    /**
     * Metros group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function metros()
    {
        return $this->type('metro');
    }

    /**
     * Trams group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function trams()
    {
        return $this->type('tram');
    }

    /**
     * Light rails group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function lightRails()
    {
        return $this->type('light rail');
    }

    /**
     * Ships group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function ships()
    {
        return $this->type('ship');
    }
}
