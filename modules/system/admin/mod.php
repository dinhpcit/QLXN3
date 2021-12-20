<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
 
$id = $Request->GetInt( "pid", "get", 0 );

if ( $Request->GetInt( "del", "get", 0 ) == 1)
{
	$u_id = $Request->GetInt( "uid", "get", 0 );
	$sql = "DELETE FROM `tbl_moderator` WHERE u_id = ".$u_id."";
	$result = $db->sql_query( $sql ); 
	die();
}

$layout = "mod.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$xtpl->assign( 'link_main', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main" );
$xtpl->assign( 'link_user', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=users" );
$xtpl->assign( 'link_mod', DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=mod" );
$array_program = array();  $programid = 0;
$sql = "SELECT * FROM `tbl_moderator` WHERE 1 ORDER BY `u_name` ASC ";
$result = $db->sql_query( $sql );
$i=1;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['ck'] = md5($row['u_id'].$admin_info['u_id']);
	$row['u_last_login'] = date('H:i, d/m/Y',$row['u_last_login']);
	$row['no'] = $i;
	$xtpl->assign( 'ROW', $row );
	//phân quyền
	if( $row['u_id'] != "1" )
	{
		if (( $main_permission[$module]["full"] == 1 ) )
		{
			$xtpl->parse("main.loop.edit");
			$xtpl->parse("main.loop.del");
		}
		else
		{
			if ( $main_permission[$module]["del"] == 1 ) $xtpl->parse("main.loop.del");
			if ( $main_permission[$module]["edit"] == 1 ) $xtpl->parse("main.loop.edit");
		}
	}
	$xtpl->parse( 'main.loop' );
	$i++;
}

if ( $main_permission[$module]["add"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.add' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>