<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Thongbao extends Model
{
    use HasFactory;
    protected  $table = 'thong_bao';
    
    public function insert($data){

        return DB::table($this->table)->insert($data);

    }
    public function getNew(){
        $data = DB::table($this->table)
            ->where('user_nhan', '=', Auth::user()->id)
            ->where('trang_thai', '=', '0')
            ->orderBy('id','desc')
            ->get();
        return $data;
    }
}
