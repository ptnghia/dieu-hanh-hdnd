<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ajax;
use App\Models\Giamsat;
use App\Models\GiamsatNhom;
use App\Models\GiamsatThanhvien;
use App\Models\KhieunaiChude;
use App\Models\KhieunaiTheodoi;
use App\Models\Kyhop;
use App\Models\KyhopThanhvien;
use App\Models\Sukien;
use App\Models\Thanhvien;
use App\Models\Thongbao;
use App\Models\YkienChude;
use App\Models\YkienTheodoi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SplFileInfo;

class AjaxController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(Request $request){
        //$chuc_vu = new Chuc_vu();
        $atc        =   $request->atc;
        
        $db = new ajax();
        if($atc == 'check_id'){

            $id         =   $request->id;
            $dataTable  =   isset($request->table)?$request->table:'';
            $value      =   $request->value;
            $col        =   $request->col;
            if((int)$id>0 and $dataTable!='' and $col !=''){
                return $db->axjaxCheckId($id, $dataTable, $col, $value);
            }else{
                return false;
            }

        }elseif($atc == 'upload_avata'){

            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                $request->file('file')->move('uploads/images', $fileName, 'public/uploads/');
                $file = 'uploads/images/'.$fileName;
                return $db->axjaxUpdateAvata($file);
            }

        }elseif($atc == 'upload_vanban'){

            if($request->hasFile('OurFile')){

                $fileName = time().'_'.$request->file('OurFile')->getClientOriginalName();
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'van_ban_id'    =>  0,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'user_id'       =>  Auth::user()->id
                ];

                $db->axjaxUploadVanban($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_kyhop'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'ky_hop_id'     =>  0,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'user_id'       =>  Auth::user()->id
                ];

                $db->axjaxUploadVanbanKyhop($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_khieu_nai'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'khieu_nai_id'     =>  0,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'user_id'       =>  Auth::user()->id
                ];

                $db->axjaxUploadVanbankhieunai($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_ykien'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'y_kien_id'     =>  0,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'user_id'       =>  Auth::user()->id
                ];
                
                $db->axjaxUploadVanbanykien($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_giamsat'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'giam_sat_id'   =>  0,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'user_id'       =>  Auth::user()->id
                ];

                $db->axjaxUploadVanbanGiamsat($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_hoatdong'){

            if($request->hasFile('OurFile')){

                $file = $request->file('OurFile');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'giam_sat_id'   =>  $request->giam_sat_id,
                    'user_id'       =>  Auth::user()->id,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'type'          =>  $request->type,
                ];

                $db->axjaxUploadVanbanHoatdong($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'upload_vanban_hoatdong2'){

            if($request->hasFile('OurFile2')){

                $file = $request->file('OurFile2');
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $name = pathinfo($originalName, PATHINFO_FILENAME);

                $str = $db->vn_to_str($name);

                $fileName = $str.'-'.time().'.'.$extension;
                $request->file('OurFile2')->move('uploads/files', $fileName, 'public/uploads/');
                $arr_ss = array('success'=>true);
                $file = 'uploads/files/'.$fileName;
                $file_info = new SplFileInfo($file);
                $extension = $file_info->getExtension();

                $dataInsert=[ 
                    'giam_sat_id'   =>  $request->giam_sat_id,
                    'user_id'       =>  Auth::user()->id,
                    'ten'           =>  $name,
                    'file_url'      =>  $file,
                    'file_name'     =>  $fileName,
                    'file_ext'      =>  $extension,
                    'key_file'      =>  session('key_upload'),
                    'type'          =>  $request->type,
                ];

                $db->axjaxUploadVanbanHoatdong($dataInsert);

                return json_encode($arr_ss);
                
            }else{
                $arr_error = array('success'=>false,'error'=>'Đã sảy ra lỗi không thể tải file lên','errorcode'=>'relevant_error_code');
                return json_encode($arr_error);
            }

        }
        elseif($atc == 'add_thongso_vb'){
            
            $ten        =   $request->text;
            $id_loai    =   (int)$request->id_loai;
            $id = $db->axjaxAddThongsovab($ten,$id_loai);
            if((int)$id > 0){
                $html='
                <li class="item_thongso_vb" id="item_thongso_vb_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="'.$ten.'" data_id="" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }
        elseif($atc == 'add_chude_khieunai'){
            
            $ten        =   $request->text;
            $chude_khieunai= new KhieunaiChude();
            $id = $chude_khieunai->addChude($ten);
            if((int)$id > 0){
                $html='
                <li class="item_thongso_vb" id="item_thongso_vb" id="item_thongso_vb_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="'.$ten.'" data_id="'.$id.'" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit'.$id.'" style="display: none" ><i class="bx bx-check"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }
        elseif($atc == 'add_chude_ykien'){
            
            $ten        =   $request->text;
            $chude_khieunai= new YkienChude();
            $id = $chude_khieunai->addChude($ten);
            if((int)$id > 0){
                $html='
                <li class="item_thongso_vb" id="item_thongso_vb" id="item_thongso_vb_'.$id.'">
                    <input type="text" readonly class=" form-control ajax_edit_thongso_vb" value="'.$ten.'" data_id="'.$id.'" />
                    <button type="button" class="btn btn-sm btn-danger btn-xs btn-del" data_id="'.$id.'" ><i class="bx bx-trash"></i></button>
                    <button type="button" class="btn btn-sm btn-success btn-xs btn-edit" id="btn-edit'.$id.'" style="display: none" ><i class="bx bx-check"></i></button>
                </li>';
                return $html;
            }else{
                return false;
            }
        
        }
        elseif($atc == 'edit_thongso_vb'){
            $id         =   $request->id;
            $ten        =   $request->text;
            return $db->axjaxEditThongsovab($ten,$id);
        }
        elseif($atc == 'edit_chude_khieunai'){
            $id         =   $request->id;
            $ten        =   $request->text;
            $chude_khieunai= new KhieunaiChude();
            return $chude_khieunai->Editchude($ten,$id);
        }
        elseif($atc == 'edit_chude_ykien'){
            $id         =   $request->id;
            $ten        =   $request->text;
            $chude_khieunai= new YkienChude();
            return $chude_khieunai->Editchude($ten,$id);
        }
        elseif($atc == 'del_thongso_vb'){
           $id         =   $request->id;
            return $db->axjaxDelThongsovab($id);
        }
        elseif($atc == 'del_thongso_vb'){
            $id         =   $request->id;
             return $db->axjaxDelThongsovab($id);
         }
        elseif($atc == 'del_chude_khieunai'){
            $id         =   $request->id;
            $chude_khieunai= new KhieunaiChude();
            return $chude_khieunai->Delchude($id);
        }
        elseif($atc == 'del_chude_ykien'){
            $id         =   $request->id;
            $chude_khieunai= new YkienChude();
            return $chude_khieunai->Delchude($id);
        }
        elseif($atc == 'del_file_vb_kyhop'){
            $id         =   $request->id;
            return $db->axjaxDelFilevabKyhop($id);
        }elseif($atc == 'del_file_vb_giamsat'){
            $id         =   $request->id;
            return $db->axjaxDelFilevabgiamsat($id);
        } 
        elseif($atc == 'xoa_thumoi_hop'){

            $id         =   $request->id;
            $kyhop_tv = new KyhopThanhvien();
            $user = $kyhop_tv->checkIdthanhvien($id);
            foreach ($user as $item){
                $id_user = $item->user_id;
                $id_kyhop = $item->ky_hop_id;
            }
            $ky_hop = new Kyhop();
            $data_kyhhop = $ky_hop->getId($id_kyhop);

            $data_tb=[
                'user_gui'      =>      Auth::user()->id,
                'user_nhan'     =>      $id_user,
                'loai'          =>      1,
                'ngay_gui'      =>      date('Y-m-d H:i:s', time()),
                'tieu_de'       =>      'Thu hồi thư mời họp HĐND',
                'noi_dung'      =>      $data_kyhhop->ten.' vào ngày '.$data_kyhhop->thoi_gian ,
                'trang_thai'    =>      0,
                'ngay_xem'      =>      NULL,    
                'created_user'  =>      Auth::user()->id,
                'created_at'    =>      date('Y-m-d H:i:s', time()),
                'updated_at'    =>      date('Y-m-d H:i:s', time()),
            ];
            $thongbao = new Thongbao();
            $thongbao->insert($data_tb);
            return $kyhop_tv->deleteData($id );

        } 
        elseif($atc == 'get_thanhvien_group'){

            $list_id         =   $request->list_id;
            
            $user = new Thanhvien();
            $thanhvien  = $user->getGroups($list_id);

            $html ='';
            foreach ($thanhvien as $item){
                $html .='
                <div class="col-md-4 col-sm-6">
                    <div class="chip">
                        <input class="form-check-input" style="display: none;" checked type="checkbox" name="user_id[]" value="'.$item->id.'" id="check_tv_'.$item->id.'">
                        <img src="'.asset($item->hinh_anh==''?'assets/images/icons/user.png':$item->hinh_anh).'" alt="'.$item->name.'"><label for="check_tv_'.$item->id.'">'.$item->name.'</label> <span class="closebtn" onclick="this.parentElement.style.display=\'none\'">×</span>
                    </div>
                </div>
                ';
            }
            return  $html ;
            
        } 
        elseif($atc == 'add_togiamsat'){
            $data=[
                'giam_sat_id'   =>      $request->giam_sat_id,
                'ten'           =>      addslashes($request->ten),
                'nhiem_vu'      =>      addslashes($request->nhiem_vu), 
                'created_user'  =>      Auth::user()->id,
                'created_at'    =>      date('Y-m-d H:i:s', time()),
                'updated_at'    =>      date('Y-m-d H:i:s', time()),
            ];
            $giamsatnhom = new GiamsatNhom();
            return $giamsatnhom->insert($data);
        }
        elseif($atc == 'update_togiamsat'){
            $data=[
                'ten'           =>      addslashes($request->ten),
                'nhiem_vu'      =>      addslashes($request->nhiem_vu),
                'updated_at'    =>      date('Y-m-d H:i:s', time()),
            ];
            $id = $request->id;
            $giamsatnhom = new GiamsatNhom();
            return $giamsatnhom->updateData($data,$id);
        }
        elseif($atc=='search_thanhvien_giamsat'){
            $ten = addslashes($request->ten);
            $thanhvien = new Thanhvien();
            $list_tv = $thanhvien->getName($ten);
            $html='';
            $giamsattv = new GiamsatThanhvien();
            foreach($list_tv as $row){
                $check = $giamsattv->checkIdthanhvien( $row->id, $request->giam_sat_id);
                if(count($check)==0){
                    $html.='<tr>
                        <td>'.$row->name.'</td>
                        <td>'.$row->chuc_vu.'</td>
                        <td><button class="btn-icon mx-1 btn btn-sm btn-primary px-2 size-14" onclick="chon_thanhvien('.$row->id.')"><i class="bx bx-check-double"></i> Chọn </button></td>
                    </tr>';
                }
            }
            return $html;
        }
        elseif($atc=='add_thanhvien_giamsat'){
            $ten = addslashes($request->ten);

            $data=[
                'giam_sat_id'       =>      $request->giam_sat_id,
                'giam_sat_nhom_id'  =>      0,
                'user_id'           =>       $request->user_id, 
                'vai_tro'           =>      0,
                'created_user'      =>      Auth::user()->id,
                'created_at'        =>      date('Y-m-d H:i:s', time()),
                'updated_at'        =>      date('Y-m-d H:i:s', time()),
            ];
            $giamsattv = new GiamsatThanhvien();
            $id_tv_giamsat = $giamsattv->insert($data);
            $thanhvien = new Thanhvien();
            $tt_thanhvien = $thanhvien->getId($request->user_id);

            $tocongtac = new GiamsatNhom();
            $list_tocongtac = $tocongtac->getIdgiamsat($request->giam_sat_id);
            $html_to='';
            foreach($list_tocongtac as $row){
                $html_to.='<option value="'.$row->id.'">'.$row->ten.'</option>';
            }
            $html='<tr>
                    <td>'.$tt_thanhvien->name.'</td>
                    <td>'.$tt_thanhvien->chuc_vu.'</td>
                    <td>
                        <select class="form-select" onchange="update_tv_giamsat($(this), '. $id_tv_giamsat.', \'giam_sat_nhom_id\')">
                            <option value="0">Chọn tổ công tác</option>
                            '.$html_to.'
                        </select>
                    </td>
                    <td>
                        <select class="form-select" onchange="update_tv_giamsat($(this), '. $id_tv_giamsat.', \'vai_tro\')">
                            <option selected="0">Thành viên đoàn</option>
                            <option value="1">Thư ký</option>
                            <option value="2">Tổ trưởng</option>
                            <option value="3">Trưởng đoàn</option>
                        </select>
                    </td>
                    <td><button class="btn-icon mx-1 btn btn-sm btn-danger px-2 size-14" onclick="del_tv_giamsat('.$id_tv_giamsat.')"><i class="bx bx-trash-alt"></i> Xóa </button></td>
                </tr>';

                return $html;
        }
        elseif($atc=='update_thanhvien_giamsat'){
            $id     = $request->id;
            $col    = $request->col;
            $text   = $request->text;
            $giamsattv = new GiamsatThanhvien();
            return $giamsattv->updateCol($id, $col, $text);
        }
        elseif($atc=='del_tv_togiamsat'){
            $id     = $request->id;
            $giamsattv = new GiamsatThanhvien();
            $giamsattv->deleteData($id);
        }
        elseif($atc=='del_togiamsat'){
            $id     = $request->id;
            $giamsattv = new GiamsatThanhvien();
            $giamsattv->resetNhom($id);

            $giamsatnhom = new GiamsatNhom();
            $giamsatnhom->deleteData($id);
        }elseif($atc=='xac_nhan_thamgia_hop'){
            $id =    $request->id;
            $kyhop_tv = new KyhopThanhvien();
            $check = $kyhop_tv->checkIdthanhvien(Auth::user()->id);
            if(!empty( $check)){
                return $kyhop_tv->xacnhanthemgia($id);
            }
        }elseif($atc=='add_sukien'){
            $data = [
                'user_id'       =>  Auth::user()->id,
                'ngay'          =>  $request->ngay,
                'tieu_de'       =>  $request->tieu_de,
                'noi_dung'      =>  $request->noi_dung,
                'link'          =>  $request->link,
                'bao_truoc'     =>  $request->bao_truoc,
                'created_at'    =>  date('Y-m-d H:i:s', time())
            ];
            $sukien = new Sukien();
            $sukien->addData($data);
            $tv_hop = new KyhopThanhvien();
            return $tv_hop->add_sukien($request->id_moi);
        }
        elseif($atc=='add_sukien_giamsat'){

            $data = [
                'user_id'       =>  Auth::user()->id,
                'ngay'          =>  $request->ngay,
                'tieu_de'       =>  $request->tieu_de,
                'noi_dung'      =>  $request->noi_dung,
                'link'          =>  $request->link,
                'bao_truoc'     =>  $request->bao_truoc,
                'created_at'    =>  date('Y-m-d H:i:s', time())
            ];
            $sukien = new Sukien();
            $check_lt = $sukien->check_lich_sukien($request->id_lichtrinh);
            if(count($check_lt)==0){
                $sukien->addData($data);

                $data2 =[
                    'user_id' => Auth::user()->id,
                    'lich_trinh_id' =>$request->id_lichtrinh
                ];
                return $sukien->addData_sukien($data2);
            }else{
                return true;
            }
            
        }
        elseif($atc=='add_thongbao_giamsat'){
            $giamsat_tv = new GiamsatThanhvien();
            $list_tv = $giamsat_tv->getThanhvien($request->id_giamsat);
            $thongbao = new Thongbao();
            foreach ($list_tv as $item){
                $data = [
                    'user_gui'      =>  Auth::user()->id,
                    'user_nhan'     =>  $item->user_id,
                    'loai'          =>  4,
                    'ngay_gui'      => date('Y-m-d H:i:s', time()),
                    'tieu_de'       =>  $request->tieu_de,
                    'noi_dung'      =>  $request->noi_dung,
                    'link'          =>  $request->link,
                    'created_user'  =>  Auth::user()->id,
                    'created_at'    =>  date('Y-m-d H:i:s', time()),
                    'updated_at'    =>  date('Y-m-d H:i:s', time())
                ];
                $thongbao->insert($data);
            }
            
            $data2=[
                'tb_thanhvien' =>1
            ];
            $giamsat = new Giamsat();
            return $giamsat->updateData( $data2, $request->id_giamsat);
        }elseif($atc=='add_thongbao_giamsat_lichtrinh'){
            $giamsat_tv = new GiamsatThanhvien();
            $list_tv = $giamsat_tv->getThanhvien($request->id_giamsat);
            $thongbao = new Thongbao();
            foreach ($list_tv as $item){
                $data = [
                    'user_gui'      =>  Auth::user()->id,
                    'user_nhan'     =>  $item->user_id,
                    'loai'          =>  4,
                    'ngay_gui'      => date('Y-m-d H:i:s', time()),
                    'tieu_de'       =>  $request->tieu_de,
                    'noi_dung'      =>  $request->noi_dung,
                    'link'          =>  $request->link,
                    'created_user'  =>  Auth::user()->id,
                    'created_at'    =>  date('Y-m-d H:i:s', time()),
                    'updated_at'    =>  date('Y-m-d H:i:s', time())
                ];
                $thongbao->insert($data);
            }
            
            $data2=[
                'tb_lichtrinh' =>1
            ];
            $giamsat = new Giamsat();
            return $giamsat->updateData( $data2, $request->id_giamsat);
        }
        elseif($atc=='hoanthanh_giamsat'){

            $data = [
                'trang_thai' => 1
            ];
            $giamsat =new Giamsat();
            return $giamsat->updateData($data, $request->id_giamsat);

        }elseif($atc=='theodoi_khieunai'){
            $data = [
                'user_id'       => Auth::user()->id,
                'khieu_nai_id'  => $request->khieu_nai_id,
                'created_at'    =>  date('Y-m-d H:i:s', time()),
                'updated_at'    =>  date('Y-m-d H:i:s', time())
            ];
            $khieunai_theodoi = new KhieunaiTheodoi();
            $check = $khieunai_theodoi->check_theodoi($request->khieu_nai_id);
            if(empty($check)){
                return $khieunai_theodoi->insert($data);
            }
        }   
        elseif($atc=='theodoi_ykien'){
            $data = [
                'user_id'       => Auth::user()->id,
                'y_kien_id'     => $request->y_kien__id,
                'created_at'    =>  date('Y-m-d H:i:s', time()),
                'updated_at'    =>  date('Y-m-d H:i:s', time())
            ];
            $khieunai_theodoi = new YkienTheodoi();
            $check = $khieunai_theodoi->check_theodoi($request->khieu_nai_id);
            if(empty($check)){
                return $khieunai_theodoi->insert($data);
            }
        }      
        else{
            return false;
        }
        
        

    }
}
