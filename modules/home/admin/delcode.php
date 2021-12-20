<?php

if ( !$main_permission[$module]["del"] == 1 && !$main_permission[$module]["full"] == 1 ) 
{
	die('stop!!!');
}

//delete
$array_thaotac = array("01"=>"Xóa mã theo ID đơn thuần", "02" => "Xóa mã và xóa tất cả các bản trong mẫu gộp");
$thaotac = "01";
$lid  = "";
$lck = "";
if ( $Request->GetInt( "del", "post", 0 ) == 1)
{
	$lid = $Request->GetString( "lid", "post", '');
	$lck = $Request->GetString( "lck", "post", '');
	
	$array_id = explode(",",$lid);
	$array_ck = explode(",",$lck);

	$i=0;
	foreach ( $array_id as $id )
	{
		if( $array_ck[$i] != md5($id.$user_info['s_id']) ) die('stop!!!');
		$i++;
	}
}

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$thaotac = $Request->GetString( "thaotac", "post", '' );
	if($thaotac == "01")
	{
		$lids = $Request->GetString( "lids", "post", '');
		if (!empty($lids))
		{
			$sql_up = "INSERT INTO `tbl_bmxn_del` SELECT * FROM `tbl_bmxn` WHERE `tbl_bmxn`.`id` IN (".$lids.");";
			$db->sql_query( $sql_up ); 	
			$sql_dl = "DELETE FROM `tbl_bmxn` WHERE `tbl_bmxn`.`id` IN (".$lids.");";
			$db->sql_query( $sql_dl ); 	
		}
	}
	elseif ($thaotac == "02")
	{
		$lmid = $Request->GetString( "lmid", "post", '');
		if (!empty($lmid))
		{
			$sql_up = "INSERT INTO `tbl_bmxn_del` SELECT * FROM `tbl_bmxn` WHERE `tbl_bmxn`.`mamaubenhpham` IN (".$lmid.");";
			$db->sql_query( $sql_up ); 	
			$sql_dl = "DELETE FROM `tbl_bmxn` WHERE `tbl_bmxn`.`mamaubenhpham` IN (".$lmid.");";
			$db->sql_query( $sql_dl ); 
		}
	}
	Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main");
	die();
}

$layout = "delcode.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );
$xtpl->assign( 'DATA', $data );
$xtpl->assign( 'thaotac', drawradio_status("thaotac", $array_thaotac, $thaotac) );

$num = 0;
$anum = 0;

if (!empty($lid))
{
	$array_code = array();
	$sql = "SELECT `id`, `mamaubenhpham`, `hovaten`, `namsinh` FROM `tbl_bmxn` WHERE `id` IN (".$lid.") GROUP BY `mamaubenhpham` ";
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$xtpl->assign( 'ROW', $row );
		$xtpl->parse( 'main.loop' );
		$num = $num+1;	
		$array_code[$row['mamaubenhpham']] = $row['id'];
	}
	$code_text = '';
	$i=1;
	foreach ( $array_code as $code_i => $id_i )
	{
		if($i==1) $code_text = "'".$code_i."'";
		else $code_text .= ",'".$code_i."'";
		$i++;
	}
	$sql = "SELECT * FROM `tbl_bmxn` WHERE `mamaubenhpham` IN (".$code_text.")";
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$xtpl->assign( 'ROW', $row );
		$xtpl->parse( 'main.aloop' );
		$anum = $anum+1;	
	}
	$xtpl->assign( 'datacode', $code_text );
	$xtpl->assign( 'lids', $lid  );
}
$xtpl->assign( 'num', $num );
$xtpl->assign( 'anum', $anum );

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>