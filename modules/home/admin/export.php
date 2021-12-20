<?php


$lid = $Request->GetString( "lid", "get", '');
$tp = $Request->GetString( "tp", "get", '');

include_once DF_ROOTDIR . "/includes/excel/PHPExcel.php";

$inputFileName = DF_ROOTDIR . "/form/export_temp.xlsx";
if ( $tp == 3 ) $inputFileName = DF_ROOTDIR . "/form/MauTraKQ.xlsx";
$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
$objPHPExcel = PHPExcel_IOFactory::createReader($inputFileType);
$objPHPExcel = $objPHPExcel->load($inputFileName);
$objPHPExcel->setActiveSheetIndex(0);

if ($tp == 1)
{
	$rowCount = 2;
	$tt = 1;
	$sql = "SELECT * FROM `tbl_bmxn` WHERE `id` IN (".$lid.")";
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{	
		$row['uptime'] = date('d/m/Y H:i:s',$row['uptime']);
		$row['bkuptime'] = ( $row['bkuptime'] > 0 )? date('d/m/Y H:i:s',$row['bkuptime']) : '';
		$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "";
		$row['ngayxetnghiem'] = ($row['bngayxetnghiem']>0)? date('d/m/Y',$row['bngayxetnghiem']) : "";
		$row['ngaytrakqxn'] = ($row['bngaytrakqxn']>0)? date('d/m/Y',$row['bngaytrakqxn']) : "";
		$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '';
		$row['nhomxn'] = get_group_object($row['doituonglaymau']);
		if(!empty($row['filepath']))
		{
			$row['tenfilettbp'] = basename($row['filepath']);
		}
		if(!empty($row['bkfilepath']))
		{
			$row['tenfilekqxn'] = basename($row['bkfilepath']);
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $tt);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['mangay']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['madonvi']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['chukymatt']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['mamaubenhpham']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['nhomxn']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['hinhthuclaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['matt']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['hovaten']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['namsinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['gioitinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['dienthoai']);
		$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['tinhnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['huyennoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['xanoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['thonnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['nghenghiep']);
		$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['noilamviec']);
		$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['doituonglaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['lanlaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['odich']);
		$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['phanloainoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['diadiemnoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['huyennoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['xanoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['thonnoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['loaimau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['donvilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $row['maongbenhpham']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $row['manguoiduoclaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, $row['ngaylaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, $row['labcode']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, $row['ngayxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount, $row['bphuongphapxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowCount, $row['ngaytrakqxn']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowCount, $row['bdonviguimau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowCount, $row['btinhtrangmau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowCount, $row['bketquaxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AM'.$rowCount, $row['bctvalue']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AN'.$rowCount, $row['uptime']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AO'.$rowCount, $row['tenfilettbp']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AP'.$rowCount, $row['bkuptime']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ'.$rowCount, $row['tenfilekqxn']);
		$rowCount++;	
		$tt++;
	}
}
elseif ($tp == 2)
{
	$rowCount = 2;
	$tt = 1;
	$sql = $_SESSION['sql_export'];
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['uptime'] = date('d/m/Y H:i:s',$row['uptime']);
		$row['bkuptime'] = ( $row['bkuptime'] > 0 )? date('d/m/Y H:i:s',$row['bkuptime']) : '';
		$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "";
		$row['ngayxetnghiem'] = ($row['bngayxetnghiem']>0)? date('d/m/Y',$row['bngayxetnghiem']) : "";
		$row['ngaytrakqxn'] = ($row['bngaytrakqxn']>0)? date('d/m/Y',$row['bngaytrakqxn']) : "";
		$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '';
		$row['nhomxn'] = get_group_object($row['doituonglaymau']);
		if(!empty($row['filepath']))
		{
			$row['tenfilettbp'] = basename($row['filepath']);
		}
		if(!empty($row['bkfilepath']))
		{
			$row['tenfilekqxn'] = basename($row['bkfilepath']);
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $tt);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['mangay']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['madonvi']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['chukymatt']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['mamaubenhpham']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['nhomxn']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['hinhthuclaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['matt']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['hovaten']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['namsinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['gioitinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['dienthoai']);
		$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['tinhnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['huyennoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['xanoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('P'.$rowCount, $row['thonnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$rowCount, $row['nghenghiep']);
		$objPHPExcel->getActiveSheet()->SetCellValue('R'.$rowCount, $row['noilamviec']);
		$objPHPExcel->getActiveSheet()->SetCellValue('S'.$rowCount, $row['doituonglaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('T'.$rowCount, $row['lanlaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('U'.$rowCount, $row['odich']);
		$objPHPExcel->getActiveSheet()->SetCellValue('V'.$rowCount, $row['phanloainoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('W'.$rowCount, $row['diadiemnoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('X'.$rowCount, $row['huyennoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Y'.$rowCount, $row['xanoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('Z'.$rowCount, $row['thonnoilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AA'.$rowCount, $row['loaimau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AB'.$rowCount, $row['donvilaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AC'.$rowCount, $row['maongbenhpham']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AD'.$rowCount, $row['manguoiduoclaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AE'.$rowCount, $row['ngaylaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AF'.$rowCount, $row['labcode']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AG'.$rowCount, $row['ngayxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AH'.$rowCount, $row['bphuongphapxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AI'.$rowCount, $row['ngaytrakqxn']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AJ'.$rowCount, $row['bdonviguimau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AK'.$rowCount, $row['btinhtrangmau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AL'.$rowCount, $row['bketquaxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AM'.$rowCount, $row['bctvalue']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AN'.$rowCount, $row['uptime']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AO'.$rowCount, $row['tenfilettbp']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AP'.$rowCount, $row['bkuptime']);
		$objPHPExcel->getActiveSheet()->SetCellValue('AQ'.$rowCount, $row['tenfilekqxn']);
		$rowCount++;	
		$tt++;
	}
}
elseif ($tp == 3)
{
	$rowCount = 2;
	$tt = 1;
	$sql = $_SESSION['sql_export'];
	$result = $db->sql_query( $sql );
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['uptime'] = date('d/m/Y H:i:s',$row['uptime']);
		$row['bkuptime'] = ( $row['bkuptime'] > 0 )? date('d/m/Y H:i:s',$row['bkuptime']) : '';
		$row['ngaylaymau'] = ($row['ngaylaymau']>0)? date('d/m/Y',$row['ngaylaymau']) : "";
		$row['ngayxetnghiem'] = ($row['bngayxetnghiem']>0)? date('d/m/Y',$row['bngayxetnghiem']) : "";
		$row['ngaytrakqxn'] = ($row['bngaytrakqxn']>0)? date('d/m/Y',$row['bngaytrakqxn']) : "";
		$row['labcode'] = ( !empty($array_donvilm[$row['labcode']]) )? $array_donvilm[$row['labcode']]['s_name'] : '';
		$row['nhomxn'] = get_group_object($row['doituonglaymau']);
		if(!empty($row['filepath']))
		{
			$row['tenfilettbp'] = basename($row['filepath']);
		}
		if(!empty($row['bkfilepath']))
		{
			$row['tenfilekqxn'] = basename($row['bkfilepath']);
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$rowCount, $tt);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$rowCount, $row['manguoiduoclaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$rowCount, $row['hovaten']);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$rowCount, $row['namsinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('E'.$rowCount, $row['gioitinh']);
		$objPHPExcel->getActiveSheet()->SetCellValue('F'.$rowCount, $row['thonnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('G'.$rowCount, $row['xanoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('H'.$rowCount, $row['huyennoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('I'.$rowCount, $row['tinhnoio']);
		$objPHPExcel->getActiveSheet()->SetCellValue('J'.$rowCount, $row['noilamviec']);
		$objPHPExcel->getActiveSheet()->SetCellValue('K'.$rowCount, $row['doituonglaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('L'.$rowCount, $row['ngaylaymau']);
		$objPHPExcel->getActiveSheet()->SetCellValue('M'.$rowCount, $row['ngayxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('N'.$rowCount, $row['bketquaxetnghiem']);
		$objPHPExcel->getActiveSheet()->SetCellValue('O'.$rowCount, $row['bctvalue']);
		$rowCount++;	
		$tt++;
	}
}
// Redirect output to a client's web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;charset=UTF-8');
header('Content-Disposition: attachment;filename="Export_DS-F0_'.date("Ymd")."_".time().'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit();

?>