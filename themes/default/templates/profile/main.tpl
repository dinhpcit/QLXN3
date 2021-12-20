<!-- BEGIN: main -->
<script>
$(function() {
	$( ".datepicker" ).datepicker({ dateFormat: 'dd/mm/yy' });
});
</script>
<div class="div_full">
<table width="100%">
<tr>
    <td valign="top">
		<p style="margin-top:10px"><a href="{DF_BASE_SITEURL}?mod=users&fun=change"><i class="fa fa-key"></i> <strong>Đổi mật khẩu</strong></a></p>
	</td>
	<td valign="top">
        <div class="dcontent" style="border-left:1px solid #EBEBEB; padding-left:20px">
            <form method="post" action="" enctype="multipart/form-data" id="iform">
            <input type="hidden" name="save" value="1" />
            <input type="hidden" name="savenext" value="0" id="savenext" />
                <table width="100%" class="nlist">
					<tr>
						<td  width="200">Tên người dùng hoặc đơn vị <span class="mark">(*)</span></td>
						<td align="left">
							<input type="text" class="form-control" name="s_name" style="width:300px" value="{DATA.s_name}" required> 
						</td>
					</tr>
                    
                    <tr>
                        <td>Thư điện tử <span class="mark">(*)</span></td>
                        <td align="left">
                            <input name="s_email" class="form-control" type="text" value="{DATA.s_email}" style="width:200px" disabled="disabled">
                        </td>
                    </tr>
                    <tr>
                        <td>Số điện thoại</td>
                        <td>
                            <input type="text" style="width:200px" class="form-control" value="{DATA.s_cellphone}" name="s_cellphone"/>
                        </td>
                    </tr>
                    <tbody class="second">
                    <tr>
                        <td>Địa chỉ <span class="mark">(*)</span></td>
                        <td>
                        <input type="text" style="width:300px;margin-right: 5px" class="form-control" name="s_home_address" value="{DATA.s_home_address}" placeholder="Địa chỉ" required>
                        </td>
                    </tr> 
                    <tr>
                        <td></td>
                        <td>
                            
                            <input type="text" style="width:200px;margin-right: 5px" class="form-control fl" name="s_ad_city" value="{DATA.s_ad_city}" placeholder="Phường/ Xã" required>
                            <input type="text" style="width:200px;margin-right: 5px" class="form-control fl" name="s_ad_state" value="{DATA.s_ad_state}" placeholder="Quận/ Huyện">
                            <input type="text" style="width:200px" class="form-control fl" name="s_ad_province" value="{DATA.s_ad_province}" placeholder="Tỉnh/ TP">
                        </td>
                    </tr>  
					<tr>
                        <td>Mã xác nhận</td>
                        <td>
                            
                        </td>
                    </tr>
                    </tbody>
                    
                    <tbody class="second">
                    <tr>
                        <td></td>
                        <td >
                            <p style="margin-top:10px">   
                            <input name="bt" type="submit" value="Save/ Ghi dữ liệu">&nbsp;&nbsp;&nbsp;
                            <!--<input name="bt" type="button" value="Next/ Tiếp tục" onclick="save_next();">&nbsp;&nbsp;&nbsp;-->
                            Thông tin có dấu <span class="mark">(*)</span> là bắt buộc
                            </p>
							
                        </td>
                    </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </td>
</tr>
</table>
</div>
<script>
$.validator.addMethod("valueNotEquals", function(value, element, arg){return arg != value;}, "This field is required.");
$("#iform").validate({rules: {
   s_gender: { valueNotEquals: "0" }
  }});
</script>
<!-- END: main -->

<tr>
	<td>Giới tính <span class="mark">(*)</span></td>
	<td>
		<select name="s_gender" required class="form-control" style="width:200px">
			<option value="0">Please select</option>
			<!-- BEGIN: bloop -->
			<option value="{GEN.code}" {GEN.select}>{GEN.name}</option>
			<!-- END: bloop -->
		</select> 
	</td>
</tr>
<tr>
	<td>Ngày sinh</td>
	<td align="left">
		<input name="s_birthdate" type="text" value="{DATA.s_birthdate}" style="width:200px" class="datepicker form-control">
	</td>
</tr>
<tbody>
	<tr>
		<td>Quốc gia <span class="mark">(*)</span></td>
		<td>
			<select name="s_ad_country" required class="form-control" style="width:200px">
				<option value="0">Vui lòng chọn</option>
				<!-- BEGIN: cloop -->
				<option value="{CON.title}" {CON.select}>{CON.title}</option>
				<!-- END: cloop -->
			</select>
		</td>
	</tr>
	<tr>
		<td>Postal Code</td>
		<td><input type="text" style="width:200px" class="form-control" name="s_ad_zipcode" value="{DATA.s_ad_zipcode}"></td>
	</tr>
</tbody>  