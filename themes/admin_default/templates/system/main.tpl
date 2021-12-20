<!-- BEGIN: main -->
<script>
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<div class="dcontent">
<p><strong>Quản lý hệ thống chung: Quản lý đợt đăng ký</strong></p> 
<table width="100%" class="list">
    <tbody class="second">
        <tr>
            <td width="30" align="center">STT</td> 
            <td>Tên đợt đăng ký</td>
            <td width="120" align="center">Năm</td>
            <td width="120" align="center">Thời gian bắt đầu</td>
            <td width="120" align="center">Thời gian kết thúc</td>
            <td width="120" align="center">Trang thái</td>
            <td width="80"></td>
        </tr> 
    </tbody> 
    <!-- BEGIN: loop -->
    <tr>
        <td align="center">{ROW.no}</td>
        <td>{ROW.p_name}</td>
        <td align="center">{ROW.p_year}</td>
        <td align="center">{ROW.p_begin}</td>
        <td align="center">{ROW.p_end}</td>
        <td align="center">{ROW.p_enable}</td>
        <td align="center">
            <a href="{ROW.edit}#edit">Edit</a>
        </td>
    </tr>
    <!-- END: loop -->
</table>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" value="1" name="save">
<table width="100%" class="list" id="edit">
	<tbody class="second">
        <tr>
            <td colspan="2"><strong>Thông tin đợt đăng ký</strong></td> 
        </tr> 
    </tbody>
    <!-- BEGIN: error -->
    <tbody>
        <tr>
            <td colspan="2"><strong style="color:#900">{error}</strong></td> 
        </tr> 
    </tbody>
    <!-- END: error -->
	<tr>
    	<td width="200">Tên đợt đăng ký:</td>
        <td><input type="text" name="p_name" style="width:90%" value="{DATA.p_name}"> <span class="mark">(*)</span></td>
    </tr>
    <tr>
    	<td>Năm:</td>
        <td><input type="text" name="p_year" style="width:50" value="{DATA.p_year}"> <span class="mark">(*)</span></td>
    </tr>
    <tr>
    	<td>Thời gian bắt đầu:</td>
        <td><input type="text" name="p_begin" style="width:120" value="{DATA.p_begin}" class="datepicker"> (dd/mm/yyyy) <span class="mark">(*)</span></td>
    </tr>
    <tr>
    	<td>Thời gian kết thúc:</td>
        <td><input type="text" name="p_end" style="width:120" value="{DATA.p_end}" class="datepicker"> (dd/mm/yyyy) <span class="mark">(*)</span></td>
    </tr>
    <tr>
    	<td>Trạng thái:</td>
        <td>{p_enable}</td>
    </tr>
    <tbody class="second">
        <tr>
            <td style="padding:8px" colspan="2">
                <input type="submit" value="Ghi dữ liệu"/>
            </td>
        </tr>
    </tbody>
</table>  
</form>
</div>
<!-- END: main -->