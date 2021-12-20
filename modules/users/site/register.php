<?php 

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
$action = 0;
$error = "";
$data = array( "S_NAME"=>"","S_EMAIL"=>"" );

if ( $Request->GetInt( "save", "post", 0 ) == 1)
{
	$cap = $Request->GetString( "S_CAPCHAR", "post", '' );
	//$data['S_NAME'] = $s_name = $Request->GetString( "S_NAME", "post", '' );
	$data['S_EMAIL'] = $s_email = $Request->GetString( "S_EMAIL", "post", '' );
	$data['S_AEMAIL'] = $s_aemail = $Request->GetString( "S_AEMAIL", "post", '' );
	$s_pass = $Request->GetString( "S_PASSWORD", "post", '' );
	$s_passa = $Request->GetString( "S_PASSWORD_AGAIN", "post", '' );
	if(empty($s_email))
	{
		$error = "Error/ Lỗi: E-mail address can not be empty/ Bạn phải có email truy cập";
	}
	elseif(!check_email_mx($s_email))
	{
		$error = "Error/ Lỗi: E-mail is not valid/ Email truy cập không hợp lệ";
	}
	elseif( $s_email != $s_aemail )
	{
		$error = "Error/ Lỗi: Re-enter E-mail is not valid/ Email nhập lại không đúng";
	}
	elseif(check_insert_user($s_email) || check_insert_user_temp($s_email))
	{
		$error = "Error/ Lỗi: Your email has been used by another account/ Email này đã có người sử dụng.";
	}
	elseif( strlen($s_pass) < 6 ) 
	{
		$error = "Error/ Lỗi: Password should consists of at least 6 characters/ Mật khẩu không được ít hơn 6 ký tự";
	}
	elseif( $s_pass !=$s_passa ) 
	{
		$error = "Error/ Lỗi: Re-Password is not valid/ Mật khẩu nhập lại không đúng";
	}
	elseif (!check_capchar($cap))
	{
		$error = "Error/ Lỗi: Capchar is not valid/ Chuỗi an ninh không đúng";
	}
	else
	{
		$sql = "INSERT INTO `tbl_profile_tmp` (`s_id`, `s_name`, `s_email`, `s_password`, `s_date`) 
				VALUES (NULL, ".$db->dbescape($s_name).", ".$db->dbescape($s_email).",".$db->dbescape(md5($s_pass)).", ".DF_CURRENTTIME.");";
    	$idnew = $db->sql_query_insert_id($sql); 
    	if ($idnew>0)
    	{
    		$link = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=activation&id=".$idnew.'&ck='.md5($idnew);
    		$subject = "[VIASM] Activate your account/ Xác nhận mở tài khoản";
			$body = "Dear ".$s_email.",\nWelcome to the  Vietnam Institute for Advanced Study in Mathematics (VIASM) Conference Management System!\nTo activate your account, please first verify your email address by clicking the following link:\n".$link."\n\nYou may use this account to register to attend other conferences organized by VIASM.\nThank you for your interest in VIASM conferences.\nIf you need help, please contact support via email to submit@viasm.edu.vn or by phone  at (+84) 24 3623 1542, Monday to Friday,  9:00 to 16:00 (GMT+7).\n\n\n";
			$body .= "Kính gửi ".$s_email.",\nChào mừng Quý vị đến với Hệ thống Quản lý Hội nghị/ Hội thảo của Viện Nghiên cứu cao cấp về Toán (VIASM)!\n
Để kích hoạt tài khoản đăng ký, vui lòng xác thực địa chỉ thư điện tử bằng cách nhấn vào đường dẫn dưới đây:\n".$link."\n\nQuý vị có thể sử dụng tài khoản đã đăng ký để đăng ký tham dự các Hội nghị, Hội thảo do Viện Nghiên cứu cao cấp về Toán tổ chức.\nViện Nghiên cứu cao cấp về Toán cảm ơn sự quan tâm của Quý vị tới các hoạt động của Viện.\nĐể nhận được sự hỗ trợ, Quý vị có thể gửi thư điện tử về địa chỉ submit@viasm.edu.vn hoặc liên lạc theo số điện thoại (+84) 24 3623 1542, thứ Hai đến thứ Sáu, từ 9:00 đến 16:00 (theo giờ GMT+7).\n\n";
    		if ( send_mail ($subject,$body,$s_email) )
    		{
    			$action = 1;
    		}
    		else
    		{
    			$error = "System error: failed to send email ".$data['S_EMAIL'].'! Contact VIASM for assistance <a href="mailto:viasm@viasm.edu.vn">viasm@viasm.edu.vn</a>';
    		}
    	}
	}
}

$layout = "register.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'PAGE_TITLE', $global_lang['register_title'] );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'DATA', $data );
if ( $action == 0)
{
	$capchar = capchar();
	$xtpl->assign( 'capchar', $capchar );
	if ( !empty($error) )
	{
		$xtpl->assign( 'error', $error );
		$xtpl->parse( 'main.form.error' );
	}
	$xtpl->parse( 'main.form' );
}
elseif ( $action == 1) 
{
	$xtpl->parse( 'main.complate' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo login_theme( $content );

?>