<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Khieunai extends Model
{
    use HasFactory;
    protected  $table = 'khieu_nai';

    public function getAll(){

        $datas = DB::table($this->table)
            ->join('users', 'khieu_nai.user_gui_id', '=', 'users.id')
            ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
            ->select('khieu_nai.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'khieu_nai_chu_de.ten');
        return $datas;
    }
    public function getChuatraloi(){

        $datas = DB::table($this->table)
            ->join('users', 'khieu_nai.user_gui_id', '=', 'users.id')
            ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
            ->where('khieu_nai.trang_thai','<','2')
            ->select('khieu_nai.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'khieu_nai_chu_de.ten');
        return $datas;
    }
    public function getDatraloi($id_trangthai){

        $datas = DB::table($this->table)
            ->join('users as users1', 'khieu_nai.user_gui_id', '=', 'users1.id')
            ->join('users as users2', 'khieu_nai.user_traloi_id', '=', 'users2.id')
            ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
            ->where('khieu_nai.trang_thai','=',$id_trangthai)
            ->select('khieu_nai.*', 'users1.id as id1', 'users1.name as name1', 'users1.hinh_anh as hinh_anh1', 'users2.id as id2' , 'users2.name as name2', 'users2.hinh_anh as hinh_anh2', 'khieu_nai_chu_de.ten');
        return $datas;
 
    }
    public function getTheodoi(){

        $datas = DB::table($this->table)
        ->join('users', 'khieu_nai.user_gui_id', '=', 'users.id')
        ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
        ->join('khieu_nai_theo_doi', 'khieu_nai.id', '=', 'khieu_nai_theo_doi.khieu_nai_id')
        ->where('khieu_nai_theo_doi.user_id','=',Auth::user()->id)
        ->select('khieu_nai.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'khieu_nai_chu_de.ten');
        return $datas;
 
    }
    public function getTrangthai($id){
 
        $data = DB::table($this->table)->find($id);
        return $data;

    }
    public function getId($id){
 
        $data = DB::table($this->table)
            ->join('users', 'khieu_nai.user_gui_id', '=', 'users.id')
            ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
            ->where('khieu_nai.id','=', $id)
            ->select('khieu_nai.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'khieu_nai_chu_de.ten')
            ->first();
        return $data;

    }
    public function getId_traloi($id){
 
        $data = DB::table($this->table)
            ->join('users as users1', 'khieu_nai.user_gui_id', '=', 'users1.id')
            ->join('users as users2', 'khieu_nai.user_traloi_id', '=', 'users2.id')
            ->join('khieu_nai_chu_de', 'khieu_nai.chu_de_id', '=', 'khieu_nai_chu_de.id')
            ->where('khieu_nai.id','=', $id)
            ->select('khieu_nai.*', 'users1.id as id1', 'users1.name as name1', 'users1.hinh_anh as hinh_anh1', 'users2.id as id2' , 'users2.name as name2', 'users2.hinh_anh as hinh_anh2', 'khieu_nai_chu_de.ten')
            ->first();
        return $data;

    }

    public function insert($data){

       $id = DB::table($this->table)->insertGetId($data);
       return $id;

    }
    public function insert_theodoi($data){
        return  DB::table('khieu_nai_theo_doi')->insert($data);
    }
    public function updateData($data, $id){

       return DB::table($this->table)->where('id',  $id)->update($data);

    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
