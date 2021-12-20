<?php

$uid = $Request->GetInt( "uid", "get", 0 );
$ck = $Request->GetString( "ck", "get", 0 );

$user_permission = array ();
if ( $uid > 0 )
{
	$ck = $Request->GetString( "ck", "get", '' );
	if ( $ck != md5($uid.$admin_info['u_id']) ) die('stop!!');
	////////////////////////////////
	$sql = "SELECT * FROM tbl_moderator WHERE u_id= ".intval($uid)."";
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
	if ( !empty( $data['u_permision'] ) ) 
	{
		$user_permission = unserialize( $data['u_permision'] );
		if (!is_array($user_permission)) 
		{
			$user_permission = array();
		}
	}
}
////////////////////////////////	
if ( empty($data) )
{
	$data = array( "u_id" => 0 , "u_name" => "" , "u_username" => "", "u_password" => "", "u_email" => "", "u_permision" => "0", "u_group" => "", "u_last_login" => 0  );
}

$error = "";
$action = 0;
if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['u_name'] = $Request->GetString( "u_name", "post", "" );
	$data['u_username'] = $Request->GetString( "u_username", "post", "" );
	$data['u_email'] = trim( $Request->GetString( "u_email", "post", "" ) );
	$data['u_password'] = $Request->GetString( "u_password", "post", '' );
	$data['u_apassword'] = $Request->GetString( "u_apassword", "post", '' );
	$u_check = $Request->GetInt( "u_check", "post", 0 );
	
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
	
	if ( $uid == 0 )
	{
		if ( empty($data['u_name']) ) $error = "Error: Bạn chưa điền họ tên";
		elseif ( empty( $data['u_username'] ) ) $error = "Error: Bạn chưa điền tên đăng nhập";
		elseif ( empty( $data['u_email'] ) ) $error = "Error: Chưa có email";
		elseif ( empty( $data['u_password'] ) ) $error = "Error: Bạn chưa điền mật khẩu";
		elseif ( $data['u_apassword'] != $data['u_password'] ) $error = "Error: mật khẩu nhập lại chưa đúng";
		else
		{
			$sql = "INSERT INTO `tbl_moderator` (`u_id`, `u_name`, `u_username`, `u_password`, `u_email`, `u_permision`, `u_group`, `u_last_login`) 
					VALUES (NULL, " . $db->dbescape( $data['u_name'] ) . ", " . $db->dbescape( $data['u_username'] ) . ", " . $db->dbescape( md5( $data['u_password'] ) ) . ", " . $db->dbescape( $data['u_email'] ) . ", " . $db->dbescape( $data['u_permision'] ) . ",'',0 );";
			$idnew = $db->sql_query_insert_id( $sql ); 
			if ( $idnew > 0 ) 	
			{
				$action = 1;	
			}
		}
	}
	if ( $uid > 0 )
	{
		if ( $u_check == 0 )
		{
			if ( empty($data['u_name']) ) $error = "Error: Bạn chưa điền họ tên";
			elseif ( empty( $data['u_username'] ) ) $error = "Error: Bạn chưa điền tên đăng nhập";
			elseif ( empty( $data['u_email'] ) ) $error = "Error: Chưa có email";
			else
			{
				$sql = "UPDATE `tbl_moderator` SET 
						`u_name` = " . $db->dbescape( $data['u_name'] ) . ", 
						`u_username` = " . $db->dbescape( $data['u_username'] ) . ", 
						`u_email` = " . $db->dbescape( $data['u_email'] ) . ",
						`u_permision` = " . $db->dbescape( $data['u_permision'] ) . "
						WHERE u_id = ".$uid."";
				$db->sql_query( $sql );
				$action = 1;
			}
		}
		else
		{
			if ( empty($data['u_name']) ) $error = "Error: Bạn chưa điền họ tên";
			elseif ( empty( $data['u_username'] ) ) $error = "Error: Bạn chưa điền tên đăng nhập";
			elseif ( empty( $data['u_email'] ) ) $error = "Error: Chưa có email";
			elseif ( empty( $data['u_password'] ) ) $error = "Error: Bạn chưa điền mật khẩu";
			elseif ( $data['u_apassword'] != $data['u_password'] ) $error = "Error: mật khẩu nhập lại chưa đúng";
			else
			{
				$sql = "UPDATE `tbl_moderator` SET 
						`u_name` = " . $db->dbescape( $data['u_name'] ) . ", 
						`u_username` = " . $db->dbescape( $data['u_username'] ) . ", 
						`u_email` = " . $db->dbescape( $data['u_email'] ) . ",
						`u_password` = ". $db->dbescape( md5( $data['u_password'] ) )."
						WHERE u_id = ".$uid."";
				$db->sql_query( $sql ); 
				$action = 1;
			}
		}	
	}
}

$javascript .= GetSiteJavscriptModule( 'site.js' );
$css .= GetSiteCssModule( $module . '.css' );

if ( empty( $user_permission ) ) $user_permission = $modules_permission;

$layout = "addmod.tpl";
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

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
if( $uid > 0 )
{
	$xtpl->parse( 'main.change' );	
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;

?>