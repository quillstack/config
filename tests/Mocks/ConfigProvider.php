<?php

declare(strict_types=1);

namespace QuillStack\Mocks;

use Quillstack\Config\ConfigProviderInterface;
use Quillstack\Mocks\Config\AwsConfigMock;

final class ConfigProvider implements ConfigProviderInterface
{
    public function load(): array
    {
        return [
            'aws' => AwsConfigMock::class,
        ];
    }
}
