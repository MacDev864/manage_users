<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Analytics extends Controller
{
  public function index()
  {
    $page = 'content.dashboard.dashboards-admin';
    $user = Auth::user();
    $users = AuthService::getAll()->toArray();
    $user->name = Repocontroller::strTouppercase($user->name);
    $user->lastname = Repocontroller::strTouppercase($user->lastname);
    $data = [
      'class_status' => $user->is_active ? 'text-success' : 'text-danger',
      'status' => $user->is_active ? 'online' : 'offline',
      'user_data' => $user,
      'role' => $user->chkRole(),
      'users' => $users,
      'date' => date('d/m/Y H:i:s'),
      'page_name' => 'Main',
      'full_name' => $user->name . ' ' . $user->lastname,
    ];
    if ($user->isUser()) {
      $page = 'content.dashboard.dashboards-user';
    }
    // $rs['data']['isSuperAdmin'] = $credential_user->isSuperAdmin();

    // $rs['data']['isAdmin'] = $credential_user->isAdmin();
    // $rs['data']['isUser'] = $credential_user->isUser();
    return view($page)->with($data);
  }
  public function profile()
  {
    $page = 'content.dashboard.dashboards-user';
    $user = Auth::user();
    $users = AuthService::getAll()->toArray();
    $data = [
      'class_status' => $user->is_active ? 'text-success' : 'text-danger',
      'status' => $user->is_active ? 'online' : 'offline',
      'user_data' => $user,
      'role' => $user->chkRole(),
      'date' => date('d/m/Y H:i:s'),
      'users' => $users,
      'page_name' => 'Profile',
      'full_name' => $user->name . ' ' . $user->lastname,
    ];
    return view($page)->with($data);
  }
  public function profileById($id)
  {
    $page = 'content.dashboard.dashboards-user';
    $user = Auth::user();

    $users = AuthService::getProfileById($id);
    if (is_null($users) || $user->isUser()) {
      $page = 'content.pages.pages-misc-error';
      return view($page);
    }

    $users->role = Repocontroller::chkRole($users);
    $users->name = Repocontroller::strTouppercase($users->name);
    $users->lastname = Repocontroller::strTouppercase($users->lastname);
    $data = [
      'class_status' => $users->is_active ? 'text-success' : 'text-danger',
      'status' => $users->is_active ? 'online' : 'offline',
      'user_data' => $user,
      'role' => Repocontroller::chkRole($user),
      'users' => $users,
      'date' => date('d/m/Y H:i:s'),
      'page_name' => 'Userprofile',
      'full_name' => $users->name . ' ' . $users->lastname,
    ];

    return view($page)->with($data);
  }
  // profile
}
