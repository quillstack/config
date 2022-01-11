<?php

declare(strict_types=1);

namespace Quillstack\Config;

interface ConfigProviderInterface
{
    /**
     * Loads config classes.
     *
     * @return array
     */
    public function load(): array;
}
