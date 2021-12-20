<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<!--<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       ($(window).height() - 200),
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
		searching: false,
		info:false,
		autoWidth: true,
		ordering: false
    } );
} );
</script>
<div style="padding:0px 5px">
<form action="" method="post" onsubmit="return search_profile()">
	<table width="100%" class="list">
    <tbody>
        <tr>
            <td>
            	<input type="text" placeholder="Họ tên" value="{s_name}" style="width:200px" id="s_name" name="s_name"/>
                <input type="text" placeholder="Địa chỉ email" style="width:200px" value="{s_email}" id="s_email" name="s_email"/>
                <input type="text" placeholder="Cơ quan công tác" style="width:200px" value="{s_current}" id="s_current" name="s_current"/>
                <input type="submit" value="Tìm kiếm" name="Submit" onclick="search_profile()"/>
            </td>
            <td align="right">
            	
            </td>
        </tr>
	</tbody>
</table>
</form>
<table width="100%" class="list">
    <tbody>
        <tr>
			<td>
				<input type="button" value="Thêm tài khoản"  onclick="add_profile()"/>
                <input type="button" value="Export File" name="Submit" onclick="export_profile()"/>
			</td>
			<td align="right">
                Có <strong>{numall}</strong> Tài khoản trong CSDL. <span class="pages">{page_html}</span>
            </td>
    	</tr>
    </tbody>
</table>
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
			<td width="30" align="center"><strong>STT</strong></td>
            <td width="200"><strong>Tên đăng nhập</strong></td>
            <td><strong>Tên cơ quan đơn vị/cá nhân</strong></td>
            <td width="150"><strong>Email</strong></td>
            <td width="120"><strong>Di động</strong></td>
			<td width="150"><strong>Mã code quản lý</strong></td>
            <td width="150"><strong>Loại tài khoản</strong></td>
            <td width="30" align="center"></td>
            <td width="30" align="center"></td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center">{ROW.no}</td>
            <td>{ROW.s_username}</td>
            <td>{ROW.s_name}</td>
            <td><a href="mailto:{ROW.s_email}">{ROW.s_email}</a></td>
            <td>{ROW.s_cellphone}</td>
			<td>{ROW.s_code}</td>
            <td>{ROW.address}</td>
            <td align="center">
            	
           		<a href="javascript:void(0);" onclick="edit_profile('{ROW.s_id}','{ROW.ck}')" title="Thay đổi mật khẩu">
                <img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/edit.png" /></a>	
            </td>
            <td align="center">
            	<!-- BEGIN: del -->
           		<a href="javascript:void(0);" onclick="del_profile('{ROW.s_id}','{ROW.ck}')" title="Xóa vĩnh viễn tài khoản này">
                <img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/delete.png" /></a>	
                <!-- END: del -->
            </td>
		</tr>
    <!-- END: loop -->
    </tbody>
</table>
</div>
<!-- END: main -->