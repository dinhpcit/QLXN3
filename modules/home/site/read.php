<?php

$lid = $Request->GetString( "lid", "get", '');
$kqxn = $Request->GetString( "kqxn", "get", '');

$ac = $Request->GetString( "ac", "get", '' );
if( $ac =="set" )
{
	$per = $Request->GetString( "per", "get", '' );
	if (!empty($per) ) $_SESSION['per_page'] = $per;
	die('stop!!!');
}

$hoten = $Request->GetString( "hoten", "get", '' );

$qrid = $Request->GetInt( "qrid", "get", 0 );
if($qrid > 0){
	$sql = "UPDATE `tbl_pro` SET 
			`active` = 1
	WHERE id=" . $qrid . " AND `active` = 0";
	$db->sql_query( $sql );
}
$page = $Request->GetInt( "page", "get", 0 );
$per_page = isset($_SESSION['per_page'])? intval($_SESSION['per_page']) : 100;

$layout = "read.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
$xtpl->assign( 'per_page', drawselect_status("per_page", $array_per_page, $per_page, "change_per_page()") );
//
$xtpl->assign( 'hoten', $hoten );

if( !empty($hoten) ) $array_where [] = " `hovaten` LIKE '%".$db->dblikeescape($hoten)."%'"; 
$array_where [] = "`active` = 1";
	
$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';

$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM `tbl_pro` ".$where." ORDER BY `id` DESC LIMIT " . ($page*$per_page) . "," . $per_page;
//$_SESSION['sql_print'] = $sql;
//$_SESSION['sql_export'] = "SELECT * FROM `tbl_bmxn` ".$where." ORDER BY `id` DESC LIMIT 15000";

$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );
$base_url = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=main&hoten='.$hoten.'&';
$ii= $per_page*$page + 1;

while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $ii;
	$row['bg'] = ($ii%2==0)? 'class="row_second"' : '';
	$row['ck'] = md5($row['id'].$user_info['s_id']);
	$row['addtime'] =( $row['addtime'] > 0 )? date('d/m/Y H:i:s',$row['addtime']) : '';
    $row['edit'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=add&id=".$row['id']."&ck=".$row['ck']; 
	$row['ptn'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=ptn&id=".$row['id']."&ck=".$row['ck'];
	$xtpl->assign( 'ROW', $row );
	
	//phân quyền
	if (( $user_permission[$module]["full"] == 1 ) )
	{
		$xtpl->parse("main.loop.edit");$xtpl->parse("main.loop.ptn");
	}
	elseif( $user_permission[$module]["edit"] == 1 && ( $row['userid'] == $user_info['s_id']) )
	{
        $xtpl->parse("main.loop.edit");$xtpl->parse("main.loop.ptn");
	}

	$xtpl->parse( 'main.loop' );
	$ii++;
}

if( !empty($lid))
{
	$sql = "UPDATE `tbl_pro` SET 
			`active` = 2,
			`kqxn` = ".$db->dbescape($kqxn)."
	WHERE `id` IN (".$lid.")";
	$db->sql_query( $sql );
	
	//
	$sql = "INSERT INTO `tbl_bmxn` (`hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `tinhnoio`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `labcode`) SELECT `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `tinhnoio`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `kqxn` FROM `tbl_pro` WHERE `active` = 2 AND `id` IN (".$lid.")";
	 $idnew = $db->sql_query_insert_id( $sql );
}
$page_html = create_pagination($all_page,$per_page,$page,$base_url);
$xtpl->assign( 'page_html', $page_html );
$xtpl->assign( 'numall', $all_page );
$xtpl->assign( 'all_number', $all_page );

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

foreach ( $array_donvixn as $row )
{
	$row['select'] = ($row['s_id'] == $xn) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.dvxn' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>