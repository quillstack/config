<?php

declare(strict_types=1);

namespace Quillstack\Config;

interface ConfigInterface
{
    /**
     * @param string $key
     * @param $default
     *
     * @return mixed
     */
    public function get(string $key, $default);
}
