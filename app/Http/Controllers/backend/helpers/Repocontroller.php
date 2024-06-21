<?php
namespace App\Http\Controllers\backend\helpers;

use App\Models\AuthModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Ramsey\Uuid\Rfc4122\UuidV4;

class Repocontroller
{
  public static function checkUsernameEmail($input)
  {
    $isEmail = filter_var($input, FILTER_VALIDATE_EMAIL);
    return $isEmail;
  }
  public static function getNewId()
  {
    $result = DB::select('SELECT UUID() as uuid')[0]->uuid;
    return $result;
  }
  public static function chkRole($user)
  {
    $role = 'แอดมิน';
    switch (true) {
      case $user->user_level == '0':
        $role = 'แอดมิน';
        break;
      case $user->user_level == '1':
        $role = 'แอดมิน';
        break;
      case $user->user_level == '2':
        $role = 'แอดมิน';
        break;
      case $user->user_level == '3':
        $role = 'ผู้ใช้งานทั่วไป';
        break;
    }
    // แอดมิน
    return $role;
  }
  public static function changeStatus($id, $data)
  {
    DB::beginTransaction();
    try {
      $change = AuthModel::update($id, $data);
      DB::commit();
      return $change;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public static function strTouppercase($string)
  {
    try {
      $arr_str = str_split($string);
      foreach ($arr_str as $key => $str) {
        if ($key == 0) {
          $arr_str[$key] = strtoupper($str);
        }
      }
      $string = implode('', $arr_str);
      return $string;
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public static function random_int($string_length = 6)
  {
    $random_string = '';
    $random_characters = array_merge(range('0', '9'));
    $max = count($random_characters) - 1;
    for ($i = 0; $i < $string_length; $i++) {
      $rand = mt_rand(0, $max);
      $random_string .= $random_characters[$rand];
    }
    return $random_string;
  }
}
