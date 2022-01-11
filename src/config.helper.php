<?php

declare(strict_types=1);

use Quillstack\Config\Config;
use Quillstack\Config\ConfigProviderInterface;

if (!function_exists('config')) {
    /**
     * @param string $key
     * @param null $default
     *
     * @return mixed
     */
    function config(string $key, $default = null)
    {
        // Load config classes based on config provider.
        $configProvider = container()->get(ConfigProviderInterface::class);
        $configClasses = $configProvider->load();

        // Find index in config provider array.
        $keys = explode(Config::DELIMITER, $key);
        $index = $keys[0];

        // Remove the first element and create a new key.
        array_shift($keys);
        $newKey = implode(Config::DELIMITER, $keys);

        // Get config class and return value from this class.
        $config = container()->get($configClasses[$index]);

        return $config->get($newKey);
    }
}
