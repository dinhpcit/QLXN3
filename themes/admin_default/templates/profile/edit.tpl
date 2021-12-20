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
			var site_admin_url = '{DF_BASE_ADMINURL}';
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
		<style>
			.chosen-container{
				width:200px !important
			}
		</style>
		<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
		<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
    </head>
    <body style="background:#F2F2F2; padding:10px">
    <p><strong>Sửa thông tin người dùng</strong></p>
    <!-- BEGIN: error -->
    <div style="padding:10px; background:#FFE1F0; border:#CCC 1px solid; text-align:center"><strong>{error}</strong></div>
    <!-- END: error -->
    <form action="" method="post">
		<input type="hidden" value="1" name="save" id="save"/>
        <input type="hidden" value="{DATA.b_id}" name="b_id"/>
    	<table width="100%" class="list">
            <tr>
                <td width="150">
                	Tên đăng nhập *
                </td>
                <td>
                	<strong>{DATA.s_username}</strong>
                </td>
            </tr>
            <tr>
                <td>
                	Tên cơ quan đơn vị/cá nhân *
                </td>
                <td>
                	<input type="text" name="s_name"  style="width:300px" value="{DATA.s_name}"/> 
                </td>
            </tr>
            <tr>
                <td>
                	E-mail
                </td>
                <td>
                	<input type="text" name="s_email" value="{DATA.s_email}" style="width:300px"/>  
                </td>
            </tr>
			<tr>
                <td>
                	Mã code quản lý 
                </td>
                <td>
                	<input type="text" name="s_code" value="{DATA.s_code}" style="width: 98%"/>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                	Các mã cách nhau bằng dấu (,) 
                </td>
            </tr>
            <tr>
                <td>
                	Loại tài khoản
                </td>
                <td>
                	<input type="checkbox" name="address[]" value="TTBP" id="TTBP" {checkTTBP}/>
                    <label for="TTBP">Lấy mẫu</label> &nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="checkbox" name="address[]" value="LAB" id="LAB" {checkLAB}/>
                    <label for="LAB">Xét nghiệm</label>
                    <input type="checkbox" name="address[]" value="ALL" id="ALL" {checkALL}/>
                    <label for="ALL">Lấy mẫu và xét nghiệm</label>
                </td>
            </tr>
            <tr>
                <td>
                	Thay đổi mật khẩu
                </td>
                <td>
                	<input type="checkbox" value="1" name="chang_pass" /> (Nếu muốn thay đổi mật khẩu thì tích vào đây)
                </td>
            </tr>
            <tr>
                <td>
                	Mật khẩu mới
                </td>
                <td>
                	<input type="password" name="s_password" style="width:200px"/> 
                </td>
            </tr>
            <tr>
                <td>
                	Nhập lại mật khẩu mới
                </td>
                <td>
                	<input type="password" name="s_apassword" style="width:200px"/> 
                </td>
            </tr>
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
		<script>
			$(".chosen-select").chosen({
				allow_single_deselect: true,
				width: '150px',
				no_results_text: "Không tìm thấy kết quả :"
			});
		</script>
    </body>
</html>    
<!-- END: main -->