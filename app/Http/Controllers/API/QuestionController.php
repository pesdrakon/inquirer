<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\QuestionRequest;
use App\Services\QuestionService;

class QuestionController extends ApiController
{


    /**
     * Store a newly created resource in storage.
     *
     * @param QuestionRequest $request
     * @param QuestionService $service
     * @return array
     */
    public function store(QuestionRequest $request, QuestionService $service): array
    {
        $data = $request->validated();
        return $service->createQuestions($data);
    }
}
