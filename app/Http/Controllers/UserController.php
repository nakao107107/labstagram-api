<?php
namespace App\Http\Controllers;
use App\User;
use App\Requests\User\ShowRequest;

use App\Services\UserService;

class UserController extends Controller
{
    private $user_service;
    
    public function __construct(UserService $user_service)
    {
        $this->user_service = $user_service;
    }

    public function updateUser(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);

        DB::update('update public.user set name = ? where github_id = ?', [$request->input('name'), $user->user['login']]);
        return redirect('/github');
    }
    
    public function show(ShowRequest $request)
    {
        $res = $this->user_service->getUserById(
            $request->route('user_id')
        );
        return response($res);
    }
}