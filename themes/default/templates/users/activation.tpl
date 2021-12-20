<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>{PAGE_TITLE}</title>
        {THEME_META_TAGS}
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
        <div style="width:60%; margin:auto; margin-top:50px;margin-bottom:5px;" align="center">
            <img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/logo.png" height="60" /><br />
            <!-- BEGIN: error -->
            <div class="box_register clearfix">
                <div style="padding:20px">{msg}</div>
            </div>
            <!-- END: error -->
            <!-- BEGIN: successful -->
            <div class="clearfix" style="color:#090; font-weight:bold">
                <div style="padding:20px">{successful}</div>
            </div>
            <!-- END: successful -->
        </div>
    </center>
	</body>
</html>
<!-- END: main -->