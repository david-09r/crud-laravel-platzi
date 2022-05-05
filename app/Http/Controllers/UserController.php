<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  public function index () {
    $users = User::latest() -> get();

    return view('users.index', [
      'users' => $users
    ]);
  }

  public function store (Request $request): \Illuminate\Http\RedirectResponse
  {
    $request -> validate( [
      'name'     => 'required',
      'email'    => ['required', 'email', 'unique:users'],
      'password' => ['required', 'min:8'],
    ]);


    User::create([
      'name' => $request -> name,
      'email' => $request -> email,
      'password' => bcrypt($request -> password)
    ]);

    return back();
  }

  public function destroy (User $user): \Illuminate\Http\RedirectResponse
  {
    $user -> delete();

    return back();
  }

}
