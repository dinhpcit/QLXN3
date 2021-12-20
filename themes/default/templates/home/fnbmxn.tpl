<!-- BEGIN: main -->
<div style="padding: 5px">
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/jscroll/jscroll.css?v=1.0" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/jscroll/jscroll.js"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       '350px',
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
		searching: false,
		info:false,
		autoWidth: true,
		ordering: false,
        fixedColumns:   {
            leftColumns: 4
        }
    } );
} );
</script>
<div>
	Kiểm tra lại thông tin dữ liệu mẫu bệnh phẩm (<strong>{tongso} bản ghi</strong>). 
    <span style="color:#F00">Tìm thấy <strong>{sotrung}</strong> bản ghi bị trùng</span>
</div>
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
            <td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" disabled></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td align="center" style="background:#00ff00"><div style="width:60px; display:inline-block"><strong>Mã ngày</strong></div></td>
            <td align="center" style="background:#ff9900"><div style="width:50px; display:inline-block"><strong>Mã đơn vị</strong></div></td>
            <td align="center" style="background:#00ccff"><div style="width:50px; display:inline-block"><strong>Mã tổ</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>Hình thức lấy mẫu</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Mã TT</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Số điện thoại</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Tỉnh/Thành phố<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Phường/xã<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Nghề nghiệp</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Nơi làm việc, học tập</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Lần lấy mẫu</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Ghi chú</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Phân loại nơi lấy mẫu</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Địa điểm nơi lấy mẫu</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện (nơi lấy mẫu)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Phường/xã (nơi lấy mẫu)</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố (nơi lấy mẫu)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Loại mẫu</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Đơn vị lấy mẫu</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Mã ống bệnh phẩm</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Mã người được lấy mẫu</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>Hình thức</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>Loại gộp</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị xét nghiệm</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Ngày cập nhật BMXN</strong></div></td>
            <td>-</td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
			<td align="center">{ROW.no}</td>
            <td align="center">{ROW.mangay}</td>
            <td align="center">{ROW.madonvi}</td>
            <td align="center">{ROW.chukymatt}</td>
            <td align="center">{ROW.mamaubenhpham}</td>
            <td align="center">{ROW.hinhthuclaymau}</td>	
            <td align="center">{ROW.matt}</td>
			<td align="left">{ROW.hovaten}</td>
			<td align="center">{ROW.namsinh}</td>
			<td align="center">{ROW.gioitinh}</td>
            <td align="center">{ROW.dienthoai}</td>	
            <td align="center">{ROW.tinhnoio}</td>
            <td align="center">{ROW.huyennoio}</td>
            <td align="center">{ROW.xanoio}</td>
            <td align="center">{ROW.thonnoio}</td>
            <td align="center">{ROW.nghenghiep}</td>
            <td align="center">{ROW.noilamviec}</td>
            <td align="center">{ROW.doituonglaymau}</td>
            <td align="center">{ROW.lanlaymau}</td>
            <td align="center">{ROW.odich}</td>
            <td align="center">{ROW.phanloainoilaymau}</td>
            <td align="center">{ROW.diadiemnoilaymau}</td>
            <td align="center">{ROW.huyennoilaymau}</td>
            <td align="center">{ROW.xanoilaymau}</td>
            <td align="center">{ROW.thonnoilaymau}</td>
            <td align="center">{ROW.loaimau}</td>
            <td align="center">{ROW.donvilaymau}</td>
            <td align="center">{ROW.maongbenhpham}</td>
            <td align="center">{ROW.manguoiduoclaymau}</td>
			<td align="center">{ROW.ngaylaymau}</td>
            <td align="center">{ROW.hinhthuc}</td>
            <td align="center">{ROW.loaigop}</td>
            <td align="center">{ROW.labcode}</td>
            <td align="center">{ROW.uptime}</td>
            <td></td>
		</tr>
    <!-- END: loop -->
    </tbody> 
</table>

</div>
<form action="" method="post" enctype="multipart/form-data" id="iform">
<input type="hidden" value="1" id="isave" name="save"/>
	<table class="nlist">
			
	</table>
	<div class="cssRadius">			
		  <div align="center"> 
			  <input type="button" style="padding:8px" onClick="huy_ho_so()" value="Hủy và quay lại" /> &nbsp;&nbsp;&nbsp;
			  <input type="submit" style="padding:8px" onclick="this.disabled=true;this.value='Xin vui lòng đợi...';updulieu();" value="Xác nhận cập nhật danh sách" />
			  <p style="padding-top:5px">Hãy rà soát lại trước khi đưa dữ liệu lên hệ thống, nếu sai nhiều hãy hủy và quay lại chỉnh sửa file excel</p>
		  </div>
	 </div>  
</form>
</div>
<script>
function huy_ho_so()
{
	var r = confirm("Bạn có chắc chắn muốn hủy?");
	if (r == true) 
	{
		$('#isave').val('2');
		$('#iform').submit();
	}
}
function updulieu()
{
	var r = confirm("Bạn có chắc chắn muốn cập nhật danh sách?");
	if (r == true) 
	{
		$('#isave').val('1');
		$('#iform').submit();
	}
}
</script>
<!-- END: main -->