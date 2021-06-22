<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateUser($id){


        $user = User::find($id);
        $user->toggleflag()->save();

        return Redirect()->back()->with('success', 'User Admin rights updated successfully');
    }
}
