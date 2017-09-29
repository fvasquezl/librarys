<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ShowUserController extends Controller
{
    public function show()
    {
        $users = User::paginate();
        return view('users.show',compact('users'));
    }
}
