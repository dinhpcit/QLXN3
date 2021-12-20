<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>System Management researcher at VIASM</title>
        {THEME_PAGE_TITLE} {THEME_META_TAGS}
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/thickbox/thickbox.css" media="screen"/>
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/thickbox/thickbox.js"></script>
        {THEME_CSS}
        {THEME_SITE_JS}
        <script type="text/javascript">
			var tb_pathToImage = "{DF_BASE_SITEURL}themes/{TEMPLATE}/images/loadingAnimation.gif";
            var site_url = '{DF_BASE_SITEURL}';
            var module_var = '{DF_MODULE_VARIABLE}';
            var func_var = '{DF_FUNCTION_VARIABLE}';
            var module = '{module}';
        </script>
    </head>
    <body>
    <center>
        <table width="650" class="cssContent">
            <tr>
                <td> 
                    <div align="center">
                        <img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/logo.png" />
                    </div>
                    <strong>Sign-up/Đăng ký</strong>
                    <div class="clogin">
                    <!-- BEGIN: form -->
                    <p>Fill in all the fields marked(*)/Điền thông tin vào tất cả các trường được đánh dấu (*).</p>
                    <form action="" method="post">
                        <input type="hidden" value="1" name="save"/>
                        <table width="100%">    
                            <!-- BEGIN: error -->
                            <tr>
                                <td colspan="2"><span class="cl_error">{error}</span></td>
                            </tr>
                            <!-- END: error -->
                            <tr>
                                <td width="240">Full-name/Họ và tên (*)</td>
                                <td><input type="text" name="S_NAME" value="{DATA.S_NAME}" style="width:300px; border:1px solid #CCC; padding:5px " /></td>
                            </tr>
                            <tr>
                                <td>E-mail/ Email truy cập(*)</td>
                                <td><input type="text" name="S_EMAIL" value="{DATA.S_EMAIL}" style="width:300px; border:1px solid #CCC; padding:5px " /></td>
                            </tr>
                            <tr>
                                <td>Re-enter E-mail/ Nhập lại email (*)</td>
                                <td><input type="text" name="S_AEMAIL" value="{DATA.S_AEMAIL}" style="width:300px; border:1px solid #CCC; padding:5px " /></td>
                            </tr>
                            <tr>
                                <td>Password/Mật khẩu (*)</td>
                                <td>
                                    <input type="password" name="S_PASSWORD" value="" style="width:300px; border:1px solid #CCC; padding:5px " />
                                </td>
                            </tr>
                            <tr>
                                <td>Re-enter Password/ Nhập lại mật khẩu (*)</td>
                                <td>
                                    <input type="password" name="S_PASSWORD_AGAIN" value="" style="width:300px; border:1px solid #CCC; padding:5px " />
                                </td>
                            </tr>
                            <tr>
                                <td>Captcha/Chuỗi an ninh</td>
                                <td>
                                    <span id="capchar">{capchar}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Enter Captcha/ Nhập chuỗi an ninh (*)</td>
                                <td>
                                    <input type="text" name="S_CAPCHAR" value="" style="width:50%; border:1px solid #CCC; padding:5px " />
                                </td>
                            </tr>
                            <tr>
                                <td align="center" colspan="2">
                                    <br /><input type="submit" class="bgbt" value="Sign-up/Đăng ký tài khoản" />
                                    <input class="bgbtr" type="reset" value="Clear/Làm mới" /><br />
                                    <a href="{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1">Sign-in/Đăng nhập</a>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <!-- END: form -->
                    <!-- BEGIN: complate -->
                    <div style="padding:20px">Bạn đăng ký thành công! chúng tôi đã gửi một thư kích hoạt tài khoản đến E-mail <a href="mailto:{DATA.S_EMAIL}">{DATA.S_EMAIL}</a>.</div>
                     <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Quay lại trang đăng nhập" />
                    <!-- END: complate -->
    				</div>
                    If you are having problems with the system please contact <a href="mailto:viasm@viasm.edu.vn">viasm@viasm.edu.vn </a> for support.
            	<td>
            </tr>
            <tr>
                <td>
                    <div class="cssfooter" align="center">
                    Address: The 7th floor, Ta Quang Buu Library, University of Science and Technology, 1 Dai Co Viet Street, Ha Noi, Viet Nam. <br>
                    Tel: +84 4 3623 1542 - Fax: +84 4 3623 1543 - Email: viasm@viasm.edu.vn <br />
                    Copyright (c) 2014  VIASM 
                    </div>		
                </td>
            </tr>
          </table>  
	</body>
</html>
<!-- END: main -->