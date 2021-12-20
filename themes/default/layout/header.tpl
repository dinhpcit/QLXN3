<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{PAGE_TITLE}</title>
        {THEME_META_TAGS}
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css?v=1.22" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/tablecss.css" />
        <link rel="stylesheet" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/css/font-awesome.css">
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <script src="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/error.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.validate.js"></script>
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/site.js?v=1.21"></script>
		<script src="{DF_BASE_SITEURL}includes/js/fancybox/jquery.mousewheel.pack.js" type="text/javascript"></script>
		<link media="screen" type="text/css" href="{DF_BASE_SITEURL}includes/js/fancybox/jquery.fancybox.css" rel="stylesheet"/>
		<script src="{DF_BASE_SITEURL}includes/js/fancybox/jquery.fancybox.js" type="text/javascript"></script>
        {THEME_CSS}
        {THEME_SITE_JS}
        <script type="text/javascript">
			var tb_pathToImage = "{DF_BASE_SITEURL}themes/{TEMPLATE}/images/loadingAnimation.gif";
            var site_url = '{DF_BASE_SITEURL}';
            var module_var = '{DF_MODULE_VARIABLE}';
            var func_var = '{DF_FUNCTION_VARIABLE}';
            var module = '{module}';
        </script>
        <style>
		@font-face {
		  font-family: 'FontAwesome';
		  src: url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.eot?v=4.5.0');
		  src: url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.eot?#iefix&v=4.5.0') format('embedded-opentype'), url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.ttf?v=4.5.0') format('truetype'), url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular') format('svg');
		  font-weight: normal;
		}
		</style>
    </head>
    <body>
    <div class="header">
    	<div class="div_full">
        	<div class="fl">
            	<a href="{DF_BASE_SITEURL}" title="{PAGE_TITLE}">
					<img style="padding-top:10px" src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/logo.png" width="85" />
				</a>
            </div>
			<div class="fl" style="margin-top: 10px;margin-left: 10px;">
				<a href="{DF_BASE_SITEURL}" style="color: #38513e;">
					<div class="title-h2">PHẦN MỀM QUẢN LÝ THÔNG TIN</div>
					<div  class="title-h3">{SHORTNAME}</div></a>
			</div>
            <div class="fr" style="width: 50%">
            	<!-- BEGIN: user -->
				<div class="cssSubTitle" align="right">
					{USER.s_name} &nbsp;&nbsp;&nbsp;&nbsp;
					<!--<a href="{DF_BASE_SITEURL}?mod=users&fun=change"><i class="fa fa-key"></i> <strong>Đổi mật khẩu</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;-->
					<a href="{DF_BASE_SITEURL}?mod=users&fun=logout"><i class="fa fa-sign-out"></i> <strong>Đăng xuất</strong></a>
					</div>
					<div style="float:right" class="cssContent">
					<a href="{DF_BASE_SITEURL}"><i class="fa fa-home"></i> <strong>Trang chủ</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="{DF_BASE_SITEURL}"><i class="fa fa-home"></i> <strong>Hướng dẫn sử dụng</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--<a href="{DF_BASE_SITEURL}?mod=home"><i class="fa fa-group"></i> <strong>Dữ liệu XN</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;-->
					<a href="{DF_BASE_SITEURL}?mod=profile"><i class="fa fa-group"></i> <strong>Thông tin tài khoản</strong></a>
                </div>
                <!-- END: user -->
                <!-- BEGIN: nouser -->
                <div class="cssSubTitle">&nbsp;</div>
                <div style="float:right" class="cssContent">
                <a href="{DF_BASE_SITEURL}"><i class="fa fa-home"></i> <strong>Trang chủ</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="{DF_BASE_SITEURL}?mod=users&fun=login"><i class="fa fa-key"></i> <strong>Đăng nhập</strong></a>&nbsp;&nbsp;&nbsp;&nbsp;
                </div>
                <!-- END: nouser -->
            </div>
            <div class="clear"></div>	
        </div>
    </div>