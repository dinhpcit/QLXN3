<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/jscroll/jscroll.css?v=1.0" />
<script type="text/javascript" src="{DF_BASE_SITEURL}plugins/jscroll/jscroll.js"></script>
<link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}plugins/jcolor/jquery.colorbox-min.css" />
<script language="javascript" src="{DF_BASE_SITEURL}plugins/jcolor/jquery.colorbox-min.js"></script>

<script type="application/javascript">
var bn_array = [];
var bn_array_ck = [];
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
var ishow = 0;
function function_show()
{
	if( ishow == 0 ) { $('#idshowm').show(); ishow = 1; }
	else if( ishow == 1 ) { $('#idshowm').hide(); ishow = 0; }
}
var isexport = 0;
function function_showexport()
{
	if( isexport == 0 ) { $('#idexport').show(); isexport = 1; }
	else if( isexport == 1 ) { $('#idexport').hide(); isexport = 0; }
}
</script>
<style>
.chosen-container {
    min-width: 80px !important;
	max-width: 200px !important;
}
</style>

<form onsubmit="return search_profile()">
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
            <td>
            	<input type="text" class="incontrol" value="{madonvi}" style="width:60px" id="madonvi" name="madonvi" placeholder="Mã đơn vị"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{htlm}" style="width:110px" id="htlm" name="htlm" placeholder="Hình thức lấy mẫu"/>
			</td>
            <td>
                <input type="text" class="incontrol" value="{phuongxanoio}" style="width:110px" id="pxo" name="phuongxanoio" placeholder="Phường xã (nơi ở)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{qhnoio}" style="width:130px" id="qho" name="qhnoio" placeholder="Quận, Huyện (nơi ở)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{ttnoio}" style="width:130px" id="tto" name="ttnoio" placeholder="Tỉnh, Thành (nơi ở)"/>
            </td>
            <td><input type="text" class="incontrol" value="{dtlm}" style="width:93%" id="dtlm" name="dtlm" placeholder="Đối tượng lấy mẫu"/></td>
            <td><input type="text" class="incontrol" value="{diadiem}" style="width:93%" id="diadiem" name="diadiem" placeholder="Địa điểm nơi lấy mẫu"/></td>
            <td>
                <input type="text" class="incontrol" value="{phuongxalm}" style="width:130px" id="plm" name="phuongxalm" placeholder="Phường xã (lấy mẫu)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{quanhuyen}" style="width:140px" id="quanhuyen" name="quanhuyen" placeholder="Quận, Huyện (lấy mẫu)"/>
            </td>
            
            <td></td>
        </tr>
	</tbody>
</table>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
            <td><input type="text" class="incontrol" value="{mabn}" style="width:130px" id="mabn" name="mabn" placeholder="Mã mẫu bệnh phẩm"/></td>
            <td><input type="text" class="incontrol" value="{hoten}" style="width:120px" id="hoten" name="hoten" placeholder="Họ và tên"/></td>
            <td>
				&nbsp;&nbsp;
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ngày cập nhật</span>
				<input type="text" value="{bngaycn}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaycn" id="bngaycn" placeholder="Từ ngày"/>
				<input type="text" value="{engaycn}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaycn" id="engaycn" placeholder="Đến ngày"/>
			</td>
            <td>
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ngày lấy mẫu</span>
				<input type="text" value="{bngaylm}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaylm" id="bngaylm" placeholder="Từ ngày"/>
				<input type="text" value="{engaylm}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaylm" id="engaylm" placeholder="Đến ngày"/>
			</td>
			<td>
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ngày KQXN</span>
				<input type="text" value="{bngaykq}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaykq" id="bngaykq" placeholder="Từ ngày"/>
				<input type="text" value="{engaykq}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaykq" id="engaykq" placeholder="Đến ngày"/>
            </td>
            <td width="140">{ppxn}</td>
			<td align="right">
				<input type="submit" value="Tìm kiếm" onclick="search_profile()"/>
			</td>
        </tr>
	</tbody>
</table>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
                <div style="position:relative;">
                    <input type="button" value="Sắp xếp" onclick="function_show()"/>
                    <div class="idshowm" id="idshowm">
                        <div>
                            <p>1. <a href="javascript:void(0)" onclick="order_list(1)">Theo ngày cập nhật TTBP (Z-A)</a></p>
                            <p>2. <a href="javascript:void(0)" onclick="order_list(2)">Theo ngày cập nhật TTBP (A-Z)</a></p>
                            <p>3. <a href="javascript:void(0)" onclick="order_list(3)">Theo ngày cập nhật KQXN (Z-A)</a></p>
                            <p>4. <a href="javascript:void(0)" onclick="order_list(4)">Theo ngày cập nhật KQXN (A-Z)</a></p>
                        </div>    
                    </div>
                </div>
            </td>
            <td>
                <!-- BEGIN: del -->
                <input type="button" class="bt_del" value="Xóa mã" onClick="delcode()" disabled="disabled" id="idelcode"/>
                <input type="button" value="Thùng rác" onClick="go_trash()"/>
                <!-- END: del -->
            </td>
            <!-- BEGIN: extend2 -->
            <td>
            	<div style="position:relative;">
                <input type="button" value="Xuất Excel" onclick="function_showexport()" style="background: #f99a38;"/>
                <div class="idshowm" id="idexport">
                    <div>
                        <p><input type="button" value="Xuất Excel tất cả" onClick="export_iexcel()" id="xExcel" style="background: #f99a38;"/></p>
                        <p><input type="button" value="Xuất Excel Kết quả" onClick="export_file(3)" id="xExcel" style="background: #f99a38;"/></p>
                    </div>    
                </div>
                </div>
            </td>
            <!-- END: extend2 -->
            <!-- BEGIN: edit -->
            <td>
                <input type="button" value="Chờ duyệt ({numd})" onClick="go_approve()" id="xapprove"/>
            </td>
            <!-- END: edit -->
            <!-- BEGIN: move -->
            <td>
                <input type="button" value="Chuyển mẫu" onClick="go_amove()" id="xmove"/>
            </td>
            <!-- END: move -->
            <td>
                <select name="donvilm" id="donvilm" style="width:160px" onchange="search_profile()" class="chosen-select">
					<option value="0">Đơn vị lấy mẫu</option>
					<!-- BEGIN: donvi -->
					<option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
					<!-- END: donvi -->
				</select>
            </td>
            <td>
                <select name="donvixn" id="donvixn" style="width:160px" onchange="search_profile()" class="chosen-select">
					<option value="0">Đơn vị xét nghiệm</option>
                    <!-- BEGIN: dvxn -->
					<option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
					<!-- END: dvxn -->
				</select>
            </td>
            <td>
            	{kqxn} 
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
</form>
<form action="{link_del}" method="post" id="ifdel">
<input type="hidden" value="1" name="del" />
<input type="hidden" value="" name="lid" id="lid"/>
<input type="hidden" value="" name="lck" id="lck"/>
</form>

<div class="div_maintb">
<table>
    <thead>
        <tr>
			<th align="center" width="30"><input type="checkbox" name="select_all" value="1" id="example-select-all" disabled="disabled"/></th>
            <th align="center" width="30"><strong>TT</strong></th> 
            <th align="center" width="20" style="background:#ff9900"><strong>Mã đơn vị</strong></th>
            <th align="center" width="110"><div style="width:110px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>HT lấy mẫu</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>Mã TT</strong></div></th>
            <th><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></th>
            <th align="center"><div style="width:80px; display:inline-block"><strong>Số điện thoại</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Tỉnh/Thành phố<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Phường/xã<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Nghề nghiệp</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Nơi làm việc, học tập</strong></div></th>
            <th align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></th>
            <th align="center"><div style="width:100px; display:inline-block"><strong>Lần lấy mẫu</strong></div></th>
            <th align="center"><div style="width:200px; display:inline-block"><strong>Ghi chú</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Phân loại nơi lấy mẫu</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Địa điểm nơi lấy mẫu</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Phường/xã (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:160px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Loại mẫu</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Đơn vị lấy mẫu</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Mã ống bệnh phẩm</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Mã người được lấy mẫu</strong></div></th>
            <th align="center"><div style="width:80px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></th>
            <th align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị xét nghiệm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Mã xét nghiệm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày xét nghiệm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Phương pháp XN</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày trả KQXN</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Đơn vị gửi mẫu</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Tình trạng mẫu</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật TTBP</strong></div></th>
			<th align="center"><div style="width:210px; display:inline-block"><strong>File TTBP</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật KQXN</strong></div></th>
			<th align="center"><div style="width:210px; display:inline-block"><strong>File KQXN</strong></div></th>
            <th align="center"><div style="width:100px; display:inline-block"><strong>Thao tác</strong></div></th>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
			<td align="center">{ROW.no}</td>
            <td align="center">{ROW.madonvi}</td>
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
            <td align="center">
            	<!-- BEGIN: edit -->
				<a href="{ROW.edit}" class="show"><span class="span_edit"><i class="fa fa-edit"></i> Sửa</span></a>
				<!-- END: edit -->
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
		//$('#xExcel').removeAttr('disabled');
		$('#idelcode').removeAttr('disabled');
	}
	else
	{
		//$('#xExcel').attr('disabled','disabled');
		$('#idelcode').attr('disabled','disabled');
	}
}
function delcode()
{
	if (bn_array.length == 0 )
	{
		alert("Không xóa được, bạn chưa chọn mã cần xóa");
	}
	else {
		var id_url = bn_array.join(",");
		var ck_url = bn_array_ck.join(",");
		$('#lid').val(id_url);
		$('#lck').val(ck_url);
		$('#ifdel').submit();
	}
}
function export_iexcel()
{
	var txt_url = bn_array.join(",");
	var r = confirm("Bạn có chắc chắn muốn xuất Excel các mã đã chọn?");
	if (r == true) 
	{
		if (bn_array.length > 0 ) { window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url; }
		else { export_file(2); }
	}
}

$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '140px',
	no_results_text: "Không tìm thấy kết quả :"
});
</script>
<!-- END: main -->