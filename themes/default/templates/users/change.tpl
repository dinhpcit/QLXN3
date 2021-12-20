<!-- BEGIN: main -->
<div class="div_change_border">
	<div class="clogin_head">
       Đổi mật khẩu tài khoản
    </div>
    <div class="clogin">
    <form action="" method="post">
        <input type="hidden" value="1" name="save"/>
        <table width="100%">
            <tr>
                <td colspan="2">
                    <p>Trường đánh dấu <span class="mark">(*)</span> là bắt buộc</p>
            	</td>    
            </tr>
            <!-- BEGIN: error -->
            <tr>
                <td colspan="2"><span class="cl_error">{error}</span></td>
            </tr>
            <!-- END: error -->
            <tr>
                <td width="300"><strong>Mật khẩu cũ</strong><span class="mark">(*)</span></td>
                <td>
                	<input type="password" name="S_OPASSWORD" value="" style="width:200px; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td><strong>Mật khẩu mới</strong> <span class="mark">(*)</span></td>
                <td>
                    <input type="password" name="S_PASSWORD" value="" style="width:200px; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td><strong>Nhập lại mật khẩu mới</strong> <span class="mark">(*)</span></td>
                <td>
                    <input type="password" name="S_PASSWORD_AGAIN" value="" style="width:200px; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td><strong>Chuỗi an ninh</strong>  </td>
                <td>
                    <span id="capchar">{capchar}</span>
                </td>
            </tr>
            <tr>
                <td><strong>Nhập chuỗi an ninh</strong> <span class="mark">(*)</span></td>
                <td>
                    <input type="text" name="S_CAPCHAR" value="" style="width:50%; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <br /><input type="submit" class="bgbt" value="Đổi mật khẩu" />
                    <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}'" value="Quay lại trang chủ" />
                </td>
            </tr>
        </table>
    </form>
    </div>
</div>
<!-- END: main -->