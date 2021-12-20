<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( !defined( 'DF_IS_USER' ) ) 
{
	header( "Location: " . DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}
$error = "";
//msg
if ( $Request->GetInt( "pass", "post", 0 ) == 1)
{
	$password = $Request->GetString( "password", "post", '' );
	$apassword = $Request->GetString( "apassword", "post", '' );
	if (!empty($password))
	{
		if ( $password != $apassword )
		{
			$error = "Mật khẩu nhập lại không đúng!";
		}
		else
		{
			$userid = isset( $_SESSION['userid'] ) ? $_SESSION['userid'] : 0; 
			$sql = "UPDATE `" . DF_FIRST_TABLE . "_users` SET password='".md5($password)."' WHERE `id` = " . $db->dbescape($userid);
		    $result = $db->sql_query( $sql ); 
	    	$error = "Đổi mật khẩu thành công!";
		}
	}
	else
	{
		$error = "Mật khẩu nhập lại không đúng!";
	}
}
$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/".$module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$user_info['lasttime_tem'] = ($user_info['lasttime']>0) ? date("H:i' d/m/Y",$user_info['lasttime']): "Đăng nhập lần đầu tiên";
$xtpl->assign( 'USER', $user_info );
if ( !empty($error)) 
{
	$xtpl->assign( 'msg', $error );
	$xtpl->parse( 'main.error' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>