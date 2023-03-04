<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Thanhvien extends Model
{
    use HasFactory;
    protected  $table = 'users';

    public function check_per($pre){
        $listvanban = DB::table('permissions_user')
            ->where('permissions_id', '=', $pre)
            ->where('user_id', Auth::user()->id)
            ->get();
        return count($listvanban);
    }
    public function getAll(){

       $datas = DB::table($this->table)
            ->join('chuc_vus', 'users.chuc_vu_id', '=', 'chuc_vus.id')
            ->select('users.*', 'chuc_vus.ten');
       return $datas;
    }

    public function getId($id){

        $data = DB::table($this->table)->find($id);
        return $data;

    }

    public function insert($data){

        return  DB::insert('INSERT INTO '.$this->table.' (name, gioi_tinh, ngay_sinh, dia_chi, dien_thoai, zalo, email, password, chuc_vu_id, gioi_thieu , trang_thai, permissions_id, created_at, updated_at) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', $data);
        
    }

    public function updateData($data, $id){
        if(count($data)==14){
            return  DB::update('UPDATE '.$this->table.' SET name = ?, gioi_tinh = ?, ngay_sinh = ?, dia_chi = ?, dien_thoai = ?, zalo = ?, email =?, password = ?, chuc_vu_id = ?,  gioi_thieu = ?,  trang_thai = ?, permissions_id = ?, updated_at= ?  WHERE id = '.$id.'', $data);
        }else{
            return  DB::update('UPDATE '.$this->table.' SET name = ?, gioi_tinh = ?, ngay_sinh = ?, dia_chi =?, dien_thoai = ?, zalo = ?, email = ?, chuc_vu_id = ?,  gioi_thieu = ?,  trang_thai = ?, permissions_id = ?, updated_at= ?  WHERE id = '.$id.'', $data);
        }
        
    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }

    public function getGroups($list_group){
        $users = DB::table($this->table)
                    ->whereIn('chuc_vu_id', $list_group)
                    ->get();
        return $users;
    }
    public function getName($name){
        $users = DB::table($this->table)
            ->where('name','like', '%'.$name.'%')
            ->get();
        return $users;
    }
}
