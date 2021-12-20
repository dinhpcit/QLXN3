<?php


$page = $Request->GetInt( 'page', 'get', 0 );
$per_page = 30;
$layout = "type.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$table_name = "tbl_category_type";
$array_list = array();
$id = $Request->GetInt( "id", "get", 0 );	
$ck = $Request->GetString( "ck", "get", '' );
if ( $id > 0 && md5($id) != $ck ) die("stop!!!");
$del = $Request->GetInt( "del", "get", 0 );	
$xtpl->assign( 'radio_del'.$del,  'checked="checked"' );

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `".$table_name."` WHERE `delete` = ".$db->dbescape( $del )." ORDER BY `id` ASC LIMIT " . ($page*$per_page) . "," . $per_page;
$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=type';
$i= ($page*$per_page) + 1;	
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_list[$row['id']] = $row;
	$row['no'] = $i;
	$row['bg'] = ($i%2)? '': 'class="second"';
	$row['ck'] = md5($row['id']);
	$row['edit'] = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=type&amp;id=".$row['id'].'&amp;ck='.$row['ck'];
	$xtpl->assign( 'ROW', $row );
	if( $row['delete'] == 0 ) $xtpl->parse( 'main.loop.del' );
	elseif( $row['delete'] == 1 ) $xtpl->parse( 'main.loop.reto' ); 
	$xtpl->parse( 'main.loop' );
	$i++;
}

$data = array("id" => 0, "title" =>"", "delete" => 0 );
//insert and update
if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$data['title'] = $Request->GetString( "title", "post", "" );
	if ( empty($data['title']) ) $error = "Error: Bạn chưa điền nơi nghi nhiễm";
	
	if( empty($error) )
	{
		if ( $id == 0 )
		{
			$sql = "INSERT INTO `".$table_name."` (`id`, `title`, `delete`) 
					VALUES (NULL, " . $db->dbescape( $data['title'] ) . ",0
			);";
			$idnew = $db->sql_query_insert_id( $sql );
			if ( $idnew > 0 ) 	
			{
				fn_delete_all_cache ();
				header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=type");
				die();
			}
			else
			{
				$error = "Có lỗi: không nghi được dữ liệu!!!";
			}
		}
		else
		{
			$sql = "UPDATE `".$table_name."` SET
					`title` = " . $db->dbescape( $data['title'] ) . "
					WHERE id=" . $id;
			$db->sql_query( $sql );
			fn_delete_all_cache ();
			header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=type");
			die();
		}
		$db->sql_freeresult();
	}
}
if( $Request->GetString( "ac", "get", "" ) == 'del' && $id > 0)
{
	$sql = "UPDATE `".$table_name."` SET `delete` = 1 WHERE id=" . $id;
	$db->sql_query( $sql ); fn_delete_all_cache ();
	header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=type");
	die();
}
if( $Request->GetString( "ac", "get", "" ) == 'reto' && $id > 0)
{
	$sql = "UPDATE `".$table_name."` SET `delete` = 0 WHERE id=" . $id;
	$db->sql_query( $sql ); fn_delete_all_cache ();
	header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=type");
	die();
}
if ( $id > 0 )
{
	$sql = "SELECT * FROM `".$table_name."` WHERE `id` = " . $id;
    $result = $db->sql_query( $sql );
    $data = $db->sql_fetchrow( $result, 2 );
}
//print_r($data);exit();
if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}
$xtpl->assign( 'DATA', $data);

$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );
$xtpl->assign( 'link_noinhiem', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=noinhiem" );
$xtpl->assign( 'link_group', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=group" );
$xtpl->assign( 'link_kcn', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=kcn" );
$xtpl->assign( 'link_job', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=job" );
$xtpl->assign( 'link_hospital', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=hospital" );
$xtpl->assign( 'link_type', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=type" );
$xtpl->assign( 'link_mcb', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&amp;" . DF_FUNCTION_VARIABLE . "=mcb" );
$xtpl->assign( 'link_cdel', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=type&del=" );
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>