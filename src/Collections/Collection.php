<?php

namespace Sl\Collections;

use Sl\Contracts\Mapper;
use Illuminate\Support\Collection as BaseCollection;
use Sl\Contracts\Collections\Collection as CollectionInterface;

class Collection extends BaseCollection implements CollectionInterface {
    /**
     * Create from raw array data.
     *
     * @param  array  $items
     * @param  Sl\Contracts\Mapper $mapper
     * @return Sl\Contracts\Collections\Collection
     */
    static public function fromArray(array $items, Mapper $mapper)
    {
        return new static($mapper->map($items));
    }
}
