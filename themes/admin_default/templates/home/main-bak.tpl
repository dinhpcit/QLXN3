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
$(document).ready(function (){
   var table = $('#myTable04').DataTable({
	  scrollY:       ($(window).height() - 215),
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
   });
});

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
            	<input type="text" class="incontrol" value="{madonvi}" style="width:60px" id="madonvi" name="madonvi" placeholder="M?? ????n v???"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{htlm}" style="width:110px" id="htlm" name="htlm" placeholder="H??nh th???c l???y m???u"/>
			</td>
            <td>
                <input type="text" class="incontrol" value="{phuongxanoio}" style="width:110px" id="pxo" name="phuongxanoio" placeholder="Ph?????ng x?? (n??i ???)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{qhnoio}" style="width:130px" id="qho" name="qhnoio" placeholder="Qu???n, Huy???n (n??i ???)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{ttnoio}" style="width:130px" id="tto" name="ttnoio" placeholder="T???nh, Th??nh (n??i ???)"/>
            </td>
            <td><input type="text" class="incontrol" value="{dtlm}" style="width:93%" id="dtlm" name="dtlm" placeholder="?????i t?????ng l???y m???u"/></td>
            <td><input type="text" class="incontrol" value="{diadiem}" style="width:93%" id="diadiem" name="diadiem" placeholder="?????a ??i???m n??i l???y m???u"/></td>
            <td>
                <input type="text" class="incontrol" value="{phuongxalm}" style="width:130px" id="plm" name="phuongxalm" placeholder="Ph?????ng x?? (l???y m???u)"/>
            </td>
            <td>
                <input type="text" class="incontrol" value="{quanhuyen}" style="width:140px" id="quanhuyen" name="quanhuyen" placeholder="Qu???n, Huy???n (l???y m???u)"/>
            </td>
            
            <td></td>
        </tr>
	</tbody>
</table>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
            <td><input type="text" class="incontrol" value="{mabn}" style="width:130px" id="mabn" name="mabn" placeholder="M?? m???u b???nh ph???m"/></td>
            <td><input type="text" class="incontrol" value="{hoten}" style="width:120px" id="hoten" name="hoten" placeholder="H??? v?? t??n"/></td>
            <td>
				&nbsp;&nbsp;
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ng??y c???p nh???t</span>
				<input type="text" value="{bngaycn}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaycn" id="bngaycn" placeholder="T??? ng??y"/>
				<input type="text" value="{engaycn}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaycn" id="engaycn" placeholder="?????n ng??y"/>
			</td>
            <td>
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ng??y l???y m???u</span>
				<input type="text" value="{bngaylm}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaylm" id="bngaylm" placeholder="T??? ng??y"/>
				<input type="text" value="{engaylm}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaylm" id="engaylm" placeholder="?????n ng??y"/>
			</td>
			<td>
                <span style="display: inline-block; margin-top: 5px;margin-right: 5px;"> Ng??y KQXN</span>
				<input type="text" value="{bngaykq}" autocomplete="off" class="datepicker incontrol" style="width:75px;margin-right: 5px" name="bngaykq" id="bngaykq" placeholder="T??? ng??y"/>
				<input type="text" value="{engaykq}" autocomplete="off" style="width:75px;" class="datepicker incontrol" name="engaykq" id="engaykq" placeholder="?????n ng??y"/>
            </td>
            <td width="140">{ppxn}</td>
			<td align="right">
				<input type="submit" value="T??m ki???m" onclick="search_profile()"/>
			</td>
        </tr>
	</tbody>
</table>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
                <div style="position:relative;">
                    <input type="button" value="S???p x???p" onclick="function_show()"/>
                    <div class="idshowm" id="idshowm">
                        <div>
                            <p>1. <a href="javascript:void(0)" onclick="order_list(1)">Theo ng??y c???p nh???t TTBP (Z-A)</a></p>
                            <p>2. <a href="javascript:void(0)" onclick="order_list(2)">Theo ng??y c???p nh???t TTBP (A-Z)</a></p>
                            <p>3. <a href="javascript:void(0)" onclick="order_list(3)">Theo ng??y c???p nh???t KQXN (Z-A)</a></p>
                            <p>4. <a href="javascript:void(0)" onclick="order_list(4)">Theo ng??y c???p nh???t KQXN (A-Z)</a></p>
                        </div>    
                    </div>
                </div>
            </td>
            <td>
                <!-- BEGIN: del -->
                <input type="button" class="bt_del" value="X??a m??" onClick="delcode()" disabled="disabled" id="idelcode"/>
                <input type="button" value="Th??ng r??c" onClick="go_trash()"/>
                <!-- END: del -->
            </td>
            <!-- BEGIN: extend2 -->
            <td>
            	<div style="position:relative;">
                <input type="button" value="Xu???t Excel" onclick="function_showexport()" style="background: #f99a38;"/>
                <div class="idshowm" id="idexport">
                    <div>
                        <p><input type="button" value="Xu???t Excel t???t c???" onClick="export_iexcel()" id="xExcel" style="background: #f99a38;"/></p>
                        <p><input type="button" value="Xu???t Excel K???t qu???" onClick="export_file(3)" id="xExcel" style="background: #f99a38;"/></p>
                    </div>    
                </div>
                </div>
            </td>
            <!-- END: extend2 -->
            <!-- BEGIN: edit -->
            <td>
                <input type="button" value="Ch??? duy???t ({numd})" onClick="go_approve()" id="xapprove"/>
            </td>
            <!-- END: edit -->
            <!-- BEGIN: move -->
            <td>
                <input type="button" value="Chuy???n m???u" onClick="go_amove()" id="xmove"/>
            </td>
            <!-- END: move -->
            <td>
                <select name="donvilm" id="donvilm" style="width:160px" onchange="search_profile()" class="chosen-select">
					<option value="0">????n v??? l???y m???u</option>
					<!-- BEGIN: donvi -->
					<option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
					<!-- END: donvi -->
				</select>
            </td>
            <td>
                <select name="donvixn" id="donvixn" style="width:160px" onchange="search_profile()" class="chosen-select">
					<option value="0">????n v??? x??t nghi???m</option>
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
<div style="padding:0px 5px">
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
			<td align="center"><div style="width:20px; display:inline-block">
            <input type="checkbox" name="select_all" value="1" id="example-select-all" disabled="disabled"/></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td align="center" style="background:#ff9900"><div style="width:50px; display:inline-block"><strong>M?? ????n v???</strong></div></td>
            <td align="center"><div style="width:110px; display:inline-block"><strong>M?? m???u b???nh ph???m</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>H??nh th???c l???y m???u</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>M?? TT</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>H??? v?? t??n b???nh nh??n</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>N??m sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Gi???i t??nh</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>S??? ??i???n tho???i</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>T???nh/Th??nh ph???<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Qu???n/Huy???n<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Ph?????ng/x??<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Th??n, x??m, ???????ng, t??? d??n ph???<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ngh??? nghi???p</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>N??i l??m vi???c, h???c t???p</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>?????i t?????ng l???y m???u</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>L???n l???y m???u</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Ghi ch??</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ph??n lo???i n??i l???y m???u</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>?????a ??i???m n??i l???y m???u</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Qu???n/Huy???n (n??i l???y m???u)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Ph?????ng/x?? (n??i l???y m???u)</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>Th??n, x??m, ???????ng, t??? d??n ph??? (n??i l???y m???u)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Lo???i m???u</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>????n v??? l???y m???u</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>M?? ???ng b???nh ph???m</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>M?? ng?????i ???????c l???y m???u</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Ng??y l???y m???u</strong></div></td>
            <td align="center"><div style="width:160px; display:inline-block"><strong>????n v??? x??t nghi???m</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>M?? x??t nghi???m</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ng??y x??t nghi???m</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Ph????ng ph??p XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ng??y tr??? KQXN</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>????n v??? g???i m???u</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>T??nh tr???ng m???u</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>K???t qu??? XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ng??y c???p nh???t TTBP</strong></div></td>
			<td align="center"><div style="width:210px; display:inline-block"><strong>File TTBP</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ng??y c???p nh???t KQXN</strong></div></td>
			<td align="center"><div style="width:210px; display:inline-block"><strong>File KQXN</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Thao t??c</strong></div></td>
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
				<a href="{ROW.edit}" class="show"><span class="span_edit"><i class="fa fa-edit"></i> S???a</span></a>
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
		alert("Kh??ng x??a ???????c, b???n ch??a ch???n m?? c???n x??a");
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
	var r = confirm("B???n c?? ch???c ch???n mu???n xu???t Excel c??c m?? ???? ch???n?");
	if (r == true) 
	{
		if (bn_array.length > 0 ) { window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url; }
		else { export_file(2); }
	}
}

$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '140px',
	no_results_text: "Kh??ng t??m th???y k???t qu??? :"
});
</script>
<!-- END: main -->