<?php

namespace Sl\Contracts\Collections;

interface DepartureCollectionInterface
{
    /**
     * Filter by departure's type.
     *
     * @param string $type
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function type($type);

    /**
     * Busses group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function busses();

    /**
     * Trains group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function trains();

    /**
     * Metros group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function metros();

    /**
     * Trams group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function trams();

    /**
     * Light rails group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function lightRails();

    /**
     * Ships group departures.
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function ships();
}
