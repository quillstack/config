<?php

declare(strict_types=1);

namespace Quillstack\Config\Tests\Unit;

use Quillstack\Config\Configuration;
use Quillstack\Config\Tests\Mocks\AwsConfigMock;
use Quillstack\UnitTests\AssertEqual;

class TestConfig extends AbstractTest
{
    public function __construct(private AssertEqual $assertEqual)
    {
        //
    }

    public function testConfig()
    {
        $awsConfig = $this->getContainer()->get(AwsConfigMock::class);

        $this->assertEqual->equal('123', $awsConfig->get('token.current'));
        $this->assertEqual->equal(['current' => '123'], $awsConfig->get('token'));
        $this->assertEqual->equal('default', $awsConfig->get('not exists', 'default'));

        $configuration = $this->getContainer()->get(Configuration::class);

        $this->assertEqual->equal('123', $configuration->get('aws.token.current'));
        $this->assertEqual->equal(['current' => '123'], $configuration->get('aws.token'));
        $this->assertEqual->equal('fallback', $configuration->get('aws.nothing.here', 'fallback'));
        $this->assertEqual->equal('fallback', $configuration->get('unknown.class', 'fallback'));
    }
}
