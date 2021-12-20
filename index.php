<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
/*
if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
    $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect_url");
    exit();
}
*/

ini_set('default_charset', 'utf-8');
header('Content-Type: charset=utf-8');

define( "DF_MAIN_FILE", TRUE );

//include: begin code:
include_once 'main.php';
//include: end code:
$global_config ['site_url'] = curPageName();

header('Content-Type: text/html; charset=utf-8');

//module: end code:
global $javascript,$css,$array_block;
global $module,$function,$lang_data;
$module = $Request->GetString("mod","get","home");
$function = $Request->GetString("fun","get","main");
$language = $Request->GetString("language","get","vi");
//////////////////////////////////
define( "DF_LANG_DATA", 'vi' );
//////////////////////////////////////////
if ( file_exists( DF_ROOTDIR."/includes/languages/".$language.".php" ) )
{
	include_once DF_ROOTDIR."/includes/languages/".$language.".php";
}
if ( file_exists( DF_ROOTDIR."/modules/".$module."/module.php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/module.php";
}
if ( file_exists( DF_ROOTDIR."/modules/".$module."/language/".$language.".php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/language/".$language.".php";
}
//theme: begin code:
$global_config ['site_theme'] = 'default';
if ( file_exists( DF_ROOTDIR.'/themes/'.$global_config ['site_theme'].'/theme.php' ) )
{
	include_once DF_ROOTDIR.'/themes/'.$global_config ['site_theme'].'/theme.php';
}
//get function
if ( file_exists( DF_ROOTDIR."/modules/".$module."/site/".$function.".php" ) )
{
	include_once DF_ROOTDIR."/modules/".$module."/site/".$function.".php";
}
else
{
	echo "not found!";
}

?>