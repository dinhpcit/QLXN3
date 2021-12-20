<!-- BEGIN: main -->
<div style="padding: 3px;margin-top:10px">
    <form action="" method="post" enctype="multipart/form-data" id="iform">
    <input type="hidden" value="{datacode}" name="lmid" />
    <input type="hidden" value="{lids}" name="lids" />
    <input type="hidden" value="1" id="isave" name="save"/>
        <table class="nlist">  
            <tr>
            	<td align="center"><strong>Bạn đang chọn xóa thông tin dãy mã bệnh phẩm</strong></td>
            </tr>  
            <tr>
            	<td align="center">
 					
                    <input type="text" name="bmangay" style="width:100px" placeholder="Mã ngày" value="{bmangay}"/>
                    <input type="text" name="bmadonvi" style="width:80px" placeholder="Mã đơn vị" value="{bmadonvi}"/>
                    <input type="text" name="bchukyma" style="width:90px" placeholder="Chu kỳ mã TT" value="{bchukyma}"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    Từ
                    <input type="text" name="bmatt" style="width:60px" placeholder="Mã TT" value="{bmatt}"/>
                    &nbsp;&nbsp;&nbsp;&nbsp;Đến
                    <input type="text" name="ematt" style="width:60px" placeholder="Mã TT" value="{ematt}"/>
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