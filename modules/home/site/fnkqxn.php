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
	$sql = "DELETE FROM `tbl_kqxn_temp` WHERE `idfile` = ".$db->dbescape($fileid);
	$db->sql_query( $sql );
	//redriect
	Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=update");
	die();
}
else
if ( $save == "1" )
{ 
	$sql = "SELECT * FROM `tbl_kqxn_temp` WHERE `idfile` = '".$fileid."' ORDER BY `kid` ASC";
	$result = $db->sql_query( $sql );
	$num_i = 0;
	$trung = array();
	while ( $data = $db->sql_fetchrow( $result, 2 ) )
	{
		if ( !check_duplicate_kqxn($data['kmamaubenhpham'],$data['phuongphapxetnghiem'],$data['donviguimau'],$data['ketquaxetnghiem']) )
		{
			$sql = "INSERT INTO `tbl_kqxn` (`kid`, `kmamaubenhpham`, `maxn`,`ngaynhanmau`,`gionhanmau`, `ngayxetnghiem`, `phuongphapxetnghiem`, `ngaytrakqxn`, `donviguimau`, `tinhtrangmau`, `ketquaxetnghiem`, `ctvalue`, `kuptime`, `kuserid`, `kfilepath`) VALUES (NULL,
				".$db->dbescape($data['kmamaubenhpham']).",
				".$db->dbescape($data['maxn']).",
				".$db->dbescape($data['ngaynhanmau']).",
				".$db->dbescape($data['gionhanmau']).",
				".$db->dbescape($data['ngayxetnghiem']).",
				".$db->dbescape($data['phuongphapxetnghiem']).",
				".$db->dbescape($data['ngaytrakqxn']).",
				".$db->dbescape($data['donviguimau']).",
				".$db->dbescape($data['tinhtrangmau']).",
				".$db->dbescape($data['ketquaxetnghiem']).",
				".$db->dbescape($data['ctvalue']).",
				".$db->dbescape($data['kuptime']).",
				".$db->dbescape($data['kuserid']).",
				".$db->dbescape($data['kfilepath'])."
			);";
			$idnew = $db->sql_query_insert_id( $sql );
			if ( $idnew > 0 )
			{
				$sql_up = "UPDATE `tbl_bmxn` SET
						`bmaxn` = ".$db->dbescape($data['maxn']).",
						`bngaynhanmau` = ".$db->dbescape($data['ngaynhanmau']).",
						`bgionhanmau` = ".$db->dbescape($data['gionhanmau']).",
						`bngayxetnghiem` = ".$db->dbescape($data['ngayxetnghiem']).",
						`bphuongphapxetnghiem` = ".$db->dbescape($data['phuongphapxetnghiem']).", 
						`bngaytrakqxn` =".$db->dbescape($data['ngaytrakqxn']).",
						`bdonviguimau` = ".$db->dbescape($data['donviguimau']).", 
						`btinhtrangmau` = ".$db->dbescape($data['tinhtrangmau']).", 
						`bketquaxetnghiem` = ".$db->dbescape($data['ketquaxetnghiem']).", 
						`bctvalue` = ".$db->dbescape($data['ctvalue']).", 
						`bkuptime` = ".$db->dbescape($data['kuptime']).", 
						`bkuserid` = ".$db->dbescape($data['kuserid']).",
						`bkfilepath` = ".$db->dbescape($data['kfilepath'])."
					WHERE `mamaubenhpham` = ".$db->dbescape($data['kmamaubenhpham'])."";
				$db->sql_query( $sql_up );
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
		$sql = "DELETE FROM `tbl_kqxn_temp` WHERE `idfile` = '".$fileid."'";
		$db->sql_query( $sql );
		//gửi mail
		$body = "Hệ thống đã cập nhật thêm <strong>".$num_i."</strong> bản ghi về KQXN, số bản ghi không cập nhật do trùng được là <strong>".count($trung)."</strong> bản ghi.<br/>\n\n";
		$_SESSION[$fileid] = $body;
		
		Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=detail&tp=2&idf=".$fileid);
		die();
	}
}
	
$layout = "fnkqxn.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );


$sql = "SELECT * FROM `tbl_kqxn_temp` WHERE `idfile` = '".$fileid."' ORDER BY `kid` ASC";
$result = $db->sql_query( $sql );
$i = 1;	
$i_trung = 0;
$ser ='<span style="color: red">Error</span>'; 

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $i;
	$row['bg'] = ($i%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['kuptime'] = date('d/m/Y H:i:s',$row['kuptime']);
	$row['ngayxetnghiem'] = ($row['ngayxetnghiem']>0)? date('d/m/Y',$row['ngayxetnghiem']) : "-";
	$row['ngaytrakqxn'] = ($row['ngaytrakqxn']>0)? date('d/m/Y',$row['ngaytrakqxn']) : "-";
	$row['ngaynhanmau'] = ($row['ngaynhanmau']>0)? date('d/m/Y',$row['ngaynhanmau']) : "-";
	if ( check_duplicate_kqxn($row['kmamaubenhpham'],$row['phuongphapxetnghiem'],$row['donviguimau'],$row['ketquaxetnghiem']) )
	{
		$row['bg'] = 'style="background:#FBB"';	
		$i_trung++;
	}
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