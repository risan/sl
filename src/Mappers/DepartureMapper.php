<?php

namespace Sl\Mappers;

use Sl\Departure;
use Carbon\Carbon;
use Sl\Contracts\Mapper;

class DepartureMapper implements Mapper
{
    /**
     * Map data to array of object instance.
     *
     * @param  array  $data
     * @return array
     */
    public function map(array $data)
    {
        $data = $data['data'];

        $busses = $this->busses($data);

        $trains = $this->trains($data);

        $metros = $this->metros($data);

        $trams = $this->trams($data);

        $lightRails = $this->lightRails($data);

        $ships = $this->ships($data);

        return array_merge($busses, $trains, $metros, $trams, $lightRails, $ships);
    }

    /**
     * Busses group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function busses(array $data)
    {
        return $this->mapGroups($data['BusGroups'], 'bus', null);
    }

    /**
     * Trains group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function trains(array $data)
    {
        return $this->mapGroups($data['TrainGroups'], 'train', null);
    }

    /**
     * Metros group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function metros(array $data)
    {
        $red = $this->mapGroups($data['MetroRedGroups'], 'metro', 'red');

        $green = $this->mapGroups($data['MetroGreenGroups'], 'metro', 'green');

        $blue = $this->mapGroups($data['MetroBlueGroups'], 'metro', 'blue');

        return array_merge($red, $green, $blue);
    }

    /**
     * Trams group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function trams(array $data)
    {
        $trams = [];

        foreach ($data['TranCityTypes'] as $type) {
            $trams = array_merge(
                $trams,
                $this->mapGroups($type['TramGroups'], 'tram', $type['GroupId'])
            );
        }

        return $trams;
    }

    /**
     * Light rails group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function lightRails(array $data)
    {
        $lightRails = [];

        foreach ($data['TramTypes'] as $type) {
            $lightRails = array_merge(
                $lightRails,
                $this->mapGroups($type['TramGroups'], 'light rail', $type['GroupId'])
            );
        }

        return $lightRails;
    }

    /**
     * Ships group departures.
     *
     * @param  array  $data
     * @return array
     */
    private function ships(array $data)
    {
        return $this->mapGroups($data['ShipGroups'], 'ship', null);
    }

    /**
     * Map groups departures.
     *
     * @param  array  $data
     * @param  string $type
     * @param  string $subType
     * @return array
     */
    private function mapGroups(array $groups, $type, $subType)
    {
        if (count($groups) === 0) {
            return [];
        }

        $departures = [];

        foreach ($groups as $group) {
            $departures = array_merge(
                $departures,
                $this->createDepartures($group['Departures'], $type, $subType)
            );
        }

        return $departures;
    }

    /**
     * Create departures array.
     *
     * @param  array  $items
     * @param  string $type
     * @param  string $subType
     * @return array
     */
    private function createDepartures(array $items, $type, $subType)
    {
        return array_map(function($departure) use($type, $subType) {
            return new Departure(
                $departure['LineNumber'],
                $type,
                $subType,
                $departure['Destination'],
                $departure['DisplayTime']
            );
        }, $items);
    }
}
