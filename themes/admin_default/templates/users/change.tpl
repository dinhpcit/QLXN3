<!-- BEGIN: main -->
<div class="clearfix" style="padding:30px">
    <p>Bạn phải điền thông tin vào tất cả các trường được đánh dấu (*).</p>
    <form action="" method="post">
        <input type="hidden" value="1" name="save"/>
        <table width="100%">
            <tr>
                <td colspan="2"><strong class="cl_title_green14">Đổi mật khẩu tài khoản:</strong>
            </td>    
            <!-- BEGIN: error -->
            <tr>
                <td colspan="2"><span class="cl_error" style="color: red">{error}</span></td>
            </tr>
            <!-- END: error -->
            <tr>
                <td>Mật khẩu cũ (*)</td>
                <td>
                	<input type="password" name="S_OPASSWORD" value="" style="width:300px; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td>Mật khẩu (*)</td>
                <td>
                    <input type="password" name="S_PASSWORD" value="" style="width:300px; border:1px solid #CCC; padding:5px " />
                    (Tối thiểu 6 ký tự)
                </td>
            </tr>
            <tr>
                <td>Nhập lại mật khẩu (*)</td>
                <td>
                    <input type="password" name="S_PASSWORD_AGAIN" value="" style="width:300px; border:1px solid #CCC; padding:5px " />
                    (Tối thiểu 6 ký tự)
                </td>
            </tr>
            <tr>
                <td>Chuỗi an ninh</td>
                <td>
                    <span id="capchar">{capchar}</span>
                </td>
            </tr>
            <tr>
                <td>Nhập chuỗi an ninh (*)</td>
                <td>
                    <input type="text" name="S_CAPCHAR" value="" style="width:50%; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td align="center" colspan="2">
                    <br /><input type="submit" class="bgbt" value="Đổi mật khẩu" />
                    <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_ADMINURL}'" value="Quay lại trang chủ" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!-- END: main -->