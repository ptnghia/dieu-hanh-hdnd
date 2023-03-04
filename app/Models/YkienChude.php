<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class YkienChude extends Model
{
    use HasFactory;
    protected  $table = 'y_kien_chu_de';

    public function getAll(){

        $datas =  DB::table($this->table)->get();
        return $datas;
 
    }

    public function addChude($ten){
        $id = DB::table($this->table)->insertGetId(
            ['ten' => $ten, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]
        );
        return $id;
    }

    public function Editchude($ten, $id){
        return  DB::update('UPDATE '.$this->table.' SET ten = ? WHERE id = '.$id.'', [$ten]);
    }

    public function Delchude($id){

        return DB::delete('DELETE FROM '.$this->table.' WHERE id = ?', [$id]);
        
    }
}
