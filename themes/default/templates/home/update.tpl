<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<table style="width:100%">
<tr>
	<td></td>
    <!-- BEGIN: bmxn -->
	<td width="{width}" valign="top">
    	<div class="boxupdate">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="1" name="savebmxn"/>
            <div class="cssRadiusTop">
                <h2 style="font-size: 16px; text-transform:uppercase ">
                    <strong>Nhập thông tin mẫu bệnh phẩm</strong>
                </h2>   
                <p>
                    Giới hạn mỗi lần upload tối đa <strong>1000 trường hợp</strong>, điền đầy đủ thông tin vào các trường thông tin bên dưới. 
                    Trân trọng cảm ơn!<br/><strong style="color: red">Chú ý: Các trường đánh dấu * là bắt buộc</strong> 
                </p>
                <!-- BEGIN: error -->
                <p>
                    <strong style="color: red">{error}</strong>
                </p>
                <!-- END: error -->
            </div>  
            <div class="cssRadius">
               <p>File *.xls hoặc *.xlsx dữ liệu mẫu bệnh phẩm <strong style="color: red">*</strong></p>
               <div style="padding-bottom: 8px;">
                   <input type="file" name="uploadfile_excel" id="uploadfile_excel">
               </div>
               <!-- BEGIN: dvnm -->
               <p>Đơn vị nhận mẫu xét nghiệm <strong style="color: red">*</strong></p>
                <div style="padding-bottom: 8px;">
                <select name="labcode" id="labcode" class="chosen-select">
                    <option value="0">Chọn đơn vị nhận mẫu</option>
                    <!-- BEGIN: donvi -->
                    <option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
                    <!-- END: donvi -->
                </select>
                </div>
                <!-- END: dvnm -->
                <table>
                    <tr>
                        <td colspan="2"><strong>Chuỗi an ninh</strong> <strong style="color: red">*</strong></td>
                    </tr>
                    <tr>
                        <td align="">
                            <span id="capchar">{capchar}</span>
                        </td>
                        <td>
                            <input type="text" name="S_CAPCHAR" value="" required placeholder="Xác nhận chuỗi an ninh"/>
                        </td>
                    </tr>
                </table>
            </div>   
            <div class="cssRadius">			
                  <div align="center"> 
                      <input type="submit" onclick="this.disabled=true;this.value='Xin vui lòng chờ 1-2 phút...';this.form.submit();" class="btn btn-info startUpload" value="Tải thông tin mẫu bệnh phẩm" style="padding:8px" /> 
                  </div>
             </div>  
        </form>
        </div>
    </td>
    <!-- END: bmxn -->
    <!-- BEGIN: kqxn -->
    <td width="{width}" valign="top">
    	<div class="boxupdate">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="1" name="savekqxn"/>
            <div class="cssRadiusTop">
                <h2 style="font-size: 16px; text-transform:uppercase ">
                    <strong style="color:#F60">Nhập dữ liệu kết quả xét nghiệm</strong>
                </h2>   
                <p>
                    Giới hạn mỗi lần upload tối đa <strong>1000 trường hợp</strong>, điền đầy đủ thông tin vào các trường thông tin bên dưới. 
                    Trân trọng cảm ơn!<br/><strong style="color: red">Chú ý: Các trường đánh dấu * là bắt buộc</strong>  
                </p>
                <!-- BEGIN: error -->
                <p>
                    <strong style="color: red">{error}</strong>
                </p>
                <!-- END: error -->
            </div>
            <div class="cssRadius">
               <div>
                   <p>File *.xls hoặc *.xlsx thông tin kết quả xét nghiệm<strong style="color: red">*</strong></p>
                   <div style="padding-bottom: 8px;">
                       <input type="file" name="uploadfile_excel" id="uploadfile_excel">
                   </div>
               </div>
               <table>
                    <tr>
                        <td colspan="2"><strong>Chuỗi an ninh</strong> <strong style="color: red">*</strong></td>
                    </tr>
                    <tr>
                        <td align="">
                            <span id="capchar">{capchar}</span>
                        </td>
                        <td>
                            <input type="text" name="S_CAPCHAR" value="" required placeholder="Xác nhận chuỗi an ninh"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="cssRadius">			
                  <div align="center"> 
                      <input type="submit" onclick="this.disabled=true;this.value='Xin vui lòng chờ 1-2 phút...';this.form.submit();" class="btn btn-info startUpload" value="Tải thông tin kết quả xét nghiệm" style="padding:8px"/> 
                  </div>
             </div>  
        </form>
        </div>
    </td>
    <!-- END: kqxn -->
    <!-- BEGIN: all -->
    <td valign="top" width="{width}">
    	<div class="boxupdate">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="1" name="savetest"/>
            <div class="cssRadiusTop">
                <h2 style="font-size: 16px; text-transform:uppercase ">
                    <strong style="color:#36C">Nhập thông tin mẫu bệnh phẩm và KQXN</strong>
                </h2>   
                <p>
                    Giới hạn mỗi lần upload tối đa <strong>1000 trường hợp</strong>, điền đầy đủ thông tin vào các trường thông tin bên dưới. 
                    Trân trọng cảm ơn!<br/> <strong style="color: red">Chú ý: Các trường đánh dấu * là bắt buộc</strong> 
                </p>
                <!-- BEGIN: error -->
                <p>
                    <strong style="color: red">{error}</strong>
                </p>
                <!-- END: error -->
            </div>
            <div class="cssRadius">
               <div>
                   <p>File *.xls hoặc *.xlsx thông tin mẫu bệnh phẩm và KQXN<strong style="color: red">*</strong></p>
                   <div style="padding-bottom: 8px;">
                       <input type="file" name="uploadfile_excel" id="uploadfile_excel">
                   </div>
               </div>
               <table>
                    <tr>
                        <td colspan="2"><strong>Mã xác nhận</strong> <strong style="color: red">*</strong></td>
                    </tr>
                    <tr>
                        <td align="">
                            <span id="capchar">{capchar}</span>
                        </td>
                        <td>
                            <input type="text" name="S_CAPCHAR" value="" required placeholder="Xác nhận chuỗi an ninh"/>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="cssRadius">			
                  <div align="center"> 
                      <input type="submit" onclick="this.disabled=true;this.value='Xin vui lòng chờ 1-2 phút...';this.form.submit();" class="btn btn-info startUpload" value="Tải thông tin mẫu bệnh phẩm và KQXN" style="padding:8px"/> 
                  </div>
             </div>  
        </form>
        </div>
    </td>
    <!-- END: all -->
    <td></td>
</tr>
</table>

<script>
$(".chosen-select").chosen({
	allow_single_deselect: true,
	width: '230px',
	no_results_text: "Không tìm thấy kết quả :"
});
$(function () {
	$("#uploadfile_excel").change(function () {
        var filepath = $("#uploadfile_excel").val();
		var endf = $("#uploadfile_excel").val().split('.').pop().toLowerCase();
		if ( endf != 'xlsx' && endf != 'xls' )
		{
			alert("Only formats are allowed *.xlsx *.xls" );
			$("#uploadfile_excel").val("");	  
		}
    });
});
</script>
<!-- END: main -->