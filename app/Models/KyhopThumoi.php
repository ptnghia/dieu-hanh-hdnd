<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KyhopThumoi extends Model
{
    use HasFactory;

    protected  $table = 'ky_hop_thu_moi';

    public function getThumoi($id_hop){

        $thumoi = DB::table($this->table)
            ->where('ky_hop_id', '=', $id_hop)
            ->get();
        return $thumoi;

    }
    
    public function getThumoi_view($id_hop){

        $thumoi = DB::table($this->table)
            ->where('ky_hop_id', '=', $id_hop)
            ->first();
        return $thumoi;

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
}
