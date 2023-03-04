<?php

namespace App\Http\Controllers;

use App\Models\Giamsat;
use App\Models\GiamsatLichtrinh;
use App\Models\GiamsatNhom;
use App\Models\GiamsatNoidung;
use App\Models\GiamsatThanhvien;
use App\Models\GiamsatVanban;
use App\Models\Thanhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiamsatThamgiaController extends Controller
{
    private $useDB;
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = new Thanhvien();
    }

    public function index_thamgia(){

        $giamsat_tv = new GiamsatThanhvien();
        $datas = $giamsat_tv->get_giamsat_tv()->paginate(10);
        return view('page.giam_sat.index_thamgia', compact('datas'));

    }

    public function lichsu_thamgia(){
        $giamsat_tv = new GiamsatThanhvien();
        $datas = $giamsat_tv->get_giamsat_ht()->paginate(10);
        return view('page.giam_sat.index_thamgia_hoanthanh', compact('datas'));
    }
    public function noidung_giamsat($id){
        $id_giamsat = $id;
        $giamsat =new Giamsat();
        $giamsat_tv = new GiamsatThanhvien();
        $nhom_tv = new GiamsatNhom();
        $giamsat_lt = new GiamsatLichtrinh();
        $file_vb = new GiamsatVanban();
        $thanhvien_giamsat = new GiamsatThanhvien();
        $noidung_giamsat = new GiamsatNoidung();
        $data_noidung_gs = $noidung_giamsat->getData($id_giamsat);
        $data_giamsat = $giamsat->getId($id);
        if(empty($data_giamsat)){
            return redirect(route('thamgiagiamsat.index'))->with('errors', 'Dữ liệu không tồn tại');
        }else{
            $check_giamsat = $giamsat_tv->getIdthanhvien(Auth::user()->id, $id);
            if(empty($check_giamsat)){
                return redirect(route('thamgiagiamsat'))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                $files      =   $file_vb->getIdvanban($id);
                $hoatdonggiamsat = $thanhvien_giamsat->get_chitiet_giamsat_tv($id_giamsat);
                return view('page.giam_sat.hoatdong', compact('data_giamsat', 'id_giamsat','hoatdonggiamsat','files', 'data_noidung_gs') );
            }
        }
    }
}
