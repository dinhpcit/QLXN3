<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( defined( 'DF_IS_USER' ) ) 
{
	$_SESSION['is_login'] = false;
	$userid = isset( $_SESSION['userid'] ) ? $_SESSION['userid'] : 0; 
	$sql = "UPDATE tbl_profile SET `s_last_time` =".DF_CURRENTTIME." WHERE `s_id` = " . $db->dbescape($userid);
    $result = $db->sql_query( $sql );    
}

header( "Location: " . DF_BASE_SITEURL . ""  );

?>