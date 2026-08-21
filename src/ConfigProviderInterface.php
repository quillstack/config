<?php

declare(strict_types=1);

namespace Quillstack\Config;

interface ConfigProviderInterface
{
    /**
     * Loads config classes, keyed by the name they are addressed under.
     *
     * @return array<string, class-string<ConfigInterface>>
     */
    public function load(): array;
}
