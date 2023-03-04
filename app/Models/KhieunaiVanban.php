<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KhieunaiVanban extends Model
{
    use HasFactory;
    protected  $table = 'khieu_nai_van_ban';

    public function getVanbanRong()
    {
        $listvanban = DB::table($this->table)
            ->where('key_file', '<>', '')
            ->where('khieu_nai_id', '=', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
            return $listvanban;
    }

    public function getIdkhieunai($id_vb)
    {
        $listvanban = DB::table($this->table)
            ->where('khieu_nai_id', '=', $id_vb)
            //->value('file_url')
            ->get();
            return $listvanban;
    }

    public function deleteId($id)
    {
        $file       =  KhieunaiVanban::find($id);

        $file_url   =  $file['file_url'];
        if (file_exists($file_url)) {
            File::delete($file_url);
        }
        
        $file->delete();
        
    }

    public function UpdateIdVanban($id_vb, $id)
    {
        return DB::table($this->table)->where('id',  $id)->update(['khieu_nai_id' => $id_vb, 'key_file' => '']);
    }
}
