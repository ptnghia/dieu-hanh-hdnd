<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KyhopVanban extends Model
{
    use HasFactory;
    protected  $table = 'ky_hop_van_ban';

    public function getVanbanRong()
    {
        $listvanban = DB::table($this->table)
            ->where('key_file', '<>', '')
            ->where('ky_hop_id', '=', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
            return $listvanban;
    }

    public function getIdvanban($id_vb)
    {
        $listvanban = DB::table($this->table)
            ->where('ky_hop_id', '=', $id_vb)
            //->value('file_url')
            ->get();
            return $listvanban;
    }

    public function deleteId($id)
    {
        $file       =  KyhopVanban::find($id);

        $file_url   =  $file['file_url'];
        if (file_exists($file_url)) {
            File::delete($file_url);
        }
        
        $file->delete();
        
    }

    public function UpdateIdVanban($id_vb, $id)
    {
        return DB::table('ky_hop_van_ban')->where('id',  $id)->update(['ky_hop_id' => $id_vb, 'key_file' => '']);
    }
}
