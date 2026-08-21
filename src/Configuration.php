<?php

declare(strict_types=1);

namespace Quillstack\Config;

use Psr\Container\ContainerInterface;

/**
 * Reads values out of the config classes a provider lists, addressed as `aws.token.current`
 * where the first part names the class and the rest is the key inside it.
 */
class Configuration
{
    public function __construct(
        private readonly ContainerInterface $container,
        private readonly ConfigProviderInterface $configProvider
    ) {
        //
    }

    public function get(string $key, mixed $default = null): mixed
    {
        $keys = explode(Config::DELIMITER, $key);
        $name = array_shift($keys);
        $classes = $this->configProvider->load();

        if (!isset($classes[$name])) {
            return $default;
        }

        /** @var ConfigInterface $config */
        $config = $this->container->get($classes[$name]);

        return $config->get(implode(Config::DELIMITER, $keys), $default);
    }
}
