<?php

namespace App\Services;

use App\Helpers\JsonResult;
use App\Helpers\sms;
use App\Http\Controllers\backend\helpers\Repocontroller;
use App\Models\AuthModel;
use App\Models\ProfileModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use palPalani\Toastr\Facades\Toastr;

class AuthService
{
  public static function register($body)
  {
    try {
      DB::beginTransaction();
      $user = User::where('username', $body['username'])
        ->orWhere('email', $body['email'])
        ->first();

      if ($user) {
        $result['message'] = 'ชื่อผู้ใช้งานมีอยู่แล้วในระบบ';
        $result['message_ex'] = 'ชื่อผู้ใช้งานมีอยู่แล้วในระบบ';
        $result['success'] = false;
        return $result;
      }

      $user_uuid = Repocontroller::getNewId();

      $data = [
        'id' => $user_uuid,
        'email' => $body['email'],
        'username' => $body['username'],
        'password' => Hash::make($body['password']),
        'name' => $body['name'],
        'lastname' => $body['lastname'],
        'user_level' => 3,
        'is_deleted' => 0,
        'created_at' => now(),
        'created_by' => $user_uuid,
        'is_verify' => 1,
      ];
      $rsCreateUser = AuthModel::create($data);
      DB::commit();

      if ($rsCreateUser == false) {
        DB::rollBack();
        $result['message'] = 'ลงทะเบียนโปรไฟล์ผู้ใช้งานไม่สำเร็จ';
        $result['success'] = false;
        $result['result'] = $rsCreateUser;
        return $result;
      }

      $result['data'] = $data;
      $result['message'] = 'ลงทะเบียนใช้งานสำเร็จ';
      $result['message_ex'] = '';
      $result['success'] = true;

      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public static function getAll()
  {
    try {
      return AuthModel::getAll();
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public static function getProfileById($id)
  {
    try {
      return AuthModel::getProfileById($id);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public static function login($body)
  {
    try {
      $user = User::where('username', $body['username'])
        ->orWhere('email', $body['username'])
        ->first();
      $rs['data'] = [];
      if (!$user) {
        $error['username'] = 'focus';
        $error['password'] = 'focus';
        $error['message'] = 'ไม่พบชื่อผู้ใช้งานนี้ในระบบ';
        $error['success'] = false;
        return $error;
      }
      $change = Repocontroller::changeStatus($user->id, ['is_active' => 1]);

      $passwordHash = $user->password;
      if (Hash::check($body['password'], $passwordHash) == false) {
        $error['password'] = 'focus';
        $error['message'] = 'รหัสผ่านไม่ถูกต้อง';
        $error['success'] = false;
        return $error;
      }
      $credentials = [
        'username' => $body['username'],
        'password' => $body['password'],
      ];

      $isemails = filter_var($body['username'], FILTER_VALIDATE_EMAIL);

      if ($isemails) {
        $credentials = [
          'email' => $body['username'],
          'password' => $body['password'],
        ];
      }
      // $body
      $isAuth = Auth::attempt($credentials);
      if (!$isAuth) {
        $error['password'] = 'focus';
        $error['message'] = 'ไม่สามารถเข้าสู่ระบบได้กรุณาติดต่อผู้ดูแลระบบ';
        $error['success'] = false;
        return $error;
      }
      $credentials_user = Auth::user();
      $credentials_user->role = $credentials_user->chkRole();
      $result['data'] = $credentials_user;
      $result['message'] = 'เข้าสู่ระบบสำเร็จ';
      $result['success'] = true;
      return $result;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
}
