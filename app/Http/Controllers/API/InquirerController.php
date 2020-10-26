<?php

namespace App\Http\Controllers\API;

use App\Models\Inquirer;
use Illuminate\Http\Request;

class InquirerController extends ApiController
{

    public function get($key) {
        $inquirer = Inquirer::where(['key' => $key])->with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id');
        }])->first();
        if ($inquirer) {
            return $inquirer;
        } else {
            abort(404);
        }
    }

    public function questions($key) {
        $inquirer = Inquirer::where(['key' => $key])->with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id');
        }])->first();
        if ($inquirer) {
            return $inquirer;
        } else {
            abort(404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
