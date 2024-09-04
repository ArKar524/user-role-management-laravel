<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('read-user')) {
            abort(403, 'Unauthorized action.');
        }
        $users = User::with('role')->get();
        // return $users;
        return view('user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create-user')) {
            abort(403, 'Unauthorized action.');
        }
        $roles = Role::all();
        return view('user.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            'role_id' => ['required', 'integer'],
            'address' => 'required',
            'gender' => 'required',
            'is_active' => 'required'
        ]);
        User::create($data);
        return redirect()->route('users.index')->with('success', 'User created successfully');
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
        if (!Gate::allows('update-user')) {
            abort(403, 'Unauthorized action.');
        }
        $user = User::with('role')->find($id);
        $roles = Role::all();
        // return $user;
        return view('user.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'role_id' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'is_active' => 'required'
        ]);
        if ($request->password) {
            $data['password'] = $request->password;
        }
        User::find($id)->update($data);
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!Gate::allows('delete-user')) {
            abort(403, 'Unauthorized action.');
        }
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}