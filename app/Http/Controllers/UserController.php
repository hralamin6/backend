<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAddRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {

        if (Gate::denies('show users')) {  // Check if the user has permission
            abort(403, 'Unauthorized action.');
        }

        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show the form to create a new user (Create)
    public function create()
    {
        if (auth()->user()->cannot('create users')) {
            abort(403, 'Unauthorized actions.');
        }
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    // Store a new user (Create)
    public function store(StoreUserAddRequest $request)
    {
        if (auth()->user()->cannot('create users')) {
            abort(403, 'Unauthorized actions.');
        }
        $validated = $request->validated();

        // Create the user and assign the selected role
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Assign the selected role
        $user->assignRole($validated['role']);

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }

    // Show the form to edit a user (Update)
    public function edit(User $user)
    {
        if (auth()->user()->cannot('edit users')) {
            abort(403, 'Unauthorized actions.');
        }
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    // Update the user (Update)
    public function update(UpdateUserRequest $request, User $user)
    {
        if (auth()->user()->cannot('edit users')) {
            abort(403, 'Unauthorized actions.');
        }
        $validated = $request->validated();

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => isset($validated['password']) ? Hash::make($validated['password']) : $user->password,
        ]);

        // Sync roles
        $user->syncRoles($validated['role']);

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    // Delete a user (Delete)
    public function destroy(User $user)
    {if (auth()->user()->cannot('delete users')) {
        abort(403, 'Unauthorized actions.');
    }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
