<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('users');
    }

    public function usersList()
    {
        $users = DB::table('users')->select('*');
        return datatables()->of($users)
            ->make(true);
    }

    public function getUser(User $user)
    {
        return $user;
    }

    public function update(User $user, Request $request)
    {
        $user->name = $request->username;
        $user->save();
        return response()->json(['success' => 'user edited successfully...!!!'], 200);
    }

    public function removeUser(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'user removes successfully...!!!'], 200);
    }
}
