<?php

namespace Sl\Mappers;

use Sl\Station;
use Sl\Contracts\Mapper;

class StationMapper implements Mapper
{
    /**
     * Map data to array of object instance.
     *
     * @param array $data
     *
     * @return array
     */
    public function map(array $data)
    {
        $data = $data['data'];
        $stations = [];

        foreach ($data as $place) {
            if ($place['Type'] === 'station') {
                $stations[] = new Station($place['SiteId'], $place['Name']);
            }
        }

        return $stations;
    }
}
