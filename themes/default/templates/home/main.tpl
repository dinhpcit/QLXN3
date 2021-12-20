<!-- BEGIN: main -->
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
<div style="border-bottom: 1px solid #CFCFCF; padding-bottom: 8px;padding-left: 5px;padding-right: 5px;">
<table width="100%" style="margin-bottom:3px">
    <tbody>
		<tr><td colspan="7">Lọc dữ liệu bằng cách nhập thông tin vào một hoặc nhiều ô dưới đây rồi bấm nút <strong>"Tìm kiếm"</strong>. <span id="advs">Muốn thêm thông tin tìm kiếm bấm <strong><a href="javasript:void(0)" onclick="showsearch()">vào đây</a></strong></span></td></tr>
	</tbody>
</table>
<form onsubmit="return search_profile();">
<table width="100%" style="margin-bottom:3px; display:none" id="searchadv">
    <tbody>
        <tr>
            <td width="130">
                <input type="text" class="incontrol" value="{htlm}" style="width:125px" id="htlm" name="htlm" placeholder="Hình thức lấy mẫu"/>
			</td>
            <td>
                <input type="text" class="incontrol" value="{tto}" style="width:125px" id="tto" name="ttnoio" placeholder="Tỉnh, thành (nơi ở)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{qhnoio}" style="width:120px" id="qho" name="qhnoio" placeholder="Quận, Huyện (nơi ở)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{phuongxanoio}" style="width:120px" id="pxo" name="phuongxanoio" placeholder="Phường, xã (nơi ở)"/>
            </td>
            <td><input type="text" class="incontrol" value="{dtlm}" style="width:130px" id="dtlm" name="dtlm" placeholder="Đối tượng lấy mẫu"/></td>
            <td><input type="text" class="incontrol" value="{diadiem}" style="width:130px" id="diadiem" name="diadiem" placeholder="Địa điểm nơi lấy mẫu"/></td>
            <td>
                <input type="text" class="incontrol" value="{quanhuyen}" style="width:130px" id="quanhuyen" name="quanhuyen" placeholder="Quận, Huyện (lấy mẫu)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{phuongxalm}" style="width:130px" id="plm" name="phuongxalm" placeholder="Phường xã (lấy mẫu)"/>
            </td>
            <td>{ppxn}</td>
            <td align="right">
            	<input type="button" value="Ẩn[x]" onclick="hidensearch()" style="background: #399;"/>	
            </td>
        </tr>
	</tbody>
</table>
<script>
var cookieSearchadv = getCookie("searchadv");
if (cookieSearchadv==0){hidensearch(); widthr = 230;}
else if(cookieSearchadv==1){showsearch(); widthr = 260;} 
</script>
<table width="100%">
    <tbody>
		<tr>
            <td width="120"><input type="text" class="incontrol" value="{mabn}" style="width:115px" id="mabn" name="mabn" placeholder="Mã mẫu bệnh phẩm"></td>
            <td><input type="text" class="incontrol" value="{hoten}" style="width:115px" id="hoten" name="hoten" placeholder="Họ và tên"></td>
			<td>
				&nbsp;&nbsp;
                <span style="display: inline-block; margin-top: 5px;margin-right: 4px;"> Ngày cập nhật</span>
				<input type="text" value="{bngaycn}" autocomplete="off" class="datepicker incontrol" style="width:60px;margin-right: 4px" name="bngaycn" id="bngaycn" placeholder="Từ ngày">
				<input type="text" value="{engaycn}" autocomplete="off" style="width:60px;" class="datepicker incontrol" name="engaycn" id="engaycn" placeholder="Đến ngày">
			</td>
            <td>
				<span style="display: inline-block; margin-top: 5px;margin-right: 4px;"> Ngày lấy mẫu</span>
				<input type="text" value="{bngaylm}" autocomplete="off" class="datepicker incontrol" style="width:60px;margin-right: 4px" name="bngaylm" id="bngaylm" placeholder="Từ ngày">
				<input type="text" value="{engaylm}" autocomplete="off" style="width:60px;" class="datepicker incontrol" name="engaylm" id="engaylm" placeholder="Đến ngày">
			</td>
			<td>
                <span style="display: inline-block; margin-top: 5px;margin-right: 4px;"> Ngày trả KQXN</span>
				<input type="text" value="{bngaykq}" autocomplete="off" class="datepicker incontrol" style="width:60px;margin-right: 4px" name="bngaykq" id="bngaykq" placeholder="Từ ngày">
				<input type="text" value="{engaykq}" autocomplete="off" style="width:60px;" class="datepicker incontrol" name="engaykq" id="engaykq" placeholder="Đến ngày">
            </td>
            <td>
                {kqxn}
			</td>
			<td align="right">
				<input type="submit" value="Tìm kiếm" onclick="search_profile()" style="background:#093;"/>
				<input type="button" title="Bỏ tìm kiếm" value="Xóa TK" onclick="go_research()"/>
				<!--<input type="button" value="Xuất Excel" onclick="export_file()" style="background: #093;">-->
			</td>
        </tr>
	</tbody>
</table>
</form>
</div>
<div style="padding:5px">
<table width="100%">
    <tbody>
        <tr>
			<td width="110">
                <div style="position:relative;">
                    <input type="button" value="Tải biểu mẫu nhập" onclick="$('#idshowm').show()"/>
                    <div class="idshowm" id="idshowm">
                        <h2 style="font-size: 16px; text-transform:uppercase ">
                            <strong>Biểu mẫu nhập dữ liệu</strong>
                        </h2>   
                        <div>
                            <p>1. Tải file mẫu thông tin <strong>mẫu bệnh phẩm</strong> <a href="{mlink_bmxn}" style="color: #006BFD" target="_blank">Tại đây</a></p>
                            <p>2. Tải file mẫu thông tin <strong>kết quả xét nghiệm</strong> <a href="{mlink_kqxn}" style="color: #006BFD" target="_blank">Tại đây</a></p>
                            <p>3. Tải file mẫu thông tin <strong>mẫu bệnh phẩm và kết quả xét nghiệm</strong> <a href="{mlink_all}" style="color: #006BFD" target="_blank">Tại đây</a></p>
                            <p>4. Tải file mẫu giấy <strong>lập danh sách lấy mẫu</strong> <a href="{mlink_doc}" style="color: #006BFD" target="_blank">Tại đây</a></p>

                        </div>
                        <div align="right"><input type="button" onclick="$('#idshowm').hide()" value="Đóng [x]"/></div>
                    </div>
                </div>
            </td>
            <td>
                <input type="button" value="Nhập dữ liệu" onClick="go_update()" style="background: #f99a38;"/>
                <input type="button" value="Xuất Excel" onClick="export_iexcel()" style="background:#093;"/>
				<input type="button" value="In kết quả" onClick="OpenPrint()" id="" style="background:#093;"/>
                <!---
				<a href="{link_add}" class="show1"><span class="span_add"><i class="fa fa-edit"></i> Thêm</span></a>
                -->
            </td>
            <td>
            	<span style="display:inline-block;">
                <input type="radio" name="tbl" value="01" id="bmxn" {check01} onchange="onloadtbl()"/> 
                <label for="bmxn">Hiển thị theo thông tin mẫu</label> &nbsp;&nbsp;
                <input type="radio" name="tbl" value="02" id="kqxn" {check02} onchange="onloadtbl()"/> 
                <label for="kqxn">Hiển thị theo KQXN</label>  
                </span>
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
</div>  
<div class="div_maintb">
<table width="100%">
    <thead class="second">
        <tr>
			<th align="center" width="30"><input type="checkbox" disabled></th>
            <th align="center" width="30"><strong>TT</strong></th> 
           <th align="center" width="110"><div style="width:110px; display:inline-block"><strong>Mã mẫu bệnh phẩm</strong></div></th>
            <th align="center"><div style="width:60px; display:inline-block"><strong>Hình thức lấy mẫu</strong></div></th>
            <th><div style="width:150px; display:inline-block"><strong>Họ và tên bệnh nhân</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>Năm sinh</strong></div></th>
            <th align="center"><div style="width:50px; display:inline-block"><strong>Giới tính</strong></div></th>
            <th align="center"><div style="width:80px; display:inline-block"><strong>Số điện thoại</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Tỉnh/Thành phố<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Phường xã (nơi ở)</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố<br />(nơi ở hiện tại)</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Nghề nghiệp</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Nơi làm việc, học tập</strong></div></th>
            <th align="center"><div style="width:100px; display:inline-block"><strong>Đối tượng lấy mẫu</strong></div></th>
            <th align="center"><div style="width:100px; display:inline-block"><strong>Lần lấy mẫu</strong></div></th>
            <th align="center"><div style="width:200px; display:inline-block"><strong>Ghi chú</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Phân loại nơi lấy mẫu</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Tên địa điểm lấy mẫu</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Quận/Huyện (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Phường/xã (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:160px; display:inline-block"><strong>Thôn, xóm, đường, tổ dân phố (nơi lấy mẫu)</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Loại mẫu</strong></div></th>
            <th align="center"><div style="width:180px; display:inline-block"><strong>Đơn vị lấy mẫu</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Mã ống bệnh phẩm</strong></div></th>
            <th align="center"><div style="width:140px; display:inline-block"><strong>Mã người được lấy mẫu</strong></div></th>
            <th align="center"><div style="width:80px; display:inline-block"><strong>Ngày lấy mẫu</strong></div></th>
            <th align="center"><div style="width:160px; display:inline-block"><strong>Đơn vị xét nghiệm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày nhận mẫu<br />dd/mm/yyyy</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Giờ nhận mẫu<br />hh:mm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày xét nghiệm</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Phương pháp XN</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ngày trả KQXN</strong></div></th>
            <th align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Đơn vị gửi mẫu</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Tình trạng mẫu</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>Kết quả XN</strong></div></th>
			<th align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật mẫu</strong></div></th>
			<th align="center"><div style="width:140px; display:inline-block"><strong>File TTBP</strong></div></th>
            <th align="center"><div style="width:120px; display:inline-block"><strong>Ngày cập nhật KQXN</strong></div></th>
			<th align="center"><div style="width:140px; display:inline-block"><strong>File KQXN</strong></div></th>
            <th align="center"><div style="width:80px; display:inline-block">Thao tác</div></th>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
			<td align="center">{ROW.no}</td>
            <td align="center">{ROW.mamaubenhpham}</td>
            <td align="center">{ROW.hinhthuclaymau}</td>	
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
            <td align="center">{ROW.bngaynhanmau}</td>
            <td align="center">{ROW.bgionhanmau}</td>
            <td align="center">{ROW.bngayxetnghiem}</td>
            <td align="center">{ROW.bphuongphapxetnghiem}</td>
			<td align="center">{ROW.bngaytrakqxn}</td>
            <td align="center">{ROW.bdonviguimau}</td>
            <td align="center">{ROW.btinhtrangmau}</td>
            <td align="center">{ROW.bketquaxetnghiem}</td>
			<td align="center">{ROW.bctvalue}</td>
            <td align="center">{ROW.uptime}</td>
            <td align="center">
				<!-- BEGIN: bmxn --><a href="{ROW.baocaocb}" target="_blank"><i class="fa fa-download"></i> Tải file TTBP</a><!-- END: bmxn -->
			</td>
            <td align="center">{ROW.bkuptime}</td>
            <td align="center">
				<!-- BEGIN: kqxn --><a href="{ROW.kbaocaocb}" target="_blank"><i class="fa fa-download"></i> Tải file KQXN</a><!-- END: kqxn -->
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
function export_iexcel()
{
	var txt_url = bn_array.join(",");
	var r = confirm("Bạn có chắc chắn muốn xuất Excel các mã đã chọn?");
	if (r == true) 
	{
		if (bn_array.length > 0 ) { window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url; }
		else { export_file(); }
	}
}
</script>