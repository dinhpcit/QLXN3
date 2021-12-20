<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( !defined( 'DF_IS_ADMIN' ) ) 
{
	header( "Location: " . DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}
header( "Location: " . DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=home" );
die();

$content = "";
echo main_theme( $content );

?>