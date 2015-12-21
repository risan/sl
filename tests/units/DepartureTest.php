<?php

use Sl\Departure;

class DepartureTest extends PHPUnit_Framework_TestCase {
    protected $departure;

    function setUp()
    {
        $this->departure = new Departure('14', 'metro', 'red', 'Fruängen', '3 min');
    }

    /** @test */
    function departure_has_id()
    {
        $this->assertEquals('14', $this->departure->id());
    }

    /** @test */
    function departure_has_type()
    {
        $this->assertEquals('metro', $this->departure->type());
    }

    /** @test */
    function departure_has_subtype()
    {
        $this->assertEquals('red', $this->departure->subType());
    }

    /** @test */
    function departure_has_destination()
    {
        $this->assertEquals('Fruängen', $this->departure->destination());
    }

    /** @test */
    function departure_has_display_time()
    {
        $this->assertEquals('3 min', $this->departure->displayTime());
    }
}
