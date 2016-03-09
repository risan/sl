<?php

use Sl\Mappers\StationMapper;
use Sl\Contracts\Foundation\StationInterface;

class StationMapperTest extends PHPUnit_Framework_TestCase {
    protected $stationMapper;

    protected $arrayStations;

    function setUp()
    {
        $this->stationMapper = new StationMapper;

        $this->arrayStations = [
            'data' => [
                [
                    'Name' => 'Centralen (Stockholm)',
                    'SiteId' => 1002,
                    'Type' => 'station'
                ],
                [
                    'Name' => 'Stockholms central (Stockholm)',
                    'SiteId' => 9000,
                    'Type' => 'station'
                ],
                [
                    'Name' => 'Älvsjö, Fru Kristinas Gränd',
                    'SiteId' => 0,
                    'Type' => 'address'
                ]
            ]
        ];
    }

    /** @test */
    function station_mapper_can_map_array_of_stations()
    {
        $stations = $this->stationMapper->map($this->arrayStations);

        $this->assertCount(2, $stations);

        foreach ($stations as $station) {
            $this->assertInstanceOf(StationInterface::class, $station);
        }

        $this->assertEquals(9000, $stations[1]->id());
        $this->assertEquals('Stockholms central (Stockholm)', $stations[1]->name());
    }
}
