<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( defined( 'DF_IS_ADMIN' ) ) 
{
	$_SESSION['is_alogin'] = false;
	$sql = "UPDATE `tbl_moderator` SET `u_last_login` =".DF_CURRENTTIME." WHERE `u_id` = " . $db->dbescape($admin_info['u_id']);
    $result = $db->sql_query( $sql ); 
}

header( "Location: " . DF_BASE_ADMINURL . "index.php?" );
die();

?>