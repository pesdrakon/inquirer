<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatisticsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
//    use RefreshDatabase;

    public function testCreateQuestions(): void
    {
//        $this->refreshApplication();
        $response = $this->withHeaders([
            'Content-type' => 'application/json',
            'Authorization' => 'Bearer '.config('app.api_token')
            ])
            ->get('/api/diagram_data');

        $response
            ->assertStatus(200)
            ->assertJsonFragment(['column_diagram_data' => [
                ['questions_count' => 2, 'title' => "test_inquirer_title"]
            ]]);
    }
}
