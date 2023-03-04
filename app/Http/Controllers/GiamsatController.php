<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGiamsatRequest;
use App\Http\Requests\UpdateGiamsatRequest;
use App\Models\Giamsat;
use App\Models\GiamsatLichtrinh;
use App\Models\GiamsatNhom;
use App\Models\GiamsatNoidung;
use App\Models\GiamsatThanhvien;
use App\Models\GiamsatVanban;
use App\Models\Thanhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GiamsatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $useDB;
    private $user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new Giamsat();
        $this->user = new Thanhvien();
    }

    public function index()
{       if($this->user->check_per(6) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $del        =   $this->user->check_per(9);
        $edit       =   $this->user->check_per(8);
        $create     =   $this->user->check_per(7);
        $datas      =   $this->useDB->getAll()->paginate(10);
        return view('page.giam_sat.index', compact('datas','del', 'edit', 'create'));
    }

    public function index_thamgia(){

        $giamsat_tv = new GiamsatThanhvien();
        $datas = $giamsat_tv->get_giamsat_tv()->paginate(10);
        return view('page.giam_sat.index_thamgia', compact('datas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if($this->user->check_per(7) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }

        Session::put('key_upload', Auth::user()->id.time());
        return view('page.giam_sat.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGiamsatRequest $request)
    {
        if($this->user->check_per(7) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }

        $data=[
            'ten'                   =>    $request->ten,
            'noi_dung'              =>    addslashes($request->noi_dung),
            'thoi_gian_star'        =>    $request->thoi_gian_star,
            'thoi_gian_end'         =>    $request->thoi_gian_end,
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'created_user'          =>    Auth::user()->id,
            'created_at'            =>    date('Y-m-d H:i:s', time()),
            'updated_at'            =>    date('Y-m-d H:i:s', time()),
        ];
        //Lưu văn bản lấy ra id
        $id_vb = $this->useDB->insert($data);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new GiamsatVanban();
        $list_file = $file_vb->getVanbanRong();
        foreach($list_file as $item){
            if($item ->key_file == $request->key_file){
                //nếu khớp thì cập nhật van_ban_id cho file
                $file_vb->UpdateIdVanban($id_vb, $item->id);
            }else{
                //nếu sai thì xóa đồng thời xóa luôn file đã tải lên trước đó
                $file_vb->deleteId($item->id);
            }
        }
        return redirect(route('giam-sat.index'))->with('success', 'Đã thêm mới hoạt động giám sát '.$request->ten);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        $per_id = Auth::user()->permissions_id;
        $id_giamsat = $id;
        $giamsat_tv = new GiamsatThanhvien();
        $nhom_tv = new GiamsatNhom();
        $giamsat_lt = new GiamsatLichtrinh();
        $thanhvien_giamsat = new GiamsatThanhvien();
        $data_giamsat = $this->useDB->getId($id);
        $file_vb    =   new GiamsatVanban();
               
        if(empty($data_giamsat)){
            return redirect(route('thamgiagiamsat'))->with('errors', 'Dữ liệu không tồn tại');
        }else{
            if($per_id==1){
                $check_giamsat = $giamsat_tv->getIdthanhvien(Auth::user()->id, $id);
                if(empty($check_giamsat)){
                    return redirect(route('thamgiagiamsat'))->with('errors', 'Dữ liệu không tồn tại');
                }else{
                    $data_lichtrinh = $giamsat_lt ->getAll($id_giamsat);
                    
                    $data_nhom = $nhom_tv->getIdgiamsat($id_giamsat);
                    
                    $data_tv_giamsat = $thanhvien_giamsat->getIdgiamsat($id_giamsat);
                    $files      =   $file_vb->getIdvanban($id);
                    $hoatdonggiamsat = $thanhvien_giamsat->get_chitiet_giamsat_tv($id_giamsat);
                    $baocao = new GiamsatNoidung();
                    $data_baocao = $baocao->getData_user($id_giamsat);
                    return view('page.giam_sat.show_daibieu', compact('data_giamsat', 'data_lichtrinh', 'id_giamsat','data_nhom', 'data_tv_giamsat','files', 'hoatdonggiamsat','data_baocao') );
                }
            }elseif($per_id==2){

                $data_lichtrinh = $giamsat_lt ->getAll($id_giamsat);
                    
                $data_nhom = $nhom_tv->getIdgiamsat($id_giamsat);
                
                $data_tv_giamsat = $thanhvien_giamsat->getIdgiamsat($id_giamsat);
                $files      =   $file_vb->getIdvanban($id);
                $hoatdonggiamsat = $thanhvien_giamsat->get_chitiet_giamsat_tv($id_giamsat);
                $baocao = new GiamsatNoidung();
                $data_baocao = $baocao->getData_user($id_giamsat);
                return view('page.giam_sat.show_daibieu', compact('data_giamsat', 'data_lichtrinh', 'id_giamsat','data_nhom', 'data_tv_giamsat','files', 'hoatdonggiamsat','data_baocao') );
                
            }else{
                return view('home');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id=0)
    {
        //
        if($this->user->check_per(8) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $dataId = $this->useDB->getId($id);

        if(!empty($id)){
            
            if(empty($dataId)){

                return redirect(route('ky-hop.index'))->with('errors', 'Dữ liệu không tồn tại');

            }else{

                $dataId = $this->useDB->getId($id);
                Session::put('key_upload', Auth::user()->id.time());
                $file_vb    =   new GiamsatVanban();
                $files      =   $file_vb->getIdvanban($id);
                return view('page.giam_sat.edit',compact('dataId', 'files'));

            }
            
        }else{
            return redirect(route('giam-sat.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGiamsatRequest $request, $id)
    {
        if($this->user->check_per(8) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $data=[
            'ten'                   =>    $request->ten,
            'noi_dung'              =>    addslashes($request->noi_dung),
            'thoi_gian_star'        =>    $request->thoi_gian_star,
            'thoi_gian_end'         =>    $request->thoi_gian_end,
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'updated_at'            =>    date('Y-m-d H:i:s', time()),
        ];
        //Lưu văn bản lấy ra id
        $this->useDB->updateData($data, $id);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new GiamsatVanban();
        $list_file = $file_vb->getVanbanRong();
        foreach($list_file as $item){
            if($item ->key_file == $request->key_file){
                //nếu khớp thì cập nhật van_ban_id cho file
                $file_vb->UpdateIdVanban($id, $item->id);
            }else{
                //nếu sai thì xóa đồng thời xóa luôn file đã tải lên trước đó
                $file_vb->deleteId($item->id);
            }
        }

        return redirect(route('giam-sat.index'))->with('success', 'Đã cập nhật thông tin hoạt động giám sát');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if($this->user->check_per(9) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
    }
}
