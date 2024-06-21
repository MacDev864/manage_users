<?php
namespace App\Http\Controllers\backend\user;

use App\Helpers\JsonResult;
use App\Helpers\Validators;
use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Http\Controllers\Controller;
use App\Models\AuthModel;
use App\Models\User;
use App\Services\AuthService;
use App\Services\ProfileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use palPalani\Toastr\Facades\Toastr;

class ProfileController extends Controller
{
  function getProfileById($id)
  {
    try {
      $user = Auth::user();
      $company_id = $user->company_id;
      $users = AuthService::getProfileById($id, $company_id);

      return JsonResult::success($users);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  function create(Request $req)
  {
    try {
      $user = Auth::user();
      $body = $req->all();
      $company_id = $user->company_id;
      $body['id'] = Repocontroller::getNewId();
      $body['user_id'] = $user->id;
      $body['company_id'] = $company_id;

      $password = RepoController::random_int(6);
      $body['password'] = $password;
      $validatorregister = Validators::validator($body, [
        'name' => 'required|regex:/^[a-zA-Z0-9._]+$/',
        'lastname' => 'required|regex:/^[a-zA-Z0-9._]+$/',
        'username' => 'required|regex:/^[a-zA-Z0-9._]+$/',
        'email' => 'required|email',
      ]);
      if ($validatorregister['success'] == false) {
        return JsonResult::errors($validatorregister['data'], $validatorregister['message']);
      }
      $result = ProfileService::create($body);
      if ($result['success'] == false) {
        return JsonResult::errors(null, $result['message']);
      }
      return JsonResult::success($body, $result['message']);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  function update(Request $req)
  {
    try {
      $user = Auth::user();
      $company_id = $user->company_id;

      return JsonResult::success();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  function delete(Request $req)
  {
    try {
      $user = Auth::user();
      $company_id = $user->company_id;

      return JsonResult::success();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
