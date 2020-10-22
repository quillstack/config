<?php

declare(strict_types=1);

namespace QuillStack\Config;

interface ConfigProviderInterface
{
    /**
     * Loads config classes.
     *
     * @return array
     */
    public function load(): array;
}
