<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Thongsovanban extends Model
{
    use HasFactory;

    protected  $table = 'thongso_vanban';

    public function children()
    {
        return $this->hasMany(Thongsovanban::class, 'id_loai');
    }

    public function parent()
    {
        return $this->belongsTo(Thongsovanban::class, 'id_loai');
    }

    public function get_all_thongso(){

        $thongso = Thongsovanban::where('id_loai','0')->with('children')->get();
        return $thongso;

    }

    public function getIdloai($idloai){
        $data= Thongsovanban::where('id_loai', '=', $idloai)->get();
        return $data;
    }
    public function getId($id){
        $data= DB::table('thongso_vanban')
        ->where('id', $id)
        ->value('ten');
        return $data;
    }
}
