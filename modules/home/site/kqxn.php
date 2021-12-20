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

if ( $Request->GetInt( "save", "post", 0 ) )
{ 
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
				/*
				$rows = array();
				for ($row = 2; $row <= $highestRow; $row++) 
				{
				  for ($col = 0; $col <= 8; $col++) 
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

				for( $i = 2; $i <= $highestRow; $i ++ )
				{
					$data = array();
					$mamaubenhpham = $objWorksheet->getCellByColumnAndRow(0, $i)->getValue();
					if ( trim($mamaubenhpham) != '' )
					{
						$ngayxn = $objWorksheet->getCellByColumnAndRow(2, $i)->getValue();
						if ( is_numeric ($ngayxn) )
						{
							$ngayxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(2, $i)->getValue()));
						}
						elseif( $ngayxn != "" )
						{
							$ngayxn = str_replace(".","/",$ngayxn);
						}
						$time_ngayxn = 0;
						if ( ! empty( $ngayxn ) )
						{
							unset( $m );
							preg_match( "/^([0-9]{1,2})\/([0-9]{1,2})\/([0-9]{4})$/", $ngayxn, $m );
							$time_ngayxn = mktime( 8, 59, 59, $m[2], $m[1], $m[3] );
						}
						$ngaytrakqxn = $objWorksheet->getCellByColumnAndRow(4, $i)->getValue();
						if ( is_numeric ($ngaytrakqxn) )
						{
							$ngaytrakqxn = date('d/m/Y', PHPExcel_Shared_Date::ExcelToPHP($objWorksheet->getCellByColumnAndRow(4, $i)->getValue()));
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
							"ngayxetnghiem" => $time_ngayxn,
							"phuongphapxetnghiem" => $objWorksheet->getCellByColumnAndRow(3, $i)->getCalculatedValue(),
							"ngaytrakqxn" => $time_ngaytrakqxn,
							"donviguimau" => $objWorksheet->getCellByColumnAndRow(5, $i)->getValue(),
							"tinhtrangmau" =>  $objWorksheet->getCellByColumnAndRow(6, $i)->getValue(),
							"ketquaxetnghiem" =>  $objWorksheet->getCellByColumnAndRow(7, $i)->getValue(),
							"ctvalue" => $objWorksheet->getCellByColumnAndRow(8, $i)->getValue(),
							"kfilepath" => $data_file_basename,
							"idfile" => $fileid,
							"kuptime" => time(),
							"kuserid" => $user_info['s_id']
						);	
						//print_r($data);die();	
							
						$query = "INSERT INTO `tbl_kqxn_temp` (`kid`, `kmamaubenhpham`, `maxn`, `ngayxetnghiem`, `phuongphapxetnghiem`, `ngaytrakqxn`, `donviguimau`, `tinhtrangmau`, `ketquaxetnghiem`, `ctvalue`, `kuptime`, `kuserid`, `kfilepath`, `idfile`) 
							VALUES (NULL,
							".$db->dbescape($data['kmamaubenhpham']).",
							".$db->dbescape($data['maxn']).",
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

$layout = "kqxn.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'DF_BASE_ADMINURL', DF_BASE_ADMINURL );
$xtpl->assign( 'LANG', $lang_module );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$xtpl->assign( 'mlink', DF_BASE_SITEURL . "form/KQXN210815.xlsx");
$capchar = capchar();
$xtpl->assign( 'capchar', $capchar );

if(!empty($error))
{
	$xtpl->assign( 'error', $error );
	$xtpl->parse( 'main.error' );	
}

$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo main_theme( $content );

?>