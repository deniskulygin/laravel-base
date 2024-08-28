<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Service\Job\SubmitData;
use Tests\TestCase;

class SubmitDataTest extends TestCase
{
    public function testGetEmail()
    {
        $email = 'john.doe@example.com';
        $name = 'John Doe';
        $message = 'This is a test message.';

        $submitData = new SubmitData($email, $name, $message);

        $this->assertSame($email, $submitData->getEmail());
    }

    public function testGetName()
    {
        $email = 'john.doe@example.com';
        $name = 'John Doe';
        $message = 'This is a test message.';

        $submitData = new SubmitData($email, $name, $message);

        $this->assertSame($name, $submitData->getName());
    }

    public function testGetMessage()
    {
        $email = 'john.doe@example.com';
        $name = 'John Doe';
        $message = 'This is a test message.';

        $submitData = new SubmitData($email, $name, $message);

        $this->assertSame($message, $submitData->getMessage());
    }
}
