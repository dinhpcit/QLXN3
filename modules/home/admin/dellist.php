<?php
//delete

if ( !$main_permission[$module]["del"] == 1 && !$main_permission[$module]["full"] == 1 ) 
{
	die('stop!!!');
}

$bmangay = $Request->GetString( "bmangay", "post", '' );
//$bmadonvi = $Request->GetString( "bmadonvi", "post", '' );
//$bchukyma = $Request->GetString( "bchukyma", "post", '' );
$bmatt = $Request->GetInt( "bmatt", "post", '' );
$ematt = $Request->GetInt( "ematt", "post", '' );

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	if ( !empty($bmangay) && !empty($bmatt) && !empty($ematt) ) 
	{
		$mabp = $bmangay;
		$sql_up = "INSERT INTO `tbl_bmxn_del` SELECT * FROM `tbl_bmxn` WHERE ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";
		$db->sql_query( $sql_up );
		$sql_dl = "DELETE FROM `tbl_bmxn` WHERE ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";
		$db->sql_query( $sql_dl );	
		Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main");
		die();
	}
}

$layout = "dellist.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'LANG', $global_lang );

$xtpl->assign( 'bmangay', $bmangay );
$xtpl->assign( 'bmadonvi', $bmadonvi );
$xtpl->assign( 'bchukyma', $bchukyma );
$xtpl->assign( 'bmatt', $bmatt );
$xtpl->assign( 'ematt', $ematt );


$mabp = $bmangay;

$num = 0;
$anum = 0;
if ( !empty($bmangay) && !empty($bmatt) && !empty($ematt) ) 
{
	$sql = "SELECT * FROM `tbl_bmxn` WHERE ( `mamaubenhpham` LIKE '%".$db->dblikeescape($mabp)."%' ) AND ( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." ) ORDER BY `matt` DESC";
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

//th??m
if ( $main_permission['home']["add"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.add' );
}
//export
if ( $main_permission['home']["extend"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.extend' );
	$xtpl->parse( 'main.extend2' );
}
//del
if ( $main_permission[$module]["del"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.del' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>