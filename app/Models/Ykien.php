<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Ykien extends Model
{
    use HasFactory;
    protected  $table = 'y_kien';

    public function getAll(){

        $datas = DB::table($this->table)
            ->join('users', 'y_kien.user_gui_id', '=', 'users.id')
            ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
            ->select('y_kien.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'y_kien_chu_de.ten');
        return $datas;
    }
    public function getChuatraloi(){

        $datas = DB::table($this->table)
            ->join('users', 'y_kien.user_gui_id', '=', 'users.id')
            ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
            ->where('y_kien.trang_thai','<','2')
            ->select('y_kien.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'y_kien_chu_de.ten');
        return $datas;
    }
    public function getDatraloi($id_trangthai){

        $datas = DB::table($this->table)
            ->join('users as users1', 'y_kien.user_gui_id', '=', 'users1.id')
            ->join('users as users2', 'y_kien.user_traloi_id', '=', 'users2.id')
            ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
            ->where('y_kien.trang_thai','=',$id_trangthai)
            ->select('y_kien.*', 'users1.id as id1', 'users1.name as name1', 'users1.hinh_anh as hinh_anh1', 'users2.id as id2' , 'users2.name as name2', 'users2.hinh_anh as hinh_anh2', 'y_kien_chu_de.ten');
        return $datas;
 
    }
    public function getTheodoi(){

        $datas = DB::table($this->table)
        ->join('users', 'y_kien.user_gui_id', '=', 'users.id')
        ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
        ->join('y_kien_theo_doi', 'y_kien.id', '=', 'y_kien_theo_doi.y_kien_id')
        ->where('y_kien_theo_doi.user_id','=',Auth::user()->id)
        ->select('y_kien.*', 'users.name', 'users.id as user_id','users.hinh_anh', 'y_kien_chu_de.ten');
        return $datas;
 
    }
    public function getTrangthai($id){
 
        $data = DB::table($this->table)->find($id);
        return $data;

    }
    public function getId($id){
 
        $data = DB::table($this->table)
            ->join('users', 'y_kien.user_gui_id', '=', 'users.id')
            ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
            ->where('y_kien.id','=', $id)
            ->select('y_kien.*', 'users.name as name1', 'users.id as user_id','users.hinh_anh as hinh_anh1', 'y_kien_chu_de.ten')
            ->first();
        return $data;

    }
    public function getId_traloi($id){
 
        $data = DB::table($this->table)
            ->join('users as users1', 'y_kien.user_gui_id', '=', 'users1.id')
            ->join('users as users2', 'y_kien.user_traloi_id', '=', 'users2.id')
            ->join('y_kien_chu_de', 'y_kien.chu_de_id', '=', 'y_kien_chu_de.id')
            ->where('y_kien.id','=', $id)
            ->select('y_kien.*', 'users1.id as id1', 'users1.name as name1', 'users1.hinh_anh as hinh_anh1', 'users2.id as id2' , 'users2.name as name2', 'users2.hinh_anh as hinh_anh2', 'y_kien_chu_de.ten')
            ->first();
        return $data;

    }

    public function insert($data){

       $id = DB::table($this->table)->insertGetId($data);
       return $id;

    }
    public function insert_theodoi($data){
        return  DB::table('y_kien_theo_doi')->insert($data);
    }
    public function updateData($data, $id){

       return DB::table($this->table)->where('id',  $id)->update($data);

    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
