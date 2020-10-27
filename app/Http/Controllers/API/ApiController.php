<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Inquirer",
 *      description="Create|Read answers and questions",
 *      @OA\Contact(
 *          email="anonim9592@gmail.com"
 *      ),
 * )
 *
 * @OA\Server(
 *      url=L5_SWAGGER_CONST_HOST,
 *      description="Demo API Server"
 * )

 *
 * @OA\Tag(
 *     name="Projects",
 *     description="API Endpoints of Projects"
 * )
 */
class ApiController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
