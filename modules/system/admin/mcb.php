<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
$page = $Request->GetInt( 'page', 'get', 0 );
$per_page = 30;
$layout = "mcb.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$table_name = "tbl_config";	

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['value'] = $Request->GetString( "value", "post", "" );

	$sql = "UPDATE `".$table_name."` SET
			`value` = " . $db->dbescape( $data['value'] ) . "
			WHERE id = 1";
	$db->sql_query( $sql );
	header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=mcb");
	die();
}

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
$sql = "SELECT * FROM `".$table_name."` WHERE `id` = 1";
$result = $db->sql_query( $sql );
$data = $db->sql_fetchrow( $result, 2 );

$xtpl->assign( 'DATA', $data);

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>