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
            leftColumns: 5
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
            <td><input type="text" value="{hoten}" style="width:93%" id="hoten" name="hoten" placeholder="H??? v?? t??n"></td>
			<td>
				<span style="float: left;margin-top: 5px;margin-right: 5px;"> Ng??y l???y m??</span>
				<input type="text" value="{bdate}" class="datepicker" style="width:120px;float: left;margin-right: 5px" id="bdate" name="bdate" placeholder="T??? ng??y">
				<input type="text" value="{edate}" style="width:120px;float: left" class="datepicker" id="edate" name="edate" placeholder="?????n ng??y">
			</td>
			<td>
				
			</td>
			<td>
				
			</td>
			<td width="250" align="right">
				<input type="button" value="T??m ki???m" onclick="search_trash()">
                <input type="button" value="X??a (-)" onclick="go_trash()">
			</td>
        </tr>
	</tbody>
</table>
</form>
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td>
                <input type="button" class="bt_del" value="X??a v??nh vi???n" onClick="delcheck()" disabled="disabled" id="idelcode"/>   
                <input type="button" value="L??m m???i" onClick="reload_site()"/>
            </td>
			<td align="right">
                <input type="button" value="D???n s???ch th??ng r??c" onClick="trashdelall()" style="background:#FF9F01 "/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <span style="display:inline-block">{per_page}</span>
                <span class="display" id="pagination">
                   {page_html}
                </span>
            </td>
    	</tr>
    </tbody>    
</table>
<div style="padding:0px 5px">
<table width="100%" class="list" id="myTable04">
    <thead class="second">
        <tr>
			<td align="center"><div style="width:20px; display:inline-block"><input type="checkbox" disabled></div></td>
            <td align="center"><div style="width:30px; display:inline-block"><strong>TT</strong></div></td> 
            <td align="center" style="background:#00ff00"><div style="width:60px; display:inline-block"><strong>M?? ng??y</strong></div></td>
            <td align="center" style="background:#ff9900"><div style="width:50px; display:inline-block"><strong>M?? ????n v???</strong></div></td>
            <td align="center" style="background:#00ccff"><div style="width:50px; display:inline-block"><strong>Chu k??? m?? TT</strong></div></td>
            <td align="center"><div style="width:110px; display:inline-block"><strong>M?? m???u b???nh ph???m</strong></div></td>
            <td align="center"><div style="width:60px; display:inline-block"><strong>H??nh th???c l???y m???u</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>M?? TT</strong></div></td>
            <td><div style="width:150px; display:inline-block"><strong>H??? v?? t??n b???nh nh??n</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>N??m sinh</strong></div></td>
            <td align="center"><div style="width:50px; display:inline-block"><strong>Gi???i t??nh</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>S??? ??i???n tho???i</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Qu???n/Huy???n<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:140px; display:inline-block"><strong>Ph?????ng/x??<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:180px; display:inline-block"><strong>Th??n, x??m, ???????ng, t??? d??n ph???<br />(n??i ??? hi???n t???i)</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ngh??? nghi???p</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>N??i l??m vi???c, h???c t???p</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>?????i t?????ng l???y m???u</strong></div></td>
            <td align="center"><div style="width:100px; display:inline-block"><strong>L???n l???y m???u</strong></div></td>
            <td align="center"><div style="width:200px; display:inline-block"><strong>??? d???ch</strong></div></td>
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
            <td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ng??y x??t nghi???m</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>Ph????ng ph??p XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>Ng??y tr??? KQXN</strong></div></td>
            <td align="center" style="background:#FC9"><div style="width:160px; display:inline-block"><strong>????n v??? g???i m???u</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:100px; display:inline-block"><strong>T??nh tr???ng m???u</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:120px; display:inline-block"><strong>K???t qu??? XN</strong></div></td>
			<td align="center" style="background:#FC9"><div style="width:80px; display:inline-block"><strong>CT Value</strong></div></td>
            <td align="center"><div style="width:120px; display:inline-block"><strong>Ng??y c???p nh???t BMXN</strong></div></td>
            <td align="center"><div style="width:80px; display:inline-block"><strong>Thao t??c</strong></div></td>
        </tr> 
    </thead> 
    <tbody> 
    <!-- BEGIN: loop -->
		<tr {ROW.bg}>
			<td align="center"><input class="bncheck" type="checkbox" value="{ROW.id}" onclick="setvalue('{ROW.id}','{ROW.ck}')"/></td>
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
            <td align="center">{ROW.ngayxetnghiem}</td>
            <td align="center">{ROW.phuongphapxetnghiem}</td>
			<td align="center">{ROW.ngaytrakqxn}</td>
            <td align="center">{ROW.donviguimau}</td>
            <td align="center">{ROW.tinhtrangmau}</td>
            <td align="center">{ROW.ketquaxetnghiem}</td>	
			<td align="center">{ROW.ctvalue}</td>
            <td align="center">{ROW.uptime}</td>
            <td align="center">
				<!-- BEGIN: edit -->
				<a href="javascript:void(0)" onClick="gorestore('{ROW.id}','{ROW.ck}')"><span class="span_view"><i class="fa fa-edit"></i> Kh??i ph???c</span></a>
				<!-- END: edit -->
			</td>
		</tr>
    <!-- END: loop -->
    </tbody> 
</table>
</div>
<script type="text/javascript">

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
		$('#idelcode').removeAttr('disabled');
	}
	else
	{
		$('#idelcode').attr('disabled','disabled');
	}
}

function delcheck()
{
	var txt_url = bn_array.join(",");
	var r = confirm("B???n c?? ch???c ch???n mu???n x??a v??nh vi???n c??c m?? ???? ch???n?");
	if (r == true) 
	{
        $.ajax({	
            type: 'GET',
            url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=trash&del=1&lid='+txt_url,
            data:'',
            success: function(data){
                window.location.reload();
            }
        });
	}
} 
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '150px',
	no_results_text: "Kh??ng t??m th???y k???t qu??? :"
});
</script>
<!-- END: main -->