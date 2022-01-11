<?php

declare(strict_types=1);

namespace Quillstack\Config\Tests\Unit;

use Quillstack\Config\ConfigProviderInterface;
use Quillstack\Config\Tests\Mocks\ConfigProvider;
use Quillstack\DI\Container;

abstract class AbstractTest
{
    public function getContainer()
    {
        return new Container([
            ConfigProviderInterface::class => ConfigProvider::class,
        ]);
    }
}
