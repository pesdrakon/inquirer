<?php

namespace App\Http\Controllers\API;

use App\Repositories\ApiTokenRepository;
use Illuminate\Http\Request;

class ApiTokenController extends ApiController
{
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request): array
    {
        return (new ApiTokenRepository)->refresh($request);
    }
}