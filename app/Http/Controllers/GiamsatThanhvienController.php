<?php

namespace App\Http\Controllers;

use App\Models\Giamsat;
use App\Models\GiamsatNhom;
use App\Models\GiamsatThanhvien;
use App\Models\Thanhvien;
use Illuminate\Http\Request;

class GiamsatThanhvienController extends Controller
{
    //
    private $useDB;
    private $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new GiamsatThanhvien();
        $this->user = new Thanhvien();

    }
    public function index($id){

        if($this->user->check_per(7) == 0 ){
            return redirect(route('giam-sat.index'))->with('errors', 'Tài khoản chưa được cấp quyền chức năng này');
            die();
        }
        
        $id_giamsat = $id;
        $giamsat = new Giamsat();
        $data_giamsat = $giamsat->getId($id);

        $nhom_tv = new GiamsatNhom();
        $data_nhom = $nhom_tv->getIdgiamsat($id_giamsat);

        $thanhvien_giamsat = new GiamsatThanhvien();
        $data_tv_giamsat = $thanhvien_giamsat->getIdgiamsat($id_giamsat);
        //return $data_tv_giamsat;
        return view('page.giam_sat.thanh_vien.index', compact('data_giamsat','id_giamsat','data_nhom', 'data_tv_giamsat'));
    }
}
