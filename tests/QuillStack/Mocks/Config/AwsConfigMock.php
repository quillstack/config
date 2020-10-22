<?php

declare(strict_types=1);

namespace QuillStack\Mocks\Config;

use QuillStack\Config\Config;

final class AwsConfigMock extends Config
{
    protected array $config = [
        'token' => [
            'current' => '123',
        ]
    ];
}
