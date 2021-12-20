<?php

//include (DF_ROOTDIR . "/includes/phpqrcode/qrlib.php");

$id = $Request->GetInt( "id", "get", 0);
$msg = $Request->GetString( "msg", "get", '');
$ck = $Request->GetString( "ck", "get", '');
/*
$upload_path_year = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y'); 
if ( !is_dir ( $upload_path_year) ) mkdir ( $upload_path_year );
$upload_path_month = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y')."/". date('Y-m'); 
if ( !is_dir ( $upload_path_month) ) mkdir ( $upload_path_month );
$upload_path = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y')."/". date('Y-m')."/". date('Y-m-d'); 
if ( !is_dir ( $upload_path) ) mkdir ( $upload_path );
//if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');
function saveimage ($url)
{
	$img = end( explode( '/' , $url ));
	$folder = 'upload/20210112/'.$img;
	file_put_contents($folder, file_get_contents($url));
	if ( file_exists($folder) ) return $img;
	else '';
}*/

if($id > 0){
	$sql = "SELECT * FROM `tbl_pro` WHERE `id` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
}
//else 
//{
//    die('stop!!!');
//}

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	
	$data['hovaten'] = $Request->GetString( "hovaten", "post", '' );
	$data['namsinh'] = $Request->GetString( "namsinh", "post", '' );
	$data['gioitinh'] = $Request->GetString( "gioitinh", "post", '' );
    $data['dienthoai'] = $Request->GetString( "dienthoai", "post", '' );
	$data['tinhnoio'] = $Request->GetString( "tinhnoio", "post", '' );
	$data['huyennoio'] = $Request->GetString( "huyennoio", "post", '' );
	$data['xanoio'] = $Request->GetString( "xanoio", "post", '' );
	$data['thonnoio'] = $Request->GetString( "thonnoio", "post", '' );
	$data['nghenghiep'] = $Request->GetString( "nghenghiep", "post", '' );
	$data['noilamviec'] = $Request->GetString( "noilamviec", "post", '' );
	
	if ( empty( $data['hovaten'] ) )
	{
		$error = "Error: Họ và tên không được để trống";
	}
	elseif ( empty( $data['namsinh'] ) )
	{
		$error = "Error: Tuổi (năm sinh) không được để trống";
	}
	elseif ( empty( $data['gioitinh'] ) )
	{
		$error = "Error: Giới tính không được để trống";
	}
	elseif ( empty( $data['tinhnoio'] ) || empty( $data['huyennoio'] ) || empty( $data['xanoio'] ) )
	{
		$error = "Error: Địa chỉ đang ở không được để trống";
	}
	
	if ( $data['id'] == 0 && empty( $error ) )
    {
        $sql = "INSERT INTO `tbl_pro` (`id`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `tinhnoio`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `addtime`, `active`) VALUES 
                (   NULL, 
					" . $db->dbescape( $data['hovaten'] ) . ",
					" . $db->dbescape( $data['namsinh'] ) . ",
					" . $db->dbescape( $data['gioitinh'] ) . ",
					" . $db->dbescape( $data['dienthoai'] ) . ",
					" . $db->dbescape( $data['tinhnoio'] ) . ",
					" . $db->dbescape( $data['huyennoio'] ) . ",
					" . $db->dbescape( $data['xanoio'] ) . ",
					" . $db->dbescape( $data['thonnoio'] ) . ",
					" . $db->dbescape( $data['nghenghiep'] ) . ",
					" . $db->dbescape( $data['noilamviec'] ) . ",
					" . intval(time() ) . ",0
                )";
        $idnew = $db->sql_query_insert_id( $sql );
		if( $idnew > 0){
			$url = $idnew;
			$msg ="Cập nhật dữ liệu thành công!!!";
		}
		$db->sql_freeresult();
    }
    elseif ( $data['id'] > 0 && empty( $error ) )
    {
        $sql = "UPDATE `tbl_pro` SET 
			`hovaten` = ".$db->dbescape($data['hovaten']).",
			`namsinh` = ".$db->dbescape($data['namsinh']).",
			`gioitinh` = ".$db->dbescape($data['gioitinh']).",
            `dienthoai` =".$db->dbescape($data['dienthoai']).",
			`tinhnoio` =".$db->dbescape($data['tinhnoio']).",
			`huyennoio` =".$db->dbescape($data['huyennoio']).",
            `xanoio` =".$db->dbescape($data['xanoio']).",
			`thonnoio` =".$db->dbescape($data['thonnoio']).",
            `nghenghiep` =".$db->dbescape($data['nghenghiep']).",
			`noilamviec` =".$db->dbescape($data['noilamviec'])."
			`addtime` = ".$db->dbescape(time())."
		WHERE id=" . $id;
		$db->sql_query( $sql );
		$msg ="Cập nhật dữ liệu thành công!!!";
		//Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$id."&ck=".$ck."&msg=".$msg);
		//die();
    }
}

$layout = "add.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );
$xtpl->assign( 'imgData', $url );

$xtpl->assign( 'DATA', $data );
if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
if(!empty($msg))
{
	$xtpl->assign( 'msg', $msg );
	$xtpl->parse( 'main.msg' );	
}

if($url > 0) $xtpl->parse( 'main.qrcode' );

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo none_theme( $content );

?>