<?php
namespace App\Services;

use App\Models\Answer;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AnswerService
{

    public function createAnswers($data, $inquirer_id)
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