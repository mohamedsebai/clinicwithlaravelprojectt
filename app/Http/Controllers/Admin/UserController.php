<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(1);
        return view('admin.users.users_list', compact('users'));
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'deleted has been done');
    }
}
