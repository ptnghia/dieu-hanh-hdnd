<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKyhopRequest;
use App\Http\Requests\UpdateKyhopRequest;
use App\Models\Kyhop;
use App\Models\KyhopThanhvien;
use App\Models\KyhopThumoi;
use App\Models\KyhopVanban;
use App\Models\Thanhvien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KyhopController extends Controller
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
        $this->useDB = new Kyhop();
        $this->user = new Thanhvien();


    }

    public function index()
    {
        if($this->user->check_per(2) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $del = $this->user->check_per(4);
        $edit = $this->user->check_per(3);
        $datas      =  $this->useDB->getAll()->paginate(20);
        return view('page.ky_hop.index', compact('datas', 'del', 'edit'));
    }

    public function search(Request $request){
        if($this->user->check_per(2) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $del = $this->user->check_per(4);
        $edit = $this->user->check_per(3);
        $key_word = $request->ten_vn;

        $datas      =  $this->useDB->getAll_search($key_word)->paginate(20);
        return view('page.ky_hop.index', compact('datas', 'del', 'edit'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if($this->user->check_per(1) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        Session::put('key_upload', Auth::user()->id.time());
            return view('page.ky_hop.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKyhopRequest $request)
    {
        if($this->user->check_per(1) == 0 ){
            return redirect(route('home'))->with('errors', 'Tài khoản chưa được cấp quyền');
            die();
        }
        $data=[
            'ten'                   =>    $request->ten,
            'thoi_gian'             =>    $request->thoi_gian,
            'hinh_thuc'             =>    $request->hinh_thuc,
            'ly_do'                 =>    $request->ly_do,
            'dia_diem'              =>    $request->dia_diem,
            'co_quan'               =>    $request->co_quan,
            'noi_dung_hop'          =>    addslashes($request->noi_dung_hop),
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'created_user'          =>    Auth::user()->id,
            'created_at'            =>    date('Y-m-d H:i:s', time()),
            'updated_at'            =>    date('Y-m-d H:i:s', time()),

        ];
        //Lưu văn bản lấy ra id
        $id_vb = $this->useDB->insert($data);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new KyhopVanban();
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
        return redirect(route('ky-hop.index'))->with('success', 'Đã thêm mới kỳ họp '.$request->ten);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=0)
    {
        //
        $dataId = $this->useDB->getId($id);
        if(!empty($id)){
            if(empty($dataId)){
                return redirect(route('ky-hop.index', $id))->with('errors', 'Dữ liệu không tồn tại');
            }else{

                $dataId = $this->useDB->getId($id);
                Session::put('key_upload', Auth::user()->id.time());
                $file_vb    =   new KyhopVanban();
                $files      =   $file_vb->getIdvanban($id);
                $kyhop_tv = new KyhopThanhvien();
                $list_daibieu = $kyhop_tv->getIdkyhop($id);

                $thumoi = new KyhopThumoi();
                $data_thumoi = $thumoi->getThumoi_view($id);

                $per_id = Auth::user()->permissions_id;
                if($per_id==1){
                    $check = $kyhop_tv->checkIdthanhvien(Auth::user()->id);
                    if(empty( $check)){
                        return redirect(route('thumoinhan'))->with('errors', 'Dữ liệu không tồn tại');
                    }
                    $thanhvien_moi = $kyhop_tv->getId($check->id);
                    return view('page.ky_hop.show_daibieu', compact('dataId','files','list_daibieu','data_thumoi','thanhvien_moi'));
                }elseif($per_id==2){
                    $check = $kyhop_tv->checkIdthanhvien(Auth::user()->id);
                    if(empty( $check)){
                        return view('page.ky_hop.show', compact('dataId','files','list_daibieu','data_thumoi'));
                    }else{
                        $thanhvien_moi = $kyhop_tv->getId($check->id);
                        return view('page.ky_hop.show_daibieu', compact('dataId','files','list_daibieu','data_thumoi','thanhvien_moi'));
                    }
                }else{
                    return view('page.ky_hop.show', compact('dataId','files','list_daibieu','data_thumoi'));
                }
                
            }
            
        }else{
            return redirect(route('ky-hop.index'))->with('errors', 'Dữ liệu không tồn tại');
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
        $dataId = $this->useDB->getId($id);

        if(!empty($id)){
            
            if(empty($dataId)){
                return redirect(route('ky-hop.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{

                $dataId = $this->useDB->getId($id);
                Session::put('key_upload', Auth::user()->id.time());
                $file_vb    =   new KyhopVanban();
                $files      =   $file_vb->getIdvanban($id);
                return view('page.ky_hop.edit',compact('dataId', 'files'));
            }
            
        }else{
            return redirect(route('ky-hop.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateKyhopRequest $request, $id)
    {
        $data=[
            'ten'                   =>    $request->ten,
            'thoi_gian'             =>    $request->thoi_gian,
            'hinh_thuc'             =>    $request->hinh_thuc,
            'ly_do'                 =>    $request->ly_do,
            'dia_diem'              =>    $request->dia_diem,
            'co_quan'               =>    $request->co_quan,
            'noi_dung_hop'          =>    addslashes($request->noi_dung_hop),
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'updated_at'            =>    date('Y-m-d H:i:s', time()),

        ];
        //Lưu văn bản lấy ra id
        $this->useDB->updateData($data, $id);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new KyhopVanban();
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

        return redirect(route('ky-hop.index'))->with('success', 'Đã cập nhật thông tin văn bản');
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
    }
}
