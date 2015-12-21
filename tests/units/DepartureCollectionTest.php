<?php

use Sl\Departure;
use Sl\Collections\DepartureCollection;
use Sl\Contracts\Mapper as MapperInterface;
use Sl\Contracts\Collections\DepartureCollection as DepartureCollectionInterface;

class DepartureCollectionTest extends PHPUnit_Framework_TestCase {
    protected $arrayDepartures;

    protected $departureCollection;

    function setUp()
    {
        $this->arrayDepartures = [
            [
                'id' => '1',
                'type' => 'bus',
                'subType' => null,
                'destination' => 'Karolinska',
                'displayTime' => '3 min'
            ],
            [
                'id' => '2',
                'type' => 'train',
                'subType' => null,
                'destination' => 'Solna',
                'displayTime' => '3 min'
            ],
            [
                'id' => '3',
                'type' => 'tram',
                'subType' => 'Spårväg City',
                'destination' => 'Sergels Torg',
                'displayTime' => '3 min'
            ],
            [
                'id' => '4',
                'type' => 'light rail',
                'subType' => 'roslagsbanan',
                'destination' => 'Täby',
                'displayTime' => '3 min'
            ],
            [
                'id' => '5',
                'type' => 'metro',
                'subType' => 'red',
                'destination' => 'Fruängen',
                'displayTime' => '3 min'
            ],
            [
                'id' => '6',
                'type' => 'metro',
                'subType' => 'green',
                'destination' => 'Alvik',
                'displayTime' => '3 min'
            ],
            [
                'id' => '7',
                'type' => 'metro',
                'subType' => 'blue',
                'destination' => 'Kista',
                'displayTime' => '3 min'
            ],
            [
                'id' => '8',
                'type' => 'ship',
                'subType' => null,
                'destination' => 'Djurgården',
                'displayTime' => '3 min'
            ]
        ];

        $this->departureCollection = DepartureCollection::fromArray($this->arrayDepartures, new TestDepartureMapper);
    }

    /** @test */
    function station_collection_can_be_instantiated_from_raw_array()
    {
        $this->assertInstanceOf(DepartureCollectionInterface::class, $this->departureCollection);

        foreach ($this->departureCollection as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $this->departureCollection[3];
        $this->assertEquals('4', $departure->id());
        $this->assertEquals('light rail', $departure->type());
        $this->assertEquals('roslagsbanan', $departure->subType());
        $this->assertEquals('Täby', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_bus_departures()
    {
        $departures = $this->departureCollection->busses();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('1', $departure->id());
        $this->assertEquals('bus', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Karolinska', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_train_departures()
    {
        $departures = $this->departureCollection->trains();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('2', $departure->id());
        $this->assertEquals('train', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Solna', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_tram_departures()
    {
        $departures = $this->departureCollection->trams();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('3', $departure->id());
        $this->assertEquals('tram', $departure->type());
        $this->assertEquals('Spårväg City', $departure->subType());
        $this->assertEquals('Sergels Torg', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_light_rail_departures()
    {
        $departures = $this->departureCollection->lightRails();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('4', $departure->id());
        $this->assertEquals('light rail', $departure->type());
        $this->assertEquals('roslagsbanan', $departure->subType());
        $this->assertEquals('Täby', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_metro_departures()
    {
        $departures = $this->departureCollection->metros();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        $this->assertCount(3, $departures->toArray());

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('5', $departure->id());
        $this->assertEquals('metro', $departure->type());
        $this->assertEquals('red', $departure->subType());
        $this->assertEquals('Fruängen', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }

    /** @test */
    function departure_collection_can_filter_ship_departures()
    {
        $departures = $this->departureCollection->ships();

        $this->assertInstanceOf(DepartureCollectionInterface::class, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(Departure::class, $departure);
        }

        $departure = $departures->first();
        $this->assertEquals('8', $departure->id());
        $this->assertEquals('ship', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Djurgården', $departure->destination());
        $this->assertEquals('3 min', $departure->displayTime());
    }
}

class TestDepartureMapper implements MapperInterface {
    public function map(array $items)
    {
        return array_map(function($item) {
            return new Departure(
                $item['id'],
                $item['type'],
                $item['subType'],
                $item['destination'],
                $item['displayTime']
            );
        }, $items);
    }
}
