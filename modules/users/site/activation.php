<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

$id = $Request->GetInt( "id", "get", 0 );
$ck = $Request->GetString( "ck", "get", '' );

if ( $ck != md5( $id ) ) die( 'stop!!' );
$table = "tbl_profile_tmp";
$link = DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login";
$sql = "SELECT * FROM " . $table . " WHERE s_id=" . $id;
$result = $db->sql_query( $sql );
$data = $db->sql_fetchrow( $result, 2 ); 
$s_email = $data['s_email'];
$error = "";
if ( ! empty( $data ) )
{
    $sql = "INSERT INTO `tbl_profile` (`s_id`, `s_expert`, `s_name`, `s_password`, `s_email`,`s_regtime`, `s_last_time`) 
						VALUES (NULL, NULL, " . $db->dbescape( $data['s_name'] ) . ", " . $db->dbescape( $data['s_password'] ) . ", " . $db->dbescape( $data['s_email'] ) . ", ".DF_CURRENTTIME.",".DF_CURRENTTIME.");";
		
    $idnew = $db->sql_query_insert_id( $sql ); 
    if ( $idnew > 0 )
    {
        $strSQL = "DELETE FROM `tbl_profile_tmp` WHERE s_id=" . $id;
        $db->sql_query($strSQL);
        $db->sql_freeresult();
    	$successful = 'Your activation is successful! Please click on the link below to access the system<br /><a href="' . $link . '">' . $link . '</a>.<br />If you need help, please contact support via email to submit@viasm.edu.vn or by phone at (+84) 3623 1542, Monday to Friday, 9:00 to 16:00 (GMT+7).<br /><br /><br />
		Kích hoạt thành công! Vui lòng nhấn vào đường link dưới đây để truy cập hệ thống<br /><a href="' . $link . '">' . $link . '</a>.<br />
		Để nhận được sự hỗ trợ, Quý vị có thể gửi thư điện tử về địa chỉ submit@viasm.edu.vn hoặc liên lạc theo số điện thoại (+84) 24 3623 1542, thứ Hai đến thứ Sáu, từ 9:00 đến 16:00 (theo giờ GMT+7).<br />';
		//send mail
		$subject = "[VIASM] Confirm successful account registration/ Đăng ký tài khoản thành công";
		$body = "Dear ".$s_email.",\nYou have successfully registered to the Conference Management System of Vietnam Institute for Advanced Study in Mathematics (VIASM)!\nYou may use this account to register to attend other conferences organized by VIASM.\nIf you need help, please contact support via email to submit@viasm.edu.vn or by phone  at (+84) 24 3623 1542, Monday to Friday,  9:00 to 16:00 (GMT+7).\n\n\n";
		$body .= "Kính gửi ".$s_email.",\nQuý vị đã đăng ký thành công tài khoản trên hệ thống Quản lý Hội nghị/ Hội thảo của Viện Nghiên cứu cao cấp về Toán!\nQuý vị có thể sử dụng tài khoản đã đăng ký để đăng ký tham dự các Hội nghị, Hội thảo do Viện Nghiên cứu cao cấp về Toán tổ chức.\nĐể nhận được sự hỗ trợ, Quý vị có thể gửi thư điện tử về địa chỉ submit@viasm.edu.vn hoặc liên lạc theo số điện thoại (+84) 24 3623 1542, thứ Hai đến thứ Sáu, từ 9:00 đến 16:00 (theo giờ GMT+7).\n\n";
		if ( send_mail ($subject,$body,$s_email) )
		{
			$action = 1;
		}
		else
		{
			$error .= "System error: failed to send email ".$data['S_EMAIL'].'! Contact VIASM for assistance <a href="mailto:submit@viasm.edu.vn">viasm@viasm.edu.vn</a>';
		}
    }
    else
    {
        $error .= 'Not activated. This account may already exist. 
    	Contact VIASM for assistance <a href="mailto:submit@viasm.edu.vn">submit@viasm.edu.vn</a><br />
    	Or click on the link below to access the system <br /> <a href="' . $link . '">' . $link . '</a>
    	';
    }
}
else
{
    $error .= 'Not activated. This account may already exist. 
    	Contact VIASM for assistance <a href="mailto:submit@viasm.edu.vn">submit@viasm.edu.vn</a><br />
    	Or click on the link below to access the system <br /> <a href="' . $link . '">' . $link . '</a>
    	';
}

$db->sql_freeresult();

$layout = "activation.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'PAGE_TITLE', $global_lang['active_title'] );
if(!empty($error) ) 
{
	$xtpl->assign( 'msg', $error );
	$xtpl->parse( 'main.error' );
}
if(!empty($successful) ) 
{
	$xtpl->assign( 'successful', $successful );
	$xtpl->parse( 'main.successful' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;

?>