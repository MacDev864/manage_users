<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigetionAccountSetting extends Controller
{
  public function settingsNotifications()
  {
    $user = Auth::user();
    $users = AuthService::getAll()->toArray();
    $data = [
      'user_data' => $user,
      'role' => $user->chkRole(),
      'users' => $users,
    ];
    return view('content.pages.pages-account-settings-notifications')->with($data);
  }
  public function settingsAccount()
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
    return view('content.pages.pages-account-settings-account')->with($data);
  }
  public function settingsConnections()
  {
    $user = Auth::user();
    $users = AuthService::getAll()->toArray();
    $data = [
      'user_data' => $user,
      'role' => $user->chkRole(),
      'users' => $users,
    ];
    return view('content.pages.pages-account-settings-connections')->with($data);
  }
  //
}
