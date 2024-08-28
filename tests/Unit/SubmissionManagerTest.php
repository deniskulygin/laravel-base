<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\ORM\Manager\SubmissionManger;
use App\Service\Job\SubmitData;
use App\ORM\Model\Submission;
use Illuminate\Container\Container;
use Mockery;
use PHPUnit\Framework\TestCase;

class SubmissionManagerTest extends TestCase
{
    public function testCreate()
    {
        $container = Mockery::mock(Container::class);

        $submission = Mockery::mock(Submission::class);

        $submitData = Mockery::mock(SubmitData::class);
        $submitData->shouldReceive('getName')->andReturn('John Doe');
        $submitData->shouldReceive('getEmail')->andReturn('john.doe@example.com');
        $submitData->shouldReceive('getMessage')->andReturn('This is a test message.');

        $submission->shouldReceive('setName')->with('John Doe')->andReturnSelf();
        $submission->shouldReceive('setEmail')->with('john.doe@example.com')->andReturnSelf();
        $submission->shouldReceive('setMessage')->with('This is a test message.')->andReturnSelf();
        $submission->shouldReceive('save')->andReturn(true);

        $container->shouldReceive('make')->with(Submission::class)->andReturn($submission);

        $manager = new SubmissionManger($container);

        $result = $manager->create($submitData);

        $this->assertInstanceOf(Submission::class, $result);
        $this->assertSame($submission, $result);
    }
}
