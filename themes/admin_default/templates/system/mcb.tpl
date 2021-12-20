<!-- BEGIN: main -->
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px; background:#EEE">
    <tbody>
        <tr><td>
        <strong>Thiết lập mã khởi lập của mã số ca bệnh</strong>
        </td></tr>
	</tbody> 
</table>   
<table width="100%" style="padding:10px">
    <tbody>
        <tr><td align="center">
        	<div style="border:1px solid #CCC; width:300px; margin:auto; padding:50px; border-radius:10px">
                <h2 style="color:#F00">Mã khởi lập mã ca bệnh là: <strong>{DATA.value}</strong></h2>
                <p><strong>Thay đổi mã khởi lập</strong></p>
                <form action="" method="post" enctype="multipart/form-data" id="iform">
                    <input type="hidden" value="1" name="save">
                    <div>
                       <!-- BEGIN: error -->
                        <div>
                            <div class="padding5-10">
                                <p>
                                    <strong style="color:#900">{error}</strong>
                                </p>
                            </div>
                       </div>
                       <!-- END: error -->
                       <div>
                          <div class="padding5-10">
                             <div class="controls"> <input type="text" name="value" style="text-align:center" value="{DATA.value}"> </div>
                          </div>
                       </div>
                       <div class="mt10"> 
                           <input type="submit" value="Ghi dữ liệu" />
                           <input type="reset" value="Làm mới" />
                       </div>
                    </div>
                </form>	
                <br />
                <p style="color:#F00">
                	<em>Chú ý:</em> không được thay đổi thông số này tùy tiện, nó sẽ ảnh hưởng đến toàn bộ mã ca bệnh  của hệ thống 
                </p>
            </div>
        </td></tr>
	</tbody> 
</table>  
<!-- END: main -->