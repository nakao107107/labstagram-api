<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Support\Facades\DB;

use Socialite;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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

    /**
     * GitHubからユーザー情報を取得
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request)// 追加！
    {
        $github_user = Socialite::driver('github')->user();

        $now = date("Y/m/d H:i:s");
        //github_idを元にuser検索
        $app_user = DB::select('select * from users where github_id = ?', [$github_user->user['login']]);
        if (empty($app_user)) {//該当userがいなければ新規作成
            DB::insert('insert into users (name, github_id, created_at, updated_at) values (?, ?, ?, ?)', ["aa", $github_user->user['login'], $now, $now]);
        }
        $request->session()->put('github_token', $github_user->token);

        return redirect('/');
    }

    //ログインページを表示
    public function renderLoginPage()// 追加！
    {
        return view('login');
    }
}
