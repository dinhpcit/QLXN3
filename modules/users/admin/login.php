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
	$table = "tbl_moderator";
	$username = $Request->GetString( "username", "post", '' );
	$password = $Request->GetString( "password", "post", '' );
	$sql = "SELECT * FROM ".$table." WHERE `u_username` = " . $db->dbescape($username) . " AND u_password =" . $db->dbescape(md5($password));
    $result = $db->sql_query( $sql ); 
    $data = $db->sql_fetchrow( $result, 2 ); 
    if ( !empty($data)) 
    {
    	$_SESSION['is_alogin'] = TRUE;
    	$_SESSION['adminid'] = $data['u_id'];
		$sql = "UPDATE `tbl_moderator` SET `u_last_login` =".DF_CURRENTTIME." WHERE `u_id` = " . $db->dbescape($data['u_id']);
    	$result = $db->sql_query( $sql ); 
    	header( "Location: " . DF_BASE_ADMINURL . "" );
    	die();
    }
    else 
    {
    	$error = 1;
    }
}

$javascript .= GetSiteJavscriptModule( 'site.js' );
$css .= GetSiteCssModule( $module . '.css' );
$layout = "login.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'THEME_SITE_JS', $javascript );
$xtpl->assign( 'THEME_CSS', $css );
$page_title = !empty($page_title) ? $page_title : $global_lang['page_title'];
$xtpl->assign('PAGE_TITLE', $page_title );
$content = "";	

if ($error == 1)
{
	$xtpl->parse( 'main.error' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;

?>