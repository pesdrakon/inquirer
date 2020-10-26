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
        $result = [];
        foreach ($request->validated()['questions'] as $item) {  //не подобається мені це, як буде час, придумаю щось
            $question = new Question();
            $question->fill($item);
            $question->save();
            $result[] = $question;
        }

        return $result;
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Question  $question
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Question $question)
//    {
//        //
//    }

//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  \App\Models\Question  $question
//     * @return \Illuminate\Http\Response
//     */
//    public function edit(Question $question)
//    {
//        //
//    }

//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  \App\Models\Question  $question
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, Question $question)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  \App\Models\Question  $question
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy(Question $question)
//    {
//        //
//    }
}
