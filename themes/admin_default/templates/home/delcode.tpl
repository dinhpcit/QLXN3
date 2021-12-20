<!-- BEGIN: main -->
<div style="padding: 3px;margin-top:10px">
    <form action="" method="post" enctype="multipart/form-data" id="iform">
    <input type="hidden" value="{datacode}" name="lmid" />
    <input type="hidden" value="{lids}" name="lids" />
    <input type="hidden" value="1" id="isave" name="save"/>
        <div class="cssRadius">
        <table class="nlist">  
            <tr>
            	<td><strong>Bạn đang chọn xóa thông tin các mã bệnh phẩm:</strong> {num} bản ghi</td>
            </tr>  
            <tr>
            	<td>
 					<!-- BEGIN: loop --> 
                    <span class="span_refer">{ROW.mamaubenhpham} - {ROW.hovaten} ({ROW.namsinh})</span>
                    <!-- END: loop -->
                </td>
            </tr>
            <tr>
            	<td>
                	<strong>Thao tác xóa:</strong>
                	{thaotac}
                </td>
            </tr> 
			<tr>
            	<td><strong>Các mã bệnh phẩm bị ảnh hưởng từ việc xóa của bạn</strong> {anum} bản ghi</td>
            </tr> 
			<tr>
            	<td>
 					<!-- BEGIN: aloop --> 
                    <span class="span_refer">{ROW.mamaubenhpham} - {ROW.hovaten} ({ROW.namsinh})</span>
                    <!-- END: aloop -->
                </td>
            </tr>			
        </table>
        </div>
        <div class="cssRadius">			
              <div align="center"> 
                  <button type="button" onClick="huy_xoa()" class="btn btn-info1">Hủy và quay lại</button>&nbsp;&nbsp;&nbsp;&nbsp;
                  <button type="button" onClick="xoa_ma()" class="btn btn-info startUpload">Xác nhận xóa mã</button> 
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
</script>
<!-- END: main -->