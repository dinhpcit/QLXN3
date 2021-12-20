<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

function main_theme($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$user_info,$page_title,$global_lang;
	$javascript .= GetSiteJavscriptModule('site.js');
	$css .= GetSiteCssModule($module.'.css');
    $layout = "layout.body.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
    $xtpl->assign('TEMPLATE',$global_config['site_theme']);
    $xtpl->assign('THEME_SITE_JS',$javascript);
    $xtpl->assign('THEME_CSS',$css);
    $xtpl->assign('MODULE_CONTENT',$content);
    $xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
    $xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
    $xtpl->assign('module',$module );
	$xtpl->assign('LANG',$global_lang );
    $xtpl->assign('LEFT', $array_block );
	$xtpl->assign('PAGE_TITLE', $global_config['title']['value'] );
	$xtpl->assign('SHORTNAME', $global_config['shortname']['value'] );
    $xtpl->assign('MENU', main_menu() );
	$page_title = !empty($page_title) ? $page_title : $global_lang['page_title'];
	$xtpl->assign('PAGE_TITLE', $page_title );
	if ( ! defined( 'DF_IS_USER' ) )
	{
		$xtpl->parse( 'main.nouser' );	
	}
	else
	{
		$full_name = "";
		if (!empty($user_info['s_name'])) 
		{
			$full_name = $user_info['s_name'];
		}
		$user_info['ss_code'] = ( empty($user_info['s_code']) || $user_info['s_code'] == '0')?  $user_info['address'] : $user_info['s_code'];
		$xtpl->assign('FULL_NAME',$full_name);
		$xtpl->assign( 'USER', $user_info );
		$xtpl->parse( 'main.user' );	
	}
    $q = $Request->GetString( "q", "get", 'Tìm kiếm thông tin' ); 
    $xtpl->assign('q',$q);
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    //$content = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $content);
    return $content;
}
function view_modal($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$user_info,$page_title,$global_lang;
	$javascript .= GetSiteJavscriptModule('site.js');
	$css .= GetSiteCssModule($module.'.css');
    $layout = "layout.none.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
    $xtpl->assign('TEMPLATE',$global_config['site_theme']);
    $xtpl->assign('THEME_SITE_JS',$javascript);
    $xtpl->assign('THEME_CSS',$css);
    $xtpl->assign('MODULE_CONTENT',$content);
    $xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
    $xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
    $xtpl->assign('module',$module );
	$xtpl->assign('LANG',$global_lang );
    $xtpl->assign('LEFT', $array_block );
    $xtpl->assign('MENU', main_menu() );
	$page_title = !empty($page_title) ? $page_title : $global_lang['page_title'];
	$xtpl->assign('PAGE_TITLE', $page_title );
	if ( ! defined( 'DF_IS_USER' ) )
	{
		$xtpl->parse( 'main.nouser' );	
	}
	else
	{
		$full_name = "";
		if (!empty($user_info['s_name'])) 
		{
			$full_name = $user_info['s_name'];
		}
		$user_info['ss_code'] = ( empty($user_info['s_code']) || $user_info['s_code'] == '0')?  $user_info['address'] : $user_info['s_code'];
		$xtpl->assign('FULL_NAME',$full_name);
		$xtpl->assign( 'USER', $user_info );
		if( $user_info['s_expert'] ) $xtpl->parse( 'main.user.expert' );
		$xtpl->parse( 'main.user' );	
	}
    $q = $Request->GetString( "q", "get", 'Tìm kiếm thông tin' ); 
    $xtpl->assign('q',$q);
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    //$content = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $content);
    return $content;
}
function login_theme($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$user_info,$page_title,$global_lang;
	$javascript .= GetSiteJavscriptModule('site.js');
	$css .= GetSiteCssModule($module.'.css');
    $layout = "layout.login.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
    $xtpl->assign('TEMPLATE',$global_config['site_theme']);
    $xtpl->assign('THEME_SITE_JS',$javascript);
    $xtpl->assign('THEME_CSS',$css);
    $xtpl->assign('MODULE_CONTENT',$content);
    $xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
    $xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
    $xtpl->assign('module',$module );
	$xtpl->assign('LANG',$global_lang );
    $xtpl->assign('LEFT', $array_block );
	$page_title = !empty($page_title) ? $page_title : $global_lang['page_title'];
	$xtpl->assign('PAGE_TITLE', $page_title );
	if ( ! defined( 'DF_IS_USER' ) )
	{
		$xtpl->parse( 'main.nouser' );	
	}
    $full_name = "";
    if (!empty($user_info['s_name'])) 
    {
    	$full_name = $user_info['s_name'];
    }
    $q = $Request->GetString( "q", "get", 'Tìm kiếm thông tin' ); 
    $xtpl->parse( 'main' );
    $content = $xtpl->text( 'main' ) ;
    //$content = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $content);
    return $content;
}
function main_menu()
{
	global $Request,$module,$function,$global_config;
	
	$array_menu[] = array( "mod"=>"profile","fun"=>"main","title"=>"Lý lịch khoa học", "link" => DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=profile&" . DF_FUNCTION_VARIABLE . "=main" );
	$array_menu[] = array( "mod"=>"basic","fun"=>"add","title"=>"Đăng ký đề tài mới", "link" => DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=basic&" . DF_FUNCTION_VARIABLE . "=add" );
	$array_menu[] = array( "mod"=>"home","fun"=>"main","title"=>"Dánh sách đề tài tham gia", "link" => DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=main&status=1" );
	$array_menu[] = array( "mod"=>"home","fun"=>"review","title"=>"Dánh sách đề tài phản biện", "link" => DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=home&" . DF_FUNCTION_VARIABLE . "=review" );
	
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
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$admin_info,$user_info;
	$javascript .= GetSiteJavscriptModule('site.js');
    $layout = "layout.none.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
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

function print_theme($content)
{
	global $global_config, $module, $function,$javascript,$css, $array_block,$Request,$admin_info,$user_info;
	$javascript .= GetSiteJavscriptModule('site.js');
    $layout = "layout.print.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/layout";
    $xtpl = new XTemplate( $layout ,$path_theme );
    $xtpl->assign('DF_BASE_SITEURL',DF_BASE_SITEURL);
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