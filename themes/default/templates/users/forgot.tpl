<!-- BEGIN: main -->
<div class="cregis">
    <!-- BEGIN: form -->
    <p class="head_text"><strong>Quên mật khẩu?</strong></p>
    <p>Bạn phải điền thông tin vào tất cả các trường được đánh dấu <span class="mark">(*)</span>.</p>
    <form action="" method="post">
        <input type="hidden" value="1" name="save"/>
        <table width="100%" class="nlist">
            <!-- BEGIN: error -->
            <tr>
                <td colspan="2"><span class="cl_error">{error}</span></td>
            </tr>
            <!-- END: error -->
            <tr>
                <td width="150">Email truy cập <span class="mark">(*)</span></td>
                <td><input type="text" name="s_email" value="{DATA.s_email}" style="width:220px; border:1px solid #CCC; padding:5px " /> </td>
            </tr>
            <tr>
                <td>Chuỗi an ninh: </td>
                <td>
                    <span id="capchar">{capchar}</span>
                </td>
            </tr>
            <tr>
                <td>Nhập chuỗi an ninh <span class="mark">(*)</span></td>
                <td>
                    <input type="text" name="S_CAPCHAR" value="" style="width:200px; border:1px solid #CCC; padding:5px " />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" class="bgbt" value="Lấy lại mật khẩu" />
                    <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1'" value="Đăng nhập" />
                </td>
            </tr>
        </table>
    </form>
    <!-- END: form -->
    <!-- BEGIN: complate -->
    <div style="padding:20px">Your password recovery request has been sent to your email: <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.<br /><br />Yêu cầu thay đổi mật khẩu đã được gửi tới địa chỉ thư điện tử: <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.</div>
    <center>
        <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1'" value="Quay lại trang đăng nhập" />
    </center>    
    <!-- END: complate --> 
    <!-- BEGIN: forgot -->
    <div style="padding:20px">We have sent a new access password Email: <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.<br />Chúng tôi đã gửi một mật khẩu truy cập mới Email: <a href="mailto:{DATA.s_email}">{DATA.s_email}</a>.</div>
    <center>
        <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1'" value="Quay lại trang đăng nhập" />
    </center>    
    <!-- END: forgot --> 
    <!-- BEGIN: noforgot -->
    <div style="padding:20px">Thao tác này không còn thực hiện được nữa.</div>
    <center>
        <input class="bgbtr" type="button" onclick="window.location.href='{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1'" value="Quay lại trang đăng nhập" />
    </center>    
    <!-- END: noforgot --> 
</div>
<!-- END: main -->