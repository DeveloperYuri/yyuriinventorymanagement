<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard.users.listusers', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.users.createusers');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = request()->validate([
            'name' =>'required',
            'email' =>'required|unique:users',
            'password' =>'required|min:6',
            'confirm_password' =>'required_with:password|same:password|min:6',
            'is_role' =>'required',
        ]);

        $user = new User;

        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->is_role = trim($request->is_role);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/users')->with('success', 'Create New Users Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);

        return view('dashboard.users.editusers', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $users = User::findOrFail($id);

        // $users = request()->validate([
        //     'name' =>'required',
        //     'email' =>'required|unique:users',
        //     'password' =>'required|min:6',
        //     'confirm_password' =>'required_with:password|same:password|min:6',
        //     'is_role' =>'required',
        // ]);

        // $users = new User;

        $users->name = trim($request->name);
        $users->email = trim($request->email);
        $users->password = Hash::make($request->password);
        $users->is_role = trim($request->is_role);
        $users->remember_token = Str::random(50);
        $users->save();

        return redirect('/users')->with('success', 'Update Users Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/users')->with('error', 'Delete Users Successfully');

    }
}
