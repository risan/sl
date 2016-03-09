<?php

namespace Sl\Contracts;

interface MapperInterface
{
    /**
     * Map data to array of object instance.
     *
     * @param array $data
     *
     * @return array
     */
    public function map(array $data);
}
