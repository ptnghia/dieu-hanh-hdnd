<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKyhopThumoiRequest;
use App\Http\Requests\UpdateKyhopThumoiRequest;
use App\Models\Chuc_vu;
use App\Models\Kyhop;
use App\Models\KyhopThanhvien;
use App\Models\KyhopThumoi;
use App\Models\Thanhvien;
use App\Models\Thongbao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThumoiController extends Controller
{
    //
    private $useDB;
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new KyhopThumoi();
        $this->user = new Thanhvien();
    }

    public function index($id){

        if($this->user->check_per(5) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        
        $data = $this->useDB->getThumoi($id);
        foreach ($data as $item){
           $id_thu =  $item->id;
        }
        $ky_hop = new Kyhop();
        $data_kyhhop = $ky_hop->getId($id);
        if(count($data)==0){
            return view('page.ky_hop.thu_moi.create',compact('id','data_kyhhop'));
        }else{

            $data = $this->useDB->getId($id);
            $nhom_tv = new Chuc_vu();
            $data_nhom_tv = $nhom_tv->getAll();

            $kyhop_tv = new KyhopThanhvien();
            $list_daibieu = $kyhop_tv->getIdkyhop($id);
            return view('page.ky_hop.thu_moi.edit', compact('data','id','data_kyhhop','data_nhom_tv','list_daibieu'));

        }
        //return view('page.ky_hop.index', compact('datas'));
    }

    public function show(){

        $thumoi_tv = new KyhopThanhvien();
        $datas =  $thumoi_tv->getThumoi_user()->paginate(10);

        return view('page.ky_hop.thu_moi.index', compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKyhopThumoiRequest $request, $id)
    {
        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file('file')->move('uploads/images', $fileName, 'public/uploads/');
            $file = 'uploads/images/'.$fileName;
        }else{
            $file ='';
        }

        $data=[
            'ky_hop_id'             =>   $id,
            'so'                    =>    $request->so,
            'dia_diem'              =>    $request->dia_diem,
            'thoi_gian'             =>    $request->thoi_gian,
            'noi_dung'              =>    addslashes($request->noi_dung),
            'noi_nhan'              =>    $request->noi_nhan,
            'co_quan_ky'            =>    $request->co_quan_ky,
            'nguoi_ky'              =>    $request->nguoi_ky,
            'con_dau'               =>    $file,
            'created_user'          =>    Auth::user()->id,
            'created_at'            =>    date('Y-m-d H:i:s', time()),
            'updated_at'            =>    date('Y-m-d H:i:s', time()),
        ];
        $this->useDB->insert($data);
        return redirect(route('thu-moi.index', $id))->with('success', 'Đã thêm mới thư mời ');
    }

    public function update(UpdateKyhopThumoiRequest $request, $id)
    {
        $data0 = $this->useDB->getThumoi($id);
        foreach ($data0 as $item){
           $id_thu =  $item->id;
        }

        if($request->file()) {
            $fileName = time().'_'.$request->file->getClientOriginalName();
            $request->file('file')->move('uploads/images', $fileName, 'public/uploads/');
            $file = 'uploads/images/'.$fileName;
            $data=[
                'ky_hop_id'             =>      $id,
                'so'                    =>    $request->so,
                'dia_diem'              =>    $request->dia_diem,
                'thoi_gian'             =>    $request->thoi_gian,
                'noi_dung'              =>    addslashes($request->noi_dung),
                'noi_nhan'              =>    $request->noi_nhan,
                'co_quan_ky'            =>    $request->co_quan_ky,
                'nguoi_ky'              =>    $request->nguoi_ky,
                'con_dau'               =>    $file,
                'updated_at'            =>    date('Y-m-d H:i:s', time()),
            ];
        }else{
            $data=[
                'ky_hop_id'             =>      $id,
                'so'                    =>    $request->so,
                'dia_diem'              =>    $request->dia_diem,
                'thoi_gian'             =>    $request->thoi_gian,
                'noi_dung'              =>    addslashes($request->noi_dung),
                'noi_nhan'              =>    $request->noi_nhan,
                'co_quan_ky'            =>    $request->co_quan_ky,
                'nguoi_ky'              =>    $request->nguoi_ky,
                'updated_at'            =>    date('Y-m-d H:i:s', time()),
            ];
        }

        
        $this->useDB->updateData($data, $id_thu);
        return redirect(route('thu-moi.index', $id))->with('success', 'Cập nhật thư mời thành công');
    }

    public function add_thanhvien(Request $request, $id){
        $data = $this->useDB->getThumoi($id);
        foreach ($data as $item){
           $id_thu =  $item->id;
        }

        $arr_user = $request->user_id;
        $thumoi_tv = new KyhopThanhvien(); 
        $ky_hop = new Kyhop();
        $thongbao = new Thongbao();
        $data_kyhhop = $ky_hop->getId($id);
        
        for($i=0;$i<count($arr_user);$i++){
            $check = $thumoi_tv->checkIdthanhvien($arr_user[$i]);
            if(empty($check)){
                $data=[
                    'ky_hop_id'     =>      $id,
                    'thu_moi_id'    =>      $id_thu,
                    'user_id'       =>      $arr_user[$i],
                    'ngay_nhan'     =>      date('Y-m-d H:i:s', time()),
                    'trang_thai'    =>      0,
                    'them_su_kien'  =>      0,
                    'created_user'  =>      Auth::user()->id,
                    'created_at'    =>      date('Y-m-d H:i:s', time()),
                    'updated_at'    =>      date('Y-m-d H:i:s', time()),
                ];

                $thumoi_tv->insert($data);

                $data_tb=[
                    'user_gui'      =>      Auth::user()->id,
                    'user_nhan'     =>       $arr_user[$i],
                    'loai'          =>      1,
                    'ngay_gui'      =>      date('Y-m-d H:i:s', time()),
                    'tieu_de'       =>      'Thư mời họp HĐND',
                    'noi_dung'      =>      $data_kyhhop->ten.' vào ngày '.$data_kyhhop->thoi_gian ,
                    'link'          =>      route('ky-hop.show',$id),
                    'trang_thai'    =>      0,
                    'ngay_xem'      =>      NULL,    
                    'created_user'  =>      Auth::user()->id,
                    'created_at'    =>      date('Y-m-d H:i:s', time()),
                    'updated_at'    =>      date('Y-m-d H:i:s', time()),
                ];
                $thongbao->insert($data_tb);
            }
        }
        return redirect(route('thu-moi.index', $id))->with('success', 'Đã gửi thư mời cho đại biểu');
    }
}
