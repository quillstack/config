<?php

declare(strict_types=1);

namespace QuillStack\Tests;

use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use QuillStack\Config\ConfigProviderInterface;
use QuillStack\DI\Container;
use QuillStack\Mocks\ConfigProvider;

class TestCase extends PHPUnitTestCase
{
    public function getContainer()
    {
        return new Container([
            ConfigProviderInterface::class => ConfigProvider::class,
        ]);
    }
}
