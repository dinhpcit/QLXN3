<?php
if ( ! defined( 'DF_IS_USER' ) )
{
    header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}
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
$ckc = $Request->GetString( "ckc", "get", '' );
$mabn = $Request->GetString( "mabn", "get", '' );
$hoten = $Request->GetString( "hoten", "get", '' );
$bngaylm = $Request->GetString( "blm", "get", '' );
$engaylm = $Request->GetString( "elm", "get", '' );
$bngaykq = $Request->GetString( "bkq", "get", '' );
$engaykq = $Request->GetString( "ekq", "get", '' );
$bngaycn = $Request->GetString( "bcn", "get", '' );
$engaycn = $Request->GetString( "ecn", "get", '' );
$kq = $Request->GetString( "kq", "get", '' );
$xn = $Request->GetString( "xn", "get", '' );
$mn = $Request->GetString( "mn", "get", '' );
$madv = $Request->GetString( "mdv", "get", '' );
$htlm = $Request->GetString( "htlm", "get", '' );
$dtlm = $Request->GetString( "dt", "get", '' );
$diadiem = $Request->GetString( "dd", "get", '' );
$plm = $Request->GetString( "plm", "get", '' );
$pxo = $Request->GetString( "pxo", "get", '' );
$qho = $Request->GetString( "qho", "get", '' );
$ppxn = $Request->GetString( "ppxn", "get", '' );
$tto = $Request->GetString( "tto", "get", '' );
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

 
$page = $Request->GetInt( "page", "get", 0 );
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;

$tbl_name = isset($_SESSION['tblpage'])? $_SESSION['tblpage'] : 'bmxn_kqxn';
if ( $tbl_name != 'bmxn_kqxn' && $tbl_name != 'kqxn_bmxn' ) $tbl_name = 'bmxn_kqxn';

$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
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
$xtpl->assign( 'mangay', $mn );
$xtpl->assign( 'madonvi', $madv );
$xtpl->assign( 'htlm', $htlm );
$xtpl->assign( 'dtlm', $dtlm );
$xtpl->assign( 'diadiem', $diadiem );
$xtpl->assign( 'quanhuyen', $quanhuyen );
$xtpl->assign( 'phuongxalm', $plm );
$xtpl->assign( 'phuongxanoio', $pxo );
$xtpl->assign( 'qhnoio', $qho );
$xtpl->assign( 'ppxn', $ppxn );
$xtpl->assign( 'tto', $tto );

$code_text = "";
$array_code = array();
if( !empty($user_info['s_code']) )
{
    $array_code = explode(",",$user_info['s_code']);
}
$i=1;
foreach( $array_code as $code_i)
{
	if($i==1) $code_text = "'".$code_i."'";
	else $code_text .= ",'".$code_i."'";
	$i++;
}

if ( $tbl_name == 'bmxn_kqxn' )
{
	$array_where = array();
	if ( !empty($code_text) ) $array_where [] = " ( `madonvi` IN (".$code_text." ) OR `labcode` = ".$user_info['s_id']." OR `userid` = ".$user_info['s_id']." ) ";
	else $array_where [] = " ( `labcode` = ".$user_info['s_id']." OR `userid` = ".$user_info['s_id']." ) ";
	
	if( !empty($mabn) ) $array_where [] = " `mamaubenhpham` LIKE '%".$db->dblikeescape($mabn)."%'";
	if ($ckc==1) 
	{ 
		if( !empty($hoten) ) $array_where [] = " `hovaten` = ".$db->dbescape($hoten).""; 
		if( !empty($namsinh) ) $array_where [] = " `namsinh` = ".$db->dbescape($namsinh).""; 
	}
	else { if( !empty($hoten) ) $array_where [] = " `hovaten` LIKE '%".$db->dblikeescape($hoten)."%'"; }
	if( !empty($htlm) ) $array_where [] = " `hinhthuclaymau` LIKE '%".$db->dblikeescape($htlm)."%'"; 
	if( !empty($dtlm) ) $array_where [] = " `doituonglaymau` LIKE '%".$db->dblikeescape($dtlm)."%'"; 
	if( !empty($diadiem) ) $array_where [] = " `diadiemnoilaymau` LIKE '%".$db->dblikeescape($diadiem)."%'"; 
	if( !empty($plm) ) $array_where [] = " `xanoilaymau` LIKE '%".$db->dblikeescape($plm)."%'"; 
	if( !empty($pxo) ) $array_where [] = " `xanoio` LIKE '%".$db->dblikeescape($pxo)."%'"; 
	if( !empty($qho) ) $array_where [] = " `huyennoio` LIKE '%".$db->dblikeescape($qho)."%'"; 
	if( !empty($tto) ) $array_where [] = " `tinhnoio` LIKE '%".$db->dblikeescape($tto)."%'"; 
	if( !empty($ppxn) && $ppxn != '0') 
	{
		if ( $ppxn == '01' ) $array_where [] = " `bphuongphapxetnghiem` LIKE '%".$db->dblikeescape('Test nhanh')."%'"; 
		elseif ( $ppxn == '02' ) $array_where [] = " `bphuongphapxetnghiem` NOT LIKE '%".$db->dblikeescape('Test nhanh')."%'"; 
	}
	if( !empty($kqxn) ) 
	{
		if( $kq !="04" ) $array_where [] = " `bketquaxetnghiem` LIKE '%".$db->dblikeescape($kqxn)."%'"; 
		else $array_where [] = "( `bketquaxetnghiem` IS NULL OR `bketquaxetnghiem` ='' OR `bketquaxetnghiem` LIKE '%".$db->dblikeescape($kqxn)."%' )"; 
	}
	if( $nbngaylm > 0 && $nengaylm > 0 ) $array_where [] = " ( `ngaylaymau` >= '".$nbngaylm."' AND `ngaylaymau` <= '".$nengaylm."' ) ";
	if( $nbngaykq > 0 && $nengaykq > 0 ) $array_where [] = " ( `bngaytrakqxn` >= '".$nbngaykq."' AND `bngaytrakqxn` <= '".$nengaykq."' ) ";
	if( $nbngaycn > 0 && $nengaycn > 0 ) $array_where [] = " ( `uptime` >= '".$nbngaycn."' AND `uptime` <= '".$nengaycn."' ) ";
	$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';
	
    $sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_bmxn` ".$where." ORDER BY `id` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
	$_SESSION['sql_print'] = $sql;
	$_SESSION['sql_export'] = "SELECT * FROM `tbl_bmxn` ".$where." ORDER BY `id` DESC LIMIT 15000";
}
elseif ( $tbl_name == 'kqxn_bmxn' )
{
	$array_where = array();
	
	if ( !empty($code_text) ) $array_where [] = " ( `madonvi` IN (".$code_text." ) OR `kuserid` = ".$user_info['s_id']." ) ";
	else $array_where [] = " ( `kuserid` = ".$user_info['s_id']." ) ";
	
	if( !empty($mabn) ) $array_where [] = " `mamaubenhpham` LIKE '%".$db->dblikeescape($mabn)."%'";
	if ($ckc==1) 
	{ 
		if( !empty($hoten) ) $array_where [] = " `hovaten` = ".$db->dbescape($hoten).""; 
		if( !empty($namsinh) ) $array_where [] = " `namsinh` = ".$db->dbescape($namsinh).""; 
	}
	else { if( !empty($hoten) ) $array_where [] = " `hovaten` LIKE '%".$db->dblikeescape($hoten)."%'"; }
	
	if( !empty($kqxn) ) $array_where [] = " `ketquaxetnghiem` LIKE '%".$db->dblikeescape($kqxn)."%'"; 
	if( $nbngaylm > 0 && $nengaylm > 0 ) $array_where [] = " ( `ngaylaymau` >= '".$nbngaylm."' AND `ngaylaymau` <= '".$nengaylm."' ) ";
	if( $nbngaykq > 0 && $nengaykq > 0 ) $array_where [] = " ( `ngaytrakqxn` >= '".$nbngaykq."' AND `ngaytrakqxn` <= '".$nengaykq."' ) ";
	if( $nbngaycn > 0 && $nengaycn > 0 ) $array_where [] = " ( `kuptime` >= '".$nbngaycn."' AND `kuptime` <= '".$nengaycn."' ) ";
	$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';
	
	//$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `kqxn_bmxn` ".$where." ORDER BY `kid` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
    $sql = "SELECT SQL_CALC_FOUND_ROWS t1.*, t2.* FROM `tbl_bmxn` as t1 RIGHT JOIN `tbl_kqxn` as t2 ON t1.`mamaubenhpham` = t2.`kmamaubenhpham`  ".$where." GROUP BY t2.`kmamaubenhpham` ORDER BY `kid` DESC LIMIT " . ($page*$per_page) . "," . $per_page; 
    $_SESSION['sql_print'] = $sql;
	$_SESSION['sql_export'] = "SELECT t1.*, t2.* FROM `tbl_bmxn` as t1 RIGHT JOIN `tbl_kqxn` as t2 ON t1.`mamaubenhpham` = t2.`kmamaubenhpham`  ".$where." GROUP BY t2.`kmamaubenhpham` ORDER BY `kid` DESC LIMIT 10000";
}
$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=main&mabn='.$mabn.'&hoten='.$hoten.'&blm='.$bngaylm.'&elm='.$engaylm.'&kq='.$kq.'&bkq='.$bngaykq.'&ekq='.$engaykq.'&mn='.$mn.'&mdv='.$mdv.'&htlm='.$htlm.'&dtlm='.$dtlm.'&dd='.$diadiem.'&plm='.$plm.'&pxo='.$pxo.'&qho='.$qho.'&ppxn='.$ppxn.'&';
$ii= $per_page*$page + 1;

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['uptime'] =( $row['uptime'] > 0 )? date('d/m/Y H:i:s',$row['uptime']) : '';

	$row['bkuptime'] = ( $row['bkuptime'] > 0 )? date('d/m/Y H:i:s',$row['bkuptime']) : '';
	$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "-";
    
	$row['bngayxetnghiem'] = ($row['bngayxetnghiem']>0)? date('d/m/Y',$row['bngayxetnghiem']) : "-";
	$row['bngaytrakqxn'] = ($row['bngaytrakqxn']>0)? date('d/m/Y',$row['bngaytrakqxn']) : "-";
	$row['bngaynhanmau'] = ($row['bngaynhanmau']>0)? date('d/m/Y',$row['bngaynhanmau']) : "-";
	$row['nhomxn'] = get_group_object($row['doituonglaymau']);
    if ( $tbl_name == 'kqxn_bmxn' )
    {
        $row['bngayxetnghiem'] = ($row['ngayxetnghiem']>0)? date('d/m/Y',$row['ngayxetnghiem']) : "-";
	    $row['bngaytrakqxn'] = ($row['ngaytrakqxn']>0)? date('d/m/Y',$row['ngaytrakqxn']) : "-";  
		$row['bngaynhanmau'] = ($row['bngaynhanmau']>0)? date('d/m/Y',$row['bngaynhanmau']) : "-"; 
        $row['bphuongphapxetnghiem'] = $row['phuongphapxetnghiem'];
        $row['bdonviguimau'] = $row['donviguimau'];
        $row['btinhtrangmau'] = $row['tinhtrangmau'];
        $row['bketquaxetnghiem'] = $row['ketquaxetnghiem'];
        $row['bctvalue'] = $row['ctvalue'];
    }
       
	$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '';
	if( empty( $row['mamaubenhpham'] ) ) $row['mamaubenhpham'] = $row['kmamaubenhpham'];
	if( $row['bketquaxetnghiem'] == 'Dương tính' )
	{
		$row['bketquaxetnghiem'] = '<span class="duongtinh">Dương tính</span>';
		$array_gop = explode(" ", $row['hinhthuclaymau']);
		if ( count($array_gop) > 1 ) $row['bketquaxetnghiem'] = '<span class="duonggop">Dương tính</span>';
	}
	elseif( $row['bketquaxetnghiem'] == 'Âm tính' )
	{
		$row['bketquaxetnghiem'] = '<span class="amtinh">Âm tính</span>';
	}
	if(!empty($row['filepath']))
	{
        $row['baocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=11&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	if(!empty($row['kfilepath']))
	{
        $row['kbaocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=22&id=".$row['kid']."&ck=".md5($row['kid'].$user_info['s_id']);
	}
    $row['edit'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$row['id']."&ck=".$row['ck'];
	$xtpl->assign( 'ROW', $row );
	
	if(!empty($row['filepath']))
	{
		$xtpl->parse( 'main.loop.bmxn' );
	}
	if(!empty($row['kfilepath']))
	{
		$xtpl->parse( 'main.loop.kqxn' );
	}
	//phân quyền
	if (( $user_permission[$module]["full"] == 1 ) )
	{
		$xtpl->parse("main.loop.edit");
	}
	elseif( $user_permission[$module]["edit"] == 1 && ( $row['userid'] == $user_info['s_id']) )
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
//$xtpl->assign( 'doituonglaymau', drawselect_status("doituong", $array_doituong_none, $doituong,"search_profile()","","chosen-select") );
//$xtpl->assign( 'htlm', drawselect_status("htlm", $array_htlm, $htlm,"search_profile()","","chosen-select") );
$xtpl->assign( 'kqxn', drawselect_status("kqxn", $array_kqxn, $kq,"search_profile()","","chosen-select") );
$xtpl->assign( 'ppxn', drawselect_status("ppxn", $array_ppxn, $ppxn,"search_profile()","","chosen-select") );
$xtpl->assign( 'print', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=print" );
$xtpl->assign( 'link_add', DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=add" );
//thêm
if ( $user_permission['home']["add"] == 1 || $user_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.add' );
}
//export
if ( $user_permission['home']["extend"] == 1 || $user_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.extend' );
}

if ( $tbl_name == 'bmxn_kqxn' ) $xtpl->assign( 'check01', 'checked="checked"' );
elseif ( $tbl_name = 'kqxn_bmxn' ) $xtpl->assign( 'check02', 'checked="checked"' );

$xtpl->assign( 'mlink_kqxn', DF_BASE_SITEURL . "form/KQXN011121.xlsx");
$xtpl->assign( 'mlink_bmxn', DF_BASE_SITEURL . "form/TTBP011121.xlsx");
$xtpl->assign( 'mlink_all', DF_BASE_SITEURL . "form/ALL011121.xlsx");
$xtpl->assign( 'mlink_doc', DF_BASE_SITEURL . "form/BMG011121.docx");

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>