<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = Admin::paginate(2);

        return view('admin.admins.admins_list',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admins.add_admin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:50|string',
            'email' => 'required|max:255|email|unique:admins,email',
            'password' => 'required',
        ]);

        $request['password'] = Hash::make($request->password);


        Admin::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => $request['password']
        ]);

        return redirect()->route('admin.admins.create')->with('success', 'data added successfully');
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return back()->with('success', 'data deleted successfully');
    }
}
