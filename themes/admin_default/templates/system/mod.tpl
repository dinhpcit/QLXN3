<!-- BEGIN: main -->
<script>
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<div class="dcontent">
<p><strong>Quản lý hệ thống chung: Quản lý người quản trị: <!-- BEGIN: add --><a href="javascript:void(0)" onclick="add_mod()">Thêm mới (+)</a><!-- END: add --></strong></p> 
<table width="100%" class="list">
    <tbody class="second">
        <tr>
            <td width="30" align="center">STT</td> 
            <td>Họ và tên</td>
            <td width="180">Tên tài khoản</td>
            <td width="180" align="center">Email</td>
            <td width="180" align="center">Thời gian truy cập</td>
            <td width="80">Thao tác</td>
        </tr> 
    </tbody> 
    <!-- BEGIN: loop -->
    <tr>
        <td align="center">{ROW.no}</td>
        <td>{ROW.u_name}</td>
        <td>{ROW.u_username}</td>
        <td align="center">{ROW.u_email}</td>
        <td align="center">{ROW.u_last_login}</td>
        <td align="center">
			<!-- BEGIN: edit -->
        	<a href="javascript:void(0);" onclick="edit_mod('{ROW.u_id}','{ROW.ck}')">Edit</a>
			<!-- END: edit -->
            <!-- BEGIN: del -->
            - <a href="javascript:void(0);" onclick="delete_mod('{ROW.u_id}','{ROW.ck}')">Del</a>
            <!-- END: del -->
        </td>
    </tr>
    <!-- END: loop -->
</table>
</div>
<!-- END: main -->