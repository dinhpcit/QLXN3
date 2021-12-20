<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

function main_theme($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$admin_info, $main_permission;
	$javascript .= GetSiteJavscriptModule('admin.js');
    $layout = "layout.body.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
	$xtpl->assign('DF_BASE_ADMINURL',DF_BASE_ADMINURL);
    $xtpl->assign('TEMPLATE',$global_config['site_theme']);
    $xtpl->assign('THEME_SITE_JS',$javascript);
    $xtpl->assign('MODULE_CONTENT',$content);
    $xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
    $xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
    $xtpl->assign('module',$module );
    $xtpl->assign('LEFT', $array_block );
	$page_title = !empty($page_title) ? $page_title : $global_lang['page_title'];
	$xtpl->assign('PAGE_TITLE', $page_title );
    //$xtpl->assign('MENU', main_menu() );
	$xtpl->assign( 'USER', $admin_info ); 
	$xtpl->assign( 'link_main', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=home");
	$xtpl->assign( 'link_user', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=system&" . DF_FUNCTION_VARIABLE . "=users" );
    $xtpl->assign( 'link_config', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=system&" . DF_FUNCTION_VARIABLE . "=config" );
	$xtpl->assign( 'link_mod', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=system&" . DF_FUNCTION_VARIABLE . "=mod" );
	$xtpl->assign( 'link_macb', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=system&" . DF_FUNCTION_VARIABLE . "=mcb" );
	$xtpl->assign( 'link_category', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=category");
	$xtpl->assign( 'link_file', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=file");
	$xtpl->assign( 'link_pro', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=profile");
	$xtpl->assign( 'link_adv', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=dellist" );
	$xtpl->assign( 'link_statistic', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=statistic" );
	//print_r($main_permission); die();
	if( check_permission('home') || $admin_info['u_id'] == "1") $xtpl->parse( 'main.mcb' );
	if( check_permission('file') || $admin_info['u_id'] == "1" ) $xtpl->parse( 'main.hsdt' );
	if( check_permission('category') || $admin_info['u_id'] == "1" || $main_permission['home']["full"] == 1 ) $xtpl->parse( 'main.qldm' );
	if( $admin_info['u_id'] == "1" || $main_permission['home']["full"] == 1 ) $xtpl->parse( 'main.qlnc' );
	if( check_permission('profile') || $admin_info['u_id'] == "1" ) $xtpl->parse( 'main.qltk' );
	if( $admin_info['u_id'] == "1" ) $xtpl->parse( 'main.mod' );
	if ( !empty($global_config['logo']['value']) ) 
	{
		$logo = DF_BASE_SITEURL.DF_UPLOAD_FOLDER."/system/". $global_config['logo']['value'];
		$xtpl->assign('logo', $logo);
		$xtpl->parse( 'main.logo' );
	}
	
    $xtpl->assign('q',$q);
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    return $content;
}
function main_menu()
{
	global $Request,$module,$function,$global_config;
	$layout = "layout.menu.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    foreach ( $array_menu as $menu)
    {
    	$menu['select'] = "";
    	if ( $module == $menu['mod'] && $function == $menu['fun'] ) 
    	{
    		$menu['select'] = 'class="curent"';	
    	}
    	$xtpl->assign('MENU', $menu );
    	$xtpl->parse( 'main.menu' );		
    }
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    return $content;	
}
function none_theme($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$admin_info;
	$javascript .= GetSiteJavscriptModule('admin.js');
    $layout = "layout.none.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
	$xtpl->assign('DF_BASE_ADMINURL',DF_BASE_ADMINURL);
    $xtpl->assign('TEMPLATE',$global_config['site_theme']);
    $xtpl->assign('THEME_SITE_JS',$javascript);
    $xtpl->assign('MODULE_CONTENT',$content);
    $xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
    $xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
    $xtpl->assign('module',$module );
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    return $content;
}
?>