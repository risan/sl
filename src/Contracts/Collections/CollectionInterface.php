<?php

namespace Sl\Contracts\Collections;

use Sl\Contracts\MapperInterface;

interface CollectionInterface
{
    /**
     * Create from raw array data.
     *
     * @param array                         $items
     * @param \Sl\Contracts\MapperInterface $mapper
     *
     * @return \Sl\Contracts\Collections\CollectionInterface
     */
    public static function fromArray(array $items, MapperInterface $mapper);
}
