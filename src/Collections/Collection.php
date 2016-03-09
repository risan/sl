<?php

namespace Sl\Collections;

use Sl\Contracts\MapperInterface;
use Illuminate\Support\Collection as BaseCollection;
use Sl\Contracts\Collections\CollectionInterface;

class Collection extends BaseCollection implements CollectionInterface
{
    /**
     * Create from raw array data.
     *
     * @param array                $items
     * @param \Sl\Contracts\MapperInterface $mapper
     *
     * @return \Sl\Contracts\Collections\CollectionInterface
     */
    public static function fromArray(array $items, MapperInterface $mapper)
    {
        return new static($mapper->map($items));
    }
}
