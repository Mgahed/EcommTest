<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateRole($id,$role)
    {
        $user = User::findOrFail($id);
        $user->syncRoles($role);
        return redirect()->back();
    }
}
