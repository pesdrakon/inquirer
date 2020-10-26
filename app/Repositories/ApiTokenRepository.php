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
        return ApiToken::where('ended_at','>', Carbon::now())->get();
    }

    public function getValidArray() : array
    {
        $tokens = ApiToken::where('ended_at','>', Carbon::now())->select('api_token')->get()->toArray();
        return array_map(
            function($value){
                return $value['api_token'] ?? '';
                }, $tokens
        );
    }

    /**
     * @param $request
     * @return mixed
     */
    public function refresh($request) {
        $header = $request->header('Authorization', '');

        if (Str::startsWith($header, 'Bearer ')) {
            $request_token = Str::substr($header, 7);
        }
//        $random_string = Str::random(80);
        $random_string = md5($this->getIp());

        if (isset($request_token) && !empty($request_token)) {
            $token = ApiToken::where(['api_token' => hash('sha256', $request_token)])->first();
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

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
    }
}