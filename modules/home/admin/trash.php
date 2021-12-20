<?php
//get action

if( $Request->GetString( "del", "get", '' ) == 1 )
{
    $lid = $Request->GetString( "lid", "get", '' ); 
    $sql = "DELETE FROM `tbl_bmxn_del` WHERE `id` IN (".$lid.")";
	$db->sql_query( $sql ); 
    exit();
}
elseif( $Request->GetString( "del", "get", '' ) == 2 )
{
    $sql = "DELETE FROM `tbl_bmxn_del`";
	$db->sql_query( $sql ); 
    exit();
}
if( $Request->GetString( "res", "get", '' ) == 1 )
{
    $id = $Request->GetString( "id", "get", '' ); 
    $ck = $Request->GetString( "ck", "get", '' );
    if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');
    //lay du lieu
    if($id > 0)
    {
        $sql = "INSERT INTO `tbl_bmxn` SELECT * FROM `tbl_bmxn_del` WHERE `id` = ".$id;
        $db->sql_query( $sql );
		$sql = "DELETE FROM `tbl_bmxn_del` WHERE `id` = ".$id;
		$db->sql_query( $sql ); 
    }
	echo 'Đã khôi phục bản ghi';
    exit();
}

$hoten = $Request->GetString( "hoten", "get", '' );
$bdate = $Request->GetString( "bdate", "get", '' );
$edate = $Request->GetString( "edate", "get", '' );

$page = $Request->GetInt( "page", "get", 0 ); if ($page<0) $page = 0;
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;

$nbdate = 0;
if ( ! empty( $bdate ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bdate, $m );
	$nbdate = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
} 
$nedate = 0;
if ( ! empty( $edate ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $edate, $m );
	$nedate = mktime( 23, 59, 59, $m[2], $m[1], $m[3] );
} 

$layout = "trash.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'per_page', drawselect_status("per_page", $array_per_page, $per_page, "change_per_page()") );
//
$xtpl->assign( 'hoten', $hoten );
$xtpl->assign( 'bdate', $bdate );
$xtpl->assign( 'edate', $edate );

$array_where = array();
if( !empty($hoten) ) $array_where [] = " `hovaten` LIKE '%".$db->dblikeescape($hoten)."%'";
if( $nbdate > 0 && $nedate > 0 ) $array_where [] = " ( `ngaylaymau` >= '".$nbdate."' AND `ngaylaymau` <= '".$nedate."' ) ";

$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_bmxn_del` ".$where." ORDER BY `id` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=trash&hoten='.$hoten.'&bdate='.$bdate.'&edate='.$edate.'';
$ii= $per_page*$page + 1;

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['uptime'] = ( $row['uptime'] > 0 )? date('d/m/Y H:i:s',$row['uptime']) : '';
	$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "-";
	$xtpl->assign( 'ROW', $row );
	//phân quyền
	if (( $main_permission[$module]["full"] == 1 ) )
	{
		$xtpl->parse("main.loop.edit");
		if($ii==1) $xtpl->parse("main.loop.del");
	}
	else
	{
		if ( $main_permission[$module]["del"] == 1 )
		{
			if($ii==1) $xtpl->parse("main.loop.del");
		}
		if ( $main_permission[$module]["edit"] == 1 ) $xtpl->parse("main.loop.edit");
	}
	
	$xtpl->parse( 'main.loop' );
	$ii++;
}

$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );
$xtpl->assign( 'numall', $all_page );
$xtpl->assign( 'all_number', $all_page ); 

//thêm
if ( $main_permission[$module]["add"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.add' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>