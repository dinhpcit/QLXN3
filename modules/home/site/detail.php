<?php

$layout = "detail.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'LANG', $global_lang );

$tp = isset($_GET['tp'])? $_GET['tp'] : "0";

if ( $tp == 0)
{
	$ms = isset($_GET['ms'])? $_GET['ms'] : "";
	$msg = isset($_SESSION[$ms])? $_SESSION[$ms] : "";
	if(!empty($msg )) $xtpl->assign( 'MG', $msg );
	unset($_SESSION[$ms]);
}
elseif ( $tp == "2")
{
	$ms = isset($_GET['idf'])? $_GET['idf'] : "";
	$msg = isset($_SESSION[$ms])? $_SESSION[$ms] : "";
	if(!empty($msg )) $xtpl->assign( 'MG', $msg );
	unset($_SESSION[$ms]);
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>