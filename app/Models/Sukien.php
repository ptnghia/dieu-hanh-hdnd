<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Sukien extends Model
{
    use HasFactory;
    protected  $table = 'su_kien';
    public function addData($data){

        $id = DB::table($this->table)->insert($data);
        return $id;

    }

    public function getSukienNew(){
        $data = DB::table($this->table)
        ->where('user_id', '=', Auth::user()->id)
        //->where('ngay', '>=', date('Y-m-d'))
        ->orderBy('ngay','DESC')
        ->get();
        return $data;
    }

    public function addData_sukien($data){

        $id = DB::table('sukien_giamsat')->insert($data);
        return $id;

    }

    public function check_lich_sukien($id_lichtrinh){
        $data = DB::table('sukien_giamsat')
        ->where('user_id', '=', Auth::user()->id)
        ->where('lich_trinh_id', '=', $id_lichtrinh)
        ->get();
        return $data;
    }
}
