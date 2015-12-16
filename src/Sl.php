<?php

namespace Sl;

use Sl\Mappers\StationMapper;
use Sl\Mappers\DepartureMapper;
use Sl\Contracts\Foundation\Station;
use Sl\Collections\StationCollection;
use Sl\Collections\DepartureCollection;
use Sl\Contracts\PublicTransportSystem;

class Sl implements PublicTransportSystem {
    /**
     * Sl Http API base uri.
     */
    const BASE_URI = 'http://sl.se/api/';

    /**
     * Search station API uri.
     */
    const SEARCH_STATION_URI = 'TypeAhead/Find/';

    /**
     * Departures API uri.
     */
    const DEPARTURES_FROM_URI = 'sv/RealTime/GetDepartures/';

    /**
     * Http client instance.
     *
     * @var Sl\Contracts\HttpClient.
     */
    private $httpClient;

    /**
     * Get Http client instance.
     *
     * @return Sl\Contracts\HttpClient
     */
    public function httpClient()
    {
        if ($this->httpClient === null) {
            $this->httpClient = new HttpClient(self::BASE_URI);
        }

        return $this->httpClient;
    }

    /**
     * Search for station.
     *
     * @param  string $query
     * @return Sl\Contracts\Collections\StationCollection
     */
    public function searchStation($query)
    {
        $data = $this->httpClient()->sendRequest(self::SEARCH_STATION_URI . $query);

        return StationCollection::fromRaw($data, new StationMapper);
    }

    /**
     * Get departures from station.
     *
     * @param  Sl\Contracts\Foundation\Station $station
     * @return Sl\Contracts\Collections\DepartureCollection
     */
    public function departuresFrom(Station $station)
    {
        $data = $this->httpClient()->sendRequest(self::DEPARTURES_FROM_URI . $station->id());

        return DepartureCollection::fromRaw($data, new DepartureMapper);
    }
}
