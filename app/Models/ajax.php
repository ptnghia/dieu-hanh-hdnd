<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ajax extends Model
{
    use HasFactory;

    public function vn_to_str ($str){
 
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );    
        foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
        }
        $str = str_replace(' ','_',$str);
        return $str;
         
    }

    public function axjaxCheckId($id, $dataTable, $col, $value){
        return  DB::update('UPDATE '.$dataTable.' SET '.$col.' = ? WHERE id = '.$id.'', [$value]);
    }
    public function axjaxUpdateAvata($file_name){
        return  DB::update('UPDATE  users SET hinh_anh = ? WHERE id = '.Auth::user()->id.'', [$file_name]);
    }
    public function axjaxUploadVanban($data){

        return DB::table('van_ban_ct')->insert($data);
        
    }

    public function axjaxUploadVanbanKyhop($data){

        return DB::table('ky_hop_van_ban')->insert($data);

    }
    public function axjaxUploadVanbankhieunai($data){

        return DB::table('khieu_nai_van_ban')->insert($data);

    }
    public function axjaxUploadVanbanykien($data){

        return DB::table('y_kien_van_ban')->insert($data);

    }
    public function axjaxUploadVanbanGiamsat($data){

        return DB::table('giam_sat_vanban')->insert($data);

    }
    public function axjaxUploadVanbanHoatdong($data){

        return DB::table('giam_sat_noi_dung_van_ban')->insert($data);

    }

    public function axjaxAddThongsovab($ten,$id_loai){
        $id = DB::table('thongso_vanban')->insertGetId(
            ['ten' => $ten, 'trang_thai' => 1, 'id_loai' =>$id_loai, 'created_at' => date('Y-m-d H:i:s', time()), 'updated_at' => date('Y-m-d H:i:s', time())]
        );
        return $id;
    }

    public function axjaxEditThongsovab($ten, $id){
        return  DB::update('UPDATE thongso_vanban SET ten = ? WHERE id = '.$id.'', [$ten]);
    }

    public function axjaxDelThongsovab($id){
        return DB::delete('DELETE FROM thongso_vanban WHERE id = ?', [$id]);
    }

    public function axjaxDelFilevab($id){

        $file_vb = new Vanbanfile();
        return $file_vb->deleteId($id);

    }

    public function axjaxDelFilevabKyhop($id){

        $file_vb = new KyhopVanban();
        return $file_vb->deleteId($id);

    }
    public function axjaxDelFilevabGiamsat($id){

        $file_vb = new GiamsatVanban();
        return $file_vb->deleteId($id);

    }
}
