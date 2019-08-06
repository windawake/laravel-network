<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return apiResponse([], 401, 'Unauthorized 登录失败');
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $token = auth()->user();
        return apiResponse(['access_token' => $token], 200, '校验成功');
    }
    

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return apiResponse([], 200, 'Successfully logged out');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * 发送重置邮箱
     */
    public function password_email()
    {
        return apiResponse('发送邮件成功');
    }

    /**
     * 重置密码
     */
    public function password_reset()
    {
        return apiResponse('设置密码成功');
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return apiResponse([
            'access_token' => 'bearer '.$token,
            // 'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ]);
    }

    public function register()
    {
        $ret = App\User::create([
            'user_name' => request()->post('user_name'),
            'email' => request()->post('email'),
            'password' => Hash::make(request()->post('password')), //密码后面修改为前端加密
        ]);

        if($ret){
            return apiResponse('注册成功');
        }else{
            return apiResponse('注册失败', 500);
        }
    }
}
