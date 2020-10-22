<?php

declare(strict_types=1);

namespace QuillStack\Config;

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
