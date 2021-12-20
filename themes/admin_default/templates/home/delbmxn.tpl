<!-- BEGIN: main -->
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px">
    <tbody>
        <tr>
			<td width="350">
                <!-- BEGIN: del -->
                <input type="button" value="Xóa dãy mã theo chu kỳ" onClick="go_dellist()"/>
                <input type="button" value="Xóa BMXN theo tên file" onClick="go_delbmxn()" disabled="disabled" />
                <input type="button" value="Xóa KQXN theo tên file" onClick="go_delkqxn()" />
                <input type="button" value="Thùng rác" onClick="go_trash()"/>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <!-- END: del -->
            </td>
    	</tr>
    </tbody>
</table>
<div style="padding: 3px;margin-top:10px">
    <form action="" method="post" enctype="multipart/form-data" id="iform">
    <input type="hidden" value="{datacode}" name="lmid" />
    <input type="hidden" value="{lids}" name="lids" />
    <input type="hidden" value="1" id="isave" name="save"/>
        <table class="nlist">  
            <tr>
            	<td align="center"><strong>Bạn đang chọn xóa thông tin dãy mã bệnh phẩm theo tên file TTBP</strong></td>
            </tr>  
            <tr>
            	<td align="center">
                    <input type="text" name="tenfile" style="width:400px" placeholder="Ví dụ: TI_202109112123_TTBP.xlsx" value="{tenfile}"/>
                </td>
            </tr>
            <tr>
            	<td align="center">
                	<input type="button" value="Lọc dãy mã" onclick="loc_ma()"/>
                </td>
            </tr> 
			<tr>
            	<td align="center"><strong>Các mã bệnh phẩm bị ảnh hưởng từ việc xóa của bạn</strong> {anum} bản ghi</td>
            </tr> 
			<tr>
            	<td>
 					<!-- BEGIN: aloop --> 
                    <span class="span_refer">{ROW.mamaubenhpham} - {ROW.hovaten} ({ROW.namsinh})</span>
                    <!-- END: aloop -->
                </td>
            </tr>			
        </table>
        
        <div class="cssRadius">			
              <div align="center"> 
                  <button type="button" onClick="huy_xoa()" class="btn btn-info1">Hủy và quay lại</button>
                  <!-- BEGIN: delete -->
                  &nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" onClick="xoa_ma()" class="btn btn-info startUpload">Xác nhận xóa mã</button> 
                  <!-- END: delete -->
                  <p style="margin-top:8px">Hãy rà soát lại trước khi xóa mã, nếu sai hãy hủy và quay lại</p>
              </div>
         </div>  
    </form>
</div>
<script>
function huy_xoa()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main';
}
function xoa_ma()
{
	var r = confirm("Bạn có chắc chắn muốn xóa {num} bản ghi?");
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
</script>
<!-- END: main -->