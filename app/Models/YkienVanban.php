<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YkienVanban extends Model
{
    use HasFactory;
    protected  $table = 'y_kien_van_ban';

    public function getVanbanRong()
    {
        $listvanban = DB::table($this->table)
            ->where('key_file', '<>', '')
            ->where('y_kien_id', '=', 0)
            ->where('user_id', Auth::user()->id)
            ->get();
            return $listvanban;
    }

    public function getIdkhieunai($id_vb)
    {
        $listvanban = DB::table($this->table)
            ->where('y_kien_id', '=', $id_vb)
            //->value('file_url')
            ->get();
            return $listvanban;
    }

    public function deleteId($id)
    {
        $file       =  YkienVanban::find($id);

        $file_url   =  $file['file_url'];
        if (file_exists($file_url)) {
            File::delete($file_url);
        }
        
        $file->delete();
        
    }

    public function UpdateIdVanban($id_vb, $id)
    {
        return DB::table($this->table)->where('id',  $id)->update(['y_kien_id' => $id_vb, 'key_file' => '']);
    }
}
