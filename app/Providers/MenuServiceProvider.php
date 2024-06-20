<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
  /**
   * Register services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap services.
   */
  public function boot(): void
  {
    $verticalMenuJson = file_get_contents(base_path('resources/menu/verticalMenu.json'));
    $verticalMenuData = json_decode($verticalMenuJson);
    $mainMenuJson = file_get_contents(base_path('resources/menu/mainMenu.json'));
    $mainMenuData = json_decode($mainMenuJson);
    $adminMenuJson = file_get_contents(base_path('resources/menu/adminMenu.json'));
    $adminMenuData = json_decode($adminMenuJson);
    // Share all menuData to all the views
    \View::share('menuData', [$verticalMenuData]);
    \View::share('mainMenudata', [$mainMenuData]);
    \View::share('adminMenuData', [$adminMenuData]);
  }
}
