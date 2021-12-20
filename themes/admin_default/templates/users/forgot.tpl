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
                    <strong>Forgot password?/ Quên mật khẩu?</strong>
                    <div class="clogin">
                        <!-- BEGIN: form -->
                        <p>Fill in all the fields marked(*)/Bạn phải điền thông tin vào tất cả các trường được đánh dấu (*).</p>
                        <form action="" method="post">
                            <input type="hidden" value="1" name="save"/>
                            <table width="100%">
                                <!-- BEGIN: error -->
                                <tr>
                                    <td colspan="2"><span class="cl_error">{error}</span></td>
                                </tr>
                                <!-- END: error -->
                                <tr>
                                    <td>E-mail/Email truy cập (*)</td>
                                    <td><input type="text" name="s_email" value="{DATA.s_email}" style="width:300px; border:1px solid #CCC; padding:5px " /></td>
                                </tr>
                                <tr>
                                    <td>Captcha/Chuỗi an ninh</td>
                                    <td>
                                        <span id="capchar">{capchar}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Enter Captcha/Nhập chuỗi an ninh (*)</td>
                                    <td>
                                        <input type="text" name="S_CAPCHAR" value="" style="width:200px; border:1px solid #CCC; padding:5px " />
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center" colspan="2">
                                        <br /><input type="submit" class="bgbt" value="Password Reset/Lấy lại mật khẩu" />
                                        <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Back to Sing-in/Quay lại trang đăng nhập" />
                                    </td>
                                </tr>
                            </table>
                        </form>
                        <!-- END: form -->
                        <!-- BEGIN: complate -->
                        <div style="padding:20px">Chúng tôi đã gửi một thư xác nhận thay đổi mật khẩu đến mail <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.</div>
                        <center>
                            <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Quay lại trang đăng nhập" />
                        </center>    
                        <!-- END: complate --> 
                        <!-- BEGIN: forgot -->
                        <div style="padding:20px">Chúng tôi đã gửi một mật khẩu truy mới đến Email <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.</div>
                        <center>
                            <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Quay lại trang đăng nhập" />
                        </center>    
                        <!-- END: forgot --> 
                        <!-- BEGIN: noforgot -->
                        <div style="padding:20px">Thao tác này không còn thực hiện được nữa.</div>
                        <center>
                            <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Quay lại trang đăng nhập" />
                        </center>    
                        <!-- END: noforgot --> 
                    </div>
                    If you problem children in is too the registered open a account, please contact the system with them at me 
                    <a href="mailto:viasm@viasm.edu.vn">viasm@viasm.edu.vn </a> for not supported.
                </td>
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
    </center>
	</body>
</html>
<!-- END: main -->