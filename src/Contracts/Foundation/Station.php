<?php

namespace Sl\Contracts\Foundation;

interface Station {
    /**
     * Get station's id.
     *
     * @return int
     */
    public function id();

    /**
     * Get station's name.
     *
     * @return string|null
     */
    public function name();
}
