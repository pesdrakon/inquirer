<?php
namespace App\Services;

use App\Models\Answer;
use App\Models\Inquirer;
use Illuminate\Support\Str;

class InquirerService
{

    public function createInquirer($data): Inquirer
    {
        $inquirer = new Inquirer();
        $inquirer->title = $data['title'];
        $inquirer->key = $data['key']??Str::random();
        $inquirer->save();
        if (is_array($data['answers']) && isset($inquirer->id)) {
            foreach ($data['answers'] as $text) {
                $answer = new Answer(['answer'=>$text, 'inquirer_id' => $inquirer->id]);
                $inquirer->answers()->save($answer);
            }
        }
        return $inquirer;
    }


}