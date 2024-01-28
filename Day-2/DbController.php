<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DbController extends Controller
{
    public function getUsersList()
    {
        $users = DB::select('SELECT id, name, email FROM users');

        return response()->json($users);
    }

    public function getUserById(int $id)
    {
        $results = DB::select('select * from users where id = :id', ['id' => $id]);
        $text = print_r($results, 1);
        // OR
        $user = DB::table('users')->where('id', $id)->first();
        $text = print_r($user);

        return response($text);
    }

    public function createUserForm()
    {
        return view('db_users.create');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        $hash = password_hash($request->email, PASSWORD_BCRYPT);

        DB::insert('insert into users (name, email, password) values (?, ?, ?)', [
            $request->name,
            $request->email,
            $hash
        ]);

        $userId = DB::getPdo()->lastInsertId();

        return response()->json(['message' => 'User created', 'id' => $userId]);
    }
}
