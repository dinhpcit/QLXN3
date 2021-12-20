<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
 
$id = $Request->GetInt( "pid", "get", 0 );
$data = array("p_id" => "", "p_name" => "", "p_enable" => 1, "p_begin" => DF_CURRENTTIME, "p_end" => DF_CURRENTTIME , "p_year" => date('Y',DF_CURRENTTIME), "p_Link" => "");
$array_status =  array(0=>"Tắt","1" =>"Mở");

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['p_name'] = $Request->GetString( "p_name", "post", "" );
	$p_begin = $Request->GetString( "p_begin", "post", "" );
	$p_end = $Request->GetString( "p_end", "post", "" );
	$data['p_year'] = $Request->GetInt( "p_year", "post", date('Y') );
	$data['p_enable'] = $Request->GetInt( "p_enable", "post", 0 );
    if ( ! empty( $p_begin ) )
    {
        unset( $m );
        preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $p_begin, $m );
        $data['p_begin'] = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
    } 
	if ( ! empty( $p_end ) )
    {
        unset( $m );
        preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $p_end, $m );
        $data['p_end'] = mktime( 23, 59, 59, $m[2], $m[1], $m[3] );
    } 
	
	if ( empty($data['p_name']) ) $error = "Error: Bạn chưa điền tên đợt tài trợ";
	elseif ( empty( $data['p_year'] ) ) $error = "Error: Chưa có năm tài trợ";
	elseif ( empty($data['p_begin']) ) $error = "Error: Chưa có thời bắt đầu";
	elseif ( empty( $data['p_end'] ) ) $error = "Error: Chưa có thời gian kết thúc";
	if( empty($error) )
	{
		if ($id == 0)
		{
			$sql = "INSERT INTO `tbl_program` (`p_id`, `p_name`, `p_enable`, `p_begin`, `p_end`, `p_year`, `p_Link`) VALUES (NULL, " . $db->dbescape( $data['p_name'] ) . ", " . $db->dbescape( $data['p_enable'] ) . ", " . $db->dbescape( $data['p_begin'] ) . ", " . $db->dbescape( $data['p_end'] ) . ", " . $db->dbescape( $data['p_year'] ) . ", NULL);";
			$idnew = $db->sql_query_insert_id( $sql ); 
			if ( $idnew > 0 ) 	
			{
				header( "Location: " . DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
				die();
			}
		}
		else
		{
			$sql = "UPDATE `tbl_program` SET `p_name` = " . $db->dbescape( $data['p_name'] ) . ", 
							`p_begin` = " . $db->dbescape( $data['p_begin'] ) . ", 
							`p_end` = " . $db->dbescape( $data['p_end'] ) . ", 
							`p_year` = " . $db->dbescape( $data['p_year'] ) . ",
							`p_enable` = " . $db->dbescape( $data['p_enable'] ) . "
					WHERE p_id=".$id." ;";
			$db->sql_query( $sql ); 
			header( "Location: " . DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
			die();
		}
	}
}

if ($id > 0)	
{
	$sql = "SELECT * FROM `tbl_program` WHERE `p_id` = ".$id ;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
}	
$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$data['p_begin'] = date('d/m/Y',$data['p_begin']);
$data['p_end'] = date('d/m/Y',$data['p_end']);

$xtpl->assign( 'DATA', $data );
$xtpl->assign( 'p_enable',  drawselect_status("p_enable", $array_status, $data['p_enable']) );

$xtpl->assign( 'link_main', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
$xtpl->assign( 'link_user', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=users" );
$xtpl->assign( 'link_mod', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=mod" );

$array_program = array();  $programid = 0;
$sql = "SELECT * FROM `tbl_program` WHERE 1 ORDER BY `p_year` DESC ";
$result = $db->sql_query( $sql );
$i=1;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['p_begin'] = date('d/m/Y',$row['p_begin']);
	$row['p_end'] = date('d/m/Y',$row['p_end']);
	$row['no'] = $i;
	$row['p_enable'] = $array_status[$row['p_enable']];
	$row['edit'] = DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main&pid=".$row['p_id'];
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.loop' );
	$i++;
}
if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>