<?php

$id = $Request->GetInt( "id", "get", 0);
$msg = $Request->GetString( "msg", "get", '');
$ck = $Request->GetString( "ck", "get", '');

if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');

if($id > 0){
	$sql = "SELECT * FROM `tbl_bmxn` WHERE `id` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
}
else 
{
    die('stop!!!');
}

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
	$data['doituonglaymau'] = $Request->GetString( "doituonglaymau", "post", '' );
	$data['lanlaymau'] = $Request->GetString( "lanlaymau", "post", '' );
	$data['odich'] = $Request->GetString( "odich", "post", '' );
    $data['phanloainoilaymau'] = $Request->GetString( "phanloainoilaymau", "post", '' );
    $data['diadiemnoilaymau'] = $Request->GetString( "diadiemnoilaymau", "post", '' );
	$data['huyennoilaymau'] = $Request->GetString( "huyennoilaymau", "post", '' );
	$data['xanoilaymau'] = $Request->GetString( "xanoilaymau", "post", '' );
	$data['thonnoilaymau'] = $Request->GetString( "thonnoilaymau", "post", '' );
	$data['loaimau'] = $Request->GetString( "loaimau", "post", '' );
	$data['donvilaymau'] = $Request->GetString( "donvilaymau", "post", '' );
	$ngaylaymau = $Request->GetString( "ngaylaymau", "post", '' );
	$data['ngaylaymau'] = 0;
	if ( ! empty( $ngaylaymau ) )
	{
		unset( $m );
		preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaylaymau, $m );
		$data['ngaylaymau'] = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
	}
	$bngayxetnghiem = $Request->GetString( "bngayxetnghiem", "post", '' );
	$data['bngayxetnghiem'] = 0;
	if ( ! empty( $bngayxetnghiem ) )
	{
		unset( $m );
		preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bngayxetnghiem, $m );
		$data['bngayxetnghiem'] = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
	}
	$data['bphuongphapxetnghiem'] = $Request->GetString( "bphuongphapxetnghiem", "post", '' );
	$bngaytrakqxn = $Request->GetString( "bngaytrakqxn", "post", '' );
	$data['bngaytrakqxn'] = 0;
	if ( ! empty( $bngaytrakqxn ) )
	{
		unset( $m );
		preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bngaytrakqxn, $m );
		$data['bngaytrakqxn'] = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
	}
	$data['bdonviguimau'] = $Request->GetString( "bdonviguimau", "post", '' );
	$data['btinhtrangmau'] = $Request->GetString( "btinhtrangmau", "post", '' );
	$data['bketquaxetnghiem'] = $Request->GetString( "bketquaxetnghiem", "post", '' );
	$data['bctvalue'] = $Request->GetString( "bctvalue", "post", '' );
	
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
	elseif ( empty( $data['doituonglaymau'] ) )
	{
		$error = "Error: đối tượng lấy mẫu không được để trống";
	}
	elseif ( empty( $data['lanlaymau'] ) )
	{
		$error = "Error: Địa chỉ đang ở không được để trống";
	}
	elseif ( empty( $data['diadiemnoilaymau'] ) )
	{
		$error = "Error: địa điểm lấy mẫu không được để trống";
	}
	elseif ( empty( $data['huyennoilaymau'] ) || empty( $data['xanoilaymau'] ) )
	{
		$error = "Error: Quận huyện, phường xã nơi lấy mẫu không được để trống";
	}
	elseif ( empty( $data['donvilaymau'] ) )
	{
		$error = "Error: Đơn vị lấy mẫu không được để trống";
	}
	elseif ( $data['ngaylaymau'] == 0 )
	{
		$error = "Error: Ngày lấy mẫu không được để trống";
	}

	if ( empty($error) )
	{
		$sql = "UPDATE `tbl_bmxn` SET 
			`hovaten` = ".$db->dbescape($data['hovaten']).",
			`namsinh` = ".$db->dbescape($data['namsinh']).",
			`gioitinh` = ".$db->dbescape($data['gioitinh']).",
            `dienthoai` =".$db->dbescape($data['dienthoai']).",
			`tinhnoio` =".$db->dbescape($data['tinhnoio']).",
			`huyennoio` =".$db->dbescape($data['huyennoio']).",
            `xanoio` =".$db->dbescape($data['xanoio']).",
			`thonnoio` =".$db->dbescape($data['thonnoio']).",
            `nghenghiep` =".$db->dbescape($data['nghenghiep']).",
			`noilamviec` =".$db->dbescape($data['noilamviec']).",
			`doituonglaymau` =".$db->dbescape($data['doituonglaymau']).",
            `lanlaymau` =".$db->dbescape($data['lanlaymau']).",
			`odich` =".$db->dbescape($data['odich']).",
            `phanloainoilaymau` =".$db->dbescape($data['phanloainoilaymau']).",
			`diadiemnoilaymau` =".$db->dbescape($data['diadiemnoilaymau']).",
            `huyennoilaymau` =".$db->dbescape($data['huyennoilaymau']).",
			`xanoilaymau` =".$db->dbescape($data['xanoilaymau']).",
			`thonnoilaymau` =".$db->dbescape($data['thonnoilaymau']).",
			`loaimau` =".$db->dbescape($data['loaimau']).",
			`donvilaymau` =".$db->dbescape($data['donvilaymau']).",
			`ngaylaymau` =".$db->dbescape($data['ngaylaymau']).",
			`bngayxetnghiem` =".$db->dbescape($data['ngaylaymau']).",
			`bphuongphapxetnghiem` =".$db->dbescape($data['bphuongphapxetnghiem']).",
			`bngaytrakqxn` =".$db->dbescape($data['bngaytrakqxn']).",
			`bdonviguimau` =".$db->dbescape($data['bdonviguimau']).",
			`btinhtrangmau` =".$db->dbescape($data['btinhtrangmau']).",
			`bketquaxetnghiem` =".$db->dbescape($data['bketquaxetnghiem']).",
			`bctvalue` =".$db->dbescape($data['bctvalue']).",
			`bkuptime` = ".$db->dbescape(time())."
		WHERE id=" . $id;
		$db->sql_query( $sql );
		$msg ="Cập nhật dữ liệu thành công!!!";
		//Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$id."&ck=".$ck."&msg=".$msg);
		//die();
	}
}

$layout = "edit.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );

$data['ngaylaymau'] = ($data['ngaylaymau']>0)? date('d/m/Y',$data['ngaylaymau']) : "";
    
$data['bngayxetnghiem'] = ($data['bngayxetnghiem']>0)? date('d/m/Y',$data['bngayxetnghiem']) : "";
$data['bngaytrakqxn'] = ($data['bngaytrakqxn']>0)? date('d/m/Y',$data['bngaytrakqxn']) : "";
	
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

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo none_theme( $content );

?>