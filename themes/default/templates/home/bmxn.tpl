<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css"  href="{DF_BASE_SITEURL}includes/js/chosen/chosen.css">
<script src="{DF_BASE_SITEURL}includes/js/chosen/chosen.jquery.js" type="text/javascript"></script>
<div style="max-width:650px; margin:auto">
<form action="" method="post" enctype="multipart/form-data">
<input type="hidden" value="1" name="save"/>
	<div class="cssRadiusTop">
        <h2 style="font-size: 20px; text-transform:uppercase ">
            <strong>Nhập dữ liệu xét nghiệm</strong>
        </h2>   
        <p>
            <p>Tải file excel dữ liệu xét nghiệm BMXN mẫu <a href="{mlink}" style="color: #006BFD" target="_blank">tại đây</a> <strong style="color: red">*</strong></p>
            Giới hạn mỗi lần upload tối đa <strong>1000 trường hợp</strong>, điền đầy đủ thông tin vào các trường thông tin bên dưới. 
            <br/>Trân trọng cảm ơn!<br/> 
            <strong style="color: red">Chú ý: Các trường đánh dấu * là bắt buộc</strong> 
        </p>
    </div>
    <!-- BEGIN: error -->
    <div class="cssRadius">
        <strong style="color: red">{error}</strong>
    </div>
    <!-- END: error -->
    <div class="cssRadius">
       <table width="100%">
       <tr>
            <td width="50%">
               <p>File *.xls hoặc *.xlsx dữ liệu BMXN <strong style="color: red">*</strong></p>
               <div style="padding-bottom: 8px;">
                   <input type="file" name="uploadfile_excel" id="uploadfile_excel">
               </div>
            </td>
            <td>
            	<p>Đơn vị nhận mẫu xét nghiệm <strong style="color: red">*</strong></p>
                <div style="padding-bottom: 8px;">
           		<select name="labcode" id="labcode" class="chosen-select">
					<option value="0">Chọn đơn vị nhận mẫu</option>
					<!-- BEGIN: donvi -->
					<option value="{ROW.s_id}" {ROW.select}>{ROW.s_name}</option>
					<!-- END: donvi -->
				</select>
                </div>
             </td>   
       </tr>
       </table>
    </div>
   <div class="cssRadius">
   <table>
        <tr>
            <td colspan="2"><strong>Chuỗi an ninh</strong> <strong style="color: red">*</strong></td>
        </tr>
        <tr>
            <td align="">
                <span id="capchar">{capchar}</span>
            </td>
            <td>
                <input type="text" name="S_CAPCHAR" value="" required placeholder="Câu trả lời của bạn"/>
            </td>
        </tr>
    </table>
    </div>
	<div class="cssRadius">			
		  <div align="center"> 
			  <input type="submit" onclick="this.disabled=true;this.value='Xin vui lòng chờ 1-2 phút...';this.form.submit();" class="btn btn-info startUpload" value="Tải dữ liệu BMXN xét nghiệm" style="padding:8px" /> 
		  </div>
	 </div>  
</form>
</div>
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