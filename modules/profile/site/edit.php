<?php
/*
$id = $Request->GetInt( "id", "get", 0);
$error = $Request->GetString( "msg", "get", '');
$ck = $Request->GetString( "ck", "get", '');

if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');

$upload_path_year = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/home/" . date('Y'); 
if ( !is_dir ( $upload_path_year) ) mkdir ( $upload_path_year );
$upload_path_month = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/home/" . date('Y')."/". date('m-Y'); 
if ( !is_dir ( $upload_path_month) ) mkdir ( $upload_path_month );
$upload_path = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/home/" . date('Y')."/". date('Y-m')."/". date('Y-m-d'); 
if ( !is_dir ( $upload_path) ) mkdir ( $upload_path );

if($id > 0){
	$sql = "SELECT * FROM `tbl_register` WHERE `id` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
	if( !empty($data ['phieuxn'] ) ) $data ['filepxn'] = DF_BASE_SITEURL . "".DF_UPLOAD_FOLDER."/home/" .$data ['phieuxn'];
    if( !empty($data ['baocaocb'] ) ) $data ['filebc'] = DF_BASE_SITEURL . "".DF_UPLOAD_FOLDER."/home/" .$data ['baocaocb'];
    //print_r($data); die();
}
else 
{
    die('stop!!!');
}

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['hovaten'] = $Request->GetString( "hovaten", "post", '' );
	$data['namsinh'] = $Request->GetString( "namsinh", "post", '' );
	$gioitinh = $data['gioitinh_code'] = $Request->GetString( "gioitinh_code", "post", '' );
    $data['gioitinh'] = (!empty($array_gioitinh[$data['gioitinh_code']]))? $array_gioitinh[$data['gioitinh_code']] : "";
    
	$data['diachitamtru'] = $Request->GetString( "diachitamtru", "post", '' );
	$data['tinhthanhtamtru_code'] = $Request->GetString( "tinhthanhtamtru", "post", '' );
	$data['quanhuyentamtru_code'] = $Request->GetString( "quanhuyentamtru", "post", '' );
	$data['phuongxatamtru_code'] = $Request->GetString( "phuongxatamtru", "post", '' );
    
	$data['tinhthanhtamtru'] = (!empty($array_tinhthanh[$data['tinhthanhtamtru_code']]))? $array_tinhthanh[$data['tinhthanhtamtru_code']]['tinhthanhpho'] : "";
    $data['quanhuyentamtru'] = (!empty($array_quanhuyen[$data['quanhuyentamtru_code']]))? $array_quanhuyen[$data['quanhuyentamtru_code']]['quanhuyen'] : "";
    $data['phuongxatamtru'] = (!empty($array_phuongxa[$data['phuongxatamtru_code']]))? $array_phuongxa[$data['phuongxatamtru_code']]['phuongxa'] : ""; 
    
	$data['diachithuongtru'] = $Request->GetString( "diachithuongtru", "post", '' );
	$data['tinhthanhthuongtru_code'] = $Request->GetString( "tinhthanhthuongtru", "post", '' );
	$data['quanhuyenthuongtru_code'] = $Request->GetString( "quanhuyenthuongtru", "post", '' );
	$data['phuongxathuongtru_code'] = $Request->GetString( "phuongxathuongtru", "post", '' );
    
    $data['tinhthanhthuongtru'] = (!empty($array_tinhthanh[$data['tinhthanhthuongtru_code']]))? $array_tinhthanh[$data['tinhthanhthuongtru_code']]['tinhthanhpho'] : "";
    $data['quanhuyenthuongtru'] = (!empty($array_quanhuyen[$data['quanhuyenthuongtru_code']]))? $array_quanhuyen[$data['quanhuyenthuongtru_code']]['quanhuyen'] : "";
    $data['phuongxathuongtru'] = (!empty($array_phuongxa[$data['phuongxathuongtru_code']]))? $array_phuongxa[$data['phuongxathuongtru_code']]['phuongxa'] : ""; 
	
	$data['ngaylaymau'] = $Request->GetString( "ngaylaymau", "post", '' );
	$data['ngaykqxn'] = $Request->GetString( "ngaykqxn", "post", '' );
	$phanloai = $data['phanloai_code'] = $Request->GetString( "phanloai_code", "post", '' );
    $data['phanloai'] = (!empty($array_phanloai[$data['phanloai_code']]))? $array_phanloai[$data['phanloai_code']] : "";
    
	$doituonglm = $data['doituonglaymau_code'] = $Request->GetString( "doituonglaymau_code", "post", '' );
    $data['doituonglaymau'] = (!empty($array_doituong[$data['doituonglaymau_code']]))? $array_doituong[$data['doituonglaymau_code']] : "";
    
	$data['noiguibc'] = $Request->GetString( "noiguibc", "post", '' );
	$data['emailnhanbc'] = $Request->GetString( "emailnhanbc", "post", '' );
	$data['ghichu'] = $Request->GetString( "ghichu", "post", '' );
	$data['ctvalue'] = $Request->GetString( "ctvalue", "post", '' );
	$data['dienthoaibn'] = $Request->GetString( "dienthoaibn", "post", '' );
	$data['tinhthanh_code'] = $Request->GetString( "tinhthanh", "post", '' );
	$data['tinhthanh'] = (!empty($array_tinhthanh[$data['tinhthanh_code']]))? $array_tinhthanh[$data['tinhthanh_code']]['tinhthanhpho'] : "";
	
	
	print_r($data); die();
	//$data['phieuxnex'] = $Request->GetString( "phieuxnex", "post", '' );
	//$data['baocaocbex'] = $Request->GetString( "baocaocbex", "post", '' );
	
	//$data ['filepxn'] = (!empty($data ['filepxn'])) ? $data ['filepxn'] : $data['phieuxnex'];
	//$data ['baocaocb'] = (!empty($data ['baocaocb'])) ? $data ['baocaocb'] : $data['baocaocbex'];
	
	if ( empty( $data['hovaten'] ) )
	{
		$error = "Error: Họ và tên bệnh nhân không được để trống";
	}
	elseif ( empty( $data['namsinh'] ) )
	{
		$error = "Error: Tuổi (năm sinh) bệnh nhân không được để trống";
	}
	elseif ( empty( $data['gioitinh'] ) )
	{
		$error = "Error: Giới tính của bệnh nhân không được để trống";
	}
	elseif ( empty( $data['diachitamtru'] ) || empty( $data['phuongxatamtru_code'] ) || empty( $data['quanhuyentamtru_code'] ) || empty( $data['tinhthanhtamtru_code'] ))
	{
		$error = "Error: Địa chỉ đang ở không được để trống";
	}
	elseif ( empty( $data['ngaylaymau'] ) )
	{
		$error = "Error: Ngày lấy mẫu không được để trống";
	}
	elseif ( empty( $data['ngaykqxn'] ) )
	{
		$error = "Error: Ngày có kết quả xét nghiệm không được để trống";
	}
	elseif ( empty( $data['phanloai'] ) )
	{
		$error = "Error: Phân loại ca bệnh không được để trống";
	}
	elseif ( empty( $data['noiguibc'] ) )
	{
		$error = "Error: Nơi gửi thông báo không được để trống";
	}
	elseif ( empty( $data['tinhthanh_code'] ) )
	{
		$error = "Error: Tỉnh/thành phố ghi nhận ca bệnh không được để trống";
	}
	elseif ( empty( $data['emailnhanbc'] ) )
	{
		$error = "Error: Email nhận mã số bệnh nhân không được để trống";
	}
	if ( !empty($_FILES ['phieuxn']['tmp_name']) )
	{
		include_once DF_ROOTDIR . '/includes/class/class.upload.php';
		$handle = new Upload ( $_FILES ['phieuxn'] );
		$info = pathinfo($_FILES["phieuxn"]["name"]);
		$file_name =  basename($_FILES["phieuxn"]["name"],'.'.$info['extension']);
		$handle->file_new_name_body = basename( str_unicode($file_name) );
		if ($handle->uploaded) {
			$handle->Process ( $upload_path );
			if ($handle->processed) 
			{
				$data ['phieuxn'] = date('Y')."/". date('Y-m')."/". date('Y-m-d').'/'.$handle->file_dst_name;
			} 
			else 
			{
				$error = $handle->error;
			}
			$handle->Clean ();
		} 
		else 
		{
			$error = $handle->error;
		}
		
	}
    if ( !empty($_FILES ['baocaocb']['tmp_name']) )
	{
		include_once DF_ROOTDIR . '/includes/class/class.upload.php';
		$handle = new Upload ( $_FILES ['baocaocb'] );
		$info = pathinfo($_FILES["baocaocb"]["name"]);
		$file_name =  basename($_FILES["baocaocb"]["name"],'.'.$info['extension']);
		$handle->file_new_name_body = basename( str_unicode($file_name) );
		if ($handle->uploaded) {
			$handle->Process ( $upload_path );
			if ($handle->processed) 
			{
				$data ['baocaocb'] = date('Y')."/". date('Y-m')."/". date('Y-m-d').'/'.$handle->file_dst_name;
			} 
			else 
			{
				$error = $handle->error;
			}
			$handle->Clean ();
		} 
		else 
		{
			$error = $handle->error;
		}
	}
	if ( empty( $data['phieuxn'] ) )
	{
		$error = "Error: Kết quả (đính kèm phiếu trả kết quả xét nghiệm) không được để trống";
	}
	elseif ( empty( $data['baocaocb'] ) )
	{
		$error = "Error: Báo cáo ca bệnh hoặc tóm tắt dịch tễ (đính kèm file) không được để trống";
	}
    
	if ( empty($error) )
	{
		$sql = "UPDATE `tbl_register` SET 
			`hovaten` = ".$db->dbescape($data['hovaten']).",
			`namsinh` = ".$db->dbescape($data['namsinh']).",
			`giotinh` = ".$db->dbescape($data['giotinh']).",
            `giotinh_code` = ".$db->dbescape($data['giotinh']).",
			`tinhthanhtamtru` = ".$db->dbescape($data['tinhthanhtamtru']).",
			`quanhuyentamtru` = ".$db->dbescape($data['quanhuyentamtru']).",
			`phuongxatamtru` = ".$db->dbescape($data['phuongxatamtru']).",
			`diachitamtru` = ".$db->dbescape($data['diachitamtru']).",
			`tinhthanhthuongtru` = ".$db->dbescape($data['tinhthanhthuongtru']).",
			`quanhuyenthuongtru` = ".$db->dbescape($data['quanhuyenthuongtru']).",
			`phuongxathuongtru` = ".$db->dbescape($data['phuongxathuongtru']).",
			`diachithuongtru` = ".$db->dbescape($data['diachithuongtru']).",
			`ngaylaymau` = ".$db->dbescape($data['ngaylaymau']).",
			`ngaykqxn` = ".$db->dbescape($data['ngaykqxn']).",
			`filepxn` = ".$db->dbescape($data['filepxn']).",
			`filebc` = ".$db->dbescape($data['filebc']).",
			`phanloai` = ".$db->dbescape($data['phanloai']).",
			`noiguibc` = ".$db->dbescape($data['noiguibc']).",
			`doituonglaymau` = ".$db->dbescape($data['doituonglaymau']).",
			`tinhthanh` = ".$db->dbescape($data['tinhthanh']).",
			`emailnhanbc` = ".$db->dbescape($data['emailnhanbc']).",
			`ghichu` = ".$db->dbescape($data['ghichu']).",
            `dienthoaibn` = ".$db->dbescape($data['dienthoaibn']).",
			`ctvalue` = ".$db->dbescape($data['ctvalue'])."
		WHERE id=" . $id; die($sql);
		$db->sql_query( $sql ); 
		
		$msg ="Cập nhật dữ liệu thành công";
		Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$id."&msg=".$msg);
		die();
	}
}

$layout = "edit.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );
$xtpl->assign( 'doituonglaymau_code', drawselect_status("doituonglaymau_code", $array_doituong, $doituonglm,"","","chosen-select") );
$xtpl->assign( 'gioitinh_code', drawradio_status("giotinh_code", $array_gioitinh, $data['gioitinh_code']) );
$xtpl->assign( 'phanloai_code', drawradio_status("phanloai_code", $array_phanloai, $data['phanloai_code']) );
$xtpl->assign( 'DATA', $data ); 
if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}

$i=1;
foreach($array_tinhthanh as $row)
{
	$row['no'] = $i;
	if( $row['matinhthanh'] == $data["tinhthanhtamtru_code"] ) $row["select"] = 'selected="selected"';
	if( $row['matinhthanh'] == $data["tinhthanhthuongtru_code"] ) $row["select1"] = 'selected="selected"';
	if( $row['matinhthanh'] == $data["tinhthanh_code"] ) $row["select2"] = 'selected="selected"';
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.tinhthanhtamtru' );
	$xtpl->parse( 'main.tinhthanhthuongtru' );
	$xtpl->parse( 'main.tinhthanh' );
	$i++;
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo none_theme( $content );
*/
?>