<?php
namespace App\Http\Controllers\vehicle;

use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationVehicleController extends Controller
{
  function getVehicleForUser(Request $req)
  {
    try {
      $user = Auth::user();
      $company_id = $user->company_id;
      $users = AuthService::getUserById($company_id)->toArray();
      $user->name = Repocontroller::strTouppercase($user->name);
      $user->lastname = Repocontroller::strTouppercase($user->lastname);
      $data = [
        'class_status' => $user->is_active ? 'text-success' : 'text-danger',
        'status' => $user->is_active ? 'online' : 'offline',
        'user_data' => $user,
        'role' => $user->chkRole(),
        'users' => $users,
        'date' => date('d/m/Y H:i:s'),
        'page_name' => 'ยานพาหนะ',
        'full_name' => $user->name . ' ' . $user->lastname,
      ];

      return view('content.pages.vehicle-user.index')->with($data);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  function getVehicleForAdmin(Request $req)
  {
    try {
      $user = Auth::user();
      $company_id = $user->company_id;
      $users = AuthService::getUserById($company_id)->toArray();
      $user->name = Repocontroller::strTouppercase($user->name);
      $user->lastname = Repocontroller::strTouppercase($user->lastname);
      $data = [
        'class_status' => $user->is_active ? 'text-success' : 'text-danger',
        'status' => $user->is_active ? 'online' : 'offline',
        'user_data' => $user,
        'role' => $user->chkRole(),
        'users' => $users,
        'date' => date('d/m/Y H:i:s'),
        'page_name' => 'ยานพาหนะ',
        'full_name' => $user->name . ' ' . $user->lastname,
      ];

      return view('content.pages.vehicle-admin.index')->with($data);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
