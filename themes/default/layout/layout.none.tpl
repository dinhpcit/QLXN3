<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <title>{PAGE_TITLE}</title>
        {THEME_META_TAGS}
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css?v=1.12" />
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/bootstrap.min.css?v=1.13" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <script src="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.js"></script>
		<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/jquery-ui/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/error.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.validate.js"></script>
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/site.js?v=1.0"></script>
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
    <div class="main">
    	<div>{MODULE_CONTENT}</div>
		<div class="clear"></div>	
	</div>
    {THEME_FOOTER_JS}
</body>
</html>
<!-- END: main -->