<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\InquirerRequest;
use App\Models\Answer;
use App\Models\Inquirer;
use App\Services\AnswerService;
use App\Repositories\InquirerRepository;
use Illuminate\Support\Str;

class InquirerController extends ApiController
{

    public function get($key) {
        $inquirer = InquirerRepository::getForFront($key);
        if ($inquirer) {
            return $inquirer;
        } else {
            abort(404);
        }
    }

    public function data() {
        $column_diagram = InquirerRepository::getColumnDiagramData();
        $sector_diagram = InquirerRepository::getSectorDiagramData();
        return ['column_diagram_data' => $column_diagram, 'sector_diagram_data' => $sector_diagram];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return InquirerRepository::getCreated();
    }

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
     * @param  InquirerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InquirerRequest $request)
    {
        $data = $request->validated();
        $inquirer = new Inquirer();
        $inquirer->title = $data['title'];
        $inquirer->key = $data['key']??Str::random();
        $inquirer->save();
        (new AnswerService)->createAnswers($data['answers'], $inquirer->id);

        return InquirerRepository::getForFront($inquirer->key);
    }
}
