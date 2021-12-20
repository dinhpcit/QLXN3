<!-- BEGIN: main -->
<script>
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<div class="dcontent"> 
<p><strong>Quản lý hệ thống chung: Quản lý thành viên chờ kích hoạt</strong></p> 
<table width="100%" class="list">
    <tbody class="second">
        <tr>
            <td width="30" align="center">STT</td> 
            <td>Tên thành viên</td>
            <td width="120" align="center">Email</td>
            <td width="120" align="center">Thời gian đăng ký</td>
            <td width="80"></td>
        </tr> 
    </tbody> 
    <!-- BEGIN: loop -->
    <tr>
        <td align="center">{ROW.no}</td>
        <td>{ROW.s_name}</td>
        <td align="center">{ROW.s_email}</td>
        <td align="center">{ROW.s_date}</td>
        <td align="center">
            <a href="javascript:void(0);" onclick="deleta_waiter('{ROW.s_id}')">Del</a>
        </td>
    </tr>
    <!-- END: loop -->
</table>
</div>
<!-- END: main -->