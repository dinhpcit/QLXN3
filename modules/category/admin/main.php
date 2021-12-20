<?php

$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );

$xtpl->assign( 'link_noinhiem', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=noinhiem" );
$xtpl->assign( 'link_group', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=group" );
$xtpl->assign( 'link_kcn', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=kcn" );
$xtpl->assign( 'link_job', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=job" );
$xtpl->assign( 'link_hospital', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=hospital" );
$xtpl->assign( 'link_type', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=type" );
$xtpl->assign( 'link_mcb', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=mcb" );

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>