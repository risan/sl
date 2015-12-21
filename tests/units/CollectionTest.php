<?php

use Sl\Collections\Collection;
use Sl\Contracts\Mapper as MapperInterface;
use Sl\Contracts\Collections\Collection as CollectionInterface;

class CollectionTest extends PHPUnit_Framework_TestCase {
    protected $rawArray;

    function setUp()
    {
        $this->rawArray = [
            [
                'foo' => 'bar',
                'baz' => 123
            ]
        ];
    }

    /** @test */
    function collection_can_create_from_raw_array()
    {
        $fooCollection = Collection::fromArray($this->rawArray, new FooMapper);

        $this->assertInstanceOf(CollectionInterface::class, $fooCollection);

        foreach ($fooCollection as $foo) {
            $this->assertInstanceOf(Foo::class, $foo);
        }

        $this->assertEquals('bar', $fooCollection[0]->foo);
        $this->assertEquals(123, $fooCollection[0]->baz);
    }
}

class Foo {
    public $foo;

    public $baz;

    public function __construct($foo, $baz)
    {
        $this->foo = $foo;
        $this->baz = $baz;
    }
}

class FooMapper implements MapperInterface {
    public function map(array $items)
    {
        return array_map(function($item) {
            return new Foo($item['foo'], $item['baz']);
        }, $items);
    }
}
