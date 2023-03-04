<?php

namespace App\Http\Controllers;

use App\Models\Thanhvien;
use Illuminate\Http\Request;
use App\Models\Chuc_vu;
use App\Models\Permissions_group;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CreateThanhvienReques;
use App\Http\Requests\UpdateThanhvienReques;
class ThanhvienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $useDB;
    private $useChucvu, $per_group;
    public function __construct(){
        $this->useDB        = new Thanhvien();
        $this->useChucvu    = new Chuc_vu();
        $this->per_group    = new Permissions_group();
    }

    public function index()
    {
        $datas      =  $this->useDB->getAll()->paginate(20);
        $chucvus        = $this->useChucvu->getAll();
        return view('page.thanh_vien.index', compact('datas','chucvus'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $chucvus        = $this->useChucvu->getAll();
        $permissions    = $this->per_group->getAll();
        return view('page.thanh_vien.create', compact('chucvus','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateThanhvienReques $request)
    {
        //tạo mảng dữ liệu 
        $dataInsert=[ 
            $request['name'],
            $request['gioi_tinh'],
            $request['ngay_sinh'],
            $request['dia_chi'],
            $request['dien_thoai'],
            $request['zalo'],
            $request['email'],
            Hash::make($request->password),
            $request['chuc_vu_id'],
            $request['gioi_thieu'],
            1,
            $request['permissions_id'],
            date('Y-m-d H:i:s', time()),
            date('Y-m-d H:i:s', time())
        ];
        $this->useDB->insert($dataInsert);
        return redirect(route('thanh-vien.index'))->with('success', 'Đã thêm mới thành viên '.$request->ten);
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
        $chucvus        = $this->useChucvu->getAll();
        $permissions    = $this->per_group->getAll();
        if(!empty($id)){
            $dataId = $this->useDB->getId($id);
            if(empty($dataId)){
                return redirect(route('thanh-vien.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                return view('page.thanh_vien.edit',compact('dataId','chucvus','permissions'));
            }
            
        }else{
            return redirect(route('thanh-vien.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateThanhvienReques $request, $id)
    {
        //
        if($request->password != ''){
            $dataUpdata=[ 
                $request['name'],
                $request['gioi_tinh'],
                $request['ngay_sinh'],
                addslashes($request['dia_chi']),
                $request['dien_thoai'],
                $request['zalo'],
                $request['email'],
                Hash::make($request->password),
                $request['chuc_vu_id'],
                $request['gioi_thieu'],
                1,
                $request['permissions_id'],
                date('Y-m-d H:i:s', time())
            ];
        }else{
            $dataUpdata=[ 
                $request['name'],
                $request['gioi_tinh'],
                $request['ngay_sinh'],
                addslashes($request['dia_chi']),
                $request['dien_thoai'],
                $request['zalo'],
                $request['email'],
                $request['chuc_vu_id'],
                $request['gioi_thieu'],
                1,
                $request['permissions_id'],
                date('Y-m-d H:i:s', time())
            ];
        }
        
        $this->useDB->updateData($dataUpdata,$id);
        return redirect(route('thanh-vien.index'))->with('success', 'Đã cập nhật thông tin thành viên '.$request->ten);
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
