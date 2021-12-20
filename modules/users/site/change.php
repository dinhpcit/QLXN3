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

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	$s_passo = $Request->GetString( "S_OPASSWORD", "post", '' );
	$s_pass = $Request->GetString( "S_PASSWORD", "post", '' );
	$s_passa = $Request->GetString( "S_PASSWORD_AGAIN", "post", '' );
	
	$sql = "SELECT * FROM tbl_profile WHERE `s_id` = " . $db->dbescape($user_info['s_id'])." AND `s_password` =" . $db->dbescape(md5($s_passo));
    $result = $db->sql_query( $sql ); 
    $num_info = $db->sql_numrows( $result ); 
	if( empty( $s_passo ) )
	{
		$error = "Error: Mật khẩu cũ không được để trống";
	} 
	elseif ( $num_info == 0 )
	{
		$error = "Error: Mật khẩu cũ nhập không đúng";
	}
	elseif( strlen($s_pass) < 6 ) 
	{
		$error = "Error: Mật khẩu không được ít hơn 6 ký tự";
	}
	elseif( $s_pass !=$s_passa ) 
	{
		$error = "Error: Mật khẩu nhập lại không đúng";
	}
	elseif (!check_capchar($cap))
	{
		$error = "Error: Chuỗi an ninh không đúng";
	}
	else
	{
		$sql = "UPDATE `tbl_profile` SET `S_PASSWORD` = ".$db->dbescape(md5($s_pass))." WHERE s_id=".$user_info['s_id'];
    	$db->sql_query($sql); 
    	$error = "Đổi mật khẩu thành công";
	}
}

$layout = "change.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/".$module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
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