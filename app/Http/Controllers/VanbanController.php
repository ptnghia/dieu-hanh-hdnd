<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVanbanRequest;
use App\Http\Requests\UpdateVanbanRequest;
use App\Models\Vanban;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Thongsovanban;
use App\Models\Vanbanfile;

class VanbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB = new Vanban();
    }

    

    public function index()
    {
        //
        $allDatas      =  $this->useDB->getAll()->paginate(20);
        $thongsovanban =new Thongsovanban();
        $file_vb = new Vanbanfile();
        $data=array();
        $i=0;
        foreach($allDatas as $row){
            $data[$i]['id']                 =   $row->id;
            $data[$i]['ten']                =   $row->ten;
            $data[$i]['so_hieu']            =   $row->so_hieu;
            $data[$i]['loai_vanban_id']     =   $thongsovanban->getId($row->loai_vanban_id);
            $data[$i]['linh_vuc_id']        =   $thongsovanban->getId($row->linh_vuc_id);
            $data[$i]['coquan_banhanh_id']  =   $thongsovanban->getId($row->coquan_banhanh_id);
            $data[$i]['hieu_luc']           =   $row->hieu_luc;
            $data[$i]['trang_thai']         =   $row->trang_thai;
            $data[$i]['updated_at']         =   $row->updated_at;
            $data[$i]['file']               =   $file_vb->getIdvanban($row->id);
            $i++;
        }
        return view('page.van_ban.index', compact('data','allDatas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        //if (!Session::has('key_upload')) {
            
        //}
        //session()->flash('key_upload', Auth::user()->id.time());
        Session::put('key_upload', Auth::user()->id.time());
        $thongsovanban =new Thongsovanban();
        $thongso_vb = $thongsovanban->get_all_thongso();

        $loai_vb = $thongsovanban->getIdloai(1);
        $linhvuc_vb = $thongsovanban->getIdloai(2);
        $coquan_vb = $thongsovanban->getIdloai(3);

        return view('page.van_ban.create',compact('thongso_vb','loai_vb','linhvuc_vb','coquan_vb'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateVanbanRequest $request)
    {
        //
        $data=[
            'ten'                   =>    $request->ten,
            'so_hieu'               =>    $request->so_hieu,
            'loai_vanban_id'        =>    $request->loai_vanban_id,
            'linh_vuc_id'           =>    $request->linh_vuc_id,
            'coquan_banhanh_id'     =>    $request->coquan_banhanh_id,
            'hieu_luc'              =>    $request->hieu_luc,
            'mo_ta'                 =>    addslashes($request->mo_ta),
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'created_user'          =>    Auth::user()->id,
            'created_at'            =>    date('Y-m-d H:i:s', time()),
            'updated_at'            =>    date('Y-m-d H:i:s', time()),

        ];
        //Lưu văn bản lấy ra id
        $id_vb = $this->useDB->insert($data);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new Vanbanfile();
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
        return redirect(route('van-ban.index'))->with('success', 'Đã thêm mới văn bản '.$request->ten);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
                return redirect(route('van-ban.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{

                $dataId = $this->useDB->getId($id);

                Session::put('key_upload', Auth::user()->id.time());
                $thongsovanban =new Thongsovanban();
                $thongso_vb = $thongsovanban->get_all_thongso();

                $loai_vb = $thongsovanban->getIdloai(1);
                $linhvuc_vb = $thongsovanban->getIdloai(2);
                $coquan_vb = $thongsovanban->getIdloai(3);

                $file_vb    =   new Vanbanfile();
                $files      =   $file_vb->getIdvanban($id);
                return view('page.van_ban.edit',compact('dataId','thongso_vb','loai_vb','linhvuc_vb','coquan_vb','files'));
            }
            
        }else{
            return redirect(route('van-ban.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVanbanRequest $request, $id)
    {
        $data=[
            'ten'                   =>    $request->ten,
            'so_hieu'               =>    $request->so_hieu,
            'loai_vanban_id'        =>    $request->loai_vanban_id,
            'linh_vuc_id'           =>    $request->linh_vuc_id,
            'coquan_banhanh_id'     =>    $request->coquan_banhanh_id,
            'hieu_luc'              =>    $request->hieu_luc,
            'mo_ta'                 =>    addslashes($request->mo_ta),
            'trang_thai'            =>    isset($request->trang_thai) ? 1 : 0,
            'created_user'          =>    Auth::user()->id,
            'updated_at'            =>    date('Y-m-d H:i:s', time()),
        ];

        //Lưu văn bản lấy ra id
        $this->useDB->updateData($data, $id);

        $id_vb = $id;
       
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new Vanbanfile();
        $list_file = $file_vb->getVanbanRong();
        //$chuoi ='';
        foreach($list_file as $item){
            //$chuoi .= $item ->key_file.'---'.$request->key_file;

            if($item ->key_file == $request->key_file){
                //nếu khớp thì cập nhật van_ban_id cho file
                $file_vb->UpdateIdVanban($id_vb, $item->id);
            }else{
                //nếu sai thì xóa đồng thời xóa luôn file đã tải lên trước đó
                $file_vb->deleteId($item->id);
            }
        }
        return redirect(route('van-ban.index'))->with('success', 'Đã cập nhật thông tin văn bản');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!empty($id)){
            $dataId = $this->useDB->getId($id);
            if(empty($dataId)){
                return redirect(route('van-ban.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                $file_vb = new Vanbanfile();
                $list_file = $file_vb->getIdvanban($id);
                foreach($list_file as $item){
                    $file_vb->deleteId($item->id);
                }
                $this->useDB->deleteData($id);
                return redirect(route('van-ban.index'));
            }
            
        }else{
            return redirect(route('van-ban.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }
}
