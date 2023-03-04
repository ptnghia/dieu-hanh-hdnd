<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKhieunaiRequest;
use App\Http\Requests\UpdateKhieunaiRequest;
use App\Http\Requests\UpdateKhieunaiTraloiRequest;
use App\Models\Khieunai;
use App\Models\KhieunaiChude;
use App\Models\KhieunaiTheodoi;
use App\Models\KhieunaiVanban;
use App\Models\Thongbao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class KhieunaiController extends Controller
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
        $this->useDB = new Khieunai();
    }

    public function index()
    {
        
        $datas_new = $this->useDB->getAll()->paginate(10);
        return view('page.khieu_nai.index', compact('datas_new'));
    }
    public function chuatraloi()
    {
        $datas_new = $this->useDB->getChuatraloi()->paginate(10);
        return view('page.khieu_nai.chuatraloi', compact('datas_new'));
    }
    public function datraloi($id_trangthai){
        $datas_new = $this->useDB->getDatraloi($id_trangthai)->paginate(10);
        return view('page.khieu_nai.datraloi', compact('datas_new'));
    }
    public function theodoi(){
        $datas_new = $this->useDB->getTheodoi()->paginate(10);
        return view('page.khieu_nai.theodoi', compact('datas_new'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        Session::put('key_upload', Auth::user()->id.time());
        $chude = new KhieunaiChude();
        $data_chude = $chude->getAll();
        return view('page.khieu_nai.create', compact('data_chude'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateKhieunaiRequest $request)
    {
        //
        $data=[
            'chu_de_id'             =>      $request->chu_de_id,
            'tieu_de'               =>      $request->tieu_de,
            'noi_dung_khieu_nai'    =>      addslashes($request->noi_dung_khieu_nai),
            'user_gui_id'           =>      Auth::user()->id,
            'ngay_khieu_nai'        =>      date('Y-m-d H:i:s', time()),
            'trang_thai'            =>      0,
            'created_user'          =>      Auth::user()->id,
            'created_at'            =>      date('Y-m-d H:i:s', time()),
            'updated_at'            =>      date('Y-m-d H:i:s', time()),

        ];
        //Lưu văn bản lấy ra id
        $id_vb = $this->useDB->insert($data);
        //lấy danh sách file trống chưa có van_ban_id của user
        $file_vb = new KhieunaiVanban();
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

        $data_theodoi = [
            'user_id'           =>      Auth::user()->id,
            'khieu_nai_id'      =>      $id_vb,
            'created_at'        =>      date('Y-m-d H:i:s', time()),
            'updated_at'        =>      date('Y-m-d H:i:s', time()),
        ];
        $this->useDB->insert_theodoi($data_theodoi);
        return redirect(route('khieu-nai.index'))->with('success', 'Đã thêm mới khiếu nại - tố cáo');
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
        $khieunaiId = $this->useDB->getTrangthai($id);
        $trang_thai = $khieunaiId->trang_thai;
        if($trang_thai==2){
            $data = $this->useDB->getId_traloi($id);
        }else{
            $data = $this->useDB->getId($id);
        }
        $kieunai_vanban = new KhieunaiVanban();
        $file_vb = $kieunai_vanban->getIdkhieunai($id);
        return view('page.khieu_nai.show', compact('data','file_vb'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateKhieunaiRequest $request, $id)
    {
        
    }

    public function traloi($id){

        $dataId = $this->useDB->getId($id);
        //return $dataId ;
        return view('page.khieu_nai.traloi', compact('dataId'));
    }

    public function update_traloi(UpdateKhieunaiTraloiRequest $request,$id){

        $data=[
            'noi_dung_tra_loi'      =>      addslashes($request->noi_dung_tra_loi),
            'user_traloi_id'        =>      Auth::user()->id,
            'ngay_tra_loi'          =>      date('Y-m-d H:i:s', time()),
            'trang_thai'            =>      2,
            'updated_at'            =>      date('Y-m-d H:i:s', time()),
        ]; 
        
        $this->useDB->updateData($data, $id);
        $khieunai_theodoi = new KhieunaiTheodoi();
        $list_theodoi = $khieunai_theodoi->getUser_theodoi($id);
        foreach($list_theodoi as $row){
            $data_thongbao = [
                'user_gui'          => Auth::user()->id,
                'user_nhan'         => $row->user_id,
                'loai'              =>  2,
                'ngay_gui'          =>  date('Y-m-d H:i:s', time()),
                'tieu_de'           =>  'Khiếu nại theo dõi',
                'noi_dung'          =>  'Khiếu nại theo dõi có cập nhật câu trả lời',
                'link'              =>  route('khieu-nai.show', $id),
                'created_user'      =>  Auth::user()->id,
                'created_at'        =>  date('Y-m-d H:i:s', time()),
                'updated_at'        =>  date('Y-m-d H:i:s', time()),
            ];

            $thongbao =new Thongbao();
            $thongbao->insert($data_thongbao);
        }
        
        return redirect(route('khieu-nai.index'))->with('success', 'Đã trả lời khiếu nại - tố cáo');

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
