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
        return Inquirer::where(['key' => $key])->with(['questions' => function($query) {
            $query->select('id','question','inquirer_id');
        }])->first();
    }

    public function getCreated()
    {
        return Inquirer::with(['questions' => function($query) {
            $query->select('id','question','inquirer_id')
                ->with('answers');
        }])->get();
    }

    public function getColumnDiagramData() {
        return Inquirer::select('title')
            ->withCount('answers')
            ->get();
    }

    public function getSectorDiagramData(): array
    {
        $inquirers = Inquirer::withCount('answers')->get();
        $with = $inquirers->where('answers_count','>', '0')->count();
        $without = $inquirers->where('answers_count', '0')->count();
        $total = $inquirers->count();

        return [
            'with_questions' => (int)$with,
            'without_questions' => (int)$without,
            'total' => (int)$total
        ];
    }
}