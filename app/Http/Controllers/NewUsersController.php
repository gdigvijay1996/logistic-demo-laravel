<?php

namespace App\Http\Controllers;

use App\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewUsersController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('new_users');
    }

    public function getUsersList()
    {
        $users = Users::select('*', "name as full_name");
        return datatables()->of($users)->make(true);
    }

    public function create()
    {
        $is_edit = false;
        return view('create_edit_user', compact('is_edit', 'users'));
    }

    public function edit($id)
    {
        $users = Users::where('id', '=', $id)->first();
        $is_edit = true;
        return view('create_edit_user', compact('is_edit', 'users'));
    }

    public function store()
    {
        request()->validate([
            "name" => 'required',
            "email" => 'required',
            "mobile_number" => 'required',
        ]);

        Users::create([
            "name" => request('name'),
            "email" => request('email'),
            "mobile_number" => request('mobile_number')
        ]);
        return redirect(url('/home/new-users'));
    }

    public function update(Users $users)
    {
        $users->update(request(['name', 'email', 'mobile_number']));
        return redirect(url('/home/new-users'));
    }

    public function destroy(Users $users)
    {
        $users->delete();
        return response()->json(['success' => 'user edited successfully...!!!'], 200);
    }
}
