<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( !defined( 'DF_IS_USER' ) ) 
{
	//header( "Location: " . DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    //die();
}

$array_catalogs = array();
$sql = "SELECT * FROM `tbl_cates` WHERE 1 ORDER BY `c_id` ASC ";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_catalogs[$row['c_id']] = $row;
}
$array_scienttifice = array();
$sql = "SELECT * FROM tbl_title";
$result = $db->sql_query( $sql );
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$array_scienttifice[$row['t_id']]	= $row;
}

$array_status = array(0=>"Biên soạn",1 => "Thẩm định", 2=>"Phản biện", 3=>"Sửa sau thẩm định, phản biện", 4=>"Biên tập", 5=>"Sửa sau biên tập", 6=>"Hiệu đính", 7=>"Sửa sau hiệu đính", 8=>"Nghiệm thu cấp cơ sở", 9=>"Sửa sau nghiệm thu cấp cơ sở", 10=>"Nghiệm thu cấp bộ", 11=>"Sửa sau nghiệm thu cấp bộ", 12=>"Hoàn thiện");
$array_status_review = array(0=>"None",1 => "Reviewing/ đang đánh giá", 2=>"Sent/ Đã gửi");
$array_submit =  array(1=>"No/Không","2" =>"Yes/Có");
$array_type = array(0=>"Đăng ký tham dự",1 => "Đăng ký tham luận");
$array_position = array( 0 => "Please select" , 1 => 'Chủ tịch', 2 => "Đồng chủ tịch", "3" => "Trưởng ban","4" => "Đồng trưởng ban","5" => "Thành viên" );
$array_gender = array( 1 => 'Male', 2 => "Female" );

function get_field_input($input,$value_cur)
{
	global $module;
	//$array_type =  array(0=>"Chọn", 1=>"Text","2" =>"Ngày tháng","3" =>"Select box","4" =>"Check box","5" =>"Radio","6" =>"File upload","7"=>"textarea","8" => "lable","9" => "Radio others","10" => "Check box others");
	$oblige_required = ( $input['oblige'] ==1 )? 'required' : '';
	$oblige_title = ( $input['oblige'] ==1 )? ' <span class="mark">*</span>' : '';
	$name = $input['name'].$input['id'];
	$value = $input['value'];
	$type = $input['type'];
	//$array_title = explode("/",$input['title']);
	//$title = '<strong>'.$array_title[0].'/ </strong>'.'<span>'.$array_title[1].'</span>';
	$title = $input['title'].$oblige_title;
	$suggest = ( !empty($input['suggest']) )? '<p>'.$input['suggest'].'</p>' : '';
	$field = "";
	switch($type)
	{
		case 1:  
		{ 
			if( $value_cur!= '' ) $value = $value_cur;
			
			if( $input['view'] == '0' )
			{
				$field_input = '<input type="text" style="width:98%" name="'.$name.'" value="'.$value.'" '.$oblige_required.'/>'; 
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field_input = '<input type="text" style="width:200px" name="'.$name.'" value="'.$value.'" '.$oblige_required.'/>'; 
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 2:  
		{ 
			if( $value_cur!= '' ) $value = $value_cur;
			$field_input = '<input type="text" style="width:120px" name="'.$name.'" placeholder="dd/mm/yyyy" '.$oblige_required.' value="'.$value.'" class="datepicker"/> ';
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 3:  
		{ 
			$list_option = explode("\r\n",$value);
			$field_input = '<select name="'.$name.'" '.$oblige_required.'>'; 
			foreach( $list_option as $option )
			{
				$select = ( $option == $value_cur )? 'selected="selected"' : '';
				$field_input .= '<option value="'.trim($option).'" '.$select.'>'.trim($option).'</option>';	
			}
			$field_input .= '</select>';
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 4:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			$array_valc = explode("|",$value_cur);
			foreach( $list_option as $option )
			{
				$check = ( in_array($option,$array_valc) )? 'checked="checked"' : '';
				$field_input .= '<input '.$oblige_required.' type="checkbox" value="'.trim($option).'" name="'.$name.'[]" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 5:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			if( $input['view'] == '0' )
			{
				foreach( $list_option as $option )
				{
					$check = ( $option == $value_cur )? 'checked="checked"' : '';
					$field_input .= '<input '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
					$i++;
				}
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				foreach( $list_option as $option )
				{
					$check = ( $option == $value_cur )? 'checked="checked"' : '';
					$field_input .= '<input '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label> ';	
					$i++;
				}
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 6:  
		{ 
			$link = DF_BASE_SITEURL.'uploads/'.$module.'/'.$value_cur;
			$value = ( $value_cur!= '' ) ? '<input type="hidden" name="'.$name.'_temp" value="'.$value_cur.'"/><a href="'.$link.'">Download file</a>' : '';
			$field_input = '<input type="file" name="'.$name.'"/> '.$value;  
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break;
		}
		case 7:  
		{ 
			if( $value_cur!= '' ) $value = $value_cur;
			$field_input = '<textarea style="width:98%; height:100px" name="'.$name.'" '.$oblige_required.'>'.$value.'</textarea>';  
			$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			$field = $field.$suggest;
			break;
		}
		case 8:  { $field = '<div>'.$title.' </div>'.$suggest.'';  break;}
		case 9:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			$vo = $value_cur;
			$co = 'checked="checked"';
			foreach( $list_option as $option )
			{
				$check = "";
				if( $option == $value_cur ) { $check = 'checked="checked"'; $vo= ""; $co = ""; }
				$field_input .= '<input '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			$field_input .= '<input '.$oblige_required.' type="radio" value="Other" name="'.$name.'" id="'.$name.$i.'" '.$co.'/> <label for="'.$name.$i.'">Others</label> <input type="text" id="t'.$name.$i.'" name="t'.$name.'" value="'.$vo.'" onchange="select_other(\'t'.$name.$i.'\',\''.$name.$i.'\')"/><br />';
			$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			$field = $field.$suggest;
			break; 
		}
		case 10:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			$array_valc = explode("|",$value_cur);
			$vo = end($array_valc);
			$co = 'checked="checked"';
			if( $vo == '' ) $co = '';
			if( in_array($vo,$list_option) ) { $vo= ""; $co = ""; }
			foreach( $list_option as $option )
			{
				$check = "";
				if( in_array($option,$array_valc) ) { $check = 'checked="checked"';  }
				$field_input .= '<input '.$oblige_required.' type="checkbox" value="'.trim($option).'" name="'.$name.'[]" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			$field_input .= '<input '.$oblige_required.' type="checkbox" value="Other" name="'.$name.'[]" id="'.$name.$i.'" '.$co.'/> <label for="'.$name.$i.'">Others</label> <input type="text" id="t'.$name.$i.'" name="t'.$name.'" value="'.$vo.'" onchange="select_other(\'t'.$name.$i.'\',\''.$name.$i.'\')"/><br />';
			$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			$field = $field.$suggest;
			break; 
		}
	}
	return $field;	
}
function get_field_value($input,$value_cur)
{
	global $module;
	//$array_type =  array(0=>"Chọn", 1=>"Text","2" =>"Ngày tháng","3" =>"Select box","4" =>"Check box","5" =>"Radio","6" =>"File upload","7"=>"textarea","8" => "lable","9" => "Radio others");
	$oblige_required = ( $input['oblige'] ==1 )? 'required' : '';
	$oblige_title = ( $input['oblige'] ==1 )? ' <span class="mark">*</span>' : '';
	$name = $input['name'].$input['id'];
	$value = $input['value'];
	$type = $input['type'];
	//$array_title = explode("/",$input['title']);
	//$title = '<strong>'.$array_title[0].'/ </strong>'.'<span>'.$array_title[1].'</span>';
	$title = $input['title'].$oblige_title;
	$suggest = ( !empty($input['suggest']) )? '<p>'.$input['suggest'].'</p>' : '';
	$field = "";
	
	switch($type)
	{
		case 4:  
		{ 
			$list_option = explode("\r\n",$value);
			$array_valc = explode("|",$value_cur);
			$i=1; $field_input = "";
			foreach( $list_option as $option )
			{
				$check = ( in_array($option,$array_valc) )? 'checked="checked"' : '';
				$field_input .= '<input disabled="disabled" '.$oblige_required.' type="checkbox" value="'.trim($option).'" name="'.$name.'[]" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 5:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			if( $input['view'] == '0' )
			{
				foreach( $list_option as $option )
				{
					$check = ( $option == $value_cur )? 'checked="checked"' : '';
					$field_input .= '<input disabled="disabled" '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
					$i++;
				}
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				foreach( $list_option as $option )
				{
					$check = ( $option == $value_cur )? 'checked="checked"' : '';
					$field_input .= '<input disabled="disabled" '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label> ';	
					$i++;
				}
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break; 
		}
		case 6:  
		{ 
			$link = DF_BASE_SITEURL.'uploads/'.$module.'/'.$value_cur;
			$value = ( $value_cur!= '' ) ? '<input type="hidden" name="'.$name.'_temp" value="'.$value_cur.'"/><a href="'.$link.'">Download file</a>' : '';
			$field_input = '<input type="file" name="'.$name.'"/> '.$value;  
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.' '.$field_input.'</div>';	
			}
			$field = $field.$suggest;
			break;
		}
		case 7:
		{
			$value_cur = str_replace("\r\n",'<br />',$value_cur);
			$field = '<div><p>'.$title.': </p></div><div>'.$value_cur.'</div>';	
			$field = $field.$suggest;
			break; 	
		}
		case 8:  { $field = '<div>'.$title.' </div>'.$suggest.'';  break;}
		case 9:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			$vo = ': '.$value_cur;
			$co = 'checked="checked"';
			foreach( $list_option as $option )
			{
				$check = "";
				if( $option == $value_cur ) { $check = 'checked="checked"'; $vo= ""; $co = ""; }
				$field_input .= '<input disabled="disabled" '.$oblige_required.' type="radio" value="'.trim($option).'" name="'.$name.'" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			$field_input .= '<input disabled="disabled" '.$oblige_required.' type="radio" value="Other" name="'.$name.'" id="'.$name.$i.'" '.$co.'/> <label for="'.$name.$i.'">Others '.$vo.'</label> <br />';
			$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			$field = $field.$suggest;
			break; 
		}
		case 10:  
		{ 
			$list_option = explode("\r\n",$value);
			$i=1; $field_input = "";
			$array_valc = explode("|",$value_cur);
			$vo = end($array_valc);
			$co = 'checked="checked"';
			if( $vo == '' ) $co = '';
			if( in_array($vo,$list_option) ) { $vo= ""; $co = ""; }
			foreach( $list_option as $option )
			{
				$check = "";
				if( in_array($option,$array_valc) ) { $check = 'checked="checked"';  }
				$field_input .= '<input disabled="disabled" '.$oblige_required.' type="checkbox" value="'.trim($option).'" name="'.$name.'[]" id="'.$name.$i.'" '.$check.'/> <label for="'.$name.$i.'">'.trim($option).'</label><br />';	
				$i++;
			}
			$field_input .= '<input disabled="disabled" '.$oblige_required.' type="checkbox" value="Other" name="'.$name.'[]" id="'.$name.$i.'" '.$co.'/> <label for="'.$name.$i.'">Others: '.$vo.'</label><br />';
			$field = '<div><p>'.$title.'</p></div><div>'.$field_input.'</div>';	
			$field = $field.$suggest;
			break; 
		}
		default: 
		{
			if( $input['view'] == '0' )
			{
				$field = '<div><p>'.$title.': </p></div><div>'.$value_cur.'</div>';	
			}
			else
			{
				$field = '<div>'.$title.': '.$value_cur.'</div>';	
			}
			$field = $field.$suggest;
			break; 	
		}
	}
	return $field;	
}

function outfile($data_p,$datar)
{
	global $db, $module, $global_config, $array_catalogs,$array_status,$array_gender;
	$data_value = unserialize( base64_decode($datar['value']) );
	$layout = "outfile.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
	$xtpl = new XTemplate( $layout, $path_theme );
	$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
	$xtpl->assign( 'LANG', $global_lang );
	
	$xtpl->assign( 'DATAP', $data_p );
	
	$sql = "SELECT * FROM `tbl_config` WHERE `p_id` = ".$data_p['p_id']." ORDER BY `order` ASC";
	$result_field = $db->sql_query( $sql );
	while ( $field = $db->sql_fetchrow( $result_field, 2 ) )
	{
		$value = (!empty($data_value[$field['name'].$field['id']]))? $data_value[$field['name'].$field['id']] : '';
		$field_view = get_field_value($field,$value);
		$xtpl->assign( 'field', $field_view );
		$xtpl->parse( 'main.field' );
	}
	
	$type = 0;
	if( $datar['abstract'] == 1 && $datar['poster'] == 1) { $type = 0; }
	elseif( $datar['abstract'] == 2 && $datar['poster'] == 1) { $type = 1; }
	elseif( $datar['abstract'] == 1 && $datar['poster'] == 2) { $type = 2; }
	
	$sql = "SELECT * FROM tbl_profile WHERE s_id= ".intval($datar['sid'])."";
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 ); 
	$data['s_gender'] = $array_gender[$data['s_gender']];
	$xtpl->assign( 'check'.$type, 'checked="checked"' );
	
	$xtpl->assign( 'ckiam'.$datar['iam'], 'checked="checked"' );
	$xtpl->assign( 'ckworks'.$datar['works'], 'checked="checked"' );
	
	$xtpl->assign( 'DATAR', $datar );
	//print_r($datar);die();
	$xtpl->assign( 'DATA', $data );
	//print_r($data);exit();
	$xtpl->assign( 'cconference'.$datar['f_conference'], 'checked="checked"' );
	$xtpl->assign( 'caccommodation'.$datar['f_accommodation'], 'checked="checked"' );
	$xtpl->assign( 'cdomestic'.$datar['f_domestic'], 'checked="checked"' );
	$xtpl->assign( 'status', $array_status[$datar['status']] );
	$xtpl->assign( 'checkf'.$datar['financial'], 'checked="checked"' );
	
	if ( !empty($datar['p_file']))
	{
		$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$datar['p_file'];
		$xtpl->assign( 'b_des_file', $b_des_file );
		$xtpl->parse( 'main.poster.b_des_file' );
	}
	if ( !empty($datar['f_full_cv']))
	{
		$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$datar['f_full_cv'];
		$xtpl->assign( 'f_full_cv', $b_des_file );
		$xtpl->parse( 'main.financial.f_full_cv' );
	}
	if ( !empty($datar['f_letter']))
	{
		$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$datar['f_letter'];
		$xtpl->assign( 'f_letter', $b_des_file );
		$xtpl->parse( 'main.financial.f_letter' );
	}

	//print_r($datar);exit();
	//if( $datar['abstract'] == 1 && $data_p['p_anable_ab'] == 1) 
	if($data_p['p_anable_ab'] == 1) 
	{
		$dataa[0]['su_name'] = $datar['su_name'];
		$dataa[0]['su_abstract'] = $datar['su_abstract'];
		$dataa[0]['su_author'] = $datar['su_author'];
		$dataa[0]['su_presenter'] = $datar['su_presenter'];
		$dataa[0]['su_type'] = $datar['su_type'];
		$dataa[0]['cid'] = $datar['cid'];
		$dataa[0]["file"] = $datar["file"];
		
		$sql = "SELECT * FROM `tbl_register_submit` WHERE `rid` = ".$datar['id']." ORDER BY `id` ASC ";
		$result = $db->sql_query( $sql );
		$in = 1;
		while ( $row = $db->sql_fetchrow( $result, 2 ) )
		{
			$dataa[$in]['su_name'] = $row['su_name'];
			$dataa[$in]['su_abstract'] = $row['su_abstract'];
			$dataa[$in]['su_author'] = $row['su_author'];
			$dataa[$in]['su_presenter'] = $row['su_presenter'];
			$dataa[$in]['su_type'] = $row['su_type'];
			$dataa[$in]['cid'] = $row['cid'];
			$dataa[$in]["file"] = $row["file"];
			$in++;
		}
		$num = count($dataa);
		$stt = 1;
		foreach ( $dataa as $rd)
		{
			$rd['num'] = ( $num > 1 ) ? $stt : '';
			if ( !empty($rd['file']))
			{
				$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$rd['file'];
				$xtpl->assign( 'b_des_file', $b_des_file );
				$xtpl->parse( 'main.abstract.b_des_file' );
			}	
			$rd['cate'] = !empty( $array_catalogs[$rd['cid']] ) ?  $array_catalogs[$rd['cid']]['c_title'] . ' (Code: '.$array_catalogs[$rd['cid']]['c_code'].')' : '';
			$xtpl->assign( 'DATAA', $rd );
			if($rd['su_type'] == 1){
				$xtpl->parse( 'main.abstract' );
			}
			$stt++;
		}

	}
	if( $datar['financial'] == 2 && $data_p['p_anable_fc'] == 1 ) $xtpl->parse( 'main.financial' );
	if( $datar['poster'] == 2 && $data_p['p_anable_pt'] == 1 ) $xtpl->parse( 'main.poster' );
	
	if( $data_p['p_anable_ab'] == 1 ) { $xtpl->parse( 'main.enabstract' );}
	if( $data_p['p_anable_pt'] == 1 ) { $xtpl->parse( 'main.enposter' );}
	if( $data_p['p_anable_fc'] == 1 ) { $xtpl->parse( 'main.enfinancial' ); }

	//visa
	
	$sql = "SELECT * FROM `tbl_register_visa` WHERE `hid` = ".$datar['p_id']." AND `userid` = ".$datar['sid']." AND `status` = 1 ORDER BY `id` ASC ";
	$result = $db->sql_query( $sql );
	$in = 1;
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['date_birth'] = ( $row['date_birth'] != 0 )? date('F j, Y',$row['date_birth']) : '';
		//$row['place_birth'] = ( $row['place_birth'] > 0 )? date('F j, Y',$row['place_birth']) : '';
		$row['passport_date_issue'] = ( $row['passport_date_issue'] > 0 )? date('F j, Y',$row['passport_date_issue']) : '';
		$row['passport_date_expiry'] = ( $row['passport_date_expiry'] > 0 )? date('F j, Y',$row['passport_date_expiry']) : '';
		$row['tentative_arriving_date'] = ( $row['tentative_arriving_date'] > 0 )? date('F j, Y',$row['tentative_arriving_date']) : '';
		$row['tentative_leaving_date'] = ( $row['tentative_leaving_date'] > 0 )? date('F j, Y',$row['tentative_leaving_date']) : '';
		$row['sex'] = $array_gender[$row['sex']];
		
		$row['file'] = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$row['file'];
		
		$xtpl->assign( 'VISA', $row );
		//VISA LIST
		$sql = "SELECT * FROM `tbl_register_visa_list` WHERE `vid` = ".$row['id']." ORDER BY `id` ASC ";
		$result_list = $db->sql_query( $sql );
		$vid=0;
		while ( $row = $db->sql_fetchrow( $result_list, 2 ) )
		{
			$row['no'] = $vid + 1;
			$row['date_birth_list'] = ( $row['date_birth_list'] > 0 )? date('F j, Y',$row['date_birth_list']) : '';
			$row['place_birth_list'] = ( $row['place_birth_list'] > 0 )? date('F j, Y',$row['place_birth_list']) : '';
			$row['passport_date_issue_list'] = ( $row['passport_date_issue_list'] > 0 )? date('F j, Y',$row['passport_date_issue_list']) : '';
			$row['passport_date_expiry_list'] = ( $row['passport_date_expiry_list'] > 0 )? date('F j, Y',$row['passport_date_expiry_list']) : '';
			$row['tentative_arriving_date_list'] = ( $row['tentative_arriving_date_list'] > 0 )? date('F j, Y',$row['tentative_arriving_date_list']) : '';
			$row['tentative_leaving_date_list'] = ( $row['tentative_leaving_date_list'] > 0 )? date('F j, Y',$row['tentative_leaving_date_list']) : '';
			$xtpl->assign( 'ROW', $row );
			$xtpl->parse( 'main.visa.list.row' );
			$vid++;
		}
		if( $vid > 0 ) $xtpl->parse( 'main.visa.list' );
		$xtpl->parse( 'main.visa' );
	}
	//hotel
	$sql = "SELECT * FROM `tbl_register_hotel` WHERE `hid` = ".$datar['p_id']." AND `userid` = ".$datar['sid']." ORDER BY `id` ASC ";
	$result = $db->sql_query( $sql );
	$ia=0;
	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$row['no'] = $ia + 1;
		$row['ck'] = md5($row["id"]);
		$row['check_in'] = ( $row['check_in'] > 0 )? date('F j, Y',$row['check_in']) : '';
		$row['check_out'] = ( $row['check_out'] > 0 )? date('F j, Y',$row['check_out']) : '';
		$row['edit'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=hotel&id=".$id."&hid=".$row["id"]."&ck=". md5($id.$user_info['s_id']);
		$row['alink'] = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=".$module."&" . DF_FUNCTION_VARIABLE . "=hotel&id=".$id."&ck=". md5($id.$user_info['s_id']);
		$xtpl->assign( 'ROW', $row );
		$xtpl->parse( 'main.list.row' );
		$ia++;
	}
	if( $ia > 0 ) $xtpl->parse( 'main.list' );

	$xtpl->parse( 'main' );
	$content = $xtpl->text( 'main' );
	return $content;
}

function outfile_review($data_p,$datar)
{
	global $db, $module, $global_config, $array_catalogs,$array_status,$array_gender;
	$data_value = unserialize( base64_decode($datar['value']) );
	$layout = "reoutfile.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
	$xtpl = new XTemplate( $layout, $path_theme );
	$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
	$xtpl->assign( 'LANG', $global_lang );
	$xtpl->assign( 'DATAP', $data_p );
	$xtpl->assign( 'DATAR', $datar );
	
	//selcect review
	$sql_re = "SELECT t1.*, t2.s_scientifice_title, t2.s_name , t2.s_middle_name, t2.s_family_name, t2.s_email FROM `tbl_review` as t1 LEFT JOIN `tbl_profile` as t2 ON t1.`s_id` = t2.`s_id` WHERE `r_id` = ".$datar['id']." ORDER BY `sendtime` DESC";
	$result_re = $db->sql_query( $sql_re );
	$i=1;
	while ( $row_re = $db->sql_fetchrow( $result_re, 2 ) )
	{
		$row_re['no'] = $i;
		$row_re['status'] = $array_status[$row_re['status']];
		$row_re['re_status'] = $array_status_review[$row_re['re_status']];
		
		$title = '';
		if ( !empty($row_re['s_scientifice_title']) )
		{
			$array_scienttifice_temp = explode(',', $row_re['s_scientifice_title'] );		
		}
		foreach ( $array_scienttifice_temp as $scienttifice )
		{
			if ( !empty($array_scienttifice[$scienttifice]) )
			{
				$title .= $array_scienttifice[$scienttifice]['t_name_v'].'. ';
			}	
		}
		$row_re['s_title'] = $title;
		
		$xtpl->assign( 'REROW', $row_re );
		
		if ( !empty($row_re['rfile']))
		{
			$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$row_re['rfile'];
			$xtpl->assign( 'rfile', $b_des_file );
			$xtpl->parse( 'main.reloop.rfile' );
		}
		$xtpl->parse( 'main.reloop' );
		$i++;
	}
	if ( !empty($datar['file']))
	{
		$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$datar['file'];
		$xtpl->assign( 'b_des_file', $b_des_file );
		$xtpl->parse( 'main.b_des_file' );
	}
	$xtpl->parse( 'main' );
	$content = $xtpl->text( 'main' );
	return $content;
}

function outfile_review_poster($data_p,$datar)
{
	global $db, $module, $global_config, $array_catalogs,$array_status,$array_gender;
	$data_value = unserialize( base64_decode($datar['value']) );
	$layout = "reoutfilep.tpl";
	$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
	$xtpl = new XTemplate( $layout, $path_theme );
	$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
	$xtpl->assign( 'TEMPLATE', $global_config['site_theme']  );
	$xtpl->assign( 'LANG', $global_lang );
	
	$xtpl->assign( 'DATAP', $data_p );

	$type = 0;
	if( $datar['abstract'] == 1 && $datar['poster'] == 1) { $type = 0; }
	elseif( $datar['abstract'] == 2 && $datar['poster'] == 1) { $type = 1; }
	elseif( $datar['abstract'] == 1 && $datar['poster'] == 2) { $type = 2; }
	
	$datar['cate'] = !empty( $array_catalogs[$datar['cid']] ) ?  $array_catalogs[$datar['cid']]['c_title'] . ' (Code: '.$array_catalogs[$datar['cid']]['c_code'].')' : '';
	
	$sql = "SELECT * FROM tbl_profile WHERE s_id= ".intval($datar['sid'])."";
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 ); 
	$data['s_gender'] = $array_gender[$data['s_gender']];
	$xtpl->assign( 'check'.$type, 'checked="checked"' );
	$xtpl->assign( 'DATAR', $datar );
	$xtpl->assign( 'DATA', $data );
	$xtpl->assign( 'cconference'.$datar['f_conference'], 'checked="checked"' );
	$xtpl->assign( 'caccommodation'.$datar['f_accommodation'], 'checked="checked"' );
	$xtpl->assign( 'cdomestic'.$datar['f_domestic'], 'checked="checked"' );
	$xtpl->assign( 'status', $array_status[$datar['status']] );
	$xtpl->assign( 'checkf'.$datar['financial'], 'checked="checked"' );
	if ( !empty($datar['p_file']))
	{
		$b_des_file = DF_BASE_SITEURL.DF_UPLOAD_FOLDER.'/'.$module.'/'.$datar['p_file'];
		$xtpl->assign( 'b_des_file', $b_des_file );
		$xtpl->parse( 'main.poster.b_des_file' );
	}

	
	if( $datar['financial'] == 2 && $data_p['p_anable_fc'] == 1 ) $xtpl->parse( 'main.financial' );
	if( $datar['poster'] == 2 && $data_p['p_anable_pt'] == 1 ) $xtpl->parse( 'main.poster' );
	
	if( $data_p['p_anable_ab'] == 1 ) { $xtpl->parse( 'main.enabstract' );}
	if( $data_p['p_anable_pt'] == 1 ) { $xtpl->parse( 'main.enposter' );}
	if( $data_p['p_anable_fc'] == 1 ) { $xtpl->parse( 'main.enfinancial' ); }

	$xtpl->parse( 'main' );
	$content = $xtpl->text( 'main' );
	return $content;
}

function check_profile($code)
{
	global $db;
	$sql = "SELECT * FROM `tbl_profile` WHERE `s_email` = ". $db->dbescape($code);
	$result = $db->sql_query( $sql );
	$p_row = $db->sql_fetchrow( $result, 2 );
	if( !empty($p_row) ) return true;
	return false;
}
function get_id_form_title($title, $array_list, $key)
{
	foreach( $array_list as $id => $row )
	{
		if( !empty($row[$key]) )
		{
			if( trim($row[$key]) == trim($title) )
			{
				return $id;	
			}
		}
	}
	return 0;	
}
function add_reg_his($cm,$id,$status)
{
	global $db, $user_info;
	$sql = "INSERT INTO `tbl_register_his` (`id`, `rid`, `sid`, `status`, `note`, `addtime`) 
			VALUES (NULL, " . $id . ", " . $user_info['s_id']. ", ".$db->dbescape( $status ).", ".$db->dbescape( $cm ).", ".time()." );";
	$idnew = $db->sql_query_insert_id( $sql ); 
	$db->sql_freeresult();
}
function create_folder($path_folder){  
	if ( !is_dir ( $path_folder ) ) 
	{
		mkdir ( $path_folder );
		file_put_contents($path_folder."/index.html","");
	}
}
?>