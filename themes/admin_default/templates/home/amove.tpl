<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<!--<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/jquery-3.3.1.js"></script>-->
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>
<script type="application/javascript">
$(document).ready(function() {
    var table = $('#myTable04').DataTable( {
        scrollY:       ($(window).height() - 240),
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
<style>
.chosen-container {
    min-width: 80px !important;
	max-width: 200px !important;
	text-align:left
}
</style>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
                <strong>Chuyển mẫu theo danh sách</strong>
            </td>
    	</tr>
    </tbody>
</table>
<!-- BEGIN: error -->
<div style="padding:10px; background:#FFE1F0; border:#CCC 1px solid; text-align:center"><strong>{error}</strong></div>
<!-- END: error -->
<div style="padding: 3px;">
    <form action="" method="post" enctype="multipart/form-data" id="iform">
    <input type="hidden" value="{datacode}" name="lmid" />
    <input type="hidden" value="{lids}" name="lids" />
    <input type="hidden" value="1" id="isave" name="save"/>
        <table class="nlist">  
            <tr>
            	<td>
                    <input type="text" name="bmangay" style="width:200px" placeholder="Mã mẫu bệnh phẩm" value="{bmangay}"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Từ
                    <input type="text" name="bmatt" style="width:60px" placeholder="Mã TT" value="{bmatt}"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;Đến
                    <input type="text" name="ematt" style="width:60px" placeholder="Mã TT" value="{ematt}"/>
                </td>
                <td>
                	Hoặc tên file TTBP
                </td>
                <td>
                	<input type="text" name="tenfile" style="width:300px" placeholder="Ví dụ: TI_202109112123_TTBP.xlsx" value="{tenfile}"/>
                </td>
            	<td align="center">
                	<input type="button" value="Lọc thông tin" onclick="loc_ma()"/>
                </td>
                <td>
                	<input type="button" onClick="huy_duyet()" value="Hủy và quay lại" style="background:#F90"/>
                </td>
            </tr> 			
        </table>
        <table class="list">  
            <tr>
            	<td>
                  <!-- BEGIN: accept -->
                  Chọn đơn vị xét nghiệm&nbsp;&nbsp;
                  <select name="donvixn" id="donvixn" style="width:160px" class="chosen-select">
                        <option value="0">Đơn vị xét nghiệm</option>
                        <!-- BEGIN: dvxn -->
                        <option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
                        <!-- END: dvxn -->
                  </select>
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" onClick="duyet_ma()" class="btn btn-info startUpload">Xác nhận và chuyển mẫu ({anum} bản ghi)</button> 
                  Hãy rà soát kỹ trước khi xét duyệt
                  <!-- END: accept -->
                  </td>
                  <td align="center">
                    <span class="display" id="pagination">
                       {page_html}
                    </span>
                  </td>
            </tr>
        </table>
        <table width="100%" class="list" id="myTable04">
            <thead class="second">
                <tr>
                    <td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" disabled/></div></td>
                    <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
                    <td align="center" style="background:#00ff00"><div style="width:60px; display:inline-block"><strong>Mã ngày</strong></div></td>
                    <td align="center" style="background:#ff9900"><div style="width:50px; display:inline-block"><strong>Mã đơn vị</strong></div></td>
                    <td align="center" style="background:#00ccff"><div style="width:50px; display:inline-block"><strong>Mã tổ</strong></div></td>
                    <td align="center"><div style="width:110px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></td>
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
                    <td align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị xét nghiệm</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Mã xét nghiệm</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày xét nghiệm</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Phương pháp XN</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày trả KQXN</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Đơn vị gửi mẫu</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Tình trạng mẫu</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></td>
                    <td align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
                    <td align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật TTBP</strong></div></td>
                    <td align="center"><div style="width:220px; display:inline-block"><strong>File TTBP</strong></div></td>
                    <td align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật KQXN</strong></div></td>
                    <td align="center"><div style="width:220px; display:inline-block"><strong>File KQXN</strong></div></td>
                    <td>-</td>
                </tr> 
            </thead> 
            <tbody> 
            <!-- BEGIN: loop -->
                <tr {ROW.bg}>
                    <td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')" disabled/></td>
                    <td align="center">{ROW.no}</td>
                    <td align="center">{ROW.mangay}</td>
                    <td align="center">{ROW.madonvi}</td>
                    <td align="center">{ROW.chukymatt}</td>
                    <td align="center">{ROW.mamaubenhpham}</td>
                    <td align="center">{ROW.hinhthuclaymau}</td>	
                    <td align="center">{ROW.matt}</td>
                    <td align="left"><a href="{ROW.link}" class="show">{ROW.hovaten}</a></td>
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
                    <td align="center">{ROW.labcode}</td>
                    <td align="center">{ROW.bmaxn}</td>	
                    <td align="center">{ROW.bngayxetnghiem}</td>
                    <td align="center">{ROW.bphuongphapxetnghiem}</td>
                    <td align="center">{ROW.bngaytrakqxn}</td>
                    <td align="center">{ROW.bdonviguimau}</td>
                    <td align="center">{ROW.btinhtrangmau}</td>
                    <td align="center">{ROW.bketquaxetnghiem}</td>	
                    <td align="center">{ROW.bctvalue}</td>
                    <td align="center">{ROW.uptime}</td>
                    <td align="center">
                        <!-- BEGIN: bmxn --><a href="{ROW.baocaocb}" target="_blank"><i class="fa fa-download"></i> {ROW.tenfilettbp}</a><!-- END: bmxn -->
                    </td>
                    <td align="center">{ROW.bkuptime}</td>
                    <td align="center">
                        <!-- BEGIN: kqxn --><a href="{ROW.kbaocaocb}" target="_blank"><i class="fa fa-download"></i> {ROW.tenfilekqxn}</a><!-- END: kqxn -->
                    </td>
                    <td></td>
                </tr>
            <!-- END: loop -->
            </tbody> 
        </table>
    </form>
</div>
<script>
function huy_duyet()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main';
}
function duyet_ma()
{
	var r = confirm("Bạn có chắc chắn duyệt {num} bản ghi?");
	if (r == true) 
	{
		$('#isave').val('1');
		$('#iform').submit();
	}
}
function loc_ma()
{
	$('#isave').val('2');
	$('#iform').submit();
}
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '180px',
	no_results_text: "Không tìm thấy kết quả :"
});
</script>
<!-- END: main -->