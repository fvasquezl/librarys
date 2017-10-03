<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
                ->fromSearch($request->get('search'))
                ->fromRole($request->get('role'))
                ->paginate();
        return view('users.index',compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit',compact('user'));
    }

    public function update(Request $request)
    {

        $request->validate([
           'name' => 'required',
           'email' => 'required',
            'role' => 'required'
        ]);

       $user->save($request->all());
        Alert::success('El usuario "'.$user->name.'" ha sido actualizado');
        return redirect(route('users.index'));
    }
}
