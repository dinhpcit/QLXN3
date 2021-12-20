<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( defined( 'DF_IS_ADMIN' ) ) 
{
	$_SESSION['is_alogin'] = false;
	$adminid = isset( $_SESSION['adminid'] ) ? $_SESSION['adminid'] : 0; 
	$sql = "UPDATE tbl_moderator SET U_LAST_LOGIN=".date("d/m/Y")." WHERE `U_ID` = " . $db->dbescape($adminid);
    $result = $db->sql_query( $sql ); 
    
	header( "Location: " . DF_BASE_ADMINURL . "index.php?" );
    die();
}

?>