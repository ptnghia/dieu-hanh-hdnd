<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class Profile extends Model
{
    use HasFactory;
    protected  $table = 'users';
    public function updateData($data){

        return  DB::update('UPDATE '.$this->table.' SET name = ?, gioi_tinh =?, ngay_sinh =?, dia_chi=?, dien_thoai=?, zalo=?, gioi_thieu=?, updated_at=?  WHERE id = '.Auth::user()->id.'', $data);
    }
    public function getChucVu(){
        if(Auth::user()->chuc_vu_id>0){
            $data = DB::table('chuc_vus')->find(Auth::user()->chuc_vu_id);
            return $data->ten;
        }else{
            return '';
        }
       
    }

    public function updatePassword($password){
        return  DB::update('UPDATE '.$this->table.' SET password = ?  WHERE id = '.Auth::user()->id.'', [$password]);
    }
}
