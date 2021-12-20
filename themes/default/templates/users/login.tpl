<!-- BEGIN: beg -->
<div class="div_login">
    <center><strong style="font-size:15px">
    </strong></center>
    <div style="padding:20px" align="center">
        <span style="display:inline-block; width:180px;; border:1px solid #CCC; padding:10px; text-align:center">
            <a href="{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1">
            <img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/signin.png" /></a><br /> 
            Đã có tài khoản? <br />
            <strong><a href="{DF_BASE_SITEURL}index.php?mod=users&fun=login&begin=1">Đăng nhập</a></strong>
        </span>
    </div>
</div> 
<!-- END: beg -->
<!-- BEGIN: main -->
<div class="div_login">
	<div class="div_login_border">
        <div class="clogin_head">
            Đăng nhập hệ thống
        </div>
        <div class="clogin">
            <form method="post" action="">
            <input type="hidden" name="post" value="1" />
                <table width="100%">
                   <!-- BEGIN: error -->
                    <tr>
                        <td colspan="3" align="center"><p style="color:#900">Lỗi: Email hoặc mật khẩu không đúng.</p></td>
                   </tr>
                   <!-- END: error -->
                    <tr>
                        <td style="padding-top:10px">
                            <input name="username" class="form-control" type="text" placeholder="Tên đăng nhập" id="txtEmail" maxlength="100" style="width:100%; padding:8px"/>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:10px">
                            <input name="password" class="form-control" type="password" placeholder="Mật khẩu" id="txtPassword" maxlength="100" style="width:100%; padding:8px"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:10px">
                            <input name="bt" class="btn btn-primary" type="submit" value="Đăng nhập" style="padding:8px"/>&nbsp;&nbsp;
                            <input name="rs" class="btn" type="reset" value="Làm mới" style="padding:8px"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:10px">
                        
                            <a href="{DF_BASE_SITEURL}index.php?mod=users&fun=forgot">Quên mật khẩu?</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    	</div>
</div>
<!-- END: main -->