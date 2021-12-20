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
	Kiểm tra lại thông tin dữ liệu kết quả xét nghiệm (<strong>{tongso} bản ghi</strong>). 
    <span style="color:#F00">Tìm thấy <strong>{sotrung}</strong> bản ghi bị trùng</span>
</div>
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
            <td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" disabled></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td align="center"><div style="width:100px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Mã xét nghiệm</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ngày nhận mẫu</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Giờ nhận mẫu (hh:mm)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ngày xét nghiệm</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Phương pháp XN</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Ngày trả KQXN</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị gửi mẫu</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Tình trạng mẫu</strong></div></td>
			<td align="center"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật KQXN</strong></div></td>
			<td align="center">-</td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
			<td align="center">{ROW.no}</td>
            <td align="center">{ROW.kmamaubenhpham}</td>
            <td align="center">{ROW.maxn}</td>
            <td align="center">{ROW.ngaynhanmau}</td>
            <td align="center">{ROW.gionhanmau}</td>
            <td align="center">{ROW.ngayxetnghiem}</td>
            <td align="center">{ROW.phuongphapxetnghiem}</td>
			<td align="center">{ROW.ngaytrakqxn}</td>
            <td align="center">{ROW.donviguimau}</td>
            <td align="center">{ROW.tinhtrangmau}</td>
            <td align="center">{ROW.ketquaxetnghiem}</td>	
			<td align="center">{ROW.ctvalue}</td>
            <td align="center">{ROW.kuptime}</td>
            <td align="center">-</td>
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
			  <button type="button" onClick="huy_ho_so()" class="btn btn-info1">Hủy và quay lại</button> &nbsp;&nbsp;&nbsp;
			  <button type="button" onclick="this.disabled=true;this.value='Sending, please wait...';updulieu();" class="btn btn-info startUpload">Xác nhận cập nhật danh sách</button> 
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