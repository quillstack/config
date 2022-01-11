<?php

declare(strict_types=1);

namespace Quillstack\Config\Tests\Mocks;

use Quillstack\Config\ConfigProviderInterface;

class ConfigProvider implements ConfigProviderInterface
{
    public function load(): array
    {
        return [
            'aws' => AwsConfigMock::class,
        ];
    }
}
