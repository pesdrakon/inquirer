<?php
namespace App\Repositories;

use App\Models\Inquirer;

class InquirerRepository
{

    public function all()
    {
        return Inquirer::all();
    }

    /**
     * @param $key
     * @return mixed
     */
    public function getForFront($key)
    {
        return Inquirer::where(['key' => $key])->with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id');
        }])->first();
    }

    public function getCreated()
    {
        return Inquirer::with(['answers' => function($query) {
            $query->select('id','answer','inquirer_id')
                ->with('questions');
        }])->get();
    }

    public function getColumnDiagramData() {
        return Inquirer::select('title')
            ->withCount('questions')
            ->get();
    }

    public function getSectorDiagramData() {
        $inquirers = Inquirer::withCount('questions')->get();
        $with = $inquirers->where('questions_count','>', '0')->count();
        $without = $inquirers->where('questions_count', '0')->count();
        $total = $inquirers->count();

        return [
            'with_questions' => (int)$with,
            'without_questions' => (int)$without,
            'total' => (int)$total
        ];
    }
}