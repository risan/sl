<?php

use Sl\Station;

class StationTest extends PHPUnit_Framework_TestCase {
    protected $station;

    function setUp()
    {
        $this->station = new Station(1002, 'Centralen (Stockholm)');
    }

    /** @test */
    function station_has_id()
    {
        $this->assertEquals(1002, $this->station->id());
    }

    /** @test */
    function station_has_name()
    {
        $this->assertEquals('Centralen (Stockholm)', $this->station->name());
    }
}
