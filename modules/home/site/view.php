<?php
if ( ! defined( 'DF_IS_USER' ) && ! defined( 'DF_IS_ADMIN' ) )
{
    header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

$id = $Request->GetInt( "id", "get", 0);
$ck = $Request->GetString( "ck", "get", '');

if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');

if($id > 0){
	$sql = "SELECT * FROM `tbl_register` WHERE `id` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
	if(!empty($data['phieuxn']))
	{
        $data['filepxn'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=1&id=".$data['id']."&ck=".md5($data['id'].$user_info['s_id']);
	}
	if(!empty($data['baocaocb']))
	{
        $data['filebc'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=2&id=".$data['id']."&ck=".md5($data['id'].$user_info['s_id']);
	}
}

$layout = "view.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );
$xtpl->assign( 'doituonglaymau', drawselect_status("doituonglaymau", $array_doituong, $doituonglm,"","","chosen-select") );

$xtpl->assign( 'DATA', $data ); 
if(!empty($data['phieuxn']))
{
	$xtpl->parse( 'main.phieuxn' );
}
if(!empty($data['baocaocb']))
{
	$xtpl->parse( 'main.baocaocb' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo none_theme( $content );

?>