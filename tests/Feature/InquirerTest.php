<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InquirerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    use RefreshDatabase;

    public function testCreateInquirerTest(): void
    {
        $this->refreshApplication();
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer '.config('app.api_token')
            ])
            ->postJson('/api/inquirer',
            [
                "title"=> "test_inquirer_title",
                "key"=> "test_inquirer_key",
                "answers"=> [
                    "test_1",
                    "test_2"
            ]
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonPath("title", "test_inquirer_title");

    }
    public function testGetInquirerFrontendTest()
    {
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
        ])
            ->get('/api/inquirer/get/test_inquirer_key');

        $response
            ->assertStatus(200)
            ->assertJsonPath("title", "test_inquirer_title");

    }

    public function testGetInquirerSecuredTest()
    {
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer '.config('app.api_token')
        ])
            ->get('/api/inquirer');

        $response
            ->assertStatus(200)
            ->assertJsonPath("0.key", "test_inquirer_key");
    }
}
