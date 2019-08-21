<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\DB;

use App\Services\LoginService;

use Socialite;
use Illuminate\Http\Request;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';


    private $login_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LoginService $login_service)
    {
        $this->middleware('guest')->except('logout');
        $this->login_service = $login_service;
    }

    public function getRedirectUrl()
    {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect()->getTargetUrl(); 
    }


    /**
     * GitHubの認証ページヘユーザーをリダイレクト
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()// 追加！
    {
        return Socialite::driver('github')->scopes(['read:user', 'public_repo'])->redirect(); 
    }

    public function handleProviderCallback(Request $request)
    {
        $github_user = Socialite::driver('github')->stateless()->user();  
        //github_idを元にuser検索
        //いなければ新規作成して返す
        $app_user = $this->login_service->createOrUpdateUser($github_user);
        return $app_user->createToken();

    }
}
