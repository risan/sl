<?php

namespace Sl\Contracts\Collections;

use Sl\Contracts\Mapper;

interface Collection {
    /**
     * Create from raw data.
     *
     * @param  array  $items
     * @param  Sl\Contracts\Mapper $mapper
     * @return Sl\Contracts\Collections\Collection
     */
    static public function fromRaw(array $items, Mapper $mapper);
}
