<?php

namespace Phpkain\Bootstrap;

use Phpkain\Exceptions\Whoops;
use Phpkain\Session\Session;
use Phpkain\Http\Server;
use Phpkain\Http\Request;
use Phpkain\Http\Response;

use Phpkain\File\File;
use Phpkain\Router\Route;

class App
{

  /**
   *
   * App constructor
   *
   * @return void
   */
  private function __construct() {}

  /**
   *
   * Run the application
   *
   * @return void
   */

   public static function run()
   {
     // Register Whoops
     Whoops::handle();

     // Satrt session
     Session::start();

     // Handle the request
     Request::handle();     

     // Require all routes directory
     File::require_directory('routes');

     // Handle the route
     $data = Route::handle();

     Response::output($data);

   }
}
