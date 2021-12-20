<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="refresh" content="900" />
		<meta name="revisit-after" content="1 days" />
        <title>Phần mềm quản lý thông tin mẫu bệnh phẩm và kết quả xét nghiệm</title>
        {THEME_PAGE_TITLE} {THEME_META_TAGS}
        
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css?v=1.7" />
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/tablecss.css" />
        <link rel="stylesheet" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/css/font-awesome.css">
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <script src="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/site.js"></script>
		<script src="{DF_BASE_SITEURL}plugins/fancybox/jquery.mousewheel.pack.js" type="text/javascript"></script>
        <link media="screen" type="text/css" href="{DF_BASE_SITEURL}plugins/fancybox/jquery.fancybox.css?v=1.0" rel="stylesheet" />
        <script src="{DF_BASE_SITEURL}plugins/fancybox/jquery.fancybox.js" type="text/javascript"></script>
		
        {THEME_CSS}
        {THEME_SITE_JS}
        <script type="text/javascript">
			var tb_pathToImage = "{DF_BASE_SITEURL}themes/{TEMPLATE}/images/loadingAnimation.gif";
            var site_url = '{DF_BASE_SITEURL}';
			var site_admin_url = '{DF_BASE_SITEURL}admin/';
            var module_var = '{DF_MODULE_VARIABLE}';
            var func_var = '{DF_FUNCTION_VARIABLE}';
            var module = '{module}';
			var menu_acc = 0;
        </script>
        <style>
		@font-face {
		  font-family: 'FontAwesome';
		  src: url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.eot?v=4.5.0');
		  src: url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.eot?#iefix&v=4.5.0') format('embedded-opentype'), url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.ttf?v=4.5.0') format('truetype'), url('{DF_BASE_SITEURL}themes/{TEMPLATE}/css/font-awesome/fonts/fontawesome-webfont.svg?v=4.5.0#fontawesomeregular') format('svg');
		  font-weight: normal;
		  font-style: normal;
		}
		</style>
    </head>
    <body>
	<div class="menu_top">
    	<table width="100%" cellpadding="0" cellspacing="0"><tr>
		<!-- BEGIN: logo -->
        <td width="80" align="center" valign="middle" style="background:#FFF">
        	<a href="{DF_BASE_ADMINURL}" style="padding:0px; border:0; float:none;" title="Phần mềm quản lý thông tin mẫu bệnh phẩm và kết quả xét nghiệm">
            <img style="margin-top:5px" src="{logo}" height="35" />
            </a>	
        </td>
        <!-- END: logo -->
        <td width="80" align="center" valign="middle" style="background:#FFF">
        	<a href="{DF_BASE_ADMINURL}" style="padding:0px; border:0; float:none;" title="Phần mềm quản lý thông tin mẫu bệnh phẩm và kết quả xét nghiệm">
            <img style="margin-top:5px" src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/logo.png" height="35" />
            </a>	
        </td>
        <td width="80" align="center" valign="middle" style="background:#FFF">
        	<a href="{DF_BASE_ADMINURL}" style="padding:0px; border:0; float:none;" title="Phần mềm quản lý thông tin mẫu bệnh phẩm và kết quả xét nghiệm">
            <img style="margin-top:5px" src="{DF_BASE_SITEURL}images/logo_nihe.jpg" height="35" />
            </a>	
        </td>
        <td>
        	<!-- BEGIN: mcb -->
			<a href="{link_main}"><i class="fa fa-qrcode" aria-hidden="true"></i> Dữ liệu xét nghiệm</a>
            <!-- END: mcb -->
			<a href="{link_statistic1}#"><i class="fa fa-line-chart" aria-hidden="true"></i> Thống kê</a>
            <br clear="all"/>
        </td>
        <td></td>
        <td>
        	<!-- BEGIN: mod -->
            <a href="{link_config}" style="float:right"><i class="fa fa-cog" aria-hidden="true"></i> Cấu hình</a>
            <a href="{link_mod}" style="float:right"><i class="fa fa-users" aria-hidden="true"></i> Người quản trị</a>
            <!-- END: mod -->
            <!-- BEGIN: qldm1 -->
			<a href="{link_category}" style="float:right"><i class="fa fa-tasks" aria-hidden="true"></i> QL danh mục</a>
			<!-- END: qldm1 -->
			<!-- BEGIN: qlnc -->
			<a href="{link_adv}" style="float:right"><i class="fa fa-database" aria-hidden="true"></i> QL nâng cao</a>
            <!-- END: qlnc -->
            <!-- BEGIN: qltk -->
			<a href="{link_pro}" style="float:right"><i class="fa fa-user-plus" aria-hidden="true"></i> QL tài khoản</a>
            <!-- END: qltk -->
            <br clear="all"/>
		</td>
        <td width="60" align="center">
        	<a href="javascript:void(0)" onclick="menuclick()" style="padding:0px; border:0; float:none; padding-top:3px">
            <img src="{DF_BASE_SITEURL}images/3801705.png" width="35" /></a>
            <div style="position:relative">
                <div class="menuclick" id="menuclick">
                    <p><strong style="color:#FFF">{USER.u_name} ({USER.u_username})</strong></p>
                    <p>
                        <a href="{DF_BASE_ADMINURL}index.php?mod=users&fun=change"><i class="fa fa-key"></i> Change password</a>
                    </p>
                    <p>
                        <a href="{DF_BASE_ADMINURL}index.php?mod=users&fun=logout"><i class="fa fa-sign-out"></i> Logout</a>
                    </p>
                </div>
            </div>
        </td>
        </tr></table>
	</div>
    <div class="div_full1">{MODULE_CONTENT}</div>
    {THEME_FOOTER_JS}
    <script>
    	function menuclick()
		{
			if(menu_acc == 0)
			{
				$('#menuclick').show();
				menu_acc = 1;
			}
			else
			{
				$('#menuclick').hide();
				menu_acc = 0;
			}
		}
    </script>
</body>
</html>
<!-- END: main -->