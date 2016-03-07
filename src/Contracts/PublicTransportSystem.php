<?php

namespace Sl\Contracts;

use Sl\Contracts\Foundation\Station as StationContract;

interface PublicTransportSystem
{
    /**
     * Search for station.
     *
     * @param string $query
     *
     * @return \Sl\Contracts\Collections\StationCollection
     */
    public function searchStation($query);

    /**
     * Get departures from station.
     *
     * @param \Sl\Contracts\Foundation\Station $station
     *
     * @return \Sl\Contracts\Collections\DepartureCollection
     */
    public function departuresFrom(StationContract $station);
}
