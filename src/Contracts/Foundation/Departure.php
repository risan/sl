<?php

namespace Sl\Contracts\Foundation;

interface Departure {
    /**
     * Get departure's id.
     *
     * @return string
     */
    public function id();

    /**
     * Get departure's type.
     *
     * @return string
     */
    public function type();

    /**
     * Get departure's subtype.
     *
     * @return string|null
     */
    public function subType();

    /**
     * Get departure's destination.
     *
     * @return string
     */
    public function destination();

    /**
     * Get departure's display time.
     *
     * @return string
     */
    public function displayTime();
}
