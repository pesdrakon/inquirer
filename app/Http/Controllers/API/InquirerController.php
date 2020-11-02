<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\InquirerRequest;
use App\Repositories\InquirerRepository;
use App\Services\InquirerService;

class InquirerController extends ApiController
{

    public function get($key, InquirerRepository $repository) {
        $inquirer = $repository->getForFront($key);
        if ($inquirer) {
            return $inquirer;
        }
        abort(404);
    }

    public function data(InquirerRepository $repository): array
    {
        $column_diagram = $repository->getColumnDiagramData();
        $sector_diagram = $repository->getSectorDiagramData();
        return ['column_diagram_data' => $column_diagram, 'sector_diagram_data' => $sector_diagram];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    /**
     * @OA\Get(
     *      path="/api/inquirers",
     *      operationId="getInqurersList",
     *      tags={"inquirer"},
     *      summary="Get list of inquirers",
     *      description="Returns list of inquirers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Inquirer")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     )
     * @param InquirerRepository $repository
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(InquirerRepository $repository)
    {

        return $repository->getCreated();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  InquirerRequest  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * @OA\Post (
     *      path="/api/inquirers",
     *      operationId="storeInquirer",
     *      tags={"inquirer"},
     *      summary="Create new inquirer",
     *      description="Returns list of inquirers",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Inquirer")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *     )
     * @param InquirerRequest $request
     * @param InquirerRepository $repository
     * @param InquirerService $service
     * @return mixed
     */
    public function store(InquirerRequest $request, InquirerRepository $repository, InquirerService $service)
    {
        $data = $request->validated();
        $inquirer = $service->createInquirer($data);

        return $repository->getForFront($inquirer->key);
    }
}
