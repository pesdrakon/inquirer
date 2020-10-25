<?php
namespace App\Repositories;

use App\Models\ApiToken;
use Carbon\Carbon;
use Illuminate\Support\Str;

class ApiTokenRepository
{
//    protected $model = ApiToken::class;

    public function all()
    {
        return ApiToken::all();
    }

    /**
     * @return mixed
     */
    public function getValid()
    {
        return ApiToken::where(['>','ended_at', Carbon::now()])->get();
    }

    public function getValidArray()
    {
        return ApiToken::where(['>','ended_at', Carbon::now()])->select('api_token')->asArray()->get();
    }

    /**
     * @param $header
     * @return mixed
     */
    public function refresh($header) {
        if (Str::startsWith($header, 'Bearer ')) {
            $request_token = Str::substr($header, 7);
        }
        $random_string = Str::random(80);

        if (isset($request_token) && !empty($request_token)) {
            $token = ApiToken::find()->where(['api_token' => hash('sha256', $request_token)])->one();
        } else {
            $token = null;
        }

        if ($token && $token->ended_at > Carbon::now()) {
            $token->ended_at = Carbon::now()->addMinutes(60);
            $token->save();
            $result['token'] = $request_token;
            $result['message'] = 'Token is valid';
        } elseif ($token && $token->ended_at < Carbon::now()) {
            $token->api_token = hash('sha256', $random_string);
            $token->ended_at = Carbon::now()->addMinutes(60);
            $token->save();
            $result['token'] = $request_token;
            $result['message'] = 'Token updated';
        } else {
            $data = [];
            $data['api_token'] = hash('sha256', $random_string);
            $data['ended_at'] = Carbon::now()->addMinutes(60);
            $token = new ApiToken();
            $token->fill($data);
            $token->save();
            $result['token'] = $random_string;
            $result['message'] = 'Token created';
        }
        return $result;
    }
}