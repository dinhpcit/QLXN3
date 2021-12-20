<!-- BEGIN: main -->
<div class="cregis">
    <!-- BEGIN: form -->
    <p class="head_text"><strong>Sign-up/Đăng ký</strong></p>
    <p><strong>Tài khoản này sẽ được sử dụng về sau/ Your account will be used next time</strong></p>
    <p>Fill in all the fields marked <span class="mark">(*)</span>/ Điền thông tin vào tất cả các trường được đánh dấu <span class="mark">(*)</span>.</p>
    <form action="" method="post">
        <input type="hidden" value="1" name="save"/>
        <table width="100%" class="nlist">    
            <!-- BEGIN: error -->
            <tr>
                <td colspan="2"><span class="cl_error">{error}</span></td>
            </tr>
            <!-- END: error -->
            <tr>
                <td width="250"><strong>E-mail/</strong> Email truy cập: <span class="mark">(*)</span></td>
                <td><input type="text" name="S_EMAIL" value="{DATA.S_EMAIL}" style="width:220px; border:1px solid #CCC; padding:5px " required/></td>
            </tr>
            <tr>
                <td><strong>Re-enter E-mail/</strong> Nhập lại email: <span class="mark">(*)</span></td>
                <td><input type="text" name="S_AEMAIL" value="{DATA.S_AEMAIL}" style="width:220px; border:1px solid #CCC; padding:5px " required/></td>
            </tr>
            <tr>
                <td><strong>Password/</strong> Mật khẩu: <span class="mark">(*)</span></td>
                <td>
                    <input type="password" name="S_PASSWORD" value="" style="width:220px; border:1px solid #CCC; padding:5px " required/>
                </td>
            </tr>
            <tr>
                <td><strong>Re-enter Password/</strong> Nhập lại mật khẩu: <span class="mark">(*)</span></td>
                <td>
                    <input type="password" name="S_PASSWORD_AGAIN" value="" style="width:220px; border:1px solid #CCC; padding:5px " required/>
                </td>
            </tr>
            <tr>
                <td><strong>Captcha/</strong> Chuỗi an ninh:</td>
                <td>
                    <span id="capchar">{capchar}</span>
                </td>
            </tr>
            <tr>
                <td><strong>Enter Captcha/</strong> Nhập chuỗi an ninh <span class="mark">(*)</span></td>
                <td>
                    <input type="text" name="S_CAPCHAR" value="" style="width:50%; border:1px solid #CCC; padding:5px " required/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" class="bgbt" value="Sign-up/Đăng ký tài khoản" />
                    <input class="bgbtr" type="reset" value="Clear/Làm mới" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1">Sign-in/Đăng nhập</a>
                </td>
            </tr>
        </table>
    </form>
    <!-- END: form -->
    <!-- BEGIN: complate -->
    <div style="padding:20px" align="center">
        You have registered successfully!<br /> We have sent an account activation email to your email: <a href="mailto:{DATA.S_EMAIL}">{DATA.S_EMAIL}</a>. If you do not receive an email in Inbox, please check the Junk or Spam folder.<br />
        <a href="{DF_BASE_SITEURL}">Back to Sign-in page</a><br /><br />
		
        Quý vị đã đăng ký thành công!<br />
		Chúng tôi đã gửi một thư kích hoạt tài khoản đến email: <a href="mailto:{DATA.S_EMAIL}">{DATA.S_EMAIL}</a>.<br />
		Nếu Quý vị không nhận được email này trong mục Inbox, vui lòng kiểm tra  trong mục Junk or Spam.<br />
        <a href="{DF_BASE_SITEURL}"><strong>Quay lại trang đăng nhập</strong></a>
    </div>
    <!-- END: complate -->
</div>
<script>
	$.validator.addMethod("valueNotEquals", function(value, element, arg){return arg != value;}, "This field is required.");
	$("#iform").validate();
</script> 
<!-- END: main -->