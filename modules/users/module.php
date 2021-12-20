<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
function check_insert_user($email) {
	global $db;
	$sql = "SELECT s_id FROM `tbl_profile` WHERE s_email = " . $db->dbescape($email);
    $result = $db->sql_query( $sql );
    $num = $db->sql_numrows($result); 
    if ( $num > 0) 
    {
    	return true;
    }
    else return false;
}
function check_insert_user_temp($email) {
	global $db;
	$sql = "SELECT s_id FROM `tbl_profile_tmp` WHERE s_email = " . $db->dbescape($email);
    $result = $db->sql_query( $sql );
    $num = $db->sql_numrows($result); 
    if ( $num > 0) 
    {
    	return true;
    }
    else return false;
}

?>