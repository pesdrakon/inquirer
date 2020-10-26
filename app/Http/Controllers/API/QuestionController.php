<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Param;

class QuestionController extends ApiController
{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index()
//    {
//        //
//    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  QuestionRequest  $request
     * @return array
     */
    public function store(QuestionRequest $request): array
    {
        $data = $request->validated();
        $result = [];
        foreach ($data['questions'] as $item) {
            $question = new Question();
            $question->fill($item);
            $question->save();
            $result[] = $question;
        }

        return $result;
    }
}
