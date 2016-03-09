<?php

namespace Sl\Contracts;

use Sl\Contracts\Foundation\StationInterface;

interface PublicTransportSystemInterface
{
    /**
     * Search for station.
     *
     * @param string $query
     *
     * @return \Sl\Contracts\Collections\StationCollectionInterface
     */
    public function searchStation($query);

    /**
     * Get departures from station.
     *
     * @param \Sl\Contracts\Foundation\StationInterface $station
     *
     * @return \Sl\Contracts\Collections\DepartureCollectionInterface
     */
    public function departuresFrom(StationInterface $station);
}
