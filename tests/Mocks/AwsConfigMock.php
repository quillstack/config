<?php

declare(strict_types=1);

namespace Quillstack\Config\Tests\Mocks;

use Quillstack\Config\Config;

final class AwsConfigMock extends Config
{
    protected array $config = [
        'token' => [
            'current' => '123',
        ]
    ];
}
