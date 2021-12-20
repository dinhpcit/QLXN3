<!-- BEGIN: main -->
<style>
.chosen-container{
	width:200px !important
}
</style>
<script>
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>

<form action="" method="post" enctype="multipart/form-data" id="idfpost">
<input type="hidden" value="1" name="save"/>
<div style="width: 98%; margin: auto; margin-top: 5px">
	<div style="margin: auto">
		<!-- BEGIN: error -->
		<div class="cssRadius">
			<strong style="color: red">{error}</strong>
		</div>
        <!-- END: error -->
        <!-- BEGIN: msg -->
		<div class="cssRadius">
			<strong style="color: #396">{msg}</strong>
		</div>
        <!-- END: msg -->
		<!-- BEGIN: qrcode -->
		<img src="https://chart.googleapis.com/chart?chs=100x100&cht=qr&chl={imgData}" title="Bản tin Khởi nghiệp đổi mới sáng tạo">
		<!-- END: qrcode -->
		<div>
			
			<table class="list">
                <tbody class="second">
				<tr>
					<td width="200">
						Họ và tên <strong style="color: red">*</strong>
					</td>
					<td>
						<input style="width: 95%" type="text" name="hovaten" value="{DATA.hovaten}" placeholder="Câu trả lời của bạn"/>	
					</td>
                    <td width="200">
						Năm sinh<strong style="color: red">*</strong>
					</td>
					<td>
						<input style="width: 95%" type="text" name="namsinh" value="{DATA.namsinh}" placeholder="Câu trả lời của bạn"/>	
					</td>
				</tr>
                </tbody>
				<tr>
					<td>
						Giới tính<strong style="color: red">*</strong>
					</td>
					<td>
						<input style="width: 95%" type="text" name="gioitinh" value="{DATA.gioitinh}" placeholder="Câu trả lời của bạn"/>	
					</td>
				
                    <td>
						Số điện thoại
					</td>
					<td>
						<input style="width: 95%" type="text" name="dienthoai" value="{DATA.dienthoai}" placeholder="Câu trả lời của bạn"/>
					</td>
                </tr>
                
                <tbody class="second">
				<tr>
					<td>
						Địa chỉ của người lấy mẫu
					</td>
					<td colspan="3">
                    	<input type="text" name="thonnoio" value="{DATA.thonnoio}" placeholder="Thôn, xóm, số nhà, tổ dân phố (nơi ở)" style="width:150px"/>
                        <input type="text" name="xanoio" value="{DATA.xanoio}" placeholder="Phường, xã (nơi ở)" style="width:150px"/>
                        <input type="text" name="huyennoio" value="{DATA.huyennoio}" placeholder="Quận, huyện (nơi ở)" style="width:150px"/>
                        <input type="text" name="tinhnoio" value="{DATA.tinhnoio}" placeholder="Tỉnh, thành (nơi ở)" style="width:150px"/>
					</td>
				</tr>
                </tbody>
                <tr>
					<td>
						Nghề nghiệp
					</td>
					<td>
						<input style="width: 95%" type="text" name="nghenghiep" value="{DATA.nghenghiep}" placeholder="Câu trả lời của bạn"/>	
					</td>
				
                    <td>
						Nơi làm việc
					</td>
					<td>
						<input style="width: 95%" type="text" name="noilamviec" value="{DATA.noilamviec}" placeholder="Câu trả lời của bạn"/>
					</td>
                </tr>
			</table>
		</div>
		<div align="center">
			<input type="submit" id="idsavetemp" value="Ghi dữ liệu" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"/> 
            <input type="button" value="Đóng lại" onClick="parent.close_fn()"/>
		</div>
	</div>
</div>
</form>
<!-- END: main -->