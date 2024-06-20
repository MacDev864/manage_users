<?php
namespace App\Http\Controllers\authentications;

class NavigationAuthController
{
  public function login()
  {
    return view('content.authentications.auth-login');
  }
  public function forgotpassword()
  {
    return view('content.authentications.auth-forgot-password');
  }
  public function register()
  {
    return view('content.authentications.auth-register');
  }
}
