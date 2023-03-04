<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiamsatNhom extends Model
{
    use HasFactory;
    protected  $table = 'giam_sat_nhom';

    public function insert($data){
        return DB::table($this->table)->insert($data);
    }

    public function getIdgiamsat($id_giamsat){

        $nhom = DB::table($this->table)
            ->where('giam_sat_id', '=', $id_giamsat)
            ->get();
        return $nhom;
    }
    public function updateData($data, $id){
        return DB::table($this->table)->where('id',  $id)->update($data);
    }
    public function deleteData($id){
        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
    }
}
