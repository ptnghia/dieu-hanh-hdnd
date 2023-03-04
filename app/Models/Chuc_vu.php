<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chuc_vu extends Model
{
    use HasFactory;

    protected  $table = 'chuc_vus';

    public function getAll(){

       $datas =  DB::table($this->table)->get();
       return $datas;

    }

    public function getId($id){

        $data = DB::table($this->table)->find($id);
        return $data;

    }

    public function insert($data){

        return  DB::insert('INSERT INTO '.$this->table.' (ten, stt, trang_thai, created_at, updated_at) values (?, ?,?,?,?)', $data);
        
    }

    public function updateData($data, $id){

        return  DB::update('UPDATE '.$this->table.' SET ten = ?, stt =?, trang_thai =?, updated_at=?  WHERE id = '.$id.'', $data);
    }

    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }

}
