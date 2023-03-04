<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kyhop extends Model
{
    use HasFactory;
    protected  $table = 'ky_hop';

    
    public function getAll(){

        $datas =  DB::table($this->table)->orderBy('id', 'desc');
        return $datas;
 
    }
    public function getAll_search($keyword){

        $datas =  DB::table($this->table)
        ->where('ten','like','%'.$keyword.'%')
        ->orderBy('id', 'desc');
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
