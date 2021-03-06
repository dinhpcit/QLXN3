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
        scrollY:       ($(window).height() - 280),
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
                <td colspan="2">
                    <strong>N???i dung th???ng k??</strong>
                    T??? m?? <input type="text" value="{code_begin}" style="width:80px" name="code_begin" id="code_begin"/>
                    ?????n m?? <input type="text" value="{code_end}" style="width:80px" name="code_end" id="code_end"/>
                    <input type="button" value="Th???ng k??" onclick="gostatistic()"/>
                </td>
            </tr>
            </tbody>
            <tr>
                <td colspan="2" valign="top">
                   <textarea name="content" style="width:98%; height:60px">{contentex}</textarea>
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
                <select name="tinhthanh" id="tinhthanh" style="width:180px" class="chosen-select" onchange="gostatistic()">
					<option value="0">T???nh/TP ghi nh???n</option>
					<!-- BEGIN: tinhthanh -->
					<option value="{ROW.matinhthanh}" {ROW.select}>{ROW.tinhthanhpho}</option>
					<!-- END: tinhthanh -->
				</select>
                {phanloai}
				<!-- BEGIN: extend -->
				<input type="button" value="Xu???t Excel" onclick="export_file()" style="background: #f99a38;">
				<!-- END: extend -->
                T??? m?? <strong>{code_begin}</strong> ?????n <strong>{code_end}</strong> c?? <strong>{all_number}</strong> ca b???nh
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
            <td align="center"><div style="width:60px; display:inline-block"><strong>Ng??y c??ng b???</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ng??y l???y m??</strong></div></td>
            <td align="center" style="background:#F9C"><div style="width:70px; display:inline-block"><strong>M?? BN</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>H??? v?? t??n b???nh nh??n</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>N??m sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Gi???i t??nh</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>Th??n, x??m, ???????ng, t??? d??n ph???<br />(??ang ???)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>X??/Ph?????ng<br />(??ang ???)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Qu???n/Huy???n<br />(??ang ???)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>T???nh/TP<br />(??ang ???)</strong></div></td>
            
            <td align="center" style="background:#FC3"><div style="width:100px; display:inline-block"><strong>T???nh/TP ghi nh???n</strong></div></td>
            
            <td align="center"><div style="width:200px; display:inline-block"><strong>Th??n, x??m, ???????ng, t??? d??n ph???<br />(th?????ng tr??)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>X??/Ph?????ng<br />(th?????ng tr??)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Qu???n/Huy???n<br />(th?????ng tr??)</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>T???nh/TP<br />(th?????ng tr??)</strong></div></td>
            
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ng??y l???y m???u</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>Ng??y c?? k???t qu??? x??t nghi???m</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>Ph??n lo???i ca b???nh</strong></div></td>
			<td align="center"><div style="width:100px; display:inline-block"><strong>?????i t?????ng l???y m???u</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>N??i g???i th??ng b??o</strong></div></td>
            
			<td align="center"><div style="width:80px; display:inline-block"><strong>K???t qu??? XN</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>B??o c??o ca b???nh</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>S??? ??i???n tho???i BN</strong></div></td>
			<td align="center"><div style="width:180px; display:inline-block"><strong>Ghi ch??</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Email nh???n m?? s??? b???nh nh??n</strong></div></td>
			<td align="center"><div style="width:80px; display:inline-block"><strong>Thao t??c</strong></div></td>
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
				<!-- BEGIN: phieuxn --><a href="{ROW.phieuxn}" target="_blank"><i class="fa fa-download"></i> Xem</a><!-- END: phieuxn -->
				<!-- BEGIN: filepxn --><a href="{ROW.filepxn}" target="_blank"><i class="fa fa-download"></i> Xem</a><!-- END: filepxn -->
			</td>
			<td align="center">
				<!-- BEGIN: baocaocb --><a href="{ROW.baocaocb}" target="_blank"><i class="fa fa-download"></i> Xem</a><!-- END: baocaocb -->
				<!-- BEGIN: filebc --><a href="{ROW.filebc}" target="_blank"><i class="fa fa-download"></i> Xem</a><!-- END: filebc -->
			</td>
			<td align="center">{ROW.ctvalue}</td>
            <td align="center">{ROW.dienthoaibn}</td>
			<td align="center">{ROW.ghichu}</td>
            <td align="center">{ROW.emailnhanbc}</td>
			<td align="center">
				<!-- BEGIN: edit -->
				<a href="{ROW.edit}" class="show_edit"><span class="span_edit"><i class="fa fa-edit"></i> S???a</span></a>
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
	var r = confirm("B???n c?? ch???c ch???n mu???n xu???t Excel c??c m?? ???? ch???n?");
	if (r == true) 
	{
		window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=1&lid='+txt_url;
	}
}

$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '150px',
	no_results_text: "Kh??ng t??m th???y k???t qu??? :"
});
</script>
<!-- END: main -->