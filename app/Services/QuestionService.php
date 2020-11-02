<?php
namespace App\Services;

use App\Models\Answer;
use App\Models\Question;

class QuestionService
{

    public function createQuestions($data): array
    {
        $questions = [];
        foreach ($data['questions'] as $item) {
            $question = new Question();
            $question->fill($item);
            $question->save();
            $questions[] = $question;
        }
        return $questions;
    }


}