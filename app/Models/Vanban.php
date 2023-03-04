<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Vanban extends Model
{
    use HasFactory;
    protected  $table = 'van_ban';

    public function getThongsovanban(){
        
        $list_thongso_vb = DB::table('thongso_vanban')
        ->where('id_loai', '=', 0)
        ->get();
        return $list_thongso_vb;
    }
    
    public function getAll(){

        $datas =  DB::table($this->table);
        return $datas;
 
    }
     
     public function getId($id){
 
         $data = DB::table($this->table)->find($id);
         return $data;
 
     }
 
     public function insert($data){

        $id = DB::table($this->table)->insertGetId($data);
        return $id;

     }
 
     public function updateData($data, $id){
 
        return DB::table($this->table)->where('id',  $id)->update($data);
     }
 
     public function deleteData($id){
         return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
     }
}
