<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth('backend')->attempt($credentials)) {
            return apiResponse([], 500, 'Unauthorized 登录失败');
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
        $token = auth('backend')->user();
        return apiResponse(['access_token' => $token], 200, '校验成功');
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth('backend')->logout();

        return apiResponse([], 200, 'Successfully logged out');
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth('backend')->refresh());
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
            'expires_in' => auth('backend')->factory()->getTTL() * 60,
        ]);
    }

    public function register()
    {
        $email = request()->input('email');
        $password = request()->input('password');
        $name =request()->post('user_name');
        $ret = Admin::where(['email' => $email])->first();

        if($ret){
            return apiResponse('已经注册了');
        }

        $ret = Admin::create([
            'user_name' => $name,
            'email' => $email,
            'password' => Hash::make($password), //密码后面修改为前端加密
        ]);

        if($ret){
            return apiResponse('注册成功');
        }else{
            return apiResponse('注册失败', 500);
        }
    }
}
