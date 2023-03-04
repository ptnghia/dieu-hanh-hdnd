<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateChucvuRequest;
use App\Http\Requests\UpdateChucvuRequest;
use Spatie\Permission\Models\Permission;
use App\Models\Chuc_vu;
use App\Models\User;

class ChucvuController extends Controller
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
        $this->useDB = new Chuc_vu();
    }

    //public $data =[];

    public function index()
    {
        $datas =  $this->useDB->getAll();
        return view('page.chuc_vu.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('page.chuc_vu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateChucvuRequest $request)
    {
        $dataInsert=[ 
            $request['ten'],
            $request['stt'],
            isset($request['trang_thai'])?'1':'0',
            date('Y-m-d H:i:s', time()),
            date('Y-m-d H:i:s', time())
        ];
        $this->useDB->insert($dataInsert);
        return redirect(route('chuc-vu.index'))->with('success', 'Đã thêm mới chức vụ '.$request->ten);
        
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
        if(!empty($id)){
            $dataId = $this->useDB->getId($id);
            if(empty($dataId)){
                return redirect(route('chuc-vu.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                return view('page.chuc_vu.edit',compact('dataId'));
            }
            
        }else{
            return redirect(route('chuc-vu.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateChucvuRequest $request, $id)
    {
        $dataUpdata=[ 
            $request['ten'],
            $request['stt'],
            isset($request['trang_thai'])?'1':'0',
            date('Y-m-d H:i:s', time())
        ];
        $this->useDB->updateData($dataUpdata,$id);
        return redirect(route('chuc-vu.index'))->with('success', 'Đã cập nhật chức vụ '.$request->ten);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id=0)
    {
        if(!empty($id)){
            $dataId = $this->useDB->getId($id);
            if(empty($dataId)){
                return redirect(route('chuc-vu.index'))->with('errors', 'Dữ liệu không tồn tại');
            }else{
                $this->useDB->deleteData($id);
                return redirect(route('chuc-vu.index'))->with('success', 'Đã xóa chức vụ '.$dataId->ten);
            }
            
        }else{
            return redirect(route('chuc-vu.index'))->with('errors', 'Dữ liệu không tồn tại');
        }
    }
}
