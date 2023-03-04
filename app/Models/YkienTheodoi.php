<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YkienTheodoi extends Model
{
    use HasFactory;
    protected  $table = 'y_kien_theo_doi';

    public function check_theodoi($id_khieunai){
        $data = DB::table($this->table)
            ->where('y_kien_id', '=', $id_khieunai)
            ->where('user_id', Auth::user()->id)
            ->first();
            return $data;
    }

    public function insert($data){

        return DB::table($this->table)->insert($data);
 
    }

    public function getUser_theodoi($id_khieunai){
        $data = DB::table($this->table)
            ->where('y_kien_id', '=', $id_khieunai)
            ->get();
            return $data;
    }
}
