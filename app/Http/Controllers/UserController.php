<?php
namespace App\Http\Controllers;
use App\User;
class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $token = $request->session()->get('github_token', null);
        $user = Socialite::driver('github')->userFromToken($token);

        DB::update('update public.user set name = ? where github_id = ?', [$request->input('name'), $user->user['login']]);
        return redirect('/github');
    }  
}