<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

include_once DF_ROOTDIR.'/includes/countrys.php';

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['s_name'] = $Request->GetString( "s_name", "post", '' );
	$data['s_gender'] = $Request->GetInt( "s_gender", "post", 0 );
	$data['s_passport_id'] = $Request->GetString( "s_passport_id", "post", "" );
	$data['s_passport_place'] = $Request->GetString( "s_passport_place", "post", "" );
	$data['s_passport_exp'] = $Request->GetString( "s_passport_exp", "post", "" );
	$data['s_cellphone'] = $Request->GetString( "s_cellphone", "post", "" );
	$data['s_tax_number'] = $Request->GetString( "s_tax_number", "post", "" );
	$data['s_home_address'] = $Request->GetString( "s_home_address", "post", "" );
	$data['s_ad_city'] = $Request->GetString( "s_ad_city", "post", "" );
	$data['s_ad_state'] = $Request->GetString( "s_ad_state", "post", "" );
	$data['s_ad_province'] = $Request->GetString( "s_ad_province", "post", "" );
	$data['s_ad_zipcode'] = $Request->GetString( "s_ad_zipcode", "post", "" );
	$data['s_place_birth'] = $Request->GetString( "s_place_birth", "post", "" );
	$data['s_ad_country'] = $Request->GetString( "s_ad_country", "post", "" );
	$data['s_nation'] = $Request->GetString( "s_nation", "post", "" );
	$s_birthdate = $Request->GetString( "s_birthdate", "post", '' );
    if ( ! empty( $s_birthdate ) )
    {
        unset( $m );
        preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $s_birthdate, $m );
        $data['s_birthdate'] = mktime( date( "H" ), date( "i" ), 0, $m[2], $m[1], $m[3] );
    } 
	else
	{
		$data['s_birthdate'] = 0;
	}
	$sql = "UPDATE tbl_profile SET
			`s_name` = ".$db->dbescape($data['s_name']).",
			`s_gender` = ".$db->dbescape($data['s_gender']).",
			`s_passport_id` = ".$db->dbescape($data['s_passport_id']).",
			`s_passport_place` = ".$db->dbescape($data['s_passport_place']).",
			`s_passport_exp` = ".$db->dbescape($data['s_passport_exp']).",
			`s_birthdate` = ".$db->dbescape($data['s_birthdate']).",
			`s_cellphone` = ".$db->dbescape($data['s_cellphone']).",
			`s_tax_number` = ".$db->dbescape($data['s_tax_number']).",
			`s_home_address` = ".$db->dbescape($data['s_home_address']).",
			`s_ad_city` = ".$db->dbescape($data['s_ad_city']).",
			`s_ad_state` = ".$db->dbescape($data['s_ad_state']).",
			`s_ad_province` = ".$db->dbescape($data['s_ad_province']).",
			`s_ad_zipcode` = ".$db->dbescape($data['s_ad_zipcode']).",
			`s_place_birth` = ".$db->dbescape($data['s_place_birth']).",
			`s_ad_country` = ".$db->dbescape($data['s_ad_country']).",
			`s_nation` = ".$db->dbescape($data['s_nation'])."
			WHERE `s_id`= ".intval($user_info['s_id'])."";
	$db->sql_query( $sql ); 
	if ( $Request->GetInt( "savenext", "post", 0 ) == 1 )
	{
		Header( "Location: " . DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=view"  );
		die();
	}
	Header( "Location: " . DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main"  );
	die();
}

$sql = "SELECT * FROM tbl_profile WHERE s_id= ".intval($user_info['s_id'])."";
$result = $db->sql_query( $sql );
$data = $db->sql_fetchrow( $result, 2 ); 

$data['s_birthdate'] = ($data['s_birthdate'] != 0 )? date('d/m/Y',$data['s_birthdate'] ) : '';

$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'DATA', $data );
$xtpl->assign( 'sid', $user_info['s_id'] );
$xtpl->assign( 'link_main', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
$xtpl->assign( 'link_mcb', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=mcb" );
$xtpl->assign( 'link_hscb', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=hscb" );
$xtpl->assign( 'link_out', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=logout" );
$xtpl->assign( 'link_change', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=change" );
$xtpl->assign( 'ckoption'. $data['s_option'], 'checked="checked"' );

foreach ( $global_countries as $c_i => $c_title )
{
	$select = ( $data['s_ad_country'] == $c_title ) ? 'selected="selected"' : '';
	$row = array("title" => $c_title, "select" => $select );
	$xtpl->assign( 'CON', $row );
	$xtpl->parse( 'main.cloop' );
	$select = ( $data['s_nation'] == $c_title ) ? 'selected="selected"' : '';
	$row = array("title" => $c_title, "select" => $select );
	$xtpl->assign( 'CON', $row );
	$xtpl->parse( 'main.nloop' );
}
foreach ( $array_gioitinh as $code => $name )
{
	$select = ( $data['s_gender'] == $code ) ? 'selected="selected"' : '';
	$row = array("code" => $code, "name" => $name, "select" => $select );
	$xtpl->assign( 'GEN', $row );
	$xtpl->parse( 'main.bloop' );	
	$i++;
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>