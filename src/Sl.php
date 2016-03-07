<?php

namespace Sl;

use Sl\Mappers\StationMapper;
use Sl\Mappers\DepartureMapper;
use Sl\Collections\StationCollection;
use Sl\Collections\DepartureCollection;
use Sl\Contracts\PublicTransportSystem;
use Sl\Contracts\Foundation\Station as StationContract;

class Sl implements PublicTransportSystem
{
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
     * @var \Sl\Contracts\HttpClient.
     */
    private $httpClient;

    /**
     * Get Http client instance.
     *
     * @return \Sl\Contracts\HttpClient
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
     * @param string $query
     *
     * @return \Sl\Contracts\Collections\StationCollection
     */
    public function searchStation($query)
    {
        $data = $this->httpClient()->getAndParseJson(self::SEARCH_STATION_URI.$query);

        return StationCollection::fromArray($data, new StationMapper());
    }

    /**
     * Get departures from station.
     *
     * @param \Sl\Contracts\Foundation\Station $station
     *
     * @return \Sl\Contracts\Collections\DepartureCollection
     */
    public function departuresFrom(StationContract $station)
    {
        $data = $this->httpClient()->getAndParseJson(self::DEPARTURES_FROM_URI.$station->id());

        return DepartureCollection::fromArray($data, new DepartureMapper());
    }
}
