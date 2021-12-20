<?php

$mabn = $Request->GetString( "mabn", "get", '' );
$hoten = $Request->GetString( "hoten", "get", '' );
$bdate = $Request->GetString( "bdate", "get", '' );
$edate = $Request->GetString( "edate", "get", '' );
$code_begin = $Request->GetString( "cbegin", "get", '' );
$code_end = $Request->GetString( "cend", "get", '' );

$phanloai = $Request->GetString( "phanloai", "get", '' );
$tinhthanh = $Request->GetInt( "thp", "get", 0 );
$page = $Request->GetInt( "page", "get", 0 ); if ($page<0) $page = 0;
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;

$bcode = str_replace("BN","",$code_begin);
$ecode = str_replace("BN","",$code_end);

$bcode = ( $bcode > 0 )?  $bcode : 0;
$ecode = ( $ecode > 0 )?  $ecode : 0;

//thong ke
if ($bcode >0 && $ecode>0 )
{
	//tổng số ca
	$sql_count = "SELECT COUNT(`masobn`) as `tongso` FROM `tbl_register` WHERE ( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " )";
	$result_count = $db->sql_query( $sql_count );
	$data_count = $db->sql_fetchrow( $result_count, 2 );
	$tongsoca = $data_count['tongso'];
	//so ca nhap canh
	$sql_count = "SELECT COUNT(`masobn`) as `tongso` FROM `tbl_register` WHERE ( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " ) AND (`phanloai_code` = 'NC' OR `phanloai` LIKE '%nhập cảnh%')";
	$result_count = $db->sql_query( $sql_count );
	$data_count = $db->sql_fetchrow( $result_count, 2 );
	$socanhapcanh = $data_count['tongso'];
	//so ca cong dong
	$sql_count = "SELECT COUNT(`masobn`) as `tongso` FROM `tbl_register` WHERE  ( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " )  AND (`doituonglaymau` LIKE '%cộng đồng%') AND (`phanloai_code` = 'TN' OR `phanloai` LIKE '%trong nước%')";
	$result_count = $db->sql_query( $sql_count );
	$data_count = $db->sql_fetchrow( $result_count, 2 );
	$socacongdong = $data_count['tongso'];
	//tong theo tung tinh nhap canh
	$sql_count = "SELECT COUNT(`masobn`) as `numtt`, `tinhthanh_code` FROM `tbl_register` WHERE ( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " ) AND  (`phanloai_code` = 'NC' OR `phanloai` LIKE '%nhập cảnh%' ) GROUP BY `tinhthanh_code` ";
	$result_count = $db->sql_query( $sql_count );
	$array_tinhtpnc = array(); 
	
	while ( $row_temp = $db->sql_fetchrow( $result_count, 2 ) )
	{
		$array_tinhtpnc[$row_temp["tinhthanh_code"]] = $row_temp['numtt'];
	}
	arsort($array_tinhtpnc);
	$array_tttextnc = array();
	foreach ($array_tinhtpnc as $idi => $numi )
	{
		$tinhthanh_i = $array_tinhthanh[$idi]['tinhthanhpho']; 
		$tinhthanh_i = str_replace("Thành phố","",$tinhthanh_i);
		$tinhthanh_i = str_replace("Tỉnh","",$tinhthanh_i);
		$tinhthanh_i = trim($tinhthanh_i);
		$array_tttextnc[] = $tinhthanh_i . " (".$numi.")";
	}
	$txt_ttnc = implode(", ",$array_tttextnc);
	//tong theo tung tinh trong nuoc	
	$sql_count = "SELECT COUNT(`masobn`) as `numtt`, `tinhthanh_code` FROM `tbl_register` WHERE ( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " ) AND  (`phanloai_code` = 'TN' OR `phanloai` LIKE '%trong nước%' ) GROUP BY `tinhthanh_code` ";
	$result_count = $db->sql_query( $sql_count );
	$array_tinhtp = array(); 
	
	while ( $row_temp = $db->sql_fetchrow( $result_count, 2 ) )
	{
		$array_tinhtp[$row_temp["tinhthanh_code"]] = $row_temp['numtt'];
	}
	arsort($array_tinhtp);
	$array_tttext = array();
	foreach ($array_tinhtp as $idi => $numi )
	{
		$tinhthanh_i = $array_tinhthanh[$idi]['tinhthanhpho']; 
		$tinhthanh_i = str_replace("Thành phố","",$tinhthanh_i);
		$tinhthanh_i = str_replace("Tỉnh","",$tinhthanh_i);
		$tinhthanh_i = trim($tinhthanh_i);
		$array_tttext[] = $tinhthanh_i . " (".text_number_format($numi).")";
	}
	$txt_tt = implode(", ",$array_tttext);
	$contentex = "Ghi nhận ".text_number_format($tongsoca)." ca dương tính, trong đó có ".text_number_format($tongsoca-$socanhapcanh)." ca ghi nhận trong nước tại ".$txt_tt." và ".$socanhapcanh." ca nhập cảnh ghi nhận tại ".$txt_ttnc.".";
}

$layout = "statistic.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'DATA', $data );
$xtpl->assign( 'per_page', drawselect_status("per_page", $array_per_page, $per_page, "change_per_page()") );

//$xtpl->assign( 'link_edit', DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=statistic&id=".$id."&ck=".$ck );

$array_where = array();
if( $bcode > 0 && $ecode > 0) $array_where [] = "( `maso` >= ".intval($bcode)." AND `maso` <= ".intval($ecode) . " )";
if( !empty($phanloai) ) $array_where [] = " `phanloai_code` = '".$db->dblikeescape($phanloai)."'";
if($tinhthanh > 0) $array_where [] = " `tinhthanh_code` = ".$db->dblikeescape($tinhthanh)."";

$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_register` ".$where." ORDER BY `maso` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
if( ($bcode > 0 && $ecode > 0) || $tinhthanh > 0 || !empty($phanloai) )
{
	$_SESSION['sql_export'] = "SELECT * FROM tbl_register ". $where . " ORDER BY `maso` ";
}
$result = $db->sql_query( $sql ); //die($sql);
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=statistic&cbegin='.$code_begin.'&cend='.$code_end.'&phanloai='.$phanloai.'&thp='.$tinhthanh."&";
$ii= $per_page*$page + 1;

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['addtime'] = date('d/m/Y H:i:s',$row['addtime']);
	$row['pubtime'] = ($row['pubtime']>0)? date('d/m/Y',$row['pubtime']) : "-";
	if( empty($row['diachitamtru']) || $row['diachitamtru'] == "" || $row['diachitamtru'] == "0") $row['diachitamtru'] = "-";
	
	$row['link'] = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=view&id=".$row['id']."&ck=".$row['ck'];
	$row['edit'] = DF_BASE_ADMINURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=edit&id=".$row['id']."&ck=".$row['ck'];
	$row['scolor'] = !empty($row['color'])? 'style="background:'.$row['color']. '"' : "";
	
	if(!empty($row['phieuxn']))
	{
        $row['phieuxn'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&&tp=1&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	if(!empty($row['baocaocb']))
	{
        $row['baocaocb'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=download&tp=2&id=".$row['id']."&ck=".md5($row['id'].$user_info['s_id']);
	}
	
	$xtpl->assign( 'ROW', $row );
	if(!empty($row['phieuxn']))
	{
		$xtpl->parse( 'main.loop.phieuxn' );
	}
	if(!empty($row['baocaocb']))
	{
		$xtpl->parse( 'main.loop.baocaocb' );
	}
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
$xtpl->assign( 'all_number', text_number_format($all_page) ); 

$xtpl->assign( 'code_begin', $code_begin ); 
$xtpl->assign( 'code_end', $code_end ); 
$xtpl->assign( 'contentex', $contentex ); 

$xtpl->assign( 'phanloai', drawselect_status("phanloai", $array_phanloai_none, $phanloai,"gostatistic()","","chosen-select" ));

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