<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiamsatLichtrinh extends Model
{
    use HasFactory;
    protected  $table = 'giam_sat_lich_trinh';

    public function getAll($id_giamsat){

        $data = DB::table($this->table)
            ->where('giam_sat_id', '=', $id_giamsat)
            ->get();
        return $data;
 
    }
     
    public function getId($id){
 
         $data = DB::table($this->table)->find($id);
         return $data;
 
    }
 
    public function insert($data){

        return DB::table($this->table)->insert($data);

    }
 
    public function updateData($data, $id){
 
        return DB::table($this->table)->where('id',  $id)->update($data);
        
    }
 
    public function deleteData($id){
         return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
