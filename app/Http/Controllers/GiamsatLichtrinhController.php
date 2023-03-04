<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGiamsatLichtrinhRequest;
use App\Http\Requests\UpdateGiamsatLichtrinhRequest;
use App\Models\Giamsat;
use App\Models\GiamsatLichtrinh;
use App\Models\GiamsatNhom;
use App\Models\Thanhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiamsatLichtrinhController extends Controller
{
    //
    private $useDB;
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new GiamsatLichtrinh();
        $this->user = new Thanhvien();
    }
    
    public function index($id){
        $id_giamsat = $id;
        $giamsat = new Giamsat();
        $data_giamsat = $giamsat->getId($id);

        $nhom_tv = new GiamsatNhom();
        $data_nhom = $nhom_tv->getIdgiamsat($id_giamsat);
        $data_lichtrinh = $this->useDB->getAll($id_giamsat);
        return view('page.giam_sat.lich_trinh.index', compact('id_giamsat','data_nhom','data_lichtrinh','data_giamsat'));
    }

    public function store(CreateGiamsatLichtrinhRequest $request, $id){
        $data=[
            'giam_sat_id'           =>      $id,
            'ngay'                  =>      $request->ngay,
            'gio'                   =>      $request->gio,
            'dia_diem'              =>      $request->dia_diem,
            'thanh_phan_tham_du'    =>      addslashes($request->thanh_phan_tham_du),
            'giam_sat_nhom_id'      =>      $request->giam_sat_nhom_id,
            'created_user'          =>      Auth::user()->id,
            'created_at'            =>      date('Y-m-d H:i:s', time()),
            'updated_at'            =>      date('Y-m-d H:i:s', time()),
        ];
        $this->useDB->insert($data);
        return redirect(route('giam-sat.lich-trinh.index', $id))->with('success', 'Đã thêm mới lịch trình giám sát ');

    }

    public function edit($id, $id_lichtrinh){
        $id_giamsat = $id;
        $nhom_tv = new GiamsatNhom();
        $data_nhom = $nhom_tv->getIdgiamsat($id_giamsat);

        $dataId = $this->useDB->getId($id_lichtrinh);
        $data_lichtrinh = $this->useDB->getAll($id_giamsat);
        return view('page.giam_sat.lich_trinh.edit', compact('id_giamsat','data_nhom','dataId','data_lichtrinh'));
    }

    public function update(UpdateGiamsatLichtrinhRequest $request, $id, $id_giamsat){
        $data=[
            'giam_sat_id'           =>      $id,
            'ngay'                  =>      $request->ngay,
            'gio'                   =>      $request->gio,
            'dia_diem'              =>      $request->dia_diem,
            'thanh_phan_tham_du'    =>      addslashes($request->thanh_phan_tham_du),
            'giam_sat_nhom_id'      =>      $request->giam_sat_nhom_id,
            'updated_at'            =>      date('Y-m-d H:i:s', time()),
        ];
        $this->useDB->updateData($data, $id_giamsat);
        $data2=[
            'tb_lichtrinh' => 0
        ];
        $giamsat = new Giamsat();
        $giamsat->updateData( $data2,  $id);
        return redirect(route('giam-sat.lich-trinh.index', $id))->with('success', 'Đã thêm mới lịch trình giám sát ');
    }
    public function destroy($id, $id_lichtrinh=0)
    {
        if(!empty($id_lichtrinh)){
            $dataId = $this->useDB->getId($id_lichtrinh);
            if(empty($dataId)){
                return redirect(route('giam-sat.lich-trinh.index', $id))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                $this->useDB->deleteData($id);
                $data2=[
                    'tb_lichtrinh' => 0
                ];
                $giamsat = new Giamsat();
                $giamsat->updateData( $data2,  $id);
                return redirect(route('giam-sat.lich-trinh.index', $id))->with('success', 'Đã xóa lịch trình ');
            }
            
        }else{
            return redirect(route('giam-sat.lich-trinh.index', $id))->with('errors', 'Dữ liệu không tồn tại');
        }
    }
}
