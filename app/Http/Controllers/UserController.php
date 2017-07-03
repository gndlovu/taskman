<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\UserRole;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_user_list($which_view = "list_view")
    {
        $users = User::where('id', '!=', Auth::user()->id)->orderBy('created_at')->get();
        $roles = Role::all();

        $html = view("users.user_list", compact('users', 'roles', 'which_view'))->render();

        return json_encode(["status" => true, "content" => $html, 'total_users' => count($users)]);
    }

    public function update_user_access(Request $request)
    {
        $user_id = $request->user_id;
        $role_id = $request->role_id;
        $grant_access = $request->grant_access;

        $user = User::find($user_id);
        $role = Role::find($role_id);

        if ($grant_access)
        {
            if (!$user->hasRole($role->name))
            {
                $user->roles()->attach($role);
            }
        }
        else
        {
            UserRole::where('user_id', $user_id)->where('role_id', $role_id)->delete();
        }

        return json_encode(["status" => true]);
    }

    public function delete_user($which_user)
    {
        if ($which_user === 'all')
        {
            $users = User::where('id', '!=', Auth::user()->id)->orderBy('created_at')->get();
            foreach ($users as $user)
            {
                UserRole::where('user_id', $user->id)->delete();
                User::where('id', $user->id)->delete();
            }
        }
        else
        {
            UserRole::where('user_id', $which_user)->delete();
            User::where('id', $which_user)->delete();
        }

        return json_encode(["status" => true]);
    }
}