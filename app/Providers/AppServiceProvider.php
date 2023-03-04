<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Module_admin;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        //
        Session::start();
        Paginator::useBootstrapFive();
        $arr_slug = explode('/',$request->path());
        $slug = $arr_slug[0];
        
        if($slug !=''){
            $data['module'] = Module_admin::where('slug', $slug)->first();
            if(empty($data['module'])){
                $data['module'] = [
                    'name'=>'Thông tin cá nhân',
                    'slug'=>$slug
                ]; 
            }
        }else{
            $data['module'] = [
                'name'=>'Trang chủ',
                'slug'=>$slug
            ];
        }
        
        
       // $data['module'] =  Module_admin::find(1)->where('slug', '=', 'chuc-vu');
        view::share ('data_fix', $data);
    }
}
