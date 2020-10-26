<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\InquirerRequest;
use App\Models\Inquirer;
use App\Services\AnswerService;
use Illuminate\Support\Str;

class InquirerController extends ApiController
{

    public function get($key) {
        $inquirer = (new \App\Repositories\InquirerRepository)->getForFront($key);
        if ($inquirer) {
            return $inquirer;
        }

        abort(404);
    }

    public function data(): array
    {
        $column_diagram = (new \App\Repositories\InquirerRepository)->getColumnDiagramData();
        $sector_diagram = (new \App\Repositories\InquirerRepository)->getSectorDiagramData();
        return ['column_diagram_data' => $column_diagram, 'sector_diagram_data' => $sector_diagram];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */

    public function index()
    {

        return (new \App\Repositories\InquirerRepository)->getCreated();
    }


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

        return (new \App\Repositories\InquirerRepository)->getForFront($inquirer->key);
    }
}
