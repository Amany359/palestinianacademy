<?php

namespace App\Providers;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // $setting = Setting::checkSettings();
 
 
         if(!app()->runningInConsole()){   
         $setting = Setting::firstor(function(){
         
         return  Setting::create([
          'name'=>'site_name',
          'description'=>'Laravel'
         ]);
 
         });
 //dd($setting);
 
       view()->share('setting', $setting);
     
            
     }
    
    }


}
