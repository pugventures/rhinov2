<?php

namespace App\Http\Controllers\Users;

use Symfony\Component\HttpFoundation\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UsersController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function createUser(Request $request) {
        return view('users/createUser', ['user' => Auth::user()]);
    }

    public function editUser(Request $request, $id) {
        $fetchedUser = User::where('id', $id)->first();

        return view('users/editUser', ['user' => Auth::user(), 'fetchedUser' => $fetchedUser]);
    }

    public function showUsers() {
        $users = User::select('id', 'first_name', 'last_name', 'email', 'role')->get();

        return view('users/users', ['user' => Auth::user(), 'users' => $users]);
    }

    public function submitUser(Request $request) {
        $validatedData = $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role' => 'required|string'
        ]);

        $user = new User();
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role = $request->get('role');
        $user->save();

        return redirect('users')->with('success', 'User created successfully');
    }

    public function updateUser(Request $request, $id) {
        $user = User::where('id', $id)->first();

        // TODO: Add validation
        $user->first_name = $request->get('first_name');
        $user->last_name = $request->get('last_name');
        $user->email = $request->get('email');
        $user->save();

        // Refetch the user to get the updated data
        $fetchedUser = User::where('id', $id)->first();

        return view('users/editUser', ['user' => Auth::user(), 'fetchedUser' => $fetchedUser]);
    }

}
