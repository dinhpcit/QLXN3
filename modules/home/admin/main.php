<?php

//get action
$ac = $Request->GetString( "ac", "get", '' );
if( $ac =="set" )
{
	$per = $Request->GetString( "per", "get", '' );
	if (!empty($per) ) $_SESSION['per_page'] = $per;
	$tbl = $Request->GetString( "tbl", "get", '' );
	if (!empty($tbl) )
	{
		 if ($tbl=='01') $_SESSION['tblpage'] = 'bmxn_kqxn';
		 elseif ($tbl=='02') $_SESSION['tblpage'] = 'kqxn_bmxn';
	}
	die('stop!!!');
}
//get order
$otype = $Request->GetString( "otype", "get", '' );
if( !empty($otype) )
{
	$_SESSION['otype'] = $otype;
	die('stop!!!');
}
$ckc = $Request->GetString( "ckc", "get", '' );
$mabn = $Request->GetString( "mbn", "get", '' );
$hoten = $Request->GetString( "ht", "get", '' );
$bngaylm = $Request->GetString( "blm", "get", '' );
$engaylm = $Request->GetString( "elm", "get", '' );
$bngaykq = $Request->GetString( "bkq", "get", '' );
$engaykq = $Request->GetString( "ekq", "get", '' );
$bngaycn = $Request->GetString( "bcn", "get", '' );
$engaycn = $Request->GetString( "ecn", "get", '' );
$kq = $Request->GetString( "kq", "get", '' );
$quanhuyen = $Request->GetString( "qh", "get", '' );
$dv = $Request->GetString( "dv", "get", '' );
$xn = $Request->GetString( "xn", "get", '' );
$tto = $Request->GetString( "tto", "get", '' );
$madv = $Request->GetString( "mdv", "get", '' );
$htlm = $Request->GetString( "htlm", "get", '' );
$dtlm = $Request->GetString( "dt", "get", '' );
$diadiem = $Request->GetString( "dd", "get", '' );
$plm = $Request->GetString( "plm", "get", '' );
$pxo = $Request->GetString( "pxo", "get", '' );
$qho = $Request->GetString( "qho", "get", '' );
$ppxn = $Request->GetString( "ppxn", "get", '' );

$nbngaylm = 0;
if ( ! empty( $bngaylm ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bngaylm, $m );
	$nbngaylm = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
} 
$nengaylm = 0;
if ( ! empty( $engaylm ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $engaylm, $m );
	$nengaylm = mktime( 23, 59, 59, $m[2], $m[1], $m[3] );
} 

$nbngaykq = 0;
if ( ! empty( $bngaykq ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bngaykq, $m );
	$nbngaykq = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
} 
$nengaykq = 0;
if ( ! empty( $engaykq ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $engaykq, $m );
	$nengaykq = mktime( 23, 59, 59, $m[2], $m[1], $m[3] );
}
$nbngaycn = 0;
if ( ! empty( $bngaycn) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $bngaycn, $m );
	$nbngaycn = mktime( 0, 0, 0, $m[2], $m[1], $m[3] );
} 
$nengaycn = 0;
if ( ! empty( $engaycn ) )
{
	unset( $m );
	preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $engaycn, $m );
	$nengaycn = mktime( 23, 59, 59, $m[2], $m[1], $m[3] );
}

$kqxn =(!empty($array_kqxn[$kq]) )?  $array_kqxn[$kq] : '';

//$donvilm =(!empty($array_donvilm[$dv]) )?  $array_donvilm[$dv]['s_code'] : '';

$page = $Request->GetInt( "page", "get", 0 );
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;
$ostype = isset($_SESSION['otype'])? intval($_SESSION['otype']) : 1;

$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'per_page', drawselect_status("per_page", $array_per_page, $per_page, "change_per_page()") );
//
$xtpl->assign( 'mabn', $mabn );
$xtpl->assign( 'hoten', $hoten );
$xtpl->assign( 'bngaylm', $bngaylm );
$xtpl->assign( 'engaylm', $engaylm );
$xtpl->assign( 'bngaykq', $bngaykq );
$xtpl->assign( 'engaykq', $engaykq );
$xtpl->assign( 'bngaycn', $bngaycn );
$xtpl->assign( 'engaycn', $engaycn );
$xtpl->assign( 'ttnoio', $tto );
$xtpl->assign( 'madonvi', $madv );
$xtpl->assign( 'htlm', $htlm );
$xtpl->assign( 'dtlm', $dtlm );
$xtpl->assign( 'diadiem', $diadiem );
$xtpl->assign( 'quanhuyen', $quanhuyen );
$xtpl->assign( 'phuongxalm', $plm );
$xtpl->assign( 'phuongxanoio', $pxo );
$xtpl->assign( 'qhnoio', $qho );
$xtpl->assign( 'ppxn', $ppxn );

if( !empty($mabn) ) $array_where [] = " `mamaubenhpham` LIKE '%".$db->dblikeescape($mabn)."%' ";
if ($ckc==1) 
{ 
	if( !empty($hoten) ) $array_where [] = " `hovaten` = ".$db->dbescape($quanhuyen).""; 
	if( !empty($namsinh) ) $array_where [] = " `namsinh` = ".$db->dbescape($namsinh).""; 
}
else { if( !empty($hoten) ) $array_where [] = " `hovaten` LIKE '%".$db->dblikeescape($hoten)."%'"; }

if( !empty($quanhuyen) ) $array_where [] = " `huyennoilaymau` LIKE '%".$db->dblikeescape($quanhuyen)."%'"; 
if( !empty($kqxn) ) 
{
    if( $kq !="04" ) $array_where [] = " `bketquaxetnghiem` LIKE '%".$db->dblikeescape($kqxn)."%'"; 
    else $array_where [] = "( `bketquaxetnghiem` IS NULL OR `bketquaxetnghiem` ='' OR `bketquaxetnghiem` LIKE '%".$db->dblikeescape($kqxn)."%' )"; 
}

if( !empty($dv) ) $array_where [] = " `userid` = ".$db->dbescape($dv).""; 
if( !empty($xn) ) 
{
	if ( $xn == '-1' ) $array_where [] = " ( `labcode` = '' OR `labcode` IS NULL )";
	else $array_where [] = " `labcode` = ".$db->dbescape($xn)."";
}
if( !empty($tto) ) $array_where [] = " `tinhnoio` = ".$db->dbescape($tto).""; 
if( !empty($madv) ) $array_where [] = " `madonvi` = ".$db->dbescape($madv).""; 
if( !empty($htlm) ) $array_where [] = " `hinhthuclaymau` LIKE '%".$db->dblikeescape($htlm)."%'"; 
if( !empty($dtlm) ) $array_where [] = " `doituonglaymau` LIKE '%".$db->dblikeescape($dtlm)."%'"; 
if( !empty($diadiem) ) $array_where [] = " `diadiemnoilaymau` LIKE '%".$db->dblikeescape($diadiem)."%'"; 
if( !empty($plm) ) $array_where [] = " `xanoilaymau` LIKE '%".$db->dblikeescape($plm)."%'"; 
if( !empty($pxo) ) $array_where [] = " `xanoio` LIKE '%".$db->dblikeescape($pxo)."%'"; 
if( !empty($qho) ) $array_where [] = " `huyennoio` LIKE '%".$db->dblikeescape($qho)."%'"; 
if( !empty($ppxn) && $ppxn != '0') 
{
	if ( $ppxn == '01' ) $array_where [] = " `bphuongphapxetnghiem` LIKE '%".$db->dblikeescape('Test nhanh')."%'"; 
	elseif ( $ppxn == '02' ) $array_where [] = " `bphuongphapxetnghiem` NOT LIKE '%".$db->dblikeescape('Test nhanh')."%'"; 
}
if( $nbngaylm > 0 && $nengaylm > 0 ) $array_where [] = " ( `ngaylaymau` >= '".$nbngaylm."' AND `ngaylaymau` <= '".$nengaylm."' ) ";
if( $nbngaykq > 0 && $nengaykq > 0 ) $array_where [] = " ( `bngaytrakqxn` >= '".$nbngaykq."' AND `bngaytrakqxn` <= '".$nengaykq."' ) ";
if( $nbngaycn > 0 && $nengaycn > 0 ) $array_where [] = " ( `uptime` >= '".$nbngaycn."' AND `uptime` <= '".$nengaycn."' ) ";

$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';
$order_sql = "ORDER BY `id` DESC";
if( $ostype == 1 ) $order_sql = "ORDER BY `id` DESC";
elseif( $ostype == 2 ) $order_sql = "ORDER BY `id` ASC";
elseif( $ostype == 3 ) $order_sql = "ORDER BY `bkuptime` DESC";
elseif( $ostype == 4 ) $order_sql = "ORDER BY `bkuptime` ASC";

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_bmxn` ".$where." ".$order_sql." LIMIT " . ($page*$per_page) . "," . $per_page;

$_SESSION['sql_export'] = "SELECT * FROM `tbl_bmxn` ".$where." ".$order_sql." LIMIT 10000";

$result = $db->sql_query( $sql ); 
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . 'mbn='.$mabn.'&ht='.$hoten.'&blm='.$bngaylm.'&elm='.$engaylm.'&kq='.$kq.'&bkq='.$bngaykq.'&ekq='.$engaykq.'&kq='.$kq.'&qh='.$quanhuyen.'&dv='.$dv.'&xn='.$xn.'&mn='.$mn.'&mdv='.$mdv.'&htlm='.$htlm.'&od='.$odich.'&dd='.$diadiem.'&plm='.$plm.'&pxo='.$pxo.'&qho='.$qho.'&';
$ii= $per_page*$page + 1;

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
	$row['nhomxn'] = get_group_object($row['doituonglaymau']);
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
		$array_gop = explode(" ", $row['hinhthuclaymau']);
		if ( count($array_gop) > 1 ) $row['bketquaxetnghiem'] = '<span class="duonggop">Dương tính</span>';
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
	$row['edit'] = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$row['id']."&ck=".$row['ck'];

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
	if (( $main_permission['home']["full"] == 1 ) || ($main_permission['home']["edit"] == 1) )
	{
		$xtpl->parse("main.loop.edit");
	}
	
	$xtpl->parse( 'main.loop' );
	$ii++;
}

$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );
$xtpl->assign( 'numall', $all_page );
$xtpl->assign( 'all_number', $all_page );
$xtpl->assign( 'link_del', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=delcode' );
//$xtpl->assign( 'doituonglaymau', drawselect_status("doituong", $array_doituong_none, $doituong,"search_profile()","","chosen-select") );
$xtpl->assign( 'kqxn', drawselect_status("kqxn", $array_kqxn, $kq,"search_profile()","","chosen-select maxw140px") );
$xtpl->assign( 'ppxn', drawselect_status("ppxn", $array_ppxn, $ppxn,"search_profile()","","chosen-select maxw140px") );

$numd = 0;
$sql = "SELECT count(*) as numd FROM `tbl_bmxn` WHERE `labcode` = '' OR `labcode` IS NULL";
$result = $db->sql_query( $sql ); 
list( $numd ) = $db->sql_fetchrow( $result );

$xtpl->assign( 'numd', $numd );

//thêm
if ( $main_permission['home']["add"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.add' );
}
if ( $global_config['check']['value'] == '1' )
{
	//cho duyet
	if ( $main_permission['home']["edit"] == 1 || $main_permission[$module]["full"] == 1 ) 
	{
		$xtpl->parse( 'main.edit' );
	}
}
else
{
	if ( $main_permission['home']["edit"] == 1 || $main_permission[$module]["full"] == 1 ) 
	{
		$xtpl->parse( 'main.move' );
	}
}
//export
if ( $main_permission['home']["extend"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.extend' );
	$xtpl->parse( 'main.extend2' );
}
//del
if ( $main_permission[$module]["del"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.del' );
}

foreach ( $array_donvilm as $row )
{
	$row['select'] = ($row['s_id'] == $dv) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.donvi' );
}

foreach ( $array_donvixn as $row )
{
	$row['select'] = ($row['s_id'] == $xn) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.dvxn' );
}
if ( $global_config['check']['value'] == '1' )
{
	$row_temp = array("s_id"=>"-1","s_name"=>"Chưa duyệt");
	$row_temp['select'] = ($row_temp['s_id'] == $xn) ? "selected" : "";
	$xtpl->assign( 'ROW', $row_temp );
	$xtpl->parse( 'main.dvxn' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>