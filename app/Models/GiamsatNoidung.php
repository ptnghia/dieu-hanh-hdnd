<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GiamsatNoidung extends Model
{
    use HasFactory;
    protected  $table = 'giam_sat_noi_dung_van_ban';

    public function getData($id_giamsat){
        $data = DB::table($this->table)
        ->where('user_id', '=', Auth::user()->id)
        ->where('giam_sat_id', '=', $id_giamsat)
        ->get();
        return $data;
    }
    public function getData_user($id_giamsat){
        $data = DB::table($this->table)
        ->where('giam_sat_id', '=', $id_giamsat)
        ->where('type', '=', 2)
        ->get();
        return $data;
    }

}
