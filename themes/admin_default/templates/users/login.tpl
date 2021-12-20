<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Hệ thống quản lý dữ liệu xét nghiệm về dịch bệnh Covid-19</title>
        {THEME_PAGE_TITLE} {THEME_META_TAGS}
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css" />
        <link rel="stylesheet" href="{DF_BASE_SITEURL}css/font-awesome/css/font-awesome.css">
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <script src="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/site.js"></script>
        {THEME_CSS}
        {THEME_SITE_JS}
        <script type="text/javascript">
			var tb_pathToImage = "{DF_BASE_SITEURL}themes/{TEMPLATE}/images/loadingAnimation.gif";
            var site_url = '{DF_BASE_SITEURL}';
			var site_admin_url = '{DF_BASE_SITEURL}admin/';
            var module_var = '{DF_MODULE_VARIABLE}';
            var func_var = '{DF_FUNCTION_VARIABLE}';
            var module = '{module}';
        </script>
        <style>
		@font-face {
		  font-family: 'FontAwesome';
		  src: url('{DF_BASE_SITEURL}css/font-awesome/fonts/fontawesome-webfont.eot?v=4.5.0');
		  src: url('{DF_BASE_SITEURL}css/font-awesome/fonts/fontawesome-webfont.eot?#iefix&v=4.5.0') format('embedded-opentype'), url('{DF_BASE_SITEURL}css/font-awesome/fonts/fontawesome-webfont.ttf?v=4.5.0') format('truetype'), url('{DF_BASE_SITEURL}css/font-awesome/fonts/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular') format('svg');
		  font-weight: normal;
		  font-ste: normal;
		}
		</style>
    </head>
    <body>
    <div class="header">
    	<div class="div_full">
            <div style="padding-top: 60px"></div>
        </div>
    </div> 
    <div class="div_full">
   		<div class="clogin">
        	<table width="100%" style="margin-bottom: 10px">
                <tr>
                    <td width="80" align="">
                        <a href="{DF_BASE_ADMINURL}"><img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/logo.png" width="50" /></a>
                    </td>
                    <td>
                        <div style="margin-bottom:10px; font-size:14px; color:#090">
                        <strong>Đăng nhập hệ thống quản trị</strong></div>
                    </td>
                </tr>    
            </table>
            <form method="post" action="">
            <input type="hidden" name="post" value="1" />
                <table width="100%" class="nlist">
                    <!-- BEGIN: error -->
                    <tr>
                        <td colspan="2"><p style="color:#900">Đăng nhập thất bại! Tên đăng nhập hoặc mật khẩu không đúng</p></td>
                   </tr>
                   <!-- END: error -->
                    <tr>
                        <td align="center">
                            <input name="username" placeholder="Tên đăng nhập" type="text" id="txtEmail" maxlength="100" style="width:96%; padding: 10px 8px"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input name="password" placeholder="Mật khẩu" type="password" id="txtPassword" maxlength="100" style="width:96%; padding: 10px 8px"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input name="bt" type="submit" value="Sign-in/Đăng nhập">
                        </td>
                    </tr>
                </table>
            </form>
        </div> 
    </div>
    <div class="footer"> 
        <div class="cssfooter" align="center">
        Copyright (c) 2021
        </div>	
    </div>
    {THEME_FOOTER_JS}
</body>
</html>
<!-- END: main -->