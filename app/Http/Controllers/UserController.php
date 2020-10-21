<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index')->with(['users'=> User::get()]);
    }

    public function edit(User $user)
    {
        return view('admin.users.edit',  [
            'user' => $user,
            'roles' => Role::all(),
            ]);  
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        
       
        
        $user->save();

        return redirect('/dashboard/users')->with('success', 'Пользователь отредактирован');
    }
}
