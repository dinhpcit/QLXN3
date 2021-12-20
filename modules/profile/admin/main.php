<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

include_once DF_ROOTDIR.'/includes/countrys.php';

if ( $Request->GetString( 'ac', 'get', '' ) == 'export')
{
	require_once( DF_ROOTDIR . "/includes/class/class.excel.php" );
	$sql = $_SESSION['sql_export'] ; 
	
	$result = $db->sql_query( $sql );
	
	$data_array = array();
	$array_value = array( 
		"TT", "Tên đăng nhập", "Họ và tên/Tên đơn vị", "Email","Di động","Code","Type"
	);
	$data_array[] = $array_value;
	unset( $array_value );
	$i=1;
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['no'] = $i;
		$row['bg'] = ($i%2==0)? 'class="second"' : '';
		$row['s_birthdate'] = ($row['s_birthdate'] != 0 )? date('d/m/Y', $row['s_birthdate'] ) : date('d/m/Y');
		$row['s_gender'] = !empty( $array_gender[$row['s_gender']] ) ?  $array_gender[$row['s_gender']] : '';
		$array_value = array( 
			$i, 
			$row['s_username'], 
			$row['s_name'], 
			$row['s_email'],
			$row['s_cellphone'],
			$row['s_code'],
			$row['address']
		);
		$i++;
		$data_array[] = $array_value;
		unset( $array_value );
	}
	
	$xls = new Excel_XML( 'UTF-8', false, 'Worksheet' );
	$xls->addArray( $data_array );
	$xls->generateXML( "DSTK".date("d-m-Y") );
	exit();
}

$s_name = $Request->GetString( "s_name", "get", '' );
$s_email = $Request->GetString( "s_email", "get", '' );
$s_current = $Request->GetString( "s_current", "get", '' );
$page = $Request->GetInt( "page", "get", 0 );
$per_page = 30;
	
$array_where = array();
if( !empty($s_name) ) $array_where [] = " `s_name` LIKE '%".$db->dblikeescape($s_name)."%'";
if( !empty($s_email) ) $array_where [] = " `s_email` LIKE '%".$db->dblikeescape($s_email)."%'";
if( !empty($s_current) ) $array_where [] = " `s_organ` LIKE '%".$db->dblikeescape($s_current)."%'";

$where = (!empty($array_where)) ? " WHERE " . implode( " AND ", $array_where ) : '';
$sql = "SELECT SQL_CALC_FOUND_ROWS * FROM tbl_profile ". $where . " ORDER BY s_regtime DESC LIMIT " . $page . "," . $per_page;
$_SESSION['sql_export'] = "SELECT SQL_CALC_FOUND_ROWS * FROM tbl_profile ". $where . "";
$result = $db->sql_query( $sql );
$result_all = $db->sql_query( "SELECT FOUND_ROWS()" );
list( $all_page ) = $db->sql_fetchrow( $result_all );

$base_url = DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . '=main&s_field='.$s_field.'&s_name='.$s_name.'&s_email='.$s_email.'&s_current='.$s_current.'&';
			
$layout = "main.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 's_name', $s_name );
$xtpl->assign( 's_middle_name', $middle_name );
$xtpl->assign( 's_family_name', $family_name );
$xtpl->assign( 's_email', $s_email );
$xtpl->assign( 's_current', $s_current );

$i= $page + 1;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$row['no'] = $i;
	$row['bg'] = ($i%2==0)? 'class="second"' : '';
	$row['s_birthdate'] = ($row['s_birthdate'] != 0 )? date('d/m/Y', $row['s_birthdate'] ) : date('d/m/Y');
	$row['s_gender'] = !empty( $array_gender[$row['s_gender']] ) ?  $array_gender[$row['s_gender']] : '';
	$row['address'] = (!empty($array_tinhthanh[$row['address']]))? $array_tinhthanh[$row['address']]['tinhthanhpho'] : $row['address'];
	$row['ck'] = md5($row['s_id'].$admin_info['u_id']);
	$xtpl->assign( 'ROW', $row );	
	$xtpl->parse( 'main.loop' );
	$i++;
}

$page_html = draw_page($base_url, $all_page, $per_page, $page );
$xtpl->assign( 'numall', $all_page );
$xtpl->assign( 'page_html', $page_html );
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>