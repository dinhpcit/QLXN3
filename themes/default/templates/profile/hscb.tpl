<!-- BEGIN: main -->
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
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
		<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="application/javascript">
$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       ($(window).height() - 295),
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
		searching: false,
		info:false,
		autoWidth: true,
		ordering: false,
        fixedColumns:   {
            leftColumns: 7
        }
    } );
} );
</script> 
<ul id="tab_list" class="nav nav-tabs bor-bot">
   <li class=""> <a class="gray mytab" href="{link_main}" data-toggle="tab">Thông tin cá nhân</a> </li>
   <li class=""> <a class="gray mytab" href="{link_mcb}" data-toggle="tab">Mã ca bệnh</a> </li>
   <li class="active"> <a class="gray mytab" href="{link_hscb}" data-toggle="tab">Hồ sơ ca bệnh</a> </li>
</ul>
<table width="100%" class="list" style="margin-top: 10px;">
    <tbody>
        <tr>
            <td><input type="text" value="{mabn}" style="width:93%" class="form-control" id="mabn" name="mabn" placeholder="Mã BN"></td>
            <td><input type="text" value="{hoten}" style="width:93%" class="form-control" id="hoten" name="hoten" placeholder="Họ và tên"></td>
			<td><input type="text" value="{ngaylm}" class="form-control datepicker" style="width:93%" id="ngaylm" name="ngaylm" placeholder="Ngày lấy mẫu"></td>
			<td><input type="text" value="{ngaykq}" style="width:93%" class="form-control datepicker" id="ngaykq" name="ngaykq" placeholder="Ngày có kết quả"></td>
			<td>
				<select class="form-control chosen-select" name="tinhthanh" id="tinhthanh" style="width:100%" onchange="search_profile()">
					<option value="0">Tỉnh/Thành phố</option>
					<!-- BEGIN: tinhthanh -->
					<option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
					<!-- END: tinhthanh -->
				</select>
			</td>
			<td>
				<select class="form-control chosen-select" name="phanloai" id="phanloai" style="width:100%" onchange="search_profile()">
					<option value="0">Phân loại ca bệnh</option>
					<option value="Cách ly khi nhập cảnh">Cách ly khi nhập cảnh</option>
					<option value="Ghi nhận trong nước">Ghi nhận trong nước</option>
				</select>
			</td>
			<td>
				<input type="submit" value="Tìm kiếm" name="Submit" onclick="search_profile()">
			</td>
        </tr>
	</tbody>
</table>
<div class="dcontent">
<div style="width: 100%; float: left">
	<div style="float: left;margin-left: 5px;">
		<a class="addlink btn btn-primary" href="{link_add}">Thêm mới</a>
	</div>
	<div class="display" id="pagination" style="margin-right: 17px;float: right">
	   {page_html}
	</div>
</div>
<table width="100%" class="list" id="myTable04" style="height: 50px">
    <thead class="second">
        <tr>
			<td align="center"><div style="width:20px; display:inline-block"><input name="check_all" id="checkall" type="checkbox"/></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td align="center"><div style="width:50px; display:inline-block"><strong>Ngày công bố</strong></div></td>
			<td align="center"><div style="width:50px; display:inline-block"><strong>MCB</strong></div></td>
            <td><div style="width:120px; display:inline-block"><strong>Họ và tên</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></td>
			<td align="center"><div style="width:50px; display:inline-block"><strong>Tuổi</strong></div></td>
			<td align="center"><div style="width:50px; display:inline-block"><strong>Nhóm tuổi</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Nghề nghiệp</strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong>Nơi làm việc</strong></div></td>
            <td align="center"><div style="width:300px; display:inline-block"><strong>Thôn, xóm, đường (đang ở)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Tổ Dân Phố</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Xã/Phường (đang ở)</strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong>Quận/Huyện (đang ở)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Tỉnh/TP (đang ở)</strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong>Tỉnh/TP báo cáo ca bệnh</strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong>Địa chỉ/quê quán</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Khởi phát </strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày khởi phát</strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong> Triệu chứng khởi phát</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày lấy mẫu</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày xét nghiệm (+)</strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong> Bệnh viện điều trị</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Nơi điều trị</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Bệnh nền</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Tên bệnh nền</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Nơi nghi ngờ nhiễm bệnh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Nguồn nghi nhiễm</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Tiếp xúc với ca dương tính </strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong> Mối quan hệ với ca dương tính</strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong> Khu công nghiệp</strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong> Phân loại tiếp xúc</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Loại ca bệnh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Cách phát hiện ca bệnh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày tiếp xúc đầu tiên</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày tiếp xúc cuối cùng</strong></div></td>
			<td align="center"><div style="width:150px; display:inline-block"><strong> Ngày tử vong/hoàn thành điều trị</strong></div></td>
			<td align="center"><div style="width:150px; display:inline-block"><strong> Số điện thoại (có chú thích)</strong></div></td>
			<td align="center"><div style="width:150px; display:inline-block"><strong> Số điện thoại [bệnh nhân]</strong></div></td>
			<td align="center"><div style="width:150px; display:inline-block"><strong> Số điện thoại [bệnh nhân hoặc người nhà]</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> CT Value (lần 1)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> CT Value (lần 2)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>  CT Value (lần 3)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>  CT Value (lần 4)</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày CT</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Ngày dịch tễ </strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Nguồn nghi nhiễm </strong></div></td>
			<td align="center"><div style="width:200px; display:inline-block"><strong>Đối tượng lấy mẫu </strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong> Tóm tắt dịch tễ/ Ghi chú</strong></div></td>
			<td align="center"><div style="width:300px; display:inline-block"><strong> Gọi điện phỏng vấn thêm F0</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> TKNC</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> TKND</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> TKSK</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> SĐT theo TKYT</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Ngày KB</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Triệu chứng</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong> Báo cáo</strong></div></td>
			<td align="center"><div style="width:60px; display:inline-block"><strong></strong></div></td>
        </tr> 
    </thead> 
	<tbody>
		<!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input type="checkbox" value="{ROW.id}" class="idlist"/></td>
			<td align="center">{ROW.no}</td>
			<td align="center">{ROW.ngaycongbo}</td>
			<td align="center">BN{ROW.mcb}</td>
			<td align="center">{ROW.hovaten}</td>
			<td align="center">{ROW.namsinh}</td>
			<td align="center">{ROW.tuoi}</td>
			<td align="center">{ROW.nhomtuoi}</td>
			<td align="center">{ROW.gioitinh}</td>
			<td align="center">{ROW.nghenghiep}</td>
			<td align="center">{ROW.noilamviec}</td>
			<td align="center">{ROW.thontamtru}</td>
			<td align="center">{ROW.todanpho}</td>
			<td align="center">{ROW.xatamtru}</td>
			<td align="center">{ROW.huyentamtru}</td>
			<td align="center">{ROW.tinhtamtru}</td>
			<td align="center">{ROW.tinhbccb}</td>
			<td align="center">{ROW.diachithuongtru}</td>
			<td align="center">{ROW.khoiphat}</td>
			<td align="center">{ROW.ngaykhoiphat}</td>
			<td align="center">{ROW.trieuchungkhoiphat}</td>
			<td align="center">{ROW.ngaylaymau}</td>
			<td align="center">{ROW.ngayxetnghiem}</td>
			<td align="center">{ROW.benhviendieutri}</td>
			<td align="center">{ROW.noidieutri}</td>
			<td align="center">{ROW.benhnen}</td>
			<td align="center">{ROW.tenbenhnen}</td>
			<td align="center">{ROW.noinghingonhiembenh}</td>
			<td align="center">{ROW.nguonnghinhiem}</td>
			<td align="center">{ROW.tiepxuccaduongtinh}</td>
			<td align="center">{ROW.mqhcaduongtinh}</td>
			<td align="center">{ROW.khucongnghiep}</td>
			<td align="center">{ROW.phanloaitiepxuc}</td>
			<td align="center">{ROW.loaicabenh}</td>
			<td align="center">{ROW.cachphathiencabenh}</td>
			<td align="center">{ROW.ngaytiepxucdautien}</td>
			<td align="center">{ROW.ngaytiepxuccuoi}</td>
			<td align="center">{ROW.ngaytuvong}</td>
			<td align="center">{ROW.dienthoai1}</td>
			<td align="center">{ROW.dienthoai2}</td>
			<td align="center">{ROW.dienthoai3}</td>
			<td align="center">{ROW.ctvalue1}</td>
			<td align="center">{ROW.ctvalue2}</td>
			<td align="center">{ROW.ctvalue3}</td>
			<td align="center">{ROW.ctvalue4}</td>
			<td align="center">{ROW.ngayct}</td>
			<td align="center">{ROW.ngaydichte}</td>
			<td align="center">{ROW.nguonnghinhiem}</td>
			<td align="center">{ROW.doituonglaymau}</td>
			<td align="center"><div class="tooltip">{ROW.tomtatdichte1}<span class="tooltiptext">{ROW.tomtatdichte}</span></div></td>
			<td align="center"><div class="tooltip">{ROW.goidienphongvanf01}<span class="tooltiptext">{ROW.goidienphongvanf0}</span></div></td>
			<td align="center">{ROW.tknc}</td>
			<td align="center">{ROW.tknd}</td>
			<td align="center">{ROW.tksk}</td>
			<td align="center">{ROW.sdttkyt}</td>
			<td align="center">{ROW.ngaykb}</td>
			<td align="center">{ROW.trieuchung}</td>
			<td align="center">{ROW.baocao}</td>
			<td align="center">
				<a href="{ROW.edit}" class="show"><span class="span_edit"><i class="fa fa-edit"></i> Sửa BN</span></a>
			</td>
		</tr> 
		<!-- END: loop -->
	</tbody> 
</table>
</div>
<script type="text/javascript">
clickcheckall();
$(document).ready(function() { 
	$(".show").fancybox({ 'autoSize':false, 'width': '80%','height': '80%', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} });
	$(".addlink").fancybox({ 'autoSize':false, 'width': '80%','height': '80%', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} }); 
});
</script>
<script>
			$(".chosen-select").chosen({
				allow_single_deselect: true,
				width: '150px',
				no_results_text: "Không tìm thấy kết quả :"
			});
		</script>
<!-- END: main -->