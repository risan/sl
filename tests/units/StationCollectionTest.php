<?php

use Sl\Station;
use Sl\Collections\StationCollection;
use Sl\Contracts\Mapper as MapperInterface;
use Sl\Contracts\Collections\StationCollection as StationCollectionInterface;

class StationCollectionTest extends PHPUnit_Framework_TestCase {
    protected $arrayStations;

    function setUp()
    {
        $this->arrayStations = [
            [
                'id' => 1,
                'name' => 'T-Centralen'
            ]
        ];
    }

    /** @test */
    function station_collection_can_be_instantiated_from_raw_array()
    {
        $stationCollection = StationCollection::fromArray($this->arrayStations, new TestStationMapper);

        $this->assertInstanceOf(StationCollectionInterface::class, $stationCollection);

        foreach ($stationCollection as $station) {
            $this->assertInstanceOf(Station::class, $station);
        }

        $station = $stationCollection[0];
        $this->assertEquals(1, $station->id());
        $this->assertEquals('T-Centralen', $station->name());
    }
}

class TestStationMapper implements MapperInterface {
    public function map(array $items)
    {
        return array_map(function($item) {
            return new Station($item['id'], $item['name']);
        }, $items);
    }
}
