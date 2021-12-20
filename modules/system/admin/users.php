<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
 
$id = $Request->GetInt( "pid", "get", 0 );

if ( $Request->GetInt( "del", "get", 0 ) == 1)
{
	$s_id = $Request->GetInt( "sid", "get", 0 );
	$sql = "DELETE FROM `tbl_profile_tmp` WHERE s_id = ".$s_id."";
	$result = $db->sql_query( $sql ); 
	die();
}

$layout = "users.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$xtpl->assign( 'link_main', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
$xtpl->assign( 'link_user', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=users" );
$xtpl->assign( 'link_mod', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=mod" );
$array_program = array();  $programid = 0;
$sql = "SELECT * FROM `tbl_profile_tmp` WHERE 1 ORDER BY `s_date` DESC ";
$result = $db->sql_query( $sql );
$i=1;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['s_date'] = date('d/m/Y',$row['s_date']);
	$row['no'] = $i;
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.loop' );
	$i++;
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>