<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

// toi trang
$error = 0;
if ( $Request->GetInt( "post", "post", 0 ) == 1)
{
	$table = "tbl_profile";
	$username = $Request->GetString( "username", "post", '' );
	$password = $Request->GetString( "password", "post", '' );
	$sql = "SELECT * FROM ".$table." WHERE `s_username` = " . $db->dbescape($username) . " AND s_password =" . $db->dbescape(md5($password));
    $result = $db->sql_query( $sql ); 
    $data = $db->sql_fetchrow( $result, 2 ); 
    if ( !empty($data)) 
    {
    	$_SESSION['is_login'] = TRUE;
    	$_SESSION['userid'] = $data['s_id'];
    	$sql = "INSERT INTO `tbl_profile_logs`  (`id`, `userid`, `logintime`, `ip`) VALUES (NULL, ".$data['s_id'].", ".DF_CURRENTTIME.", ".$db->dbescape($_SERVER['REMOTE_ADDR'])."); ";
    	$result = $db->sql_query( $sql );
		if( isset($_SESSION['idv']) )
		{
			$id = $_SESSION['idv'];
			if( $id > 0 )
			{
				$link = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=regis&id=".$id.'&ck='.md5($id.$_SESSION['userid']);;
				header( "Location: " . $link . "" );
				die();
			}
		}
		header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=main" );
    	die();
    }
    else 
    {
    	$error = 1;
    }
}

$layout = "login.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'PAGE_TITLE', $global_lang['login_title'] );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'LANG', $global_lang );
$content = "";	
if ($error == 1)
{
	$xtpl->parse( 'main.error' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );
/*
if ( $Request->GetInt( "begin", "get", 0 ) == 0 )
{
	if ($error == 1)
	{
		$xtpl->parse( 'main.error' );
	}
	$xtpl->parse( 'main' );
	$content = $xtpl->text( 'main' );
}
elseif ( $Request->GetInt( "begin", "get", 0 ) == 1 )
{
	$xtpl->parse( 'beg' );
	$content = $xtpl->text( 'beg' );
}
*/
echo login_theme( $content );

?>