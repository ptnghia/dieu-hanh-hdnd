<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KyhopThanhvien extends Model
{
    use HasFactory;

    protected  $table = 'ky_hop_thanh_vien';

    public function insert($data){

        return DB::table($this->table)->insert($data);

    }
    
    public function getId($id){
 
        $data = DB::table($this->table)->find($id);
        return $data;

    }
    public function getIdkyhop($id){

        $datas = DB::table($this->table)
            ->join('users', 'ky_hop_thanh_vien.user_id', '=', 'users.id')
            ->select('users.*', 'ky_hop_thanh_vien.id as id_moi', 'ky_hop_thanh_vien.trang_thai as trang_thai_moi')
            ->get()
            ;

        return $datas;

    }
    public function add_sukien($id){

        return DB::table($this->table)->where('id',  $id)->update(['them_su_kien' => 1 ]);
    }
    public function getThumoi_user(){
        $datas = DB::table($this->table)
            ->join('ky_hop', 'ky_hop_thanh_vien.ky_hop_id', '=', 'ky_hop.id')
            ->join('users', 'ky_hop_thanh_vien.created_user', '=', 'users.id')
            ->where('ky_hop_thanh_vien.user_id', '=', Auth::user()->id)
            ->select('ky_hop_thanh_vien.thu_moi_id', 'ky_hop_thanh_vien.updated_at as ngaynhan', 'ky_hop_thanh_vien.trang_thai as trang_thai_xn', 'ky_hop.*','users.name')
            ;
            return $datas;
    }
    public function xacnhanthemgia($id){
        return DB::table($this->table)->where('id',  $id)->update(['trang_thai' => 1 ]);
    }
    public function checkIdthanhvien($id_tv){

        $listvanban = DB::table($this->table)
            ->where('user_id', '=', $id_tv)
            ->first();
        return $listvanban;
    }

    public function deleteData($id){

        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
        
    }
}
