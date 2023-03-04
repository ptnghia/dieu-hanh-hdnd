<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Permissions_group extends Model
{
    use HasFactory;

    protected  $table = 'permissions_group';
    
    public function getAll(){

        $datas =  DB::table($this->table)->get();
        return $datas;
 
     }
 
     public function getId($id){
 
         $data = DB::table($this->table)->find($id);
         return $data;
 
     }
}
