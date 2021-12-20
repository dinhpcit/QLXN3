<!-- BEGIN: main -->
<style>
	#qr-reader__scan_region{
		display: none 
	}
</style>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/fixedColumns.bootstrap4.min.css" />
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/DataTables/css/dataTables.bootstrap4.min.css" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/DataTables/dataTables.fixedColumns.min.js"></script>
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<script type="application/javascript">
var widthr = 230;
var bn_array = [];
var bn_array_ck = [];
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<div class="dcontent" style="padding: 0px 5px">
<table width="100%">
    <tbody>
        <tr>
            <td>
                <div id="qr-reader" style="width:500px"></div>
    			<div id="qr-reader-results"></div>
				<script src="https://unpkg.com/html5-qrcode"></script>
				<script>
					function docReady(fn) {
						// see if DOM is already available
						if (document.readyState === "complete"
							|| document.readyState === "interactive") {
							// call on next available tick
							setTimeout(fn, 1);
						} else {
							document.addEventListener("DOMContentLoaded", fn);
						}
					}

					docReady(function () {
						var resultContainer = document.getElementById('qr-reader-results');
						var lastResult, countResults = 0;
						function onScanSuccess(decodedText, decodedResult) {
							if (decodedText !== lastResult) {
								++countResults;
								lastResult = decodedText;
								// Handle on success condition with the decoded message.
								console.log(`Scan result ${decodedText}`, decodedResult);
							}
							$.ajax({	
								type: 'GET',
								url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=read&qrid='+decodedText,
								data:'',
								success: function(data){
									window.location.reload();
								}
							});
						}

						var html5QrcodeScanner = new Html5QrcodeScanner(
							"qr-reader", { fps: 10, qrbox: 250 });
						html5QrcodeScanner.render(onScanSuccess);
					});
				</script>
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
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
			<td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" disabled></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Số điện thoại</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Tỉnh/Thành phố<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Phường xã (nơi ở)</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(nơi ở hiện tại)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Nghề nghiệp</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Nơi làm việc, học tập</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block">Thao tác</div></td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center">
				<input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/>
			</td>
			<td align="center">{ROW.no}</td>
			<td align="left"><a href="#">{ROW.hovaten}</a></td>
			<td align="center">{ROW.namsinh}</td>
			<td align="center">{ROW.gioitinh}</td>
            <td align="center">{ROW.dienthoai}</td>	
            <td align="center">{ROW.tinhnoio}</td>
            <td align="center">{ROW.huyennoio}</td>
            <td align="center">{ROW.xanoio}</td>
            <td align="center">{ROW.thonnoio}</td>
            <td align="center">{ROW.nghenghiep}</td>
            <td align="center">{ROW.noilamviec}</td>
            <td align="center">
                <!-- BEGIN: edit -->
				<a href="{ROW.edit}" class="show"><span class="span_edit"><i class="fa fa-edit"></i> Sửa</span></a>
				<!-- END: edit -->
            </td>
		</tr>
    <!-- END: loop -->
    </tbody>
</table>
<table width="100%">
    <tbody>
        <tr>
            <td>
				<select name="donvixn" id="donvixn" style="width:160px" class="chosen-select">
					<option value="0">Đơn vị xét nghiệm</option>
                    <!-- BEGIN: dvxn -->
					<option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
					<!-- END: dvxn -->
				</select>
                <input type="button" value="Ghi dữ liệu" onClick="add_list()" style="background:#093;"/>
            </td>
    	</tr>
    </tbody>    
</table>	
</div>
<script type="text/javascript">
$(document).ready(function() { 
	$(".show").fancybox({ 'autoSize':false, 'width': '1000','height': '600', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} }); 
	$(".show1").fancybox({ 'autoSize':false, 'width': '1000','height': '300', 'scrolling' : false, 'type': 'iframe','helpers' : {'overlay' : {'closeClick': true}} }); 
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
		//$('#xExcel').removeAttr('disabled');
		$('#idelcode').removeAttr('disabled');
	}
	else
	{
		//$('#xExcel').attr('disabled','disabled');
		$('#idelcode').attr('disabled','disabled');
	}
}
function add_list()
{
	var txt_url = bn_array.join(",");
	var kqxn = $('#donvixn').val();
	var r = confirm("Bạn có chắc chắn muốn thêm các mã đã chọn?");
	if (r == true) 
	{
		if (bn_array.length > 0 ) { 
			window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=read&kqxn='+kqxn+'&lid='+txt_url; 
		}
		else { export_file(); }
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