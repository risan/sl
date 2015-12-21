<?php

namespace Sl\Contracts\Collections;

use Sl\Contracts\Mapper;

interface Collection {
    /**
     * Create from raw array data.
     *
     * @param  array  $items
     * @param  Sl\Contracts\Mapper $mapper
     * @return Sl\Contracts\Collections\Collection
     */
    static public function fromArray(array $items, Mapper $mapper);
}
