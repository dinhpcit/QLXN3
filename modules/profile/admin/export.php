<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */


$sql = $_SESSION['sql_export'] ;

if ( $Request->GetString( 'ac', 'get', '' ) == '6')
{
	$result = $db->sql_query( $sql );
	
	require_once DF_ROOTDIR . '/includes/excel/PHPExcel/IOFactory.php';
	require_once DF_ROOTDIR . '/includes/excel/PHPExcel.php'; 
	$temp = DF_ROOTDIR . '/modules/profile/template/6.table.xlsx'; 
	$excel2 = PHPExcel_IOFactory::createReader('Excel2007');
	$excel2 = $excel2->load($temp); // Empty Sheet
	$excel2->setActiveSheetIndex(0);
	$wizard = new PHPExcel_Helper_HTML;
	$rowCount = 4; //row begin
	$i=1;
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['no'] = $i;
		$row['bg'] = ($i%2==0)? 'class="second"' : '';
		$row['s_birthdate'] = ($row['s_birthdate'] != 0 )? date('d/m/Y', $row['s_birthdate'] ) : date('d/m/Y');
		$row['s_gender'] = !empty( $array_gender[$row['s_gender']] ) ?  $array_gender[$row['s_gender']] : '';
		$en = end ( explode(" ",$row['s_name']) );
		$title = '';
		$excel2->getActiveSheet()->SetCellValue('A'.$rowCount, $i);
		$excel2->getActiveSheet()->SetCellValue('B'.$rowCount, $row['s_name']);
		$excel2->getActiveSheet()->SetCellValue('AD'.$rowCount, $en);
		////
		$rowCount++;
		$i++;
	}
	// Redirect output to a client's web browser (Excel2007)
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8');
	header('Content-Disposition: attachment;filename="thong_ke_'.date('d_m_Y').'.xlsx"');
	header('Cache-Control: max-age=0');
	// If you're serving to IE 9, then the following may be needed
	header('Cache-Control: max-age=1');
	
	// If you're serving to IE over SSL, then the following may be needed
	header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
	header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
	header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
	header ('Pragma: public'); // HTTP/1.0
	
	$objWriter = PHPExcel_IOFactory::createWriter($excel2, 'Excel2007');
	$objWriter->save('php://output');
	exit;
}

exit();

?>