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
		<div>
			<table class="list">
                <tbody style="background: #00F3FF">
				<tr>
					<td width="200">
						Mã mẫu bệnh phẩm
					</td>
					<td>
						<strong>{DATA.mamaubenhpham}</strong>
					</td>
				</tr>
                </tbody>
			</table>
			<table class="list">
                <tbody class="second">
				<tr>
					<td width="200">
						Hình thức lấy mẫu
					</td>
					<td>
						{DATA.hinhthuclaymau}	
					</td>
                    <td width="200">
						Mã TT
					</td>
					<td>
						{DATA.matt}	
					</td>
				</tr>
                </tbody>
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
                <tr>
					<td>
						Đối tượng lấy mẫu
					</td>
					<td>
						<input style="width: 95%" type="text" name="doituonglaymau" value="{DATA.doituonglaymau}" placeholder="Câu trả lời của bạn"/>	
					</td>
				
                    <td>
						Lần lấy mẫu
					</td>
					<td>
						<input style="width: 95%" type="text" name="lanlaymau" value="{DATA.lanlaymau}" placeholder="Câu trả lời của bạn"/>
					</td>
                </tr>
                <tr>
					<td>
						Ổ dịch
					</td>
					<td>
						<input style="width: 95%" type="text" name="odich" value="{DATA.odich}" placeholder="Câu trả lời của bạn"/>	
					</td>
				
                    <td>
						Phân loại nơi lấy mẫu
					</td>
					<td>
						<input style="width: 95%" type="text" name="phanloainoilaymau" value="{DATA.phanloainoilaymau}" placeholder="Câu trả lời của bạn"/>
					</td>
                </tr>
				<tbody class="second">
				<tr>
					<td>
						Điểm điểm lấy mẫu
					</td>
					<td colspan="3">
                    	<input type="text" name="diadiemnoilaymau" value="{DATA.diadiemnoilaymau}" placeholder="Địa điểm lấy mẫu" style="width:150px"/>
                        <input type="text" name="thonnoilaymau" value="{DATA.thonnoilaymau}" placeholder="Thôn, xóm, số nhà, tổ dân phố (nơi lấy mẫu)" style="width:150px"/>
                        <input type="text" name="xanoilaymau" value="{DATA.xanoilaymau}" placeholder="Phường, xã (nơi lấy mẫu)" style="width:150px"/>
                        <input type="text" name="huyennoilaymau" value="{DATA.huyennoilaymau}" placeholder="Quận, huyện (nơi lấy mẫu)" style="width:150px"/>
					</td>
				</tr>
                </tbody> 
                <tbody class="second">
				<tr>
					<td>
						Loại mẫu <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="loaimau" value="{DATA.loaimau}" placeholder="Loại mẫu"/>
					</td>
					<td>
						Đơn vị lấy mẫu <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="donvilaymau" value="{DATA.donvilaymau}" placeholder="Đơn vị lấy mẫu"/>
					</td>
				</tr>
                </tbody>
                <tr>
					<td>
						Mã ống bệnh phẩm
					</td>
					<td>
						<input type="text" style="width: 95%" name="maongbenhpham" value="{DATA.maongbenhpham}" placeholder="Mã ống bệnh phẩm"/>
					</td>
					<td>
						Mã người được lấy mẫu
					</td>
					<td>
						<input type="text" style="width: 95%" name="manguoiduoclaymau" value="{DATA.manguoiduoclaymau}" placeholder="Mã người được lấy mẫu"/>
					</td>
				</tr>
                <tbody class="second">
				<tr>
					<td>
						Ngày lấy mẫu<strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" style="width: 95%" name="ngaylaymau" value="{DATA.ngaylaymau}" placeholder="dd/mm/yyyy" class="datepicker"/>
					</td>
                    <td>
						Ngày xét nghiệm
					</td>
					<td>
						<input type="text" name="bngayxetnghiem" style="width: 95%" value="{DATA.bngayxetnghiem}" placeholder="dd/mm/yyyy" class="datepicker"/>
					</td>
				</tr>
                </tbody> 
                <tr>
					<td>
						Phương pháp xét nghiệm<strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" name="bphuongphapxetnghiem" style="width: 95%" value="{DATA.bphuongphapxetnghiem}" placeholder="Phương pháp xét nghiệm"/>
					</td>
                    <td>
						Ngày trả KQXN<strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" name="bngaytrakqxn" style="width: 95%" value="{DATA.bngaytrakqxn}" placeholder="dd/mm/yyyy" class="datepicker"/>
					</td>
				</tr>  
                <tr>
					<td>
						Đơn vị gửi mẫu<strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" name="bdonviguimau" style="width: 95%" value="{DATA.bdonviguimau}" placeholder="Đơn vị gửi mẫu"/>
					</td>
                    <td>
						Tình trạng mẫu<strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" name="btinhtrangmau" style="width: 95%" value="{DATA.btinhtrangmau}" placeholder="Tình trạng mẫu"/>
					</td>
				</tr>  
				<tr>
					<td width="200">
						Kết quả xét nghiệm <strong style="color: red">*</strong>
					</td>
					<td>
						<input type="text" name="bketquaxetnghiem" style="width: 95%" value="{DATA.bketquaxetnghiem}" placeholder="Kết quả XN"/>
					</td>
					<td>
						Giá trị CT value
					</td>
					<td>
						<input type="text" name="bctvalue" style="width: 95%" value="{DATA.bctvalue}" placeholder="Giá trị CT value"/>
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