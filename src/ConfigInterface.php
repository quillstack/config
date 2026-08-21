<?php

declare(strict_types=1);

namespace Quillstack\Config;

interface ConfigInterface
{
    /**
     * The value under the given key, or the default when there is nothing there.
     */
    public function get(string $key, mixed $default = null): mixed;
}
