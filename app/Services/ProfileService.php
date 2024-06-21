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

class ProfileService
{
  public static function create($body)
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
      $data = [
        'id' => $body['id'],
        'email' => $body['email'],
        'username' => $body['username'],
        'password' => Hash::make($body['password']),
        'name' => $body['name'],
        'lastname' => $body['lastname'],
        'company_id' => $body['company_id'],
        'user_level' => $body['user_level'],
        'is_deleted' => 0,
        'created_at' => now(),
        'created_by' => $body['user_id'],
        'is_verify' => 1,
        'is_active' => 0,
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
}
