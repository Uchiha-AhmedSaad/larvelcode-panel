<?php

namespace larvelcode\panel;

use Illuminate\Support\ServiceProvider;
use larvelcode\panel\functions\helperfunction;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\userpicture;
use File;


class LaravelPanelProvider extends ServiceProvider
{
    public function boot()
    { 
        $this->userimage();
        $this->existing_routes();
    }
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {

    }
    private function userimage()
    {
        view()->composer('adminpanel.layout.app', function($view){
                $view->with('image_user', User::find(Auth::User()->id)->picture()
                ->where('picture_value','=','true')->get(['picture']));
        });
    }
    private function scan_file_exists($scan_directory,$scan_file_exists)
    {
        /*
           * $scan_directory :- the directory contain file  we need to copied .
           * $scan_file_exists :- the directory we need to scan file exists.
        */


        $scandir_file = scandir($scan_directory);

        //$database_directory = File::allFiles(base_path('database/migrations'));
        foreach ($scandir_file as $key => $value) {
          if (file_exists(base_path($scan_file_exists.'/'.$value))) {
            File::delete(base_path($scan_file_exists.'/'.$value));
          }
          $this->publishes([$scan_directory => base_path($scan_file_exists)]);
        }
    }
    private function existing_routes()
    {
       helperfunction::if_route_exist();
       if (!file_exists(base_path('app/helper/helpermethodbackdata.php')))
       {
          $this->scan_file_exists( __DIR__."/Database",'database/migrations');
          $this->scan_file_exists( __DIR__."/app",'app');
          $this->scan_file_exists( __DIR__."/public",'public');
          $this->scan_file_exists( __DIR__."/public/css",'public/css');
          $this->scan_file_exists( __DIR__."/public/js",'public/js');
          $this->scan_file_exists( __DIR__."/views",'resources/views');
          $this->scan_file_exists( __DIR__."/views/layouts",'resources/views/layouts');
       }
    }
}
