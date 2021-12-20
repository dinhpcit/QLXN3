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

global $array_gender;
$array_gender = array( 1 => 'Nam', 2 => "Nữ", "3" => "Khác" );

$array_tinhthanh = array();
$sql = "SELECT * FROM `tbl_diachi_tinhthanh`";
$array_tinhthanh = fn_db_cache( $sql, 'matinhthanh', $module );

function check_insert_user($email) {
	global $db;
	$sql = "SELECT `s_id` FROM `tbl_profile` WHERE `s_email` = " . $db->dbescape($email);
    $result = $db->sql_query( $sql );
    $num = $db->sql_numrows($result); 
    if ( $num > 0) 
    {
    	return true;
    }
    else return false;
}
function check_insert_username($s_username) {
	global $db;
	$sql = "SELECT `s_id` FROM `tbl_profile` WHERE `s_username` = " . $db->dbescape($s_username);
    $result = $db->sql_query( $sql );
    $num = $db->sql_numrows($result); 
    if ( $num > 0) 
    {
    	return true;
    }
    else return false;
}

?>