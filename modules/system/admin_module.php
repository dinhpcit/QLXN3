<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( !defined( 'DF_IS_ADMIN' ) ) 
{
	header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

$array_lang = array("VI" => "Tiếng Việt","EN" => "English");
global $array_tinhthanh;
$array_tinhthanh = array();
$sql = "SELECT * FROM `tbl_diachi_tinhthanh`";
$array_tinhthanh = fn_db_cache( $sql, 'matinhthanh', $module );

?>