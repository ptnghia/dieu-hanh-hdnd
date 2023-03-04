<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GiamsatThanhvien extends Model
{
    use HasFactory;
    protected  $table = 'giam_sat_thanh_vien';

    public function get_giamsat_tv(){
        $datas = DB::table($this->table)
            ->join('giam_sat', 'giam_sat_thanh_vien.giam_sat_id', '=', 'giam_sat.id')
            ->join('users', 'giam_sat.created_user', '=', 'users.id')
            ->where('giam_sat_thanh_vien.user_id', '=', Auth::user()->id)
            ->where('giam_sat.trang_thai', '=', 0)
            ->orderBy('giam_sat.id','DESC')
            ->select('giam_sat_thanh_vien.created_at as ngaynhan','giam_sat_thanh_vien.vai_tro',  'giam_sat.*','users.name')
            ;
            return $datas;
    }
    public function get_giamsat_ht(){
        $datas = DB::table($this->table)
            ->join('giam_sat', 'giam_sat_thanh_vien.giam_sat_id', '=', 'giam_sat.id')
            ->join('users', 'giam_sat.created_user', '=', 'users.id')
            ->where('giam_sat_thanh_vien.user_id', '=', Auth::user()->id)
            ->where('giam_sat.trang_thai', '=', 1)
            ->orderBy('giam_sat.id','DESC')
            ->select('giam_sat_thanh_vien.created_at as ngaynhan','giam_sat_thanh_vien.vai_tro',  'giam_sat.*','users.name')
            ;
            return $datas;
    }
    public function get_chitiet_giamsat_tv($id_giamsat){
        $datas = DB::table($this->table)
        ->join('giam_sat_nhom', 'giam_sat_thanh_vien.giam_sat_nhom_id', '=', 'giam_sat_nhom.id')
        ->join('giam_sat_lich_trinh', 'giam_sat_nhom.id', '=', 'giam_sat_lich_trinh.giam_sat_nhom_id')
        ->where('giam_sat_thanh_vien.user_id', '=', Auth::user()->id)
        ->where('giam_sat_thanh_vien.giam_sat_id', '=', $id_giamsat)
        ->select('giam_sat_thanh_vien.vai_tro',  'giam_sat_thanh_vien.ngay_nhan', 'giam_sat_thanh_vien.trang_thai','giam_sat_thanh_vien.them_su_kien',
            'giam_sat_lich_trinh.ngay', 'giam_sat_lich_trinh.gio', 'giam_sat_lich_trinh.dia_diem', 'giam_sat_lich_trinh.thanh_phan_tham_du', 'giam_sat_lich_trinh.id', 
            'giam_sat_nhom.ten', 'giam_sat_nhom.nhiem_vu'
            )
        ->get();
        return $datas;
    }
    public function insert($data){

        return $id = DB::table($this->table)->insertGetId($data);

    }
    public function getThanhvien($id){
        $data = DB::table($this->table)
        ->where('giam_sat_id','=', $id)
        ->get();
        return $data;
    }
    public function getIdgiamsat($id_giamsat){

        $nhom = DB::table($this->table)
            ->join('users', 'giam_sat_thanh_vien.user_id', '=', 'users.id')
            ->where('giam_sat_thanh_vien.giam_sat_id', '=', $id_giamsat)
            ->select('giam_sat_thanh_vien.*', 'users.name', 'users.chuc_vu')
            ->get();
        return $nhom;
    }

    public function updateCol($id, $col, $value){
        return  DB::update('UPDATE '.$this->table.' SET '.$col.' = ? WHERE id = '.$id.'', [$value]);
    }

    public function checkIdthanhvien($id_tv,$id_giamsat){

        $listvanban = DB::table($this->table)
            ->where('giam_sat_id', '=', $id_giamsat)
            ->where('user_id', '=', $id_tv)
            ->get();
        return $listvanban;
    }

    public function getIdthanhvien($id_tv,$id_giamsat){

        $listvanban = DB::table($this->table)
            ->where('giam_sat_id', '=', $id_giamsat)
            ->where('user_id', '=', $id_tv)
            ->first();
        return $listvanban;
    }

    public function resetNhom($id_nhom){
        return  DB::update('UPDATE '.$this->table.' SET giam_sat_nhom_id = ? WHERE giam_sat_nhom_id = '.$id_nhom.'', [0]);
    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
