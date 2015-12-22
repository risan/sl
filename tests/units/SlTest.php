<?php

use Sl\Sl;
use Sl\Station;
use Sl\Contracts\Foundation\Station as StationInterface;
use Sl\Contracts\Foundation\Departure as DepartureInterface;
use Sl\Contracts\Collections\StationCollection as StationCollectionInterface;
use Sl\Contracts\Collections\DepartureCollection as DepartureCollectionInterface;

class SlTest extends PHPUnit_Framework_TestCase {
    protected $sl;

    protected

    function setUp()
    {
        $this->sl = new Sl();
    }

    /** @test */
    function sl_can_search_for_station()
    {
        $stations = $this->sl->searchStation('Slussen');

        $this->assertInstanceOf(StationCollectionInterface::class, $stations);

        foreach ($stations as $station) {
            $this->assertInstanceOf(StationInterface::class, $station);
        }
    }

    /** @test */
    function sl_can_find_departures()
    {
        $station = new Station(9192, 'Slussen (Stockholm)');

        $departures = $this->sl->departuresFrom($station);

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }
    }
}
