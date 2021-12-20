<?php
$tbl_name = isset($_SESSION['tblpage'])? $_SESSION['tblpage'] : 'bmxn_kqxn';
$sql = $_SESSION['sql_print'];

$layout = "print.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );

$result = $db->sql_query( $sql );

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
    if ( $tbl_name == 'kqxn_bmxn' )
    {
        $row['bngayxetnghiem'] = ($row['ngayxetnghiem']>0)? date('d/m/Y',$row['ngayxetnghiem']) : "-";
	    $row['bngaytrakqxn'] = ($row['ngaytrakqxn']>0)? date('d/m/Y',$row['ngaytrakqxn']) : "-";   
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

	$xtpl->assign( 'ROW', $row );

	$xtpl->parse( 'main.loop' );
	$ii++;
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo print_theme( $content );

?>