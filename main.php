<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
error_reporting(0);
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/

ini_set("session.gc_maxlifetime", 24*60*60);//8gio
session_start();

if ( ! defined( 'DF_MAIN_FILE' ) ) die( 'Stop!!!' );
/*
if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
    $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header("Location: $redirect_url");
    exit();
}
*/
define( 'DF_ROOTDIR', pathinfo( str_replace( '\\', '/', __file__ ), PATHINFO_DIRNAME ) );

//Thoi gian bat dau phien lam viec
define( 'DF_START_TIME', array_sum( explode( " ", microtime() ) ) );

//main: begin code
include_once DF_ROOTDIR.'/define.php';
//main: end code

//config: begin code
include_once DF_ROOTDIR.'/'.DF_CONFIG_FILENAME;
//config: end code

//xtemplate: begin code
include_once DF_ROOTDIR.'/includes/class/class.xtemplate.php';
//xtemplate: end code

//request: begin code
include_once DF_ROOTDIR.'/includes/class/class.request.php';
//request: end code

//mysql: begin code
global $db_config,$db; 
include_once DF_ROOTDIR.'/includes/class/class.mysql.php';
$db_config['new_link'] = DF_MYSQL_NEW_LINK;
$db_config['persistency'] = DF_MYSQL_PERSISTENCY;
$db = new sql_db( $db_config );
if ( ! empty( $db->error ) )
{
    $msg = ! empty( $db->error['user_message'] ) ? $db->error['user_message'] : $db->error['message'];
    $msg .= ! empty( $db->error['code'] ) ? ' (Code: ' . $db->error['code'] . ')' : '';
    //trigger_error( $msg, 256 );
}
unset( $db_config['dbpass'] );
//mysql: end code

global $Request; 
$Request = new Request();

//function: begin code
include_once DF_ROOTDIR.'/includes/function.php';
//function: end code
//cache: begin code
include_once DF_ROOTDIR.'/includes/class/class.cache.fns.php';
//cache: end code
//modules: begin code
include_once DF_ROOTDIR.'/includes/modules.php';
//modules: end code

global $user_info,$user_permission;
$user_permission = $user_info = array();
$login = isset( $_SESSION['is_login'] ) ? $_SESSION['is_login'] : false;

if ( $login ) define( "DF_IS_USER", TRUE );

if ( defined( 'DF_IS_USER' ) )
{
	$userid = isset( $_SESSION['userid'] ) ? $_SESSION['userid'] : 0; 
	$sql = "SELECT * FROM tbl_profile WHERE `s_id` = " . $db->dbescape($userid);
    $result = $db->sql_query( $sql ); 
    $user_info = $db->sql_fetchrow( $result, 2 );
	if ( !empty( $user_info['u_permision'] ) ) 
	{
		$user_permission = unserialize( $user_info['u_permision'] );
		if (!is_array($user_permission)) 
		{
			$user_permission = array();
		}
	}
}

global $admin_info,$main_permission,$global_config;
$main_permission = $admin_info = $global_config = array();
$login = isset( $_SESSION['is_alogin'] ) ? $_SESSION['is_alogin'] : false;

if ( $login ) define( "DF_IS_ADMIN", TRUE );

if ( defined( 'DF_IS_ADMIN' ) )
{
	$adminid = isset( $_SESSION['adminid'] ) ? $_SESSION['adminid'] : 0; 
	$sql = "SELECT * FROM tbl_moderator WHERE `u_id` = " . $db->dbescape($adminid);
    $result = $db->sql_query( $sql ); 
    $admin_info = $db->sql_fetchrow( $result, 2 );
	if ( !empty( $admin_info['u_permision'] ) ) 
	{
		$main_permission = unserialize( $admin_info['u_permision'] );
		if (!is_array($main_permission)) 
		{
			$main_permission = array();
		}
	}
}
//getconfig
$sql = "SELECT * FROM `tbl_config` WHERE 1";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
    $global_config[$row['name']] = $row;
}

savelog($user_info,$admin_info);

?>