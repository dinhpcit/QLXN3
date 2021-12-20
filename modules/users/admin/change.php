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

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	$s_passo = $Request->GetString( "S_OPASSWORD", "post", '' );
	$s_pass = $Request->GetString( "S_PASSWORD", "post", '' );
	$s_passa = $Request->GetString( "S_PASSWORD_AGAIN", "post", '' );
	
	$sql = "SELECT * FROM  `tbl_moderator` WHERE `u_id` = " . $db->dbescape($admin_info['u_id'])." AND `u_password` =" . $db->dbescape(md5($s_passo));
    $result = $db->sql_query( $sql ); 
    $num_info = $db->sql_numrows( $result ); 
	if( empty( $s_passo ) )
	{
		$error = "Mật khẩu cũ không được để trống";
	} 
	elseif ( $num_info == 0 )
	{
		$error = "Mật khẩu cũ nhập không đúng";
	}
	elseif( $s_pass !=$s_passa ) 
	{
		$error = "Mật khẩu nhập lại không đúng";
	}
	elseif (!check_capchar($cap))
	{
		$error = "Chuỗi an ninh không đúng";
	}
	else
	{
		$sql = "UPDATE `tbl_moderator` SET `u_password` = ".$db->dbescape(md5($s_pass))." WHERE u_id=".$admin_info['u_id'];
    	$db->sql_query($sql); 
    	$error = "Đổi mật khẩu thành công";
	}
}

$layout = "change.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/".$module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$capchar = capchar();
$xtpl->assign( 'capchar', $capchar );
if ( !empty($error)) 
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>