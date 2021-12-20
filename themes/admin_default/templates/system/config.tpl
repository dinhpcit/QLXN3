<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<div style="width: 720px; margin: auto; padding-top: 20px">
    <p><strong>Cấu hình hệ thống</strong></p>
    <!-- BEGIN: error -->
    <div style="padding:10px; background:#FFE1F0; border:#CCC 1px solid; text-align:center"><strong>{error}</strong></div>
    <!-- END: error -->
    <!-- BEGIN: save -->
    <div style="padding:10px; background:#6FF; border:#CCC 1px solid; text-align:center"><strong>Đã cập nhật thành công!!</strong></div>
    <!-- END: save -->
    <form action="" method="post" enctype="multipart/form-data" id="idform">
		<input type="hidden" value="1" name="save" id="idsave"/>
    	<table width="100%" class="list">
        	<tbody class="second">
            <tr>
                <td colspan="2">
                	<strong>Logo/hình ảnh</strong>
                </td>
            </tr>
            <tr>
                <td align="center">
                	<img src="{DATA.logo1}" width="80"/>
                </td>
                <td>
                	<input type="file" name="logo" style="width:200px" id="ilogo"/>
                    <p style="margin-top:5px">Tải hình ảnh kích thước 150x150 pixel (*.jpg,*.png )</p>
                    <!-- BEGIN: lg -->
                    <p><input type="button" name="" value="Xóa logo" onclick="delete_logo()" /></p>
                    <!-- END: lg -->
                </td>
            </tr>
            <tr>
                <td width="200">
                	Tên của hệ thống
                </td>
                <td>
                	<input type="text" name="title" value="{DATA.title}" style="width:98%"/>  
                </td>
            </tr>
            <tbody class="second">
            <tr>
                <td width="200">
                	Tên viết ngắn
                </td>
                <td>
                	<input type="text" name="shortname" value="{DATA.shortname}" style="width:98%"/>  
                </td>
            </tr>
            </tbody>
            <tr>
                <td width="180">
                	Ngôn ngữ hiển thị
                </td>
                <td>
                	{lang}  
                </td>
            </tr>
            <tbody class="second">
            <tr>
                <td>
                	Tỉnh/thành phố sử dụng
                </td>
                <td>
                	<select name="city" class="chosen-select">
                    	<option value="0">Tỉnh/thành phố</option>
                        <!-- BEGIN: tinhthanh -->
                        <option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
                        <!-- END: tinhthanh -->
                    </select>
                </td>
            </tr>
            </tbody>
            <tr>
                <td>
                	Chế độ kiểm duyệt khi gửi mẫu
                </td>
                <td>
                	<input type="radio" name="check" id="idcheck" value="1" {check1}/> 
                    <label for="idcheck">Bật chế độ kiểm duyệt TTBP</label>
                    <input type="radio" name="check" id="idcheck" value="0" {check0}/> 
                    <label for="idcheck">Tắt chế độ kiểm duyệt TTBP</label>
                </td>
            </tr>
		</table>
		<table class="list" style="margin-top:3px">
        	<tbody class="second">
            <tr>
                <td align="center">
                    <input type="submit" name="" value="Ghi dữ liệu" class="bgbt"/>
                </td>
            </tr>
            </tbody>
        </table>
    </form>    
</div>  
<script>
$(".chosen-select").chosen({
    allow_single_deselect: true,
    width: '140px',
    no_results_text: "Không tìm thấy kết quả :"
});
$(function () {
	$("#ilogo").change(function () {
        var filepath = $("#ilogo").val();
		var endf = $("#ilogo").val().split('.').pop().toLowerCase();
		if ( endf != 'jpg' && endf != 'png' )
		{
			alert("Only formats are allowed *.jpg *.png" );
			$("#ilogo").val("");	  
		}
    });
});
function delete_logo()
{
	$("#idsave").val(2);
	$("#idform").submit();
}
</script>
<!-- END: main -->