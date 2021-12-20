<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */
$action = 0;
$error = "";
$time = 1; //1 ngày
$time_change = isset( $_SESSION['time_change'] ) ? $_SESSION['time_change'] : 0;
$data_temp = array();
if ( $Request->GetString( "ac", "get", '' ) == 'get' )
{
    if ( DF_CURRENTTIME - $time_change >= 5 * 60 )
    {
        $sid = $Request->GetInt( "id", "get", 0 );
        $t = $Request->GetInt( "t", "get", 0 );
        $ck = $Request->GetString( "ck", "get", '' );
        if ( DF_CURRENTTIME - $t >= $time * ( 24 * 60 * 60 ) ) $time = 0;
        if ( $ck == md5( $sid . $time ) )
        {
            $sql = "SELECT s_id,s_email,s_name,s_family_name FROM `tbl_profile` WHERE s_id = " . $db->dbescape( $sid );
            $result = $db->sql_query( $sql );
            $data_temp = $db->sql_fetchrow( $result, 2 );
            if ( ! empty( $data_temp ) )
            {
                $capchar = capchar();
                $sql = "UPDATE `tbl_profile` SET `s_password` = " . $db->dbescape( md5( $capchar ) ) . ' WHERE s_id=' . $sid;
                $result = $db->sql_query( $sql );
                
                $subject = "[VIASM] New password information/ Thông tin mật khẩu mới";
                $body = "Dear " . $data_temp['s_family_name'] . ",\n\nNew access password to the system (VIASM) : $capchar \n\nSincerely \n\nVIASM!\n\n";
				$body .= "Kính gửi " . $data_temp['s_family_name'] . ",\n\nMật khẩu truy cập mới vào hệ thống (VIASM) : $capchar \n\nKính thư \n\nVIASM!\n\n";
                if ( send_mail( $subject, $body, $data_temp['s_email'] ) )
                {
                    $action = 2;
                }
                else
                {
                    $error = "System error: failed to send email/ Lỗi hệ thống: không gửi được email tới " . $data_temp['s_email'] . '! Contact VIASM for assistance/ Liên hệ tới VIASM để được trợ giúp <a href="mailto:viasm@viasm.edu.vn">viasm@viasm.edu.vn</a>';
                }
                $_SESSION['time_change'] = DF_CURRENTTIME;
            }
        }
        else
        {
            $action = 3;
        }
    }
    else
    {
        $action = 3;
    }
}

if ( $Request->GetInt( "save", "post", 0 ) == 1 )
{
    $cap = $Request->GetString( "S_CAPCHAR", "post", '' );
    $s_email = $Request->GetString( "s_email", "post", '' );
    if ( empty( $s_email ) )
    {
        $error = "You must have access email/ Bạn phải có email truy cập";
    }
    elseif ( ! check_email_mx( $s_email ) )
    {
        $error = "Invalid access email/ Email truy cập không hợp lệ";
    }
    elseif ( ! check_capchar( $cap ) )
    {
        $error = "Incorrect security chain/ Chuỗi an ninh không đúng";
    }
    else
    {
        $sql = "SELECT s_id,s_email,s_name,s_family_name FROM `tbl_profile` WHERE s_email = " . $db->dbescape( $s_email );
        $result = $db->sql_query( $sql );
        $data_temp = $db->sql_fetchrow( $result, 2 );
        if ( ! empty( $data_temp ) )
        {
            $link = DF_BASE_SITEURL . "index.php?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=forgot&ac=get&id=" . $data_temp['s_id'] . '&ck=' . md5( $data_temp['s_id'] . $time ) . '&t=' . DF_CURRENTTIME;
            $subject = "[VIASM] Confirm password retrieval/ Xác nhận lấy lại mật khẩu";
            $body = "Dear " . $data_temp['s_family_name'] . ",\nYou have just requested a new password for the Conference Management System of Vietnam Institute for Advanced Study in Mathematics (VIASM)!\nTo confirm this password request, click the following link:\n\n".$link.".\n\nFor your security, this link expires in TEN MINUTES after you request it or you have completed the password change process.\nIf you did not request a password reset, please ignore this email.\nIf you need help, please contact support via email to submit@viasm.edu.vn or by phone at (+84) 3623 1542, Monday to Friday,  9:00 to 16:00 (GMT+7).\nThank you!\n\n";
			$body .= "Kính gửi " . $data_temp['s_family_name'] . ",\nHệ thống đăng ký Hội nghị/ Hội thảo của Viện Nghiên cứu cao cấp về Toán đã nhận được yêu cầu thay đổi mật khẩu của Quý vị!\nQuý vị vui lòng nhấn vào đường dẫn sau để thay đổi mật khẩu:\n\n".$link.".\n\nĐể bảo mật thông tin, đường dẫn sẽ tồn tại trong vòng 10 phút sau khi nhận được yêu cầu hoặc sau khi hoàn tất quá trình đổi mật khẩu.\nNếu Quý vị không yêu cầu đổi mật khẩu, vui lòng bỏ qua thư này.\nĐể nhận được sự hỗ trợ, Quý vị có thể gửi thư điện tử về địa chỉ submit@viasm.edu.vn hoặc liên lạc theo số điện thoại (+84) 3623 1542, thứ Hai đến thứ Sáu, từ 9:00 đến 16:00 (theo giờ GMT+7).\nXin cảm ơn!\n\n";
            if ( send_mail( $subject, $body, $data_temp['s_email'] ) )
            {
                $action = 1;
            }
            else
            {
                $error = "System error: failed to send email/ Lỗi hệ thống: không gửi được email tới " . $data_temp['s_email'] . '! Contact VIASM for assistance/ Liên hệ tới VIASM để được trợ giúp <a href="mailto:submit@viasm.edu.vn">submit@viasm.edu.vn</a>';
            }
        }
        else
        {
            $error = "This email does not exist, please check again./ Email này không tồn tại, vui lòng kiểm tra lại.";
        }
    }
}

$layout = "forgot.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/" . $module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );
$xtpl->assign( 'PAGE_TITLE', $global_lang['forgot_title'] );
if ( ! empty( $data_temp ) ) $xtpl->assign( 'DATA', $data_temp );
if ( $action == 0 )
{
    $capchar = capchar();
    $xtpl->assign( 'capchar', $capchar );
    if ( ! empty( $error ) )
    {
        $xtpl->assign( 'error', $error );
        $xtpl->parse( 'main.form.error' );
    }
    $xtpl->parse( 'main.form' );
}
elseif ( $action == 1 )
{
    $xtpl->parse( 'main.complate' );
}
elseif ( $action == 2 )
{
    $xtpl->parse( 'main.forgot' );
}
elseif ( $action == 3 )
{
    $xtpl->parse( 'main.noforgot' );
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo login_theme( $content );

?>