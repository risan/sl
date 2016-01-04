<?php

namespace Sl\Contracts\Collections;

interface DepartureCollection
{
    /**
     * Filter by departure's type.
     *
     * @param string $type
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function type($type);

    /**
     * Busses group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function busses();

    /**
     * Trains group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function trains();

    /**
     * Metros group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function metros();

    /**
     * Trams group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function trams();

    /**
     * Light rails group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function lightRails();

    /**
     * Ships group departures.
     *
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function ships();
}
