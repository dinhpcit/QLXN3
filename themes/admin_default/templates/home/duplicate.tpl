<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/jscroll/jscroll.css?v=1.0" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/jscroll/jscroll.js"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/jcolor/jquery.colorbox-min.css" />
<script language="javascript" src="{DF_BASE_SITEURL}plugins/jcolor/jquery.colorbox-min.js"></script>

<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<!--<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       ($(window).height() - 170),
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
		searching: false,
		info:false,
		autoWidth: true,
		ordering: false,
        fixedColumns:   {
            leftColumns: 6
        }
    } );
} );
var bn_array = [];
var bn_array_ck = [];
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<form action="" method="get">
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
				<span style="float: left;margin-top: 5px;margin-right: 5px;"> Ngày lấy mã</span>
				<input type="text" value="{bdate}" class="datepicker" style="width:30%;float: left;margin-right: 5px" id="bdate" name="bdate" placeholder="Từ ngày"/>
				<input type="text" value="{edate}" style="width:30%;float: left" class="datepicker" id="edate" name="edate" placeholder="Đến ngày"/>
			</td>
			<td>
				<select name="tinhthanh" id="tinhthanh" style="width:100%" onchange="search_duplicate()" class="chosen-select">
					<option value="0">Tỉnh/TP ghi nhận</option>
					<!-- BEGIN: tinhthanh -->
					<option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
					<!-- END: tinhthanh -->
				</select>
			</td>
			<td>
				{phanloai}
			</td>
			<td width="250" align="center">
				<input type="button" value="Tìm kiếm" onclick="search_duplicate()"/>
                <input type="button" value="Xóa (-)" onclick="duplicate_reset()"/>
				<!-- BEGIN: extend -->
				<input type="button" value="Xuất Excel" onclick="export_file()" style="background: #f99a38;"/>
				<!-- END: extend -->
			</td>
        </tr>
	</tbody>
</table>
</form>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td width="200">
                <input type="button" value="Xuất Excel" onClick="export_iexcel()" id="xExcel" disabled="disabled"/>
                <input type="button" value="Làm mới" onClick="reload_site()"/>
            </td>
            <td style="color: crimson">Tìm thấy <strong>{all_number}</strong> trường hợp nghi trùng thông tin</td>
			<td align="right">
                <span style="display:inline-block">{per_page}</span>
                <span class="display" id="pagination">
                   {page_html}
                </span>
            </td>
    	</tr>
    </tbody>    
</table>
<div style="padding:0px 5px">
<table width="100%" class="list" id="myTable04" style="height: 50px">
    <thead class="second">
        <tr>
			<td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" id="select_all" disabled="disabled"/></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>Ngày công bố</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ngày lấy mã</strong></div></td>
            <td align="center" style="background:#F9C"><div style="width:60px; display:inline-block"><strong>Mã BN</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></td>
            <td align="center"><div style="width:40px; display:inline-block"><strong>Năm sinh</strong></div></td>
            <td align="center"><div style="width:40px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Xã/Phường<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Quận/Huyện<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP<br />(đang ở)</strong></div></td>
            
            <td align="center"  style="background:#FC0"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP ghi nhận</strong></div></td>
            
            <td align="center"><div style="width:200px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Xã/Phường<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Quận/Huyện<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP<br />(thường trú)</strong></div></td>
            
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Ngày có kết quả xét nghiệm</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Phân loại ca bệnh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Nơi gửi thông báo</strong></div></td>
            
			<td align="center"><div style="width:180px; display:inline-block"><strong>Kết quả XN</strong></div></td>
			<td align="center"><div style="width:180px; display:inline-block"><strong>Báo cáo ca bệnh</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Số điện thoại BN</strong></div></td>
			<td align="center"><div style="width:180px; display:inline-block"><strong>Ghi chú</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Email nhận mã số bệnh nhân</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>Thao tác</strong></div></td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
			<td align="center">{ROW.no}</td>
            <td align="center" {ROW.scolor}>{ROW.pubtime}</td>
            <td align="center">{ROW.addtime}</td>
            <td align="center"><a href="{ROW.check}" target="_blank" title="Xem chi tiết ca trùng">{ROW.masobn}</a></td>
			<td align="left"><a href="{ROW.link}" class="show">{ROW.hovaten}</a></td>
			<td align="center">{ROW.namsinh}</td>
			<td align="center">{ROW.gioitinh}</td>
			<td align="center">{ROW.diachitamtru}</td>
			<td align="center">{ROW.phuongxatamtru}</td>
            <td align="center">{ROW.quanhuyentamtru}</td>
            <td align="center">{ROW.tinhthanhtamtru}</td>
            <td align="center"><span style="color:#F60">{ROW.tinhthanh}</span></td>
            <td align="center">{ROW.diachithuongtru}</td>
            <td align="center">{ROW.phuongxathuongtru}</td>
            <td align="center">{ROW.quanhuyenthuongtru}</td>
            <td align="center">{ROW.tinhthanhthuongtru}</td>
			<td align="center">{ROW.ngaylaymau}</td>
			<td align="center">{ROW.ngaykqxn}</td>
            <td align="center">{ROW.phanloai}</td>
			<td align="center">{ROW.doituonglaymau}</td>
			<td align="center">{ROW.noiguibc}</td>
			<td align="center">
				<!-- BEGIN: phieuxn -->
                	<a href="{ROW.phieuxn}" target="_blank">Xem phiếu XN</a>&nbsp;&nbsp;&nbsp;&nbsp;
                	<a href="{ROW.dphieuxn}" target="_blank"><i class="fa fa-download"></i> Tải phiếu</a>
                <!-- END: phieuxn -->
			</td>
			<td align="center">
				<!-- BEGIN: baocaocb -->
                	<a href="{ROW.baocaocb}" target="_blank">Xem báo cáo</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="{ROW.dbaocaocb}" target="_blank"><i class="fa fa-download"></i> Tải báo cáo</a>
                <!-- END: baocaocb -->
			</td>
			<td align="center">{ROW.ctvalue}</td>
            <td align="center">{ROW.dienthoaibn}</td>
			<td align="center">{ROW.ghichu}</td>
            <td align="center">{ROW.emailnhanbc}</td>
			<td align="center">
				<a href="{ROW.check}" target="_blank" title="Xem chi tiết ca trùng"><span class="span_view"><i class="fa fa-edit"></i> Chi tiết</span></a>
			</td>
		</tr>
    <!-- END: loop -->
    </tbody> 
</table>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	$(".show").fancybox({ 'autoSize':false, 'width': '80%','height': '80%', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} }); 
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
		window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url;
	}
}
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '150px',
	no_results_text: "Không tìm thấy kết quả :"
});
</script>
<!-- END: main -->