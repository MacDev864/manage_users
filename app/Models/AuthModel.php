<?php

namespace App\Models;

use App\Helpers\JsonResult;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthModel
{
  private const TABLE = 'users';

  private const PK = 'id';

  public static function getAll()
  {
    return DB::table(self::TABLE)
      ->where('is_deleted', 0)
      ->get();
  }
  public static function getProfileById($id, $company_id)
  {
    return DB::table(self::TABLE)
      ->where(self::PK, $id)
      ->where('company_id', $company_id)
      ->first();
  }
  public static function getUserById($company_id)
  {
    return DB::table(self::TABLE)
      ->where('is_deleted', 0)
      ->where('company_id', $company_id)
      ->whereIn('user_level', [1, 2, 3])
      ->get();
  }
  //
  public static function create($data)
  {
    return DB::table(self::TABLE)->insert($data);
  }
  public static function update($id, $data)
  {
    return DB::table(self::TABLE)
      ->where(self::PK, $id)
      ->update($data);
  }
  //
}
