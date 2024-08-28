<?php

declare(strict_types=1);

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\JsonResponse;
use Tests\TestCase;

class SubmitRequestTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccess()
    {
        $response = $this->postJson('/api/v1/submit', [
            'name' => 'John Doe',
            'email' => 'john.doe@mail.com',
            'message' => 'This is a test message.',
        ]);

        $response->assertStatus(JsonResponse::HTTP_ACCEPTED);
    }

    public function testMissingFields()
    {
        $response = $this->postJson('/api/v1/submit');

        $response->assertStatus(JsonResponse::HTTP_BAD_REQUEST);
    }

    public function testWrongNameAndMissingFields()
    {
        $response = $this->postJson('/api/v1/submit', [
            'name' => 12345,
        ]);

        $response->assertStatus(JsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJson([
            'errors' => [
                [
                    'message' => 'Field name must be a string (and 2 more errors)',
                ],
            ],
        ]);
    }
}
