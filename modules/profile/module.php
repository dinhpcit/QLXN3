<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( ! defined( 'DF_IS_USER' ) && ! defined( 'DF_IS_ADMIN' ) )
{
    header( "Location: " . DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

include_once( DF_ROOTDIR . "/modules/home/data_define.php");

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
?>