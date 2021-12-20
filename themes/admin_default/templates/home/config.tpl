<!-- BEGIN: main -->
<script src="{DF_BASE_SITEURL}includes/js/ckeditor/ckeditor.js"></script>
<div class="dcontent">
<p><strong>Quản lý hệ thống chung</strong></p>
<table width="100%" class="list">
	<tbody class="second">
        <tr>
            <td style="padding:8px">
                <input type="button" value="Quản lý danh sách hội nghị, hội thảo" onclick="window.location.href='{link_main}'"/>
                <input type="button" value="Quản lý TV chờ kích hoạt" onclick="window.location.href='{link_user}'" />
                <input type="button" value="Quản lý người quản trị" onclick="window.location.href='{link_mod}'" />
            </td>
        </tr>
    </tbody>
</table>   
<p><strong>Cấu hình các trường thông tin đăng ký:</strong> {PDATA.p_name}</p> 
<table width="100%" class="list">
    <tbody class="second">
        <tr>
            <td width="30" align="center">STT</td> 
            <td width="320">Tiêu đề nhóm trường dữ liệu</td>
            <td width="320">Hướng dẫn/giải thích</td>
            <td width="80"></td>
        </tr> 
    </tbody> 
    <!-- BEGIN: loop -->
    <tr>
        <td align="center">{ROW.no}</td>
        <td><a href="{ROW.link}">{ROW.title}</a></td>
        <td>{ROW.note}</td>
        <td align="center">
            <a href="{ROW.edit}">Edit</a> -
            <a href="javascript:void(0)" onclick="delete_config('{ROW.id}')">Del</a>
        </td>
    </tr>
    <!-- END: loop -->
</table>
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" value="1" name="save">
<table width="100%" class="list" id="edit">
	<tbody class="second">
        <tr>
            <td colspan="2"><strong>Thông tin nhóm trường dữ liệu</strong></td> 
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
    	<td width="200">Tiêu đề nhóm trường:</td>
        <td><input type="text" name="title" style="width:500px" value="{DATA.title}"> <span class="mark">(*)</span></td>
    </tr>
    <tr>
    	<td width="200">Hướng dẫn/ giải thích:</td>
        <td><textarea id="editor" name="note" style="width:90%">{DATA.note}</textarea></td>
    </tr>
    <tbody class="second">
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Ghi dữ liệu"/>
                <input type="button" value="Quay lại" onclick="window.location.href='{link_back}'" />
            </td>
        </tr>
    </tbody>
</table>  
</form>
</div>
<!-- END: main -->