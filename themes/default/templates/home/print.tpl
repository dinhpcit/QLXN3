<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>   
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td style="background:#00ff00" align="center"><div style="width:100px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>Hình thức lấy mẫu</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Số điện thoại</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Phường xã (nơi ở)</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Đơn vị lấy mẫu</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Mã mẫu riêng</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị xét nghiệm</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày xét nghiệm</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Phương pháp XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày trả KQXN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center">{ROW.no}</td>
            <td align="center">{ROW.mamaubenhpham}</td>
            <td align="center">{ROW.hinhthuclaymau}</td>	
			<td align="left"><a href="#">{ROW.hovaten}</a></td>
			<td align="center">{ROW.namsinh}</td>
			<td align="center">{ROW.gioitinh}</td>
            <td align="center">{ROW.dienthoai}</td>	
            <td align="center">{ROW.huyennoio}</td>
            <td align="center">{ROW.xanoio}</td>
            <td align="center">{ROW.thonnoio}</td>
            <td align="center">{ROW.doituonglaymau}</td>
            <td align="center">{ROW.donvilaymau}</td>
            <td align="center">{ROW.manguoiduoclaymau}</td>
			<td align="center">{ROW.ngaylaymau}</td>
            <td align="center">{ROW.labcode}</td>
            <td align="center">{ROW.bngayxetnghiem}</td>
            <td align="center">{ROW.bphuongphapxetnghiem}</td>
			<td align="center">{ROW.bngaytrakqxn}</td>
            <td align="center">{ROW.bketquaxetnghiem}</td>
            <td align="center">{ROW.ctvalue}</td>
		</tr>
    <!-- END: loop -->
    </tbody> 
</table>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	$(".show").fancybox({ 'autoSize':false, 'width': '1000','height': '600', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} }); 
});    
$(".chosen-select").chosen({
    allow_single_deselect: true,
    width: '140px',
    no_results_text: "Không tìm thấy kết quả :"
});
function setvalue(valbn,ck)
{
	var index = $.inArray(valbn, bn_array);
	if (index != -1) {
		bn_array.splice(index, 1);
		bn_array_ck.splice(index, 1);
	}
	else
	{
		bn_array.push(valbn);	
		bn_array_ck.push(ck);
	}
	if (bn_array.length > 0 )
	{
		$('#xExcel').removeAttr('disabled');
		$('#idelcode').removeAttr('disabled');
	}
	else
	{
		$('#xExcel').attr('disabled','disabled');
		$('#idelcode').attr('disabled','disabled');
	}
}
function export_iexcel()
{
	var txt_url = bn_array.join(",");
	var r = confirm("Bạn có chắc chắn muốn xuất Excel các mã đã chọn?");
	if (r == true) 
	{
		window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url;
	}
}

$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       ($(window).height() - widthr),
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
		searching: false,
		info:false,
		autoWidth: true,
		ordering: false,
        fixedColumns:   {
            leftColumns: 5
        }
    } );
} );
</script>