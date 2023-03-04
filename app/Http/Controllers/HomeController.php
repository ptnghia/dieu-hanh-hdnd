<?php

namespace App\Http\Controllers;

use App\Models\Sukien;
use App\Models\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $data = [];
    
    public function index()
    {
        $this -> data['title_page'] = 'Trang chủ';
        $per_id = Auth::user()->permissions_id;

        $thongbao = new Thongbao();
        $list_thongbao_new = $thongbao->getNew();

        $sukien = new Sukien();
        $list_sukien = $sukien->getSukienNew();
        if($per_id==1){
            return view('home_daibieu',compact('list_thongbao_new','list_sukien' ) );
        }elseif($per_id==2){
            return view('home_daibieu',compact('list_thongbao_new','list_sukien' ) );
        }else{
            return view('home', $this->data);
        }
        
    }
}
