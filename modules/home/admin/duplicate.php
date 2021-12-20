<?php
//get action
$ac = $Request->GetString( "ac", "get", '' );
if( $ac =="set" )
{
	$per = $Request->GetString( "per", "get", '' );
	$_SESSION['per_page'] = $per;
	die('stop!!!');
}

$bdate = $Request->GetString( "bdate", "get", '' );
$edate = $Request->GetString( "edate", "get", '' );
$phanloai = $Request->GetString( "phanloai", "get", '' );
$tinhthanh = $Request->GetInt( "tinhthanh", "get", 0 );
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

$layout = "duplicate.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'per_page', drawselect_status("per_page", $array_per_page, $per_page, "change_per_page()") );
//
$xtpl->assign( 'bdate', $bdate );
$xtpl->assign( 'edate', $edate );

$array_where = array();
if( $nbdate > 0 && $nedate > 0 ) $array_where [] = " ( `addtime` >= '".$nbdate."' AND `addtime` <= '".$nedate."' ) ";
if( !empty($phanloai) ) $array_where [] = " `phanloai_code` = '".$db->dblikeescape($phanloai)."'";
if($tinhthanh > 0) $array_where [] = " `tinhthanh_code` = ".$db->dblikeescape($tinhthanh)."";

$where = (!empty($array_where)) ? " AND " . implode( " AND ", $array_where ) : '';
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_register` WHERE `hovaten` IS NOT NULL ".$where."
        GROUP BY 
            `hovaten`, 
            `namsinh`,
            `gioitinh`,
			`quanhuyentamtru_code`,
			`tinhthanhtamtru_code`,
            `tinhthanh_code`
        HAVING 
            (COUNT(`hovaten`) > 1) AND 
			(COUNT(`namsinh`) > 1) AND 
			(COUNT(`gioitinh`) > 1) AND 
			(COUNT(`quanhuyentamtru_code`) > 1) AND 
			(COUNT(`tinhthanhtamtru_code`) > 1) AND 
			(COUNT(`tinhthanh_code`) > 1)
        ORDER BY `id` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
//set export
$_SESSION['sql_export'] = "SELECT * FROM `tbl_register` WHERE `hovaten` IS NOT NULL ".$where."
        GROUP BY 
            `hovaten`, 
            `namsinh`,
            `gioitinh`,
			`quanhuyentamtru_code`,
			`tinhthanhtamtru_code`,
            `tinhthanh_code`
        HAVING 
			(COUNT(`hovaten`) > 1) AND 
			(COUNT(`namsinh`) > 1) AND 
			(COUNT(`gioitinh`) > 1) AND 
			(COUNT(`quanhuyentamtru_code`) > 1) AND 
			(COUNT(`tinhthanhtamtru_code`) > 1) AND 
			(COUNT(`tinhthanh_code`) > 1)
        ORDER BY `id` DESC LIMIT 5000";
//$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_register` ".$where." ORDER BY `maso` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
//$_SESSION['sql_export'] = "SELECT * FROM tbl_register ". $where . " ORDER BY `maso` DESC LIMIT 10000";

$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=main&mabn='.$mabn.'&hoten='.$hoten.'&bdate='.$bdate.'&edate='.$edate.'&phanloai='.$phanloai.'';
$ii= $per_page*$page + 1;

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['addtime'] = date('d/m/Y H:i:s',$row['addtime']);
	$row['pubtime'] = ($row['pubtime']>0)? date('d/m/Y',$row['pubtime']) : "-";
	if( empty($row['diachitamtru']) || $row['diachitamtru'] == "" || $row['diachitamtru'] == "0") $row['diachitamtru'] = "-";

	$row['link'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=view&id=".$row['id']."&ck=".$row['ck'];
	$row['check'] = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=main&hoten=".$row['hovaten']."&tinhthanh=".$row['tinhthanh_code']."&ns=".$row['namsinh']."ckc=1";
	
	if(!empty($row['phieuxn']))
	{
        $row['phieuxn'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=1&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
		$row['dphieuxn'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=11&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	if(!empty($row['baocaocb']))
	{
        $row['baocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=2&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
		$row['dbaocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=22&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	$row['scolor'] = !empty($row['color'])? 'style="background:'.$row['color']. '"' : "";
	$xtpl->assign( 'ROW', $row );
	
	if(!empty($row['phieuxn']))
	{
		$xtpl->parse( 'main.loop.phieuxn' );
	}
	if(!empty($row['baocaocb']))
	{
		$xtpl->parse( 'main.loop.baocaocb' );
	}

	$xtpl->parse( 'main.loop' );
	$ii++;
}

$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );
$xtpl->assign( 'numall', $all_page );
$xtpl->assign( 'all_number', text_number_format($all_page) ); 

$xtpl->assign( 'phanloai', drawselect_status("phanloai", $array_phanloai_none, $phanloai,'search_duplicate()','','chosen-select') );
//export
if ( $main_permission[$module]["extend"] == 1 || $main_permission[$module]["full"] == 1 ) 
{
	$xtpl->parse( 'main.extend' );
}
$i=1;
foreach ( $array_tinhthanh as $row )
{
	$row['no'] = $i;
	$row['select'] = ($row['matinhthanh'] == $tinhthanh) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.tinhthanh' );
	$i++;
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>