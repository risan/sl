<?php

namespace Sl\Contracts;

interface Mapper
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
