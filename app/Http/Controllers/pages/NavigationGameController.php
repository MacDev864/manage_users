<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NavigationGameController extends Controller
{
  function index(Request $req)
  {
    // Set the view page
    $page = 'content.pages.pages-game-xo';

    // Get authenticated user and their company ID
    $user = Auth::user();
    $company_id = $user->company_id;

    // Retrieve users associated with the company ID
    $users = AuthService::getUserById($company_id)->toArray();

    // Convert user name and lastname to uppercase
    $user->name = Repocontroller::strTouppercase($user->name);
    $user->lastname = Repocontroller::strTouppercase($user->lastname);

    // Prepare data array for the view
    $data = [
      'class_status' => $user->is_active ? 'text-success' : 'text-danger',
      'status' => $user->is_active ? 'online' : 'offline',
      'user_data' => $user,
      'role' => $user->chkRole(),
      'users' => $users,
      'date' => date('d/m/Y H:i:s'),
      'page_name' => 'XO-Game',
      'full_name' => $user->name . ' ' . $user->lastname,
      'arr_row' => [],
      'arr_col' => [],
      'row' => 3,
      'col' => 3,
    ];

    // Update 'row' value if provided in the request
    if ($req->input('row')) {
      $data['row'] = $req->input('row');
    }
    if ($req->input('col')) {
      $data['col'] = $req->input('col');
    }

    $arr_row = Repocontroller::createArray($data['row'], "x");
    $arr_col = Repocontroller::createArray($data['col'], "o");

    $data['arr_row'] = $arr_row;
    $data['arr_col'] = $arr_col;
    // dd($data);
    // Render the view with the data array
    return view($page)->with($data);
  }
}
