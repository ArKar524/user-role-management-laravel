<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Gate::allows('read-role')) {
            abort(403, 'Unauthorized action.');
        }
        $roles = Role::all();
        return view('role.index', ['roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('create-role')) {
            abort(403, 'Unauthorized action.');
        }
        $features = Feature::with('permissions')->get();
        return view('role.create', ['features' => $features]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions.*' => 'required'
        ]);

        $role = Role::create([
            'name' => $data['name']
        ]);
        $role->rolePermissions()->sync($data['permissions']);
        return redirect()->route('roles.index')->with('success', 'Role created successfully');
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
        // if (!Gate::allows('update-role')) {
        //     abort(403, 'Unauthorized action.');
        // }
        $role = Role::with('rolePermissions')->findOrFail($id);
        $features = Feature::with('permissions')->get();
        // return $role;
        return view('role.edit', ['role' => $role, 'features' => $features]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'permissions.*' => 'required'
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $data['name']
        ]);
        $role->rolePermissions()->sync($data['permissions']);
        return redirect()->route('roles.index')->with('success', 'Role Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        $role->rolePermissions()->delete();
        $role->delete();
        return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
    }
}