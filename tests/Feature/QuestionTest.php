<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class QuestionTest extends TestCase
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
            ])
            ->postJson('/api/questions/store',
            [
                "questions"=> [
                    [
                        "answer_id" => "1",
                        "question" => "test_question_1"
                    ],
                    [
                        "answer_id" => "1",
                        "question" => "test_question_2"
                    ],
                ]
            ]);

        $response
            ->assertStatus(200)
            ->assertJsonPath("0.question", "test_question_1");
    }
}
