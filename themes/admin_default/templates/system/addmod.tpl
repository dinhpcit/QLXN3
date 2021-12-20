<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Sửa thông tin người dùng</title>
        {THEME_PAGE_TITLE} {THEME_META_TAGS}
        <link rel="icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="shortcut icon" href="{DF_BASE_SITEURL}favicon.ico" type="image/vnd.microsoft.icon" />
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/style.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}includes/js/jquery.autocomplete.css" />
        <script type="text/javascript" src="{DF_BASE_SITEURL}includes/js/jquery.autocomplete.js"></script>
        {THEME_CSS}
        {THEME_SITE_JS}
        <script type="text/javascript">
			var tb_pathToImage = "{DF_BASE_SITEURL}themes/{TEMPLATE}/images/loadingAnimation.gif";
            var site_url = '{DF_BASE_SITEURL}';
            var module_var = '{DF_MODULE_VARIABLE}';
            var func_var = '{DF_FUNCTION_VARIABLE}';
            var module = '{module}';
        </script>
        <!-- BEGIN: close -->
        <script type="text/javascript">
		window.close();
		window.opener.formreset();
		</script>
        <!-- END: close -->
		</script>
    </head>
    <body style="background:#F2F2F2; padding:10px">
    <p><strong>Thông tin người quản trị</strong></p>
    <!-- BEGIN: error -->
    <div style="padding:10px; background:#FFE1F0; border:#CCC 1px solid; text-align:center"><strong>{error}</strong></div>
    <!-- END: error -->
    <form action="" method="post">
		<input type="hidden" value="1" name="save"/>
    	<table width="100%" class="list">
            <tr>
                <td width="180">
                	Full-name/Họ tên
                </td>
                <td>
                	<input type="text" name="u_name" value="{DATA.u_name}" style="width:98%"/>  
                </td>
            </tr>
            <tr>
                <td width="180">
                	Tên đăng nhập
                </td>
                <td>
                	<input type="text" name="u_username" value="{DATA.u_username}" style="width:98%"/>  
                </td>
            </tr>
            <tr>
                <td>
                	E-mail
                </td>
                <td>
                	<input type="text" name="u_email" value="{DATA.u_email}" style="width:98%"/>  
                </td>
            </tr>
            <tr>
                <td>
                	Mật khẩu
                </td>
                <td>
                	<input type="password" name="u_password" style="width:200px"/>
                </td>
            </tr>
            <tr>
                <td>
                	Nhập lại mật khẩu
                </td>
                <td>
                	<input type="password" name="u_apassword" style="width:200px"/> 
                </td>
            </tr>
            <!-- BEGIN: change -->
            <tr>
                <td>
                	Đổi mật khẩu
                </td>
                <td>
                	<input type="checkbox" name="u_check" value="1"/>  Nếu muốn đổi mật khẩu thì tích vào đây
                </td>
            </tr>
            <!-- END: change -->
		</table>
		<table class="list" style="margin-top:3px">
			<thead>
				<tr>
					<td width="120">Module</td>
					<td width="50" align="center">Thêm</td>
					<td width="50" align="center">Sửa</td>
					<td width="50" align="center">Xóa</td>
					<td width="50" align="center">Xem</td>
					<td width="50" align="center">Export</td>
					<td width="50" align="center">Toàn quyền</td>
				</tr>
			</thead>
			<!-- BEGIN: perm -->
			<tbody class="second">
				<tr>
					<td>{PERM.module_title}</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_add" {PERM.add_check} value="1" {PERM.disable}/>
					</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_edit" {PERM.edit_check} value="1" {PERM.disable}/>
					</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_del" {PERM.del_check} value="1" {PERM.disable}/>
					</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_view" {PERM.view_check} value="1" {PERM.disable}/>
					</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_extend" {PERM.extend_check} value="1" {PERM.disable}/>
						<!--<input type="text" style="width:98%" value="{PERM.extend}" name="{PERM.module}_extend" />-->
					</td>
					<td align="center">
						<input type="checkbox" name="{PERM.module}_full" {PERM.full_check} value="1"/>
					</td>
				</tr>
			</tbody>
			<!-- END: perm -->
		</table>
		<table class="list" style="margin-top:3px">
            <tr>
                <td align="center" colspan="2">
                    <input type="submit" name="" value="Ghi dữ liệu" class="bgbt"/>
                    <input type="button" name="" value="Đóng lại" onclick="window.close()" class="bgbtr"/>
                </td>
            </tr>
        </table>
    </form>    
    </body>
</html>    
<!-- END: main -->