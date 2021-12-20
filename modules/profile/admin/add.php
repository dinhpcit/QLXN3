<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

$error = "";
$action = 0;
if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['s_username'] = $Request->GetString( "s_username", "post", "" );
    $data['s_name'] = $Request->GetString( "s_name", "post", "" );
	$data['s_email'] = trim( $Request->GetString( "s_email", "post", "" ) );
	$data['address'] = implode(",", $_POST['address']);
    $data['s_code'] = $Request->GetString( "s_code", "post", "" );
    
	$s_password = $Request->GetString( "s_password", "post", '' );
	$s_apassword = $Request->GetString( "s_apassword", "post", '' );
	$chang_pass = $Request->GetInt( "chang_pass", "post", 0 );
	 
	$user_permission = $modules_permission;
	foreach ( $user_permission as $mod => $permission )
	{
		$user_permission[$mod]['add'] = $Request->GetInt( $mod."_add", "post", 0 );
		$user_permission[$mod]['edit'] = $Request->GetInt( $mod."_edit", "post", 0 );
		$user_permission[$mod]['del'] = $Request->GetInt( $mod."_del", "post", 0 );
		$user_permission[$mod]['view'] = $Request->GetInt( $mod."_view", "post", 0 );
		$user_permission[$mod]['full'] = $Request->GetInt( $mod."_full", "post", 0 );
		$user_permission[$mod]['extend'] = $Request->GetString( $mod."_extend", "post", 0 );
	}
	$data['u_permision'] = serialize($user_permission);
	
	if ( empty($data['s_username']) ) $error = "Error: Bạn chưa điền tên đăng nhập";
    elseif ( empty($data['s_name']) ) $error = "Error: Bạn chưa điền tên người dùng";
	elseif ( empty( $data['s_email'] ) ) $error = "Error: Chưa có email";
	elseif( check_insert_username($s_username) ) 
    {
        $error = "Error/ Lỗi: Your Username has been used by another account/ Tên đăng nhập này đã có người sử dụng.";
    }
    elseif( check_insert_user($data['s_email']) )
	{
		$error = "Error/ Lỗi: Your email has been used by another account/ Email này đã có người sử dụng.";
	}
	elseif ( $s_password == '' ) $error = "Error: Bạn chưa điền mật khẩu";
	elseif ( $s_apassword != $s_password ) $error = "Error: Mật khẩu xác nhận lại chưa đúng";
	if( empty($error) )
	{
		$sql = "INSERT INTO `tbl_profile` (`s_id`,`s_username`, `s_name`, `s_password`, `s_email`,  `s_regtime`, `s_last_time`, `u_permision`, `address`,`s_code`) 
			VALUES (NULL, 
			" . $db->dbescape( $data['s_username'] ) . ",
            " . $db->dbescape( $data['s_name'] ) . ", 
			" . $db->dbescape( md5($s_password) ) . ",  
			" . $db->dbescape( $data['s_email'] ) . ",
			".DF_CURRENTTIME.",
			".DF_CURRENTTIME.",  
			" . $db->dbescape( $data['u_permision'] ) . ",  
			" . $db->dbescape( $data['address'] ) . ",
			" . $db->dbescape( $data['s_code'] ) . "
		);";
		$idnew = $db->sql_query_insert_id( $sql ); 
		if ( $idnew > 0 ) 	
		{
			$action = 1;	
		}
		fn_delete_all_cache ( );
	}
}

$javascript .= GetSiteJavscriptModule( 'site.js' );
$css .= GetSiteCssModule( $module . '.css' );

if ( empty( $user_permission ) ) $user_permission = $modules_permission;

$layout = "add.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
if ( $action == 1 )
{
	$xtpl->parse( 'main.close' );	
}
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'THEME_SITE_JS', $javascript );
$xtpl->assign( 'THEME_CSS', $css );
$xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
$xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
$xtpl->assign('module',$module );
$xtpl->assign('DATA',$data );

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
foreach ( $user_permission as $mod => $permission )
{
	$permission['module_title'] = $modules_site[$mod]['title'];
	$permission['module'] = $modules_site[$mod]['name'];
	$permission['add_check'] = ( $permission['add'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['edit_check'] = ( $permission['edit'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['del_check'] = ( $permission['del'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['view_check'] = ( $permission['view'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['full_check'] = ( $permission['full'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['extend_check'] = ( $permission['extend'] == 1 ) ? 'checked="checked"' : '' ;
	$permission['disable'] = ( $permission['full'] == 1 ) ? 'disabled="disabled"' : '' ;
	$xtpl->assign( 'PERM', $permission );
	$xtpl->parse( 'main.perm' );	
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;
exit();

?>