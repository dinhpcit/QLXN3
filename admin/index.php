<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

define( "DF_MAIN_FILE", TRUE );

//include: begin code:
include_once '../main.php';
//include: end code:
$global_config ['site_url'] = curPageName();
//theme: begin code:
$global_config ['site_theme'] = 'admin_default';
if ( file_exists( DF_ROOTDIR.'/themes/'.$global_config ['site_theme'].'/theme.php' ) )
{
	include_once DF_ROOTDIR.'/themes/'.$global_config ['site_theme'].'/theme.php';
}

//module: end code:
global $javascript,$css,$array_block;
global $module,$function,$lang_data;
$module = $Request->GetString("mod","get","home");
$function = $Request->GetString("fun","get","main");
$language = $Request->GetString("language","get","vi");
//////////////////////////////////
define( "DF_LANG_DATA", 'V' );
//////////////////////////////////////////
if ( file_exists( DF_ROOTDIR."/modules/".$module."/admin_module.php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/admin_module.php";
}
if ( file_exists( DF_ROOTDIR."/modules/".$module."/language/admin_".$language.".php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/language/admin_".$language.".php";
}
if ( file_exists( DF_ROOTDIR."/modules/".$module."/admin/".$function.".php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/admin/".$function.".php";
}
else
{
	echo "not found!";
}

?>