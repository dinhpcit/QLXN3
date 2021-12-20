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
        scrollY:       ($(window).height() - 310),
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
</script>
<form action="" method="post" id="idform">
<input type="hidden" value="1" name="save" />
<table width="100%">
<tr><td valign="top">
        <table width="100%" style="border-bottom:#CCC 1px solid; padding:3px; margin-top:1px" class="list">
            <tbody class="second">
            <tr>
                <td align="center" width="100" style="background:#FF0">
                {DATA.pubday}/{DATA.pubmonth}/{DATA.pubyear}    
                </td>
                <td style="background:{DATA.color}">
                    <strong>Công bố:</strong> {DATA.title} trong <strong>{DATA.groupid}</strong>
                </td>
            </tr>
            </tbody>
            <tbody class="second">
            <tr>
                <td colspan="2">
                    <strong>Nội dung thống kê công bố</strong>
                    Từ mã <input type="text" value="{DATA.code_begin}" style="width:80px" name="code_begin" readonly="readonly"/>
                    đến mã <input type="text" value="{DATA.code_end}" style="width:80px" name="code_end" readonly="readonly"/>
                    <a href="{link_edit}" class="show btn-show">Sửa dãy mã</a>
                </td>
            </tr>
            </tbody>
            <tr>
                <td colspan="2" valign="top">
                   <textarea name="content" style="width:98%; height:60px">{DATA.contentex}</textarea>
                </td>
            </tr>
        </table>
	</td>
	<td width="35%" valign="top">
        <table width="100%" style="border-bottom:#CCC 1px solid; padding:3px; margin-top:1px" class="list">
            <tr>
            	<td>
                    <input type="button" value="Xác nhận và cập nhật ngày công bố" style="background: #F36;" onclick="setpublic()"/>
                    <input type="button" value="Quay lại DS công bố" class="fr" style="background: #f99a38;" onclick="go_public()"/>
                </td>
            </tr>
            <tr>
                <td valign="top">
                   <textarea name="note" style="width:97%; height:92px" readonly="readonly">{DATA.content}</textarea>
                </td>
            </tr>
        </table>
    </td>
</tr>
</table>
</form>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
                <select name="tinhthanh" id="tinhthanh" style="width:180px" class="chosen-select" onchange="search_public('{DATA.id}','{DATA.ck}')">
					<option value="0">Tỉnh/TP ghi nhận</option>
					<!-- BEGIN: tinhthanh -->
					<option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
					<!-- END: tinhthanh -->
				</select>
                {phanloai}
				<!-- BEGIN: extend -->
				<input type="button" value="Xuất Excel" onclick="export_file()" style="background: #f99a38;">
				<!-- END: extend -->
                Từ mã <strong>{DATA.code_begin}</strong> đến <strong>{DATA.code_end}</strong> có <strong>{all_number}</strong> ca bệnh
            </td>
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
            <td align="center" style="background:#F9C"><div style="width:70px; display:inline-block"><strong>Mã BN</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Xã/Phường<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Quận/Huyện<br />(đang ở)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP<br />(đang ở)</strong></div></td>
            
            <td align="center" style="background:#FC3"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP ghi nhận</strong></div></td>
            
            <td align="center"><div style="width:200px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Xã/Phường<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Quận/Huyện<br />(thường trú)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP<br />(thường trú)</strong></div></td>
            
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Ngày có kết quả xét nghiệm</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Phân loại ca bệnh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Nơi gửi thông báo</strong></div></td>
            
			<td align="center"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></td>
			<td align="center"><div style="width:120px; display:inline-block"><strong>Báo cáo ca bệnh</strong></div></td>
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
			<td align="center">{ROW.masobn}</td>
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
				<!-- BEGIN: phieuxn --><a href="{ROW.phieuxn}" target="_blank"><i class="fa fa-download"></i> Xem phiếu XN</a><!-- END: phieuxn -->
			</td>
			<td align="center">
				<!-- BEGIN: baocaocb --><a href="{ROW.baocaocb}" target="_blank"><i class="fa fa-download"></i> Xem báo cáo</a><!-- END: baocaocb -->
			</td>
			<td align="center">{ROW.ctvalue}</td>
            <td align="center">{ROW.dienthoaibn}</td>
			<td align="center">{ROW.ghichu}</td>
            <td align="center">{ROW.emailnhanbc}</td>
			<td align="center">
				<!-- BEGIN: edit -->
				<a href="{ROW.edit}" class="show_edit"><span class="span_edit"><i class="fa fa-edit"></i> Sửa</span></a>
				<!-- END: edit -->
			</td>
		</tr>
    <!-- END: loop -->
    </tbody> 
</table>
</div>
<script type="text/javascript">
$(document).ready(function() { 
	$(".show").fancybox({ 'autoSize':false, 'width': '800','height': '550', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} });
	$(".show_edit").fancybox({ 'autoSize':false, 'width': '80%','height': '80%', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} });  
});
function export_iexcel()
{
	var txt_url = bn_array.join(",");
	var r = confirm("Bạn có chắc chắn muốn xuất Excel các mã đã chọn?");
	if (r == true) 
	{
		window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url;
	}
}
function setpublic()
{
	var r = confirm("Bạn có chắc chắn muốn công bố dãy mã này? ngày công bố sẽ được điền vào các mã");
	if (r == true) 
	{
		$('#idform').submit();
	}
}
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '150px',
	no_results_text: "Không tìm thấy kết quả :"
});
</script>
<!-- END: main -->