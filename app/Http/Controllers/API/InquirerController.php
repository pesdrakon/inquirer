<?php

namespace App\Http\Controllers\API;

use App\Models\Inquirer;
use App\Repositories\InquirerRepository;
use Illuminate\Http\Request;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

//    /**
//     * Display the specified resource.
//     *
//     * @param  \App\Models\Inquirer  $inquirer
//     * @return \Illuminate\Http\Response
//     */
//    public function show(Inquirer $inquirer)
//    {
//        //
//    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inquirer  $inquirer
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquirer $inquirer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inquirer  $inquirer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquirer $inquirer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inquirer  $inquirer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inquirer $inquirer)
    {
        //
    }
}
