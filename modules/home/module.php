<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( ! defined( 'DF_IS_USER' ) && ! defined( 'DF_IS_ADMIN' ) )
{
    header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

include_once( DF_ROOTDIR . "/modules/" . $module . "/data_define.php");

global $array_phuongxa;
$array_phuongxa = array();
$sql = "SELECT * FROM `tbl_diachi_phuongxa`";
$array_phuongxa = fn_db_cache( $sql, 'mapx', $module );

global $array_quanhuyen;
$array_quanhuyen = array();
$sql = "SELECT * FROM `tbl_diachi_quanhuyen`";
$array_quanhuyen = fn_db_cache( $sql, 'maqh', $module );

global $array_tinhthanh;
$array_tinhthanh = array();
$sql = "SELECT * FROM `tbl_diachi_tinhthanh`";
$array_tinhthanh = fn_db_cache( $sql, 'matinhthanh', $module );

global $array_donvilm;
$array_donvilm = array(); 
$sql = "SELECT `s_id`,`s_name`, `s_code` FROM `tbl_profile` WHERE (`address` LIKE '%LAB%' OR `address` LIKE '%ALL%') ORDER BY `s_id` ASC";
$array_donvilm = fn_db_cache( $sql, 's_id', $module );

global $array_doituonglaymau;
$array_doituonglaymau = array(); 
$sql = "SELECT * FROM `tbl_group_obj`";
$array_doituonglaymau = fn_db_cache( $sql, 'id', $module );

global $array_donvixn;
$array_donvixn = array(); 
$sql = "SELECT `s_id`,`s_name`, `s_code` FROM `tbl_profile` WHERE (`address` LIKE '%LAB%' OR `address` LIKE '%ALL%') ORDER BY `s_id` ASC";
$array_donvixn = fn_db_cache( $sql, 's_id', $module );

function find_adrress($tinhthanh,$quanhuyen,$phuongxa)
{
	global $db;
    $tinhthanh = str_replace("TP.","",$tinhthanh);
    $tinhthanh = str_replace("TP","",$tinhthanh);
    $tinhthanh = trim($tinhthanh);
    if( $tinhthanh == 'HCM') $tinhthanh = "Thành phố Hồ Chí Minh";
	if( $tinhthanh == 'Bà Rịa-Vũng Tàu') $tinhthanh = "Bà Rịa - Vũng Tàu";
	
    $quanhuyen = remove_0($quanhuyen);
	$quanhuyen = str_replace("TP.","",$quanhuyen);
	$quanhuyen = str_replace("TP","",$quanhuyen);
	$quanhuyen = str_replace("Q.","",$quanhuyen);
	$quanhuyen = str_replace("H.","",$quanhuyen);
	if( $quanhuyen == 'Lagi') $quanhuyen = "La Gi";
	$quanhuyen = trim($quanhuyen);
	
	$phuongxa = str_replace("P.","",$phuongxa);
	$phuongxa = str_replace("TT.","",$phuongxa);
	$phuongxa = str_replace("TT","",$phuongxa);
	$phuongxa = trim($phuongxa);
    
	$array_dc = array("matinhthanh"=>"", "maqh"=>"", "mapx"=>"");
	$matinhthanh = "";
	$maqh = "";
	$mapx = "";
	if( !empty($tinhthanh) )
	{
		$sql = "SELECT `matinhthanh` FROM `tbl_diachi_tinhthanh` WHERE `tinhthanhpho` LIKE '%".$db->dblikeescape($tinhthanh)."%' LIMIT 1";
		$result = $db->sql_query( $sql ); 
		$data_tinhthanh = $db->sql_fetchrow( $result, 2 );
		if( !empty($data_tinhthanh['matinhthanh']) ) 
		{
			$array_dc["matinhthanh"] = $matinhthanh = $data_tinhthanh['matinhthanh'];
			if (!empty($quanhuyen) )
			{
				$sql = "SELECT `maqh` FROM `tbl_diachi_quanhuyen` WHERE `matinhthanh` = ".$db->dbescape($matinhthanh)." AND `quanhuyen` LIKE '%".$db->dblikeescape($quanhuyen)."%' LIMIT 1";
				$result = $db->sql_query( $sql ); 
				$data_quanhuyen = $db->sql_fetchrow( $result, 2 ); 
				if( !empty($data_quanhuyen['maqh']) ) 
				{
					$array_dc["maqh"] = $maqh = $data_quanhuyen['maqh'];
					if (!empty($phuongxa) )
					{
						$sql = "SELECT `mapx` FROM `tbl_diachi_phuongxa` WHERE `maqh` = ".$db->dbescape($maqh)." AND `phuongxa` LIKE '%".$db->dblikeescape($phuongxa)."%' LIMIT 1";
						$result = $db->sql_query( $sql ); 
						$data_phuongxa = $db->sql_fetchrow( $result, 2 ); 
						if( !empty($data_phuongxa['mapx']) ) 
						{
							$array_dc["mapx"] = $data_phuongxa['mapx'];
						}
					}
				}
			}
		}
	}
	return $array_dc;
		
}
function remove_0($text)
{
    $text = trim($text);
    $array = array("01","02","03","04","05","06","07","08","09");
    if( in_array($text, $array) )
    {
        return str_replace("0","",$text);    
    }
    return $text;
}

function check_duplicate($hoten,$namsinh,$mamaubenhpham,$manguoiduoclaymau,$dienthoai)
{
	global $db;
	$sql = "SELECT * FROM `tbl_bmxn` WHERE `hovaten` = ".$db->dbescape($hoten)." AND `namsinh` = ".$db->dbescape($namsinh)." AND `mamaubenhpham` = ".$db->dbescape($mamaubenhpham)." AND `dienthoai` = ".$db->dbescape($dienthoai)."";
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 ); 
	if ( !empty($data['id']) ) return true;
	return false;
	
}

function check_duplicate_kqxn($kmamaubenhpham,$phuongphapxetnghiem,$donviguimau,$ketquaxetnghiem)
{
	global $db;
	$sql = "SELECT * FROM `tbl_kqxn` WHERE `kmamaubenhpham` = ".$db->dbescape($kmamaubenhpham)." ";
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
	if ( !empty($data['kid']) ) return true;
	return false;
}

function datetotime ($date, $format = 'YYYY-MM-DD') 
{
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
	$html .= ''.$n_begin.' - '.$e_begin.' trong '.text_number_format($total_records)." bản ghi";
	$html .= '&nbsp;&nbsp;<a href="'.$link_back.'" class="button_ck"><i class="fa fa-angle-left" aria-hidden="true"></i></a>';
	$html .= '&nbsp;<a href="'.$link_next.'" class="button_ck"><i class="fa fa-angle-right" aria-hidden="true"></i></a>';
	$html .= '&nbsp; Trang <input type="text" style="width:50px; text-align: center" name="page_input" id="page_input" value="'.($page_curent+1).'"/>';
	return $html;
}
function get_group_object($object)
{
	global $array_doituonglaymau;
	$ob = "";
	foreach( $array_doituonglaymau as $obj_i)
	{
		if ( $object == $obj_i['title'])
		{
			$ob = $obj_i['group_name'];	
			return $ob;
		}
	}
	return "Nhóm 2";
}

?>