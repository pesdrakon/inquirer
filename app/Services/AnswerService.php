<?php
namespace App\Services;

use App\Models\Answer;

class AnswerService
{

    public function createAnswers($data, $inquirer_id): ?int
    {
        if (is_array($data)) {
            foreach ($data as $text) {
                $answer = new Answer();
                $answer->answer = $text;
                $answer->inquirer_id = $inquirer_id;
                $answer->save();
            }
        }
        return $answer->id ?? null;
    }


}