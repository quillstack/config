<?php

declare(strict_types=1);

namespace QuillStack\Tests\Config;

use QuillStack\Mocks\Config\AwsConfigMock;
use QuillStack\Tests\TestCase;

final class ConfigTest extends TestCase
{
    public function testConfig()
    {
        $awsConfig = $this->getContainer()->get(AwsConfigMock::class);

        $this->assertEquals('123', $awsConfig->get('token.current'));
        $this->assertEquals(['current' => '123'], $awsConfig->get('token'));
        $this->assertEquals('default', $awsConfig->get('not exists', 'default'));

        $this->assertEquals('123', config('aws.token.current'));
        $this->assertEquals(['current' => '123'], config('aws.token'));
    }
}
