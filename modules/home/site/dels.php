<?php
//delete
die('stop!!!');
if ( !$user_permission[$module]["del"] == 1 && !$user_permission[$module]["full"] == 1 ) 
{
	die('stop!!!');
}

$bmangay = $Request->GetString( "bmangay", "post", '' );
$bmadonvi = $Request->GetString( "bmadonvi", "post", '' );
$bchukyma = $Request->GetString( "bchukyma", "post", '' );
$bmatt = $Request->GetInt( "bmatt", "post", '' );
$ematt = $Request->GetInt( "ematt", "post", '' );

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	if ( !empty($bmangay) && !empty($bmadonvi) && !empty($bchukyma) && !empty($bmatt) && !empty($ematt) ) 
	{
		$mabp = $bmangay.$bchukyma.'.'.$bmadonvi;
		$sql_up = "INSERT INTO `tbl_bmxn_del` SELECT * FROM `tbl_bmxn` WHERE `labcode` = ".$user_info['s_id']." AND ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";
		$db->sql_query( $sql_up );
		$sql_dl = "DELETE FROM `tbl_bmxn` WHERE `labcode` = ".$user_info['s_id']." AND ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";
		$db->sql_query( $sql_dl );	
		Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main");
		die();
	}
}

$layout = "dels.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'LANG', $global_lang );

$xtpl->assign( 'bmangay', $bmangay );
$xtpl->assign( 'bmadonvi', $bmadonvi );
$xtpl->assign( 'bchukyma', $bchukyma );
$xtpl->assign( 'bmatt', $bmatt );
$xtpl->assign( 'ematt', $ematt );


$mabp = $bmangay.$bchukyma.'.'.$bmadonvi;

$num = 0;
$anum = 0;
if ( !empty($bmangay) && !empty($bmadonvi) && !empty($bchukyma) && !empty($bmatt) && !empty($ematt) ) 
{
	$sql = "SELECT * FROM `tbl_bmxn` WHERE `labcode` = ".$user_info['s_id']." AND ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$xtpl->assign( 'ROW', $row );
		$xtpl->parse( 'main.aloop' );
		$anum = $anum+1;	
	}
	
	$xtpl->assign( 'anum', $anum );
	if( $anum > 0 ) $xtpl->parse( 'main.delete' );
}

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>