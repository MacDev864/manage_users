<?php

namespace App\Http\Controllers\user_interface;

use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Modals extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $user->name = Repocontroller::strTouppercase($user->name);
    $user->lastname = Repocontroller::strTouppercase($user->lastname);
    $users = AuthService::getAll()->toArray();
    $data = [
      'user_data' => $user,
      'role' => $user->chkRole(),
      'users' => $users,
    ];
    return view('content.user-interface.ui-modals')->with($data);
  }
}
