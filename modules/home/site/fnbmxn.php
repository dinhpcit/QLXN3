<?php

$fileid = $Request->GetString( "idfile", "get", '' );

$inum = 0;
$newid = 0;
$data_post = array();
$save = $Request->GetInt( "save", "post", 0 );
$email_send = "";
$name_send = "";
$bg_maso = "";
$en_maso = "";
if ( $save == "2" )
{ 
	//delete data
	$sql = "DELETE FROM `tbl_bmxn_temp` WHERE `idfile` = ".$db->dbescape($fileid);
	$db->sql_query( $sql );
	//redriect
	Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=update");
	die();
}
else
if ( $save == "1" )
{ 
	$sql = "SELECT * FROM `tbl_bmxn_temp` WHERE `idfile` = '".$fileid."' ORDER BY `id` ASC";
	$result = $db->sql_query( $sql );
	$num_i = 0;
	$trung = array();
	while ( $data = $db->sql_fetchrow( $result, 2 ) )
	{
		if ( !check_duplicate($data['hovaten'],$data['namsinh'],$data['mamaubenhpham'],$data['manguoiduoclaymau'],$data['dienthoai'] ) )
		{
			$sql_kq = "SELECT * FROM `tbl_kqxn` WHERE `kmamaubenhpham` = ".$db->dbescape($data['mamaubenhpham'])."";
			$result_kq = $db->sql_query( $sql_kq );
			$data_kq = $db->sql_fetchrow( $result_kq, 2 );
	
			$sql = "INSERT INTO `tbl_bmxn` (`id`, `mangay`, `madonvi`, `chukymatt`, `mamaubenhpham`, `hinhthuclaymau`, `matt`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`,`tinhnoio`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `doituonglaymau`, `lanlaymau`, `odich`, `phanloainoilaymau`, `diadiemnoilaymau`, `huyennoilaymau`, `xanoilaymau`, `thonnoilaymau`, `loaimau`, `donvilaymau`, `maongbenhpham`, `manguoiduoclaymau`, `ngaylaymau`, `hinhthuc`, `loaigop`, `uptime`, `userid`, `filepath`, `qhcode`, `pxcode`,`labcode`,`bmaxn`, `bngaynhanmau`,`bgionhanmau`, `bngayxetnghiem`, `bphuongphapxetnghiem`, `bngaytrakqxn`, `bdonviguimau`, `btinhtrangmau`, `bketquaxetnghiem`, `bctvalue`, `bkuptime`, `bkuserid`, `bkfilepath`) VALUES (
				NULL,
				".$db->dbescape($data['mangay']).",
				".$db->dbescape($data['madonvi']).",
				".$db->dbescape($data['chukymatt']).",
				".$db->dbescape($data['mamaubenhpham']).",
				".$db->dbescape($data['hinhthuclaymau']).",
				".$db->dbescape($data['matt']).",
				".$db->dbescape($data['hovaten']).",
				".$db->dbescape($data['namsinh']).",
				".$db->dbescape($data['gioitinh']).",
				".$db->dbescape($data['dienthoai']).",
				".$db->dbescape($data['tinhnoio']).",
				".$db->dbescape($data['huyennoio']).",
				".$db->dbescape($data['xanoio']).",
				".$db->dbescape($data['thonnoio']).",
				".$db->dbescape($data['nghenghiep']).",
				".$db->dbescape($data['noilamviec']).",
				".$db->dbescape($data['doituonglaymau']).",
				".$db->dbescape($data['lanlaymau']).",
				".$db->dbescape($data['odich']).",
				".$db->dbescape($data['phanloainoilaymau']).",
				".$db->dbescape($data['diadiemnoilaymau']).",
				".$db->dbescape($data['huyennoilaymau']).",
				".$db->dbescape($data['xanoilaymau']).",
				".$db->dbescape($data['thonnoilaymau']).",
				".$db->dbescape($data['loaimau']).",
				".$db->dbescape($data['donvilaymau']).",
				".$db->dbescape($data['maongbenhpham']).",
				".$db->dbescape($data['manguoiduoclaymau']).",
				".$db->dbescape($data['ngaylaymau']).",
				".$db->dbescape($data['hinhthuc']).",
				".$db->dbescape($data['loaigop']).",
				".$db->dbescape($data['uptime']).",
				".$db->dbescape($data['userid']).",
				".$db->dbescape($data['filepath']).",
				".$db->dbescape($data['qhcode']).",
				".$db->dbescape($data['pxcode']).",
				".$db->dbescape($data['labcode']).",
				".$db->dbescape($data_kq['maxn']).",
				".$db->dbescape($data_kq['ngaynhanmau']).",
				".$db->dbescape($data_kq['gionhanmau']).",
				".intval($data_kq['ngayxetnghiem']).", 
				".$db->dbescape($data_kq['phuongphapxetnghiem']).", 
				".intval($data_kq['ngaytrakqxn']).", 
				".$db->dbescape($data_kq['donviguimau']).", 
				".$db->dbescape($data_kq['tinhtrangmau']).", 
				".$db->dbescape($data_kq['ketquaxetnghiem']).", 
				".$db->dbescape($data_kq['ctvalue']).", 
				".intval($data_kq['kuptime']).", 
				".intval($data_kq['kuserid']).", 
				".$db->dbescape($data_kq['kfilepath'])."
			);";
			$idnew = $db->sql_query_insert_id( $sql );
			if ( $idnew > 0 )
			{
				$num_i = $num_i+1;
			}
		}
		else
		{
			$trung[$data['id']] = $data;
		}
	}
	
	if( $num_i > 0 )
	{
		//xóa bản ghi tạm
		$sql = "DELETE FROM `tbl_bmxn_temp` WHERE `idfile` = '".$fileid."'";
		$db->sql_query( $sql );
		//gửi mail
		$body = "Hệ thống đã cập nhật thêm <strong>".$num_i."</strong> bản ghi, số bản ghi không cập nhật do trùng được là <strong>".count($trung)."</strong> bản ghi<br/>\n\n";
		$_SESSION[$fileid] = $body;
		
		Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=detail&tp=2&idf=".$fileid);
		die();
	}
}
	
$layout = "fnbmxn.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );


$sql = "SELECT * FROM `tbl_bmxn_temp` WHERE `idfile` = '".$fileid."' ORDER BY `id` ASC";
$result = $db->sql_query( $sql );
$i = 1;	
$i_trung = 0;
$ser ='<span style="color: red">Error</span>'; 

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $i;
	$row['bg'] = ($i%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['uptime'] = date('d/m/Y H:i:s',$row['uptime']);
	$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "-";
	if ( check_duplicate($row['hovaten'],$row['namsinh'],$row['mamaubenhpham'], $row['manguoiduoclaymau'],$row['dienthoai'] ) )
	{
		$row['bg'] = 'style="background:#FBB"';	
		$i_trung++;
	}
	$row['labcode'] = (!empty($array_donvilm[$row['labcode']]))? $array_donvilm[$row['labcode']]['s_name'] : '';
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.loop' );
	$i++;
}
$xtpl->assign( 'tongso', $i-1 );
$xtpl->assign( 'sotrung', $i_trung );
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>