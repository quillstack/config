<?php

declare(strict_types=1);

namespace Quillstack\Config\Tests\Unit;

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

        $this->assertEqual->equal('123', config('aws.token.current'));
        $this->assertEqual->equal(['current' => '123'], config('aws.token'));
    }
}
