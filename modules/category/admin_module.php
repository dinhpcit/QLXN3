<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( !defined( 'DF_IS_ADMIN' ) ) 
{
	header( "Location: " . DF_BASE_ADMINURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

$array_phuongxa = array();
$sql = "SELECT * FROM tbl_diachi_phuongxa";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_phuongxa[$row['mapx']]	= $row;
}

$array_quanhuyen = array();
$sql = "SELECT * FROM `tbl_diachi_quanhuyen`";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_quanhuyen[$row['maqh']] = $row;
}

$array_tinhthanh = array();
$sql = "SELECT * FROM `tbl_diachi_tinhthanh`";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_tinhthanh[$row['matinhthanh']] = $row;
}

function datetotime ($date, $format = 'YYYY-MM-DD') {

	if ($format == 'YYYY-MM-DD') list($year, $month, $day) = explode('-', $date);
	if ($format == 'YYYY/MM/DD') list($year, $month, $day) = explode('/', $date);
	if ($format == 'YYYY.MM.DD') list($year, $month, $day) = explode('.', $date);

	if ($format == 'DD-MM-YYYY') list($day, $month, $year) = explode('-', $date);
	if ($format == 'DD/MM/YYYY') list($day, $month, $year) = explode('/', $date);
	if ($format == 'DD.MM.YYYY') list($day, $month, $year) = explode('.', $date);

	if ($format == 'MM-DD-YYYY') list($month, $day, $year) = explode('-', $date);
	if ($format == 'MM/DD/YYYY') list($month, $day, $year) = explode('/', $date);
	if ($format == 'MM.DD.YYYY') list($month, $day, $year) = explode('.', $date);

	return mktime(0, 0, 0, $month, $day, $year);
}

function numberToColumnName($index) 
{
	$array_lable = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","AA","AB","AC","AD","AE","AF","AG","AH","AI","AJ","AK","AL","AM","AN","AO","AP","AQ","AR","AS","AT","AU","AV","AW","AX","AY","AZ","BA","BB","BC","BD","BE","BF","BG","BH","BI","BJ","BK","BL","BM","BN","BO","BP","BQ","BR","BS","BT","BU","BV","BW","BX","BY","BZ");
	if( !empty($array_lable[$index]) ) return $array_lable[$index];
	else return "A";
}

function create_pagination($total_records,$per_page,$page_curent,$link)
{
	$total_pages = ceil($total_records / $per_page);
	$n_begin = ($page_curent * $per_page) + 1;
	$e_begin = ($page_curent * $per_page) + $per_page;
	if( $e_begin > $total_records ) $e_begin = $total_records; 
	$link_next = '#';
	$link_back = '#';
	if( $page_curent+1 < $total_pages+1 ) $link_next = $link.'&amp;page='.($page_curent+1);
	if( $page_curent > 0 ) $link_back = $link.'&amp;page='.($page_curent-1);
	$html = '<script type="text/javascript">$(document).keyup(function (e) { if ($("#page_input").is(":focus") && (e.keyCode == 13)) { var link_page = "'.$link.'&page=" + ( $("#page_input").val() - 1 ); window.location.href=link_page; }}); </script>';
	$html .= 'Bản ghi '.$n_begin.' - '.$e_begin.' trong tổng số '.$total_records;
	$html .= '&nbsp;&nbsp;<a href="'.$link_back.'" class="button_ck"><i class="fa fa-angle-left" aria-hidden="true"></i></a>';
	$html .= '&nbsp;<a href="'.$link_next.'" class="button_ck"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
	$html .= '&nbsp; Trang <input type="text" style="width:50px; text-align: center" name="page_input" id="page_input" value="'.($page_curent+1).'"/>';
	return $html;
}

function add_reg_his($cm,$id)
{
	global $db, $user_info;
	$sql = "INSERT INTO `tbl_register_his` (`id`, `rid`, `sid`, `note`, `addtime`) 
			VALUES (NULL, " . $id . ", " . $user_info['s_id']. ", ".$db->dbescape( $cm ).", ".time()." );";
	$idnew = $db->sql_query_insert_id( $sql ); 
	$db->sql_freeresult();
}
?>