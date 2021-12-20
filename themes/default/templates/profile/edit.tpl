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
<div style="width: 98%; margin-top: 5px">
	<div style="margin: auto">
		<!-- BEGIN: error -->
		<div class="cssRadius">
			<strong style="color: red">{error}</strong>
		</div>
        <!-- END: error -->
		<div>
			<table class="list">
                <tbody style="background: #00F3FF">
				<tr>
					<td width="200">
						Mã bệnh nhân
					</td>
					<td>
						<strong>{DATA.masobn}</strong>
					</td>
				</tr>
                </tbody>
			</table>
			<table class="list">
                <tbody class="second">
				<tr>
					<td width="200">
						1. Họ và tên <strong style="color: red">*</strong>
					</td>
					<td>
						<input style="width: 95%" type="text" name="hovaten" value="{DATA.hovaten}" placeholder="Câu trả lời của bạn"/>	
					</td>
                    <td>
						2. Năm sinh<strong style="color: red">*</strong>
					</td>
					<td>
						<input style="width: 95%" type="text" name="namsinh" value="{DATA.namsinh}" placeholder="Câu trả lời của bạn"/>	
					</td>
				</tr>
                </tbody>
				<tr>
					<td>
						3. Giới tính<strong style="color: red">*</strong>
					</td>
					<td>
						{gioitinh_code}
					</td>
				
                    <td>
						4. Số điện thoại bệnh nhân/người thân (nếu có)
					</td>
					<td>
						<input style="width: 95%" type="text" name="dienthoaibn" value="{DATA.dienthoaibn}" placeholder="Câu trả lời của bạn"/>
					</td>
                </tr>
                <tbody class="second">
				<tr>
					<td>
						5. Địa chỉ của bệnh nhân
					</td>
					<td colspan="3">
					</td>
				</tr>
                </tbody>
                <tbody>
				<tr>
					<td>
						5.1 Địa chỉ đang ở <strong style="color: red">*</strong>
					</td>
					<td colspan="3">
						<input type="text" name="diachitamtru" value="{DATA.diachitamtru}" placeholder="Thôn, xóm, số nhà, tổ dân phố" />
					</td>
				</tr>
                </tbody>
				<tr>
					<td>
					</td>	
					<td>
						<select name="tinhthanhtamtru" class="chosen-select" onchange="getquanhuyen()" id="tinhthanhtamtru">
							<option value="0">Tỉnh/Thành phố</option>
							<!-- BEGIN: tinhthanhtamtru -->
							<option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
							<!-- END: tinhthanhtamtru -->
						</select>
					</td>
					<td>
						<span id="quanhuyentamtru"></span>
					</td>
					<td>
						<span id="phuongxatamtru"></span>
					</td>
				</tr>
				<tr>
					<td>
						5.2 Địa chỉ thường trú
					</td>	
					<td colspan="3">
						<input type="text" name="diachithuongtru" value="{DATA.diachithuongtru}" placeholder="Thôn, xóm, số nhà, tổ dân phố" />
					</td>	
				</tr>
				<tr>
					<td>
					</td>	
					<td>
						<select name="tinhthanhthuongtru" class="chosen-select" onchange="getquanhuyen1()" id="tinhthanhthuongtru">
							<option value="0">Tỉnh/Thành phố</option>
							<!-- BEGIN: tinhthanhthuongtru -->
							<option value="{ROW.matinhthanh}" {ROW.select1}>{ROW.tinhthanhpho}</option>
							<!-- END: tinhthanhthuongtru -->
						</select>
					</td>
					<td>
						<span id="quanhuyenthuongtru"></span>
					</td>
					<td>
						<span id="phuongxathuongtru"></span>
					</td>
				</tr>
                <tbody class="second">
				<tr>
					<td>
						6. Ngày lấy mẫu <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="ngaylaymau" value="{DATA.ngaylaymau}" placeholder="dd/mm/yyyy" class="datepicker"/>
					</td>
					<td>
						7. Ngày có kết quả xét nghiệm <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="ngaykqxn" value="{DATA.ngaykqxn}" placeholder="dd/mm/yyyy" class="datepicker"/>
					</td>
				</tr>
                </tbody>
				<tr>
					<td>
						8. Kết quả (đính kèm phiếu trả kết quả xét nghiệm) <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="file" name="phieuxn"/>
						<input type="hidden" value="{DATA.filepxn}" name="phieuxnex"/>
					</td>
					<td colspan="2">
						<a href="{DATA.filepxn}" target="_blank">{DATA.filepxn}</a>
					</td>
				</tr>
				<tr>
					<td>
						9. Báo cáo ca bệnh hoặc tóm tắt dịch tễ (đính kèm file) <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="file" name="baocaocb"/>
						<input type="hidden" value="{DATA.filebc}" name="baocaocbex"/>
					</td>
					<td colspan="2">
						<a href="{DATA.filebc}" target="_blank">{DATA.filebc}</a>
					</td>
				</tr>
                <tbody class="second">
				<tr>
					<td>
						10. Phân loại ca bệnh <strong style="color: red">*</strong>
					</td>
					<td colspan="3">
						{phanloai_code}
					</td>
				</tr>
                </tbody>    
				<tr>
					<td width="200">
						11. Đối tượng lấy mẫu <strong style="color: red">*</strong>
					</td>
					<td>
						{doituonglaymau_code}
					</td>
					<td>
						Giá trị CT value
					</td>
					<td>
						<input type="text" style="width: 95%" name="ctvalue" value="{DATA.ctvalue}" placeholder="Giá trị CT value"/>
					</td>
				</tr>
				<tr>
					<td>
						12. Nơi gửi thông báo <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="noiguibc" value="{DATA.noiguibc}" placeholder="Câu trả lời của bạn"/>
					</td>
					<td>
						Tỉnh/Thành phố báo cáo ca bệnh  <strong style="color: red">*</strong>
					</td>
					<td>
						<select name="tinhthanh" class="chosen-select" id="tinhthanh">
							<option value="0">Tỉnh/Thành phố</option>
							<!-- BEGIN: tinhthanh -->
							<option value="{ROW.matinhthanh}" {ROW.select2}>{ROW.tinhthanhpho}</option>
							<!-- END: tinhthanh -->
						</select>
					</td>
				</tr>
				<tr>
					<td>
						13. Email nhận mã số bệnh nhân <strong style="color: red">*</strong>
					</td>
					<td colspan="3">
						<input style="width: 95%" type="text" name="emailnhanbc" value="{DATA.emailnhanbc}" placeholder="Câu trả lời của bạn"/>
					</td>
				</tr>
				<tr>
					<td>
						14. Ghi chú
					</td>
					<td colspan="3">
						<textarea style="padding: 5px; width: 95%" placeholder="Câu trả lời của bạn" name="ghichu">{DATA.ghichu}</textarea>
					</td>
				</tr>
			</table>
		</div>
		<div align="center">
			<input type="submit" id="idsavetemp" value="Sửa thông tin">
		</div>
	</div>
</div>
</form>

<script>
/*$(document).ready(function() { 
	$(".add_society").fancybox({ 'autoSize':false, autoCenter: true, 'width': '600','height': '400', 'type': 'iframe','autoDimensions': false, 'scrolling': 'auto','helpers' : {'overlay' : {'closeClick': true}} }); 
});*/
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '150px',
	no_results_text: "Không tìm thấy kết quả :"
});
function getquanhuyen(maqh) {
	var matt = $('#tinhthanhtamtru').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=1&matt=' + matt+"&maqh="+maqh,
		data: '',
		success: function(data) {
			$('#quanhuyentamtru').html(data);
			load_select();
		}
	});
}
function getquanhuyen_int(maqh) {
	var matt = $('#tinhthanhtamtru').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=1&matt=' + matt+"&maqh="+maqh,
		data: '',
		success: function(data) {
			$('#quanhuyentamtru').html(data);
			getphuongxa('{DATA.phuongxatamtru_code}');
			load_select();
		}
	});
}
function getphuongxa(mapx) {
	var maqh = $('#quanhuyentamtru1').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=2&maqh=' + maqh+"&mapx="+mapx,
		data: '',
		success: function(data) {
			$('#phuongxatamtru').html(data);
			load_select();
		}
	});
}
function getquanhuyen1(maqh) {
	var matt = $('#tinhthanhthuongtru').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=3&matt=' + matt+"&maqh="+maqh,
		data: '',
		success: function(data) {
			$('#quanhuyenthuongtru').html(data);
			load_select();
		}
	});
}
function getquanhuyen1_int(maqh) {
	var matt = $('#tinhthanhthuongtru').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=3&matt=' + matt+"&maqh="+maqh,
		data: '',
		success: function(data) {
			$('#quanhuyenthuongtru').html(data);
			getphuongxa1('{DATA.phuongxathuongtru}');
			load_select();
		}
	});
}
function getphuongxa1(mapx) {
	var maqh = $('#quanhuyenthuongtru1').val();
	$.ajax({
		type: 'POST',
		url: site_url  + '?' + module_var  + '=home&' + func_var  + '=loads&tp=4&maqh=' + maqh+"&mapx="+mapx,
		data: '',
		success: function(data) {
			$('#phuongxathuongtru').html(data);
			load_select();
		}
	});
}
getquanhuyen_int('{DATA.quanhuyentamtru_code}');
getquanhuyen1_int('{DATA.quanhuyenthuongtru_code}');	
function load_select() {
	var config = {
		'.chosen-select': {}
	}
	for (var selector in config) {

		$(selector).chosen(config[selector]);
	}
};
</script>
<!-- END: main -->