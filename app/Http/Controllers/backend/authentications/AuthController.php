<?php
namespace App\Http\Controllers\backend\authentications;

use App\Helpers\JsonResult;
use App\Helpers\Validators;
use App\Http\Controllers\backend\helpers\Repocontroller as HelpersRepocontroller;
use App\Models\AuthModel;
use App\Models\User;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use palPalani\Toastr\Facades\Toastr;
use Repocontroller;

class AuthController
{
  public function login(Request $req)
  {
    try {
      $body = $req->all();
      $isemails = filter_var($body['username'], FILTER_VALIDATE_EMAIL);
      $regx = $isemails ? 'required|email' : 'required|regex:/^[a-zA-Z0-9._]+$/';
      $validatorregister = Validators::validator($body, [
        'username' => $regx,
        'password' => 'required|min:6',
      ]);

      if ($validatorregister['success'] == false) {
        return JsonResult::errors($validatorregister['data'], $validatorregister['message']);
      }
      $result = AuthService::login($body);
      if ($result['success'] == false) {
        return JsonResult::errors(null, $result['message']);
      }

      return JsonResult::success($result['data'], $result['message']);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function forgotpassword()
  {
    return view('content.authentications.auth-forgot-password');
  }
  public function register(Request $req)
  {
    try {
      $body = $req->all();
      $validatorregister = Validators::validator($body, [
        'username' => 'required|regex:/^[a-zA-Z0-9._]+$/',
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      if ($validatorregister['success'] == false) {
        return JsonResult::errors($validatorregister['data'], $validatorregister['message']);
      }
      $result = AuthService::register($body);
      if ($result['success'] == false) {
        return JsonResult::errors(null, $result['message']);
      }

      return JsonResult::success($result['data'], $result['message']);
    } catch (\Throwable $th) {
      throw $th;
    }
  }

  public function ajax_logout(Request $request)
  {
    try {
      Session::flush();
      $user = Auth::user();
      $change = HelpersRepocontroller::changeStatus($user->id, ['is_active' => 0]);
      Auth::logout();
      return JsonResult::success();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function changeStatus(Request $request)
  {
    try {
      $user = Auth::user();
      $body = $request->all();
      $body['is_active'] = $body['is_active'] == 'true' ? 1 : 0;

      $change = HelpersRepocontroller::changeStatus($user->id, $body);

      return JsonResult::success($change);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  //
}
