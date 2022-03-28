<?php
//AUTHOR: Julian Bueno

namespace App\Http\Controllers\adminCRUD;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class UsersCRUD extends Controller
{
    function users()
    {
        $allUsers = User::latest()
        ->paginate(10);
        return view('admin.UsersTable')
        ->with('viewData', $allUsers);
    }

    function user(User $user)
    {
        return view('admin.User')
        ->with('viewData', $user);
    }

    function newUser(){
        return view('admin.UserCreate');
    }

    function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required',
            'balance' => 'required|numeric|gte:0'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isAdmin' => false,
            'balance' => $request->balance
        ]);
        
        return redirect()->route('admin.users');
    }

    function updateUser(User $user, Request $request)
    {
        $this->validate($request, [
            'name' => 'max:255',
            'email' => 'nullable|email|max:255',
            'balance' => 'nullable|numeric|gte:0'
        ]);
        if($request->password) $user->setPassword(Hash::make($request->password));
        if($request->name) $user->setName($request->name);
        if($request->email) $user->setEmail($request->email);
        if($request->balance) $user->setBalance($request->balance);
        $user->setAdmin($request->isAdmin ? 1 : 0);
        $user->save();
        return redirect()->route('admin.user', $user->getId());
    }

    function deleteUser(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users');
    }
}
