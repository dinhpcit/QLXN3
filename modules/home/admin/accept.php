<?php
//delete

if ( !$main_permission[$module]["del"] == 1 && !$main_permission[$module]["full"] == 1 ) 
{
	die('stop!!!');
}

$bmangay = $Request->GetString( "bmangay", "post", '' );
$lab = $Request->GetString( "donvixn", "post", '' );
$tenfile = $Request->GetString( "tenfile", "post", '' );
$bmatt = $Request->GetInt( "bmatt", "post", '' );
$ematt = $Request->GetInt( "ematt", "post", '' );

$array_where = array();
if( !empty($bmangay) ) $array_where [] = "( `mamaubenhpham` LIKE '%".$db->dblikeescape($bmangay)."%' )";
if( !empty($tenfile) ) $array_where [] = "( `filepath` LIKE '%".$db->dblikeescape($tenfile)."%' )";
if( !empty($bmatt) && !empty($ematt) ) $array_where [] = "( `matt` >= ".$bmatt." AND `matt` <= ".$ematt." )";

$array_where [] = "( `labcode` ='' OR `labcode` IS NULL )";

$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$lid = $Request->GetString( "lid", "post", '');
	$array_id = explode(",",$lid);
	if( empty($lab) ) $error ="Bạn chưa chọn đơn vị xét nghiệm";
	elseif( empty($array_id) ) $error ="Bạn chưa chọn bản ghi cần duyệt";
	else
	{
		foreach( $array_id as $i_id )
		{
			$sql_dl = "UPDATE `tbl_bmxn` SET `labcode` = ".$db->dbescape($lab)." WHERE id = ".$i_id;
			$db->sql_query( $sql_dl );	
		}
		Header( "Location: " . DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=accept");
		die();
	}
}

$layout = "accept.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'LANG', $global_lang );

$xtpl->assign( 'bmangay', $bmangay );
$xtpl->assign( 'tenfile', $tenfile );
$xtpl->assign( 'bmatt', $bmatt );
$xtpl->assign( 'ematt', $ematt );


$mabp = $bmangay;
$ii = 1;
$num = 0;
$anum = 0;

$page = $Request->GetInt( "page", "get", 0 );
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_bmxn`". $where ."ORDER BY `id` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
$result = $db->sql_query( $sql ); 
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=accept";

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['uptime'] = ( $row['uptime'] > 0 )? date('d/m/Y H:i:s',$row['uptime']) : '';
	$row['bkuptime'] = ( $row['bkuptime'] > 0 )? date('d/m/Y H:i:s',$row['bkuptime']) : '';
	$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "-";
	$row['bngayxetnghiem'] = ($row['bngayxetnghiem']>0)? date('d/m/Y',$row['bngayxetnghiem']) : "-";
	$row['bngaytrakqxn'] = ($row['bngaytrakqxn']>0)? date('d/m/Y',$row['bngaytrakqxn']) : "-";
	if ( $global_config['check']['value'] == '1' )
	{
    	$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '<span class="warring">Chưa duyệt</span>';
	}
	else
	{
		$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '';
	}
	if( $row['bketquaxetnghiem'] == 'Dương tính' )
	{
		$row['bketquaxetnghiem'] = '<span class="duongtinh">Dương tính</span>';
	}
	if( $row['bketquaxetnghiem'] == 'Âm tính' )
	{
		$row['bketquaxetnghiem'] = '<span class="amtinh">Âm tính</span>';
	}
	if(!empty($row['filepath']))
	{
		$row['tenfilettbp'] = basename($row['filepath']);
		$row['baocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=11&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	if(!empty($row['bkfilepath']))
	{
		$row['tenfilekqxn'] = basename($row['bkfilepath']);
		$row['kbaocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=22&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}

	$xtpl->assign( 'ROW', $row );
	
	if(!empty($row['filepath']))
	{
		$xtpl->parse( 'main.loop.bmxn' );
	}
	if(!empty($row['bkfilepath']))
	{
		$xtpl->parse( 'main.loop.kqxn' );
	}
	//phân quyền
	if (( $main_permission['home']["full"] == 1 ) )
	{
		$xtpl->parse("main.loop.edit");
		if($ii==1) $xtpl->parse("main.loop.del");
	}
	else
	{
		if ( $main_permission['home']["del"] == 1 )
		{
			if($ii==1) $xtpl->parse("main.loop.del");
		}
		if ( $main_permission['home']["edit"] == 1 ) $xtpl->parse("main.loop.edit");
	}
	$anum++;
	$xtpl->parse( 'main.loop' );
	$ii++;
}

$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}

foreach ( $array_donvixn as $row )
{
	$row['select'] = ($row['s_id'] == $xn) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.accept.dvxn' );
}

$xtpl->assign( 'anum', $anum );
if( $anum > 0 ) $xtpl->parse( 'main.accept' );
	
if ( $main_permission[$module]["edit"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.edit' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>