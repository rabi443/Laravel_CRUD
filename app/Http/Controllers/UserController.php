<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('welcome', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request ->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'contact' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        $photoName = null;

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo'); 
            $photoName = time() . '.' . $request->profile_photo->getClientOriginalExtension();
            $file->storeAs('profile_photos', $photoName, 'public');
        }

        User::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'profile_photo' => $photoName,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('viewPhoto', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $request ->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'contact' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,'.$id,
            'profile_photo' => 'nullable|image|mimes:jpg,png,jpeg|max:5120',
        ]);

        $user = User::findOrFail($id);
        $photoName = $user->profile_photo;

        if ($request->hasFile('profile_photo')) {
            $file = $request->file('profile_photo'); 
            $photoName = time() . '.' . $request->profile_photo->getClientOriginalExtension();
            $file->storeAs('profile_photos', $photoName, 'public');
        }

        $user->update([
            'name' => $request->name,
            'address' => $request->address,
            'contact' => $request->contact,
            'email' => $request->email,
            'profile_photo' => $photoName,
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
