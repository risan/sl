<?php

use Sl\Mappers\DepartureMapper;
use Sl\Contracts\Foundation\DepartureInterface;

class DepartureMapperTest extends PHPUnit_Framework_TestCase {
    protected $departureMapper;

    protected $arrayBusses;

    protected $arrayTrains;

    protected $arrayTrams;

    protected $arrayLightRails;

    protected $arrayMetrosRed;

    protected $arrayMetrosGreen;

    protected $arrayMetrosBlue;

    protected $arrayShips;

    function setUp()
    {
        $this->departureMapper = new DepartureMapper;

        $this->arrayBusses = [
            'data' => [
                'BusGroups' => [
                    [
                        'Type' => 'Buss',
                        'Departures' => [
                            [
                                'LineNumber' => '50',
                                'Destination' => 'Hornsberg',
                                'ExpectedDateTime' => '2015-12-21T22:30:00',
                                'DisplayTime' => '2 min'
                            ]
                        ]
                    ]
                ],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayTrains = [
            'data' => [
                'TrainGroups' => [
                    [
                        'Type' => 'Pendeltåg',
                        'Departures' => [
                            [
                                'StopAreaName' => 'Stockholms central',
                                'LineNumber' => '35',
                                'Destination' => 'Bålsta',
                                'ExpectedDateTime' => '2015-12-21T22:30:00',
                                'DisplayTime' => '2 min'
                            ]
                        ]
                    ]
                ],
                'BusGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayTrams = [
            'data' => [
                'TranCityTypes' => [
                    [
                        'TramGroups' => [
                            [
                                'Departures' => [
                                    [
                                        'StopAreaName' => 'Waldemarsudde',
                                        'LineNumber' => '7',
                                        'Destination' => 'KUNGSTRÄDGÅRDEN',
                                        'ExpectedDateTime' => '2015-12-21T23:00:00',
                                        'DisplayTime' => '2 min',
                                        'GroupOfLine' => 'Spårväg City'
                                    ]
                                ]
                            ]
                        ],
                        'Type' => 'Spårväg City',
                        'Line' => '7',
                        'LineType' => 'tram',
                        'Title' => 'Spårväg City',
                        'GroupId' => 'Spårväg City'
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayLightRails = [
            'data' => [
                'TramTypes' => [
                    [
                        'TramGroups' => [
                            [
                                'Departures' => [
                                    [
                                        'StopAreaName' => 'Slussen',
                                        'LineNumber' => '25',
                                        'Destination' => 'Saltsjöbaden',
                                        'ExpectedDateTime' => '2015-12-21T23:00:00',
                                        'DisplayTime' => '2 min',
                                        'GroupOfLine' => 'Saltsjöbanan'
                                    ]
                                ]
                            ]
                        ],
                        'Type' => 'Saltsjöbanan',
                        'Line' => '25',
                        'LineType' => 'lightrail',
                        'Title' => 'Saltsjöbanan',
                        'GroupId' => 'Saltsjöbanan'
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayMetrosRed = [
            'data' => [
                'MetroRedGroups' => [
                    [
                        'Type' => 'Tunnelbana',
                        'Departures' => [
                            [
                                'LineNumber' => '14',
                                'Destination' => 'Mörby centrum',
                                'DisplayTime' => '5 min',
                                'GroupOfLine' => 'Tunnelbanans röda linje',
                                'GroupOfLineId' => 2,
                                'DepartureGroupId' => 1,
                                'PlatformMessage' => 'Korta tåg'
                            ]
                        ]
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayMetrosGreen = [
            'data' => [
                'MetroGreenGroups' => [
                    [
                        'Type' => 'Tunnelbana',
                        'Departures' => [
                            [
                                'LineNumber' => '18',
                                'Destination' => 'Farsta strand',
                                'DisplayTime' => '5 min',
                                'GroupOfLine' => 'Tunnelbanans gröna linje',
                                'GroupOfLineId' => 1,
                                'DepartureGroupId' => 1,
                                'PlatformMessage' => 'Korta tåg'
                            ]
                        ]
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroBlueGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayMetrosBlue = [
            'data' => [
                'MetroBlueGroups' => [
                    [
                        'Type' => 'Tunnelbana',
                        'Departures' => [
                            [
                                'LineNumber' => '11',
                                'Destination' => 'Kungsträdgården',
                                'DisplayTime' => '5 min',
                                'GroupOfLine' => 'Tunnelbanans blå linje',
                                'GroupOfLineId' => 3,
                                'DepartureGroupId' => 1,
                                'PlatformMessage' => 'Korta tåg'
                            ]
                        ]
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'ShipGroups' => []
            ]
        ];

        $this->arrayShips = [
            'data' => [
                'ShipGroups' => [
                    [
                        'Type' => 'Båt',
                        'Departures' => [
                            [
                                'StopAreaName' => 'Slussen',
                                'LineNumber' => '51',
                                'Destination' => 'Djurgården',
                                'ExpectedDateTime' => '2015-12-16T18:12:00',
                                'DisplayTime' => '18:12'
                            ]
                        ]
                    ]
                ],
                'BusGroups' => [],
                'TrainGroups' => [],
                'TranCityTypes' => [],
                'TramTypes' => [],
                'MetroRedGroups' => [],
                'MetroGreenGroups' => [],
                'MetroBlueGroups' => []
            ]
        ];
    }

    /** @test */
    function departure_mapper_can_map_array_of_bus_departures()
    {
        $departures = $this->departureMapper->map($this->arrayBusses);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('50', $departure->id());
        $this->assertEquals('bus', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Hornsberg', $departure->destination());
        $this->assertEquals('2 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_train_departures()
    {
        $departures = $this->departureMapper->map($this->arrayTrains);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('35', $departure->id());
        $this->assertEquals('train', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Bålsta', $departure->destination());
        $this->assertEquals('2 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_trams_departures()
    {
        $departures = $this->departureMapper->map($this->arrayTrams);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('7', $departure->id());
        $this->assertEquals('tram', $departure->type());
        $this->assertEquals('Spårväg City', $departure->subType());
        $this->assertEquals('KUNGSTRÄDGÅRDEN', $departure->destination());
        $this->assertEquals('2 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_light_rails_departures()
    {
        $departures = $this->departureMapper->map($this->arrayLightRails);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('25', $departure->id());
        $this->assertEquals('light rail', $departure->type());
        $this->assertEquals('Saltsjöbanan', $departure->subType());
        $this->assertEquals('Saltsjöbaden', $departure->destination());
        $this->assertEquals('2 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_metros_red_departures()
    {
        $departures = $this->departureMapper->map($this->arrayMetrosRed);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('14', $departure->id());
        $this->assertEquals('metro', $departure->type());
        $this->assertEquals('red', $departure->subType());
        $this->assertEquals('Mörby centrum', $departure->destination());
        $this->assertEquals('5 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_metros_green_departures()
    {
        $departures = $this->departureMapper->map($this->arrayMetrosGreen);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('18', $departure->id());
        $this->assertEquals('metro', $departure->type());
        $this->assertEquals('green', $departure->subType());
        $this->assertEquals('Farsta strand', $departure->destination());
        $this->assertEquals('5 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_metros_blue_departures()
    {
        $departures = $this->departureMapper->map($this->arrayMetrosBlue);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('11', $departure->id());
        $this->assertEquals('metro', $departure->type());
        $this->assertEquals('blue', $departure->subType());
        $this->assertEquals('Kungsträdgården', $departure->destination());
        $this->assertEquals('5 min', $departure->displayTime());
    }

    /** @test */
    function departure_mapper_can_map_array_of_ships_departures()
    {
        $departures = $this->departureMapper->map($this->arrayShips);

        $this->assertCount(1, $departures);

        foreach ($departures as $departure) {
            $this->assertInstanceOf(DepartureInterface::class, $departure);
        }

        $departure = $departures[0];
        $this->assertEquals('51', $departure->id());
        $this->assertEquals('ship', $departure->type());
        $this->assertEquals(null, $departure->subType());
        $this->assertEquals('Djurgården', $departure->destination());
        $this->assertEquals('18:12', $departure->displayTime());
    }
}
