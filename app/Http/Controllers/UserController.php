<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index')->with(['users'=> User::get(),
            'roles' => Role::all(),
            ]);
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

        $user->update($request->except('roles'));
        $user->chat_id = $request->get('chat_id');
        $user->roles()->detach();
            if($request->input('roles')):
                $user->roles()->attach($request->input('roles'));
            endif; 
        
        $user->save();
 
        return redirect('/dashboard/users')->with('success', 'Пользователь отредактирован');
    }
}
