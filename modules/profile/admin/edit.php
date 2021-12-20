<?php
 
$ac = $Request->GetString( "ac", "get", '' ); 
if ( $ac == 'del' && $sid > 0 )
{
	$ck = $Request->GetString( "ck", "get", '' );  
	if ( $ck != md5($sid.$admin_info['u_id']) ) die('stop!!!');
	$sql = "DELETE FROM tbl_profile WHERE `s_id`= ".intval($sid).""; 
	$db->sql_query( $sql ); 
	exit();
}

$ck = $Request->GetString( "ck", "get", '' ); 
$sid = $Request->GetInt( "sid", "get", 0 ); 
if( $ck != md5($sid.$admin_info['u_id']) ) die('stop!!!');
////////////////////////////////
if( $sid > 0 )
{
    $sql = "SELECT * FROM `tbl_profile` WHERE s_id= ".intval($sid)."";
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

$error = "";
$action = 0;
if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
    $data['s_name'] = $Request->GetString( "s_name", "post", "" );
	$s_email = trim( $Request->GetString( "s_email", "post", "" ) );
	$data['s_code'] = trim( $Request->GetString( "s_code", "post", "0" ) ); 
	$data['address'] = implode(",", $_POST['address']);

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
	elseif ( empty( $s_email ) ) $error = "Error: Chưa có email";
	elseif( check_insert_username($s_username) ) 
    {
        $error = "Error/ Lỗi: Your Username has been used by another account/ Tên đăng nhập này đã có người sử dụng.";
    }
    elseif( $data['s_email'] != $s_email  )
	{
		if( check_insert_user($s_email) ) $error = "Error/ Lỗi: Your email has been used by another account/ Email này đã có người sử dụng.";
        else $data['s_email'] = $s_email;
	}
    
	if( $chang_pass == 1 )
	{
		if ( $s_password == '' ) $error = "Error: Bạn chưa điền mật khẩu";
		elseif ( $s_apassword != $s_password ) $error = "Error: Mật khẩu xác nhận lại chưa đúng";
	}
	if( empty($error) )
	{
		$sql = "UPDATE tbl_profile SET	
			`s_name` = " . $db->dbescape( $data['s_name'] ) . ",
			`s_email` = " . $db->dbescape( $data['s_email'] ) . ",
			`u_permision` = " . $db->dbescape( $data['u_permision'] ) . ",
			`s_code` = " . $db->dbescape( $data['s_code'] ) . ",
			`address` = " . $db->dbescape( $data['address'] ) . "
		WHERE `s_id`= ".intval($sid)."";
		$db->sql_query( $sql ); 
		if ( $chang_pass == 1 )
		{
			$sql = "UPDATE tbl_profile SET	`s_password` = " . $db->dbescape( md5($s_password) ) . " WHERE `s_id`= ".intval($sid)."";
			$db->sql_query( $sql ); 
		}
		$action = 1;
		fn_delete_all_cache ( );
	}
}

$javascript .= GetSiteJavscriptModule( 'admin.js' );

if ( empty( $user_permission ) ) $user_permission = $modules_permission;

$layout = "edit.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
if ( $action == 1 )
{
	$xtpl->parse( 'main.close' );	
}
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'THEME_SITE_JS', $javascript );
$xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
$xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
$xtpl->assign('module',$module );
$xtpl->assign('DATA',$data );

$array_tk = ( !empty($data['address']) )? explode(",",$data['address']) :array();
if ( !empty($array_tk[0]) ) $xtpl->assign('check'.$array_tk[0],'checked' );
if ( !empty($array_tk[1]) ) $xtpl->assign('check'.$array_tk[1],'checked' );
if ( !empty($array_tk[2]) ) $xtpl->assign('check'.$array_tk[2],'checked' );

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

foreach ( $array_tinhthanh as $row )
{
	$row['no'] = $i;
	$row['select'] = ($row['matinhthanh'] == $data['address']) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.tinhthanh' );
	$i++;
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;
exit();

?>