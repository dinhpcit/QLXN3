<?php
/*
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
*/
$upload_path_year = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y'); 
if ( !is_dir ( $upload_path_year) ) mkdir ( $upload_path_year );
$upload_path_month = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y')."/". date('Y-m'); 
if ( !is_dir ( $upload_path_month) ) mkdir ( $upload_path_month );
$upload_path = DF_ROOTDIR . "/".DF_UPLOAD_FOLDER."/".$module."/" . date('Y')."/". date('Y-m')."/". date('Y-m-d'); 
if ( !is_dir ( $upload_path) ) mkdir ( $upload_path );
//$upload_path_temp = DF_ROOTDIR . "/".DF_TEMP_DIR; 
$scode = $user_info['s_code'];

$array_code = array();
$inum = 0;
$newid = 0;
$data_post = array();
$type = 0;
if ( $Request->GetInt( "savebmxn", "post", 0 ) )
{ 
	$type = 1;
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	$labcode = $Request->GetString( "labcode", "post", '' );	
	if (empty($labcode) && $global_config['check']['value'] == '0' )
	{
		$error = "Lỗi: bạn chưa chọn đơn vị xét nghiệm";
	}
	if (!check_capchar($cap))
	{
		$error = "Lỗi: Chuỗi an ninh không đúng";
	}
	elseif( empty($error))
	{
		$fileid = $scode."_".date("YmdHi");
		include_once DF_ROOTDIR . '/includes/class/class.upload.php';
		//file bao cao
		if ( !empty($_FILES ['uploadfile_excel']['tmp_name']) )
		{
			$handle = new Upload ( $_FILES ['uploadfile_excel'] );
			$info = pathinfo($_FILES["uploadfile_excel"]["name"]);
			$file_name =  basename($fileid."_BMXN",'.'.$info['extension']);
			$handle->file_new_name_body = basename( str_unicode($file_name) );
			if ($handle->uploaded) {
				$handle->Process ( $upload_path );
				if ($handle->processed) 
				{
					$data_file_basename = "" . date('Y')."/". date('Y-m')."/". date('Y-m-d') ."/".$handle->file_dst_name;
				} 
				else 
				{
					$error = $handle->error;
				}
				$handle->Clean ();
			} 
			else 
			{
				$error = $handle->error;
			}
			unset($handle);
			if ( empty( $error ) )
			{
				include_once DF_ROOTDIR . "/includes/excel/PHPExcel.php";
					  			
				$inputFileName = DF_ROOTDIR . "/uploads/".$module."/".$data_file_basename;
				$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
				$cacheSettings = array( ' memoryCacheSize '  => '8MB' );
				PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);

				$objReader->setReadDataOnly(true);
				
				$objPHPExcel = $objReader->load($inputFileName);

				$objWorksheet = $objPHPExcel->getActiveSheet();

				$highestRow = $objWorksheet->getHighestRow();
				$highestColumn = $objWorksheet->getHighestColumn();
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
				/*
				$rows = array();
				for ($row = 2; $row <= $highestRow; $row++) 
				{
				  for ($col = 0; $col <= 29; $col++) 
				  {
					$code_check = $objWorksheet->getCellByColumnAndRow(6, $row)->getValue();
					if( $code_check != '' )
					{
						$code_text = $objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
						if(strstr($code_text,'=')==true)
						{
							$rows[$row][$col] = $objWorksheet->getCellByColumnAndRow($col, $row)->getCalculatedValue();
						}
						else
						{
							$rows[$row][$col] = $code_text;
						}
					}
				  }
				}
				print_r($rows);die();
				*/
				$mangay = $objWorksheet->getCellByColumnAndRow(0, 2)->getValue();
				$madonvi = $objWorksheet->getCellByColumnAndRow(1, 2)->getValue();
				$chukymatt = $objWorksheet->getCellByColumnAndRow(2, 2)->getValue();
				if ( $mangay =='' || $madonvi =='' || $chukymatt == '' )
				{
					$error = "File lỗi: Không tìm được Mã ngày, Mã đơn vị, Mã tổ";
				}
				else
				{
					for( $i = 2; $i <= $highestRow; $i ++ )
					{
						$data = array();
						$hovaten = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
						if ( trim($hovaten) != '' )
						{
							if (!empty($hovaten) )
							{
								$ngaylaymau = $objWorksheet->getCellByColumnAndRow(28, $i)->getCalculatedValue();
								if ( is_numeric ($ngaylaymau) )
								{
									$ngaylaymau = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(28, $i)->getCalculatedValue()));
								}
								elseif( $ngaylaymau != "" )
								{
									$ngaylaymau = str_replace(".","/",$ngaylaymau);
								}
								$time_ngaylaymau = 0;
								if ( ! empty( $ngaylaymau ) )
								{
									unset( $m );
									preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaylaymau, $m );
									$time_ngaylaymau = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
								}
								$data = array(
									"mangay" =>  $mangay,
									"madonvi" => $madonvi,
									"chukymatt" => $chukymatt,
									"mamaubenhpham" => $objWorksheet->getCellByColumnAndRow(3, $i)->getCalculatedValue(),
									"hinhthuclaymau" => $objWorksheet->getCellByColumnAndRow(4, $i)->getCalculatedValue(),
									"matt" => $objWorksheet->getCellByColumnAndRow(5, $i)->getValue(),
									"hovaten" =>  $hovaten,
									"namsinh" =>  $objWorksheet->getCellByColumnAndRow(7, $i)->getValue(),
									"gioitinh" =>  $objWorksheet->getCellByColumnAndRow(8, $i)->getValue(),
									"dienthoai" => $objWorksheet->getCellByColumnAndRow(9, $i)->getValue(),
									"tinhnoio" => $objWorksheet->getCellByColumnAndRow(10, $i)->getValue(),
									"huyennoio" => $objWorksheet->getCellByColumnAndRow(11, $i)->getValue(),
									"xanoio" => $objWorksheet->getCellByColumnAndRow(12, $i)->getValue(),
									"thonnoio" => $objWorksheet->getCellByColumnAndRow(13, $i)->getValue(),
									"nghenghiep" => $objWorksheet->getCellByColumnAndRow(14, $i)->getValue(),
									"noilamviec" => $objWorksheet->getCellByColumnAndRow(15, $i)->getValue(),
									"doituonglaymau" => $objWorksheet->getCellByColumnAndRow(16, $i)->getCalculatedValue(),
									"lanlaymau" => $objWorksheet->getCellByColumnAndRow(17, $i)->getValue(),
									"odich" => $objWorksheet->getCellByColumnAndRow(18, $i)->getValue(),
									"phanloainoilaymau" => $objWorksheet->getCellByColumnAndRow(19, $i)->getCalculatedValue(),
									"diadiemnoilaymau" => $objWorksheet->getCellByColumnAndRow(20, $i)->getCalculatedValue(),
									"huyennoilaymau" => $objWorksheet->getCellByColumnAndRow(21, $i)->getCalculatedValue(),
									"xanoilaymau" => $objWorksheet->getCellByColumnAndRow(22, $i)->getCalculatedValue(),
									"thonnoilaymau" => $objWorksheet->getCellByColumnAndRow(23, $i)->getCalculatedValue(),
									"loaimau" => $objWorksheet->getCellByColumnAndRow(24, $i)->getCalculatedValue(),
									"donvilaymau" => $objWorksheet->getCellByColumnAndRow(25, $i)->getCalculatedValue(),
									"maongbenhpham" => $objWorksheet->getCellByColumnAndRow(26, $i)->getCalculatedValue(),
									"manguoiduoclaymau" => $objWorksheet->getCellByColumnAndRow(27, $i)->getCalculatedValue(),
									"ngaylaymau" => $time_ngaylaymau,
									"hinhthuc" => "",
									"loaigop" => "",
									"filepath" => $data_file_basename,
									"labcode" => $labcode,
									"idfile" => $fileid,
									"uptime" => time(),
									"userid" => $user_info['s_id']
								);	
								//print_r($data);die();	
								
								$query = "INSERT INTO `tbl_bmxn_temp` (`id`, `mangay`, `madonvi`, `chukymatt`, `mamaubenhpham`, `hinhthuclaymau`, `matt`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `tinhnoio`,`huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `doituonglaymau`, `lanlaymau`, `odich`, `phanloainoilaymau`, `diadiemnoilaymau`, `huyennoilaymau`, `xanoilaymau`, `thonnoilaymau`, `loaimau`, `donvilaymau`, `maongbenhpham`, `manguoiduoclaymau`, `ngaylaymau`, `hinhthuc`, `loaigop`, `uptime`, `userid`, `filepath`, `qhcode`, `pxcode`,`labcode`,`idfile`) 
									VALUES (NULL,
									".$db->dbescape($data['mangay']).",
									".$db->dbescape($data['madonvi']).",
									".$db->dbescape($data['chukymatt']).",
									".$db->dbescape($data['mamaubenhpham']).",
									".$db->dbescape($data['hinhthuclaymau']).",
									".$db->dbescape($data['matt']).",
									".$db->dbescape($data['hovaten']).",
									".$db->dbescape($data['namsinh']).",
									".$db->dbescape($data['gioitinh']).",
									".$db->dbescape($data['dienthoai']).",
									".$db->dbescape($data['tinhnoio']).",
									".$db->dbescape($data['huyennoio']).",
									".$db->dbescape($data['xanoio']).",
									".$db->dbescape($data['thonnoio']).",
									".$db->dbescape($data['nghenghiep']).",
									".$db->dbescape($data['noilamviec']).",
									".$db->dbescape($data['doituonglaymau']).",
									".$db->dbescape($data['lanlaymau']).",
									".$db->dbescape($data['odich']).",
									".$db->dbescape($data['phanloainoilaymau']).",
									".$db->dbescape($data['diadiemnoilaymau']).",
									".$db->dbescape($data['huyennoilaymau']).",
									".$db->dbescape($data['xanoilaymau']).",
									".$db->dbescape($data['thonnoilaymau']).",
									".$db->dbescape($data['loaimau']).",
									".$db->dbescape($data['donvilaymau']).",
									".$db->dbescape($data['maongbenhpham']).",
									".$db->dbescape($data['manguoiduoclaymau']).",
									".$db->dbescape($data['ngaylaymau']).",
									".$db->dbescape($data['hinhthuc']).",
									".$db->dbescape($data['loaigop']).",
									".$db->dbescape($data['uptime']).",
									".$db->dbescape($data['userid']).",
									".$db->dbescape($data['filepath']).",
									".$db->dbescape($data['qhcode']).",
									".$db->dbescape($data['pxcode']).",
									".$db->dbescape($data['labcode']).",
									".$db->dbescape($data['idfile'])."
								);"; 
								$newid = intval( $db->sql_query_insert_id( $query ) );
		
								if ( $newid > 0 )
								{
									$inum ++;
								}
							}	
						}
					}
				}
				unset($data);
				Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=fnbmxn&idfile=".$fileid);
				die();
			}
		}
		else
		{
			$error = "Error: không có file Excel dữ liệu mẫu bệnh phẩm";
		}
	}
}
elseif ( $Request->GetInt( "savekqxn", "post", 0 ) )
{ 
	$type = 2;
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	if (!check_capchar($cap))
	{
		$error = "Chuỗi an ninh không đúng";
	}
	elseif( empty($error))
	{
		$fileid = $scode."_".date("YmdHi");
		include_once DF_ROOTDIR . '/includes/class/class.upload.php';
		//file bao cao
		if ( !empty($_FILES ['uploadfile_excel']['tmp_name']) )
		{
			$handle = new Upload ( $_FILES ['uploadfile_excel'] );
			$info = pathinfo($_FILES["uploadfile_excel"]["name"]);
			$file_name =  basename($fileid."_KQXN",'.'.$info['extension']);
			$handle->file_new_name_body = basename( str_unicode($file_name) );
			if ($handle->uploaded) {
				$handle->Process ( $upload_path );
				if ($handle->processed) 
				{
					$data_file_basename = "" . date('Y')."/". date('Y-m')."/". date('Y-m-d') ."/".$handle->file_dst_name;
				} 
				else 
				{
					$error = $handle->error;
				}
				$handle->Clean ();
			} 
			else 
			{
				$error = $handle->error;
			}
			unset($handle);
			if ( empty( $error ) )
			{
				include_once DF_ROOTDIR . "/includes/excel/PHPExcel.php";
								
				$inputFileName = DF_ROOTDIR . "/uploads/".$module."/".$data_file_basename;

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objReader->setReadDataOnly(true);
				$objPHPExcel = $objReader->load($inputFileName);
				$objWorksheet = $objPHPExcel->getActiveSheet();

				$highestRow = $objWorksheet->getHighestRow();
				$highestColumn = $objWorksheet->getHighestColumn();
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);

				for( $i = 2; $i <= $highestRow; $i ++ )
				{
					$data = array();
					$mamaubenhpham = $objWorksheet->getCellByColumnAndRow(0, $i)->getValue();
					if ( trim($mamaubenhpham) != '' )
					{
						$time_ngaynhanmau = 0;
						$ngaynhanmau = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue();
						if ( is_numeric ($ngaynhanmau) )
						{
							$ngaynhanmau = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(2, $i)->getValue()));
						}
						elseif( $ngayxn != "" )
						{
							$ngaynhanmau = str_replace(".","/",$ngaynhanmau);
						}
						if ( ! empty( $ngaynhanmau ) )
						{
							unset( $m );
							preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaynhanmau, $m );
							$time_ngaynhanmau = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
						}
						
						$time_ngayxn = 0;
						$ngayxn = $objWorksheet->getCellByColumnAndRow(4, $i)->getValue();
						if ( is_numeric ($ngayxn) )
						{
							$ngayxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(4, $i)->getValue()));
						}
						elseif( $ngayxn != "" )
						{
							$ngayxn = str_replace(".","/",$ngayxn);
						}
						
						if ( ! empty( $ngayxn ) )
						{
							unset( $m );
							preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngayxn, $m );
							$time_ngayxn = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
						}
						$ngaytrakqxn = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
						if ( is_numeric ($ngaytrakqxn) )
						{
							$ngaytrakqxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(6, $i)->getValue()));
						}
						elseif( $ngaytrakqxn != "" )
						{
							$ngaytrakqxn = str_replace(".","/",$ngaytrakqxn);
						}
						$time_ngaytrakqxn = 0;
						if ( ! empty( $ngaytrakqxn ) )
						{
							unset( $m );
							preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaytrakqxn, $m );
							$time_ngaytrakqxn = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
						}
						
						$data = array(
							"kmamaubenhpham" =>  $mamaubenhpham,
							"maxn" => $objWorksheet->getCellByColumnAndRow(1, $i)->getValue(),
							"ngaynhanmau" => $time_ngaynhanmau,
							"gionhanmau" => $objWorksheet->getCellByColumnAndRow(3, $i)->getValue(),
							"ngayxetnghiem" => $time_ngayxn,
							"phuongphapxetnghiem" => $objWorksheet->getCellByColumnAndRow(5, $i)->getCalculatedValue(),
							"ngaytrakqxn" => $time_ngaytrakqxn,
							"donviguimau" => $objWorksheet->getCellByColumnAndRow(7, $i)->getValue(),
							"tinhtrangmau" =>  $objWorksheet->getCellByColumnAndRow(8, $i)->getValue(),
							"ketquaxetnghiem" =>  $objWorksheet->getCellByColumnAndRow(9, $i)->getValue(),
							"ctvalue" => $objWorksheet->getCellByColumnAndRow(10, $i)->getValue(),
							"kfilepath" => $data_file_basename,
							"idfile" => $fileid,
							"kuptime" => time(),
							"kuserid" => $user_info['s_id']
						);	
						//print_r($data);die();	
							
						$query = "INSERT INTO `tbl_kqxn_temp` (`kid`, `kmamaubenhpham`, `maxn`,`ngaynhanmau`,`gionhanmau`, `ngayxetnghiem`, `phuongphapxetnghiem`, `ngaytrakqxn`, `donviguimau`, `tinhtrangmau`, `ketquaxetnghiem`, `ctvalue`, `kuptime`, `kuserid`, `kfilepath`, `idfile`) 
							VALUES (NULL,
							".$db->dbescape($data['kmamaubenhpham']).",
							".$db->dbescape($data['maxn']).",
							".$db->dbescape($data['ngaynhanmau']).",
							".$db->dbescape($data['gionhanmau']).",
							".$db->dbescape($data['ngayxetnghiem']).",
							".$db->dbescape($data['phuongphapxetnghiem']).",
							".$db->dbescape($data['ngaytrakqxn']).",
							".$db->dbescape($data['donviguimau']).",
							".$db->dbescape($data['tinhtrangmau']).",
							".$db->dbescape($data['ketquaxetnghiem']).",
							".$db->dbescape($data['ctvalue']).",
							".$db->dbescape($data['kuptime']).",
							".$db->dbescape($data['kuserid']).",
							".$db->dbescape($data['kfilepath']).",
							".$db->dbescape($data['idfile'])."
						);";
						$newid = intval( $db->sql_query_insert_id( $query ) );

						if ( $newid > 0 )
						{
							$inum ++;
						}
					}
				}
				unset($data);
				Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=fnkqxn&idfile=".$fileid);
				die();
			}
		}
		else
		{
			$error = "Error: không có file Excel dữ liệu kết quả xét nghiệm KQXN";
		}
	}
}

elseif ( $Request->GetInt( "savetest", "post", 0 ) )
{ 
	$type = 3;
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	if (!check_capchar($cap))
	{
		$error = "Chuỗi an ninh không đúng";
	}
	elseif( empty($error))
	{
		$fileid = $scode."_".date("YmdHi");
		include_once DF_ROOTDIR . '/includes/class/class.upload.php';
		//file bao cao
		if ( !empty($_FILES ['uploadfile_excel']['tmp_name']) )
		{
			$handle = new Upload ( $_FILES ['uploadfile_excel'] );
			$info = pathinfo($_FILES["uploadfile_excel"]["name"]);
			$file_name =  basename($fileid."_KQXN",'.'.$info['extension']);
			$handle->file_new_name_body = basename( str_unicode($file_name) );
			if ($handle->uploaded) {
				$handle->Process ( $upload_path );
				if ($handle->processed) 
				{
					$data_file_basename = "" . date('Y')."/". date('Y-m')."/". date('Y-m-d') ."/".$handle->file_dst_name;
				} 
				else 
				{
					$error = $handle->error;
				}
				$handle->Clean ();
			} 
			else 
			{
				$error = $handle->error;
			}
			unset($handle);
			if ( empty( $error ) )
			{
				include_once DF_ROOTDIR . "/includes/excel/PHPExcel.php";
								
				$inputFileName = DF_ROOTDIR . "/uploads/".$module."/".$data_file_basename;

				$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
				$objReader = PHPExcel_IOFactory::createReader($inputFileType);
				$objReader->setReadDataOnly(true);
				$objPHPExcel = $objReader->load($inputFileName);
				$objWorksheet = $objPHPExcel->getActiveSheet();

				$highestRow = $objWorksheet->getHighestRow();
				$highestColumn = $objWorksheet->getHighestColumn();
				$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
				
				$mangay = $objWorksheet->getCellByColumnAndRow(0, 2)->getValue();
				$madonvi = $objWorksheet->getCellByColumnAndRow(1, 2)->getValue();
				$chukymatt = $objWorksheet->getCellByColumnAndRow(2, 2)->getValue();
				if ( $mangay =='' || $madonvi =='' || $chukymatt == '' )
				{
					$error = "File lỗi: Không tìm được Mã ngày, Mã đơn vị, Mã tổ";
				}
				else
				{
					for( $i = 2; $i <= $highestRow; $i ++ )
					{
						$data = array();
						$hovaten = $objWorksheet->getCellByColumnAndRow(6, $i)->getValue();
						if ( trim($hovaten) != '' )
						{
							if (!empty($hovaten) )
							{
								$ngaylaymau = $objWorksheet->getCellByColumnAndRow(28, $i)->getCalculatedValue();
								if ( is_numeric ($ngaylaymau) )
								{
									$ngaylaymau = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(28, $i)->getCalculatedValue()));
								}
								elseif( $ngaylaymau != "" )
								{
									$ngaylaymau = str_replace(".","/",$ngaylaymau);
								}
								$time_ngaylaymau = 0;
								if ( ! empty( $ngaylaymau ) )
								{
									unset( $m );
									preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaylaymau, $m );
									$time_ngaylaymau = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
								}
								
								$time_ngaynhanmau = 0;
								$ngaynhanmau = $objWorksheet->getCellByColumnAndRow(31, $i)->getValue();
								if ( is_numeric ($ngaynhanmau) )
								{
									$ngaynhanmau = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(31, $i)->getValue()));
								}
								elseif( $ngayxn != "" )
								{
									$ngaynhanmau = str_replace(".","/",$ngaynhanmau);
								}
								if ( ! empty( $ngaynhanmau ) )
								{
									unset( $m );
									preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaynhanmau, $m );
									$time_ngaynhanmau = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
								}
								
								$time_ngayxn = 0;
								$ngayxn = $objWorksheet->getCellByColumnAndRow(33, $i)->getValue();
								if ( is_numeric ($ngayxn) )
								{
									$ngayxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(33, $i)->getValue()));
								}
								elseif( $ngayxn != "" )
								{
									$ngayxn = str_replace(".","/",$ngayxn);
								}
								if ( ! empty( $ngayxn ) )
								{
									unset( $m );
									preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngayxn, $m );
									$time_ngayxn = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
								}
								
								$ngaytrakqxn = $objWorksheet->getCellByColumnAndRow(35, $i)->getValue();
								if ( is_numeric ($ngaytrakqxn) )
								{
									$ngaytrakqxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(35, $i)->getValue()));
								}
								elseif( $ngaytrakqxn != "" )
								{
									$ngaytrakqxn = str_replace(".","/",$ngaytrakqxn);
								}
								$time_ngaytrakqxn = 0;
								if ( ! empty( $ngaytrakqxn ) )
								{
									unset( $m );
									preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngaytrakqxn, $m );
									$time_ngaytrakqxn = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
								}
								
								$data = array(
									"mangay" =>  $mangay,
									"madonvi" => $madonvi,
									"chukymatt" => $chukymatt,
									"mamaubenhpham" => $objWorksheet->getCellByColumnAndRow(3, $i)->getCalculatedValue(),
									"hinhthuclaymau" => $objWorksheet->getCellByColumnAndRow(4, $i)->getCalculatedValue(),
									"matt" => $objWorksheet->getCellByColumnAndRow(5, $i)->getValue(),
									"hovaten" =>  $hovaten,
									"namsinh" =>  $objWorksheet->getCellByColumnAndRow(7, $i)->getValue(),
									"gioitinh" =>  $objWorksheet->getCellByColumnAndRow(8, $i)->getValue(),
									"dienthoai" => $objWorksheet->getCellByColumnAndRow(9, $i)->getValue(),
									"tinhnoio" => $objWorksheet->getCellByColumnAndRow(10, $i)->getValue(),
									"huyennoio" => $objWorksheet->getCellByColumnAndRow(11, $i)->getValue(),
									"xanoio" => $objWorksheet->getCellByColumnAndRow(12, $i)->getValue(),
									"thonnoio" => $objWorksheet->getCellByColumnAndRow(13, $i)->getValue(),
									"nghenghiep" => $objWorksheet->getCellByColumnAndRow(14, $i)->getValue(),
									"noilamviec" => $objWorksheet->getCellByColumnAndRow(15, $i)->getValue(),
									"doituonglaymau" => $objWorksheet->getCellByColumnAndRow(16, $i)->getCalculatedValue(),
									"lanlaymau" => $objWorksheet->getCellByColumnAndRow(17, $i)->getValue(),
									"odich" => $objWorksheet->getCellByColumnAndRow(18, $i)->getValue(),
									"phanloainoilaymau" => $objWorksheet->getCellByColumnAndRow(19, $i)->getCalculatedValue(),
									"diadiemnoilaymau" => $objWorksheet->getCellByColumnAndRow(20, $i)->getCalculatedValue(),
									"huyennoilaymau" => $objWorksheet->getCellByColumnAndRow(21, $i)->getCalculatedValue(),
									"xanoilaymau" => $objWorksheet->getCellByColumnAndRow(22, $i)->getCalculatedValue(),
									"thonnoilaymau" => $objWorksheet->getCellByColumnAndRow(23, $i)->getCalculatedValue(),
									"loaimau" => $objWorksheet->getCellByColumnAndRow(24, $i)->getCalculatedValue(),
									"donvilaymau" => $objWorksheet->getCellByColumnAndRow(25, $i)->getCalculatedValue(),
									"maongbenhpham" => $objWorksheet->getCellByColumnAndRow(25, $i)->getCalculatedValue(),
									"manguoiduoclaymau" => $objWorksheet->getCellByColumnAndRow(27, $i)->getCalculatedValue(),
									"ngaylaymau" => $time_ngaylaymau,
									"hinhthuc" => "",
									"loaigop" => "",
									"filepath" => $data_file_basename,
									"labcode" => $user_info['s_id'],
									"bngaynhanmau"=> $time_ngaynhanmau,
									"bgionhanmau"=> $objWorksheet->getCellByColumnAndRow(32, $i)->getCalculatedValue(),
									"bngayxetnghiem" => $time_ngayxn,
									"bphuongphapxetnghiem" => $objWorksheet->getCellByColumnAndRow(34, $i)->getCalculatedValue(),
									"bngaytrakqxn" => $time_ngaytrakqxn,
									"bdonviguimau" => $objWorksheet->getCellByColumnAndRow(36, $i)->getCalculatedValue(),
									"btinhtrangmau" => $objWorksheet->getCellByColumnAndRow(37, $i)->getCalculatedValue(),
									"bketquaxetnghiem" =>  $objWorksheet->getCellByColumnAndRow(38, $i)->getValue(),
									"bctvalue" =>  $objWorksheet->getCellByColumnAndRow(39, $i)->getValue(),
									"bkfilepath" =>  $data_file_basename,
									"bkuserid" => $user_info['s_id'],
									"idfile" => $fileid,
									"bkuptime" => time(),
									"uptime" => time(),
									"userid" => $user_info['s_id']
								);	
								//print_r($data);die();	
								
								$query = "INSERT INTO `tbl_bmxn_test` (`id`, `mangay`, `madonvi`, `chukymatt`, `mamaubenhpham`, `hinhthuclaymau`, `matt`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `tinhnoio`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `doituonglaymau`, `lanlaymau`, `odich`, `phanloainoilaymau`, `diadiemnoilaymau`, `huyennoilaymau`, `xanoilaymau`, `thonnoilaymau`, `loaimau`, `donvilaymau`, `maongbenhpham`, `manguoiduoclaymau`, `ngaylaymau`, `hinhthuc`, `loaigop`, `uptime`, `userid`, `filepath`, `qhcode`, `pxcode`, `labcode`, `bmaxn`, `bngaynhanmau`, `bgionhanmau`, `bngayxetnghiem`, `bphuongphapxetnghiem`, `bngaytrakqxn`, `bdonviguimau`, `btinhtrangmau`, `bketquaxetnghiem`, `bctvalue`, `bkuptime`, `bkuserid`, `bkfilepath`, `idfile`) 
									VALUES (NULL,
									".$db->dbescape($data['mangay']).",
									".$db->dbescape($data['madonvi']).",
									".$db->dbescape($data['chukymatt']).",
									".$db->dbescape($data['mamaubenhpham']).",
									".$db->dbescape($data['hinhthuclaymau']).",
									".$db->dbescape($data['matt']).",
									".$db->dbescape($data['hovaten']).",
									".$db->dbescape($data['namsinh']).",
									".$db->dbescape($data['gioitinh']).",
									".$db->dbescape($data['dienthoai']).",
									".$db->dbescape($data['tinhnoio']).",
									".$db->dbescape($data['huyennoio']).",
									".$db->dbescape($data['xanoio']).",
									".$db->dbescape($data['thonnoio']).",
									".$db->dbescape($data['nghenghiep']).",
									".$db->dbescape($data['noilamviec']).",
									".$db->dbescape($data['doituonglaymau']).",
									".$db->dbescape($data['lanlaymau']).",
									".$db->dbescape($data['odich']).",
									".$db->dbescape($data['phanloainoilaymau']).",
									".$db->dbescape($data['diadiemnoilaymau']).",
									".$db->dbescape($data['huyennoilaymau']).",
									".$db->dbescape($data['xanoilaymau']).",
									".$db->dbescape($data['thonnoilaymau']).",
									".$db->dbescape($data['loaimau']).",
									".$db->dbescape($data['donvilaymau']).",
									".$db->dbescape($data['maongbenhpham']).",
									".$db->dbescape($data['manguoiduoclaymau']).",
									".$db->dbescape($data['ngaylaymau']).",
									".$db->dbescape($data['hinhthuc']).",
									".$db->dbescape($data['loaigop']).",
									".$db->dbescape($data['uptime']).",
									".$db->dbescape($data['userid']).",
									".$db->dbescape($data['filepath']).",
									".$db->dbescape($data['qhcode']).",
									".$db->dbescape($data['pxcode']).",
									".$db->dbescape($data['labcode']).",
									".$db->dbescape($data['bmaxn']).",
									".$db->dbescape($data['bngaynhanmau']).",
									".$db->dbescape($data['bgionhanmau']).",
									".$db->dbescape($data['bngayxetnghiem']).",
									".$db->dbescape($data['bphuongphapxetnghiem']).",
									".$db->dbescape($data['bngaytrakqxn']).",
									".$db->dbescape($data['bdonviguimau']).",
									".$db->dbescape($data['btinhtrangmau']).",
									".$db->dbescape($data['bketquaxetnghiem']).",
									".$db->dbescape($data['bctvalue']).",
									".$db->dbescape($data['bkuptime']).",
									".$db->dbescape($data['bkuserid']).",
									".$db->dbescape($data['bkfilepath']).",
									".$db->dbescape($data['idfile'])."
								);";
								$newid = intval( $db->sql_query_insert_id( $query ) );
		
								if ( $newid > 0 )
								{
									$inum ++;
								}
							}	
						}
					}
				}
				unset($data);
				Header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=fntest&idfile=".$fileid);
				die();
			}
		}
		else
		{
			$error = "Error: không có file Excel dữ liệu mẫu bệnh phẩm và kết quả xét nghiệm";
		}
	}
}

$layout = "update.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$xtpl->assign( 'mlink', DF_BASE_SITEURL . "form/BMXN210815.xlsx");
$capchar = capchar();
$xtpl->assign( 'capchar', $capchar );
if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	if($type == 1) $xtpl->parse( 'main.bmxn.error' );	
	elseif($type == 2) $xtpl->parse( 'main.kqxn.error' );	
	elseif($type == 3) $xtpl->parse( 'main.all.error' );	
}
foreach ( $array_donvilm as $row )
{
	$row['select'] = ($row['s_id'] == $dv) ? "selected" : "";
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.bmxn.dvnm.donvi' );
}
if ( $global_config['check']['value'] == '0' ) $xtpl->parse( 'main.bmxn.dvnm' );

if ( !empty( $user_info['address'] ) ) 
{
	$array_per = explode(",",$user_info['address']);
	if( count($array_per) == 3 ) $xtpl->assign( 'width', '32%' );
	elseif( count($array_per) == 2 ) $xtpl->assign( 'width', '45%' );
	elseif( count($array_per) == 1 ) $xtpl->assign( 'width', '650px' );
	
	if ( in_array('TTBP', $array_per) ) $xtpl->parse( 'main.bmxn' ); 
	if ( in_array('LAB', $array_per) ) $xtpl->parse( 'main.kqxn' ); 
	if ( in_array('ALL', $array_per) ) $xtpl->parse( 'main.all' );
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>