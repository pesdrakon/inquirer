<?php
namespace App\Repositories;

use App\Models\Inquirer;
use Carbon\Carbon;
use Illuminate\Support\Str;

class InquirerRepository
{

    public function all()
    {
        return Inquirer::all();
    }

    /**
     * @return mixed
     */
    public static function getForFront($key)
    {
        return Inquirer::where(['key' => $key])->with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id');
        }])->first();
    }

    public static function getCreated()
    {
        return Inquirer::with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id')
                ->with('questions');
        }])->get();
    }


}