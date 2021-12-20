<?php

$array_config = array();
$sql = "SELECT * FROM `tbl_config` WHERE 1";
$result = $db->sql_query( $sql );
$i=1;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
    $array_config[$row['name']] = $row;
}

$data = array("title"=> $array_config['title']['value'],"shortname"=> $array_config['shortname']['value'],"lang"=> $array_config['lang']['value'],"city"=> $array_config['city']['value'],"logo"=> $array_config['logo']['value'], "check"=> $array_config['check']['value']);

if( empty($data['logo']) || $data['logo'] == '' ) $data['logo1'] = DF_BASE_SITEURL."images/no-image.png";
else
{
	$data['logo1'] = DF_BASE_SITEURL.DF_UPLOAD_FOLDER."/system/".$data['logo'];
}

$is_save = $Request->GetString( "is", "get", "" );

$error = "";
$action = 0;
$upload_path = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module; 
$psave = $Request->GetInt( "save", "post", 0 );
if ( $psave == 1)
{
	$data['title'] = $Request->GetString( "title", "post", "" );
	$data['shortname'] = $Request->GetString( "shortname", "post", "" );
	$data['lang'] = trim( $Request->GetString( "lang", "post", "" ) );
	$data['city'] = $Request->GetString( "city", "post", '' );
	$data['check'] = $Request->GetString( "check", "post", '0' );
	include_once DF_ROOTDIR . '/includes/class/class.upload.php';
	//file bao cao
	if ( !empty($_FILES ['logo']['tmp_name']) )
	{
		$handle = new Upload ( $_FILES ['logo'] );
		$info = pathinfo($_FILES["logo"]["name"]);
		$file_name =  basename("logo_up",'.'.$info['extension']);
		$handle->file_new_name_body = basename( str_unicode($file_name) );
		if ($handle->uploaded) {
			$handle->Process ( $upload_path );
			if ($handle->processed) 
			{
				$data['logo'] = $handle->file_dst_name;
			} 
			else 
			{
				$error = $handle->error;
			}
			$handle->Clean ();
		} 
		else 
		{
			$error = $handle->error;
		}
		unset($handle);
	}
	if ( empty($error) )
	{
		foreach ( $data as $name => $value )
		{
			$sql = "UPDATE `tbl_config` SET 
					`value` = " . $db->dbescape( $value ) . "
					WHERE `name` = ".$db->dbescape( $name )."";
			$db->sql_query( $sql );	
		}
		Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=config&is=1");
		die();
	}
}
elseif( $psave == 2 )
{
	$sql = "UPDATE `tbl_config` SET 
					`value` = ''
					WHERE `name` = 'logo'";
			$db->sql_query( $sql );	
	Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=config&is=1");
	die();
}

$javascript .= GetSiteJavscriptModule( 'site.js' );
$css .= GetSiteCssModule( $module . '.css' );

$layout = "config.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );

$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'THEME_SITE_JS', $javascript );
$xtpl->assign( 'THEME_CSS', $css );
$xtpl->assign('DF_MODULE_VARIABLE',DF_MODULE_VARIABLE);
$xtpl->assign('DF_FUNCTION_VARIABLE',DF_FUNCTION_VARIABLE);
$xtpl->assign('module',$module );
$xtpl->assign('DATA',$data );
$xtpl->assign( 'lang', drawselect_status("lang", $array_lang, $data['lang']) );

$xtpl->assign('check'.$data['check'],'checked="checked"' );

foreach ( $array_tinhthanh as $row )
{
	$row['select'] = '';
	if( $data['city'] == $row['matinhthanh'] ) $row['select'] = 'selected="selected"';
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.tinhthanh' );
}

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
if( $is_save == "1") $xtpl->parse( 'main.save' );	
if( !empty($data['logo']) ) $xtpl->parse( 'main.lg' );	

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme($content);

?>