<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Profile;
use Illuminate\Support\Facades\Hash;

class Profiletroller extends Controller
{
    private $useDB;
    public function __construct()
    {
        $this->middleware('auth');
        $this->useDB= new Profile();
    }

    public function index(){
        
        $chuc_vu = $this->useDB->getChucVu();
        return view('page.thanh_vien.profile', compact('chuc_vu'));
    }

    public function UpdateData(UpdateProfileRequest $request){
        
        $dataUpdata=[ 
            $request['name'],
            $request['gioi_tinh'],
            $request['ngay_sinh'],
            $request['dia_chi'],
            $request['dien_thoai'],
            $request['zalo'],
            $request['gioi_thieu'],
            date('Y-m-d H:i:s', time())
        ];
        $this->useDB->updateData($dataUpdata);
        return redirect(route('profile.index'))->with('success', 'Cập nhật thành công');
    }
    public function updatePassword(UpdatePasswordRequest $request)
    {
        $new_password = Hash::make($request->new_password);

        $this->useDB->updatePassword($new_password);
        
        return redirect(route('profile.index'))->with('success', 'Cập nhật thành công');
    }
}
