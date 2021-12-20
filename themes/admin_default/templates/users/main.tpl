<!-- BEGIN: main -->
<div style="width:500px; border-right:1px solid #b8c4cd">
<table class="list">
<thead>
	<tr>
    	<td>
        	<strong>Thông tin người dùng</strong>
        </td>    
    </tr>
</thead>
</table>
<table class="list">
<tbody>
	<tr>
    	<td width="120" align="center">
        	<img src="{DF_BASE_SITEURL}themes/{TEMPLATE}/images/default_user.png" width="100" style="border:1px solid #F4F4F4; padding:2px" />
        </td>
        <td valign="top">
       		<ul>
            <li>Tên truy cập: <strong>{USER.username}</strong></li> 
            <li>Họ và tên: {USER.first_name} {USER.last_name}</li> 
            <li>Email: <a href="mailto:{USER.email}">{USER.email}</a></li> 
            <li><a href="#">Đổi hình đại diện</a></li> 
            <li>Đăng nhập lần cuối : <span style="color:#900">{USER.lasttime_tem}</span></li> 
            <li><a href="javascript:void(0)" onclick="openlogs ()">Xem lịch sử truy cập</a></li> 
            </ul>
        </td>
    </tr>
</tbody>
</table>
<form action="" method="post" name="finfor">
<input type="hidden" value="1" name="infor" />
<table class="list">
<tbody>
	<tr>
    	<td width="80" align="right">Họ tên</td>
        <td>
        	<input type="text" name="first_name" value="{USER.first_name}" />
            <input type="text" name="last_name" value="{USER.last_name}" />
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right">Email</td>
        <td>
        	<input type="text" name="email" value="{USER.email}" style="width:98%" />
        </td>
    </tr>
</tbody>
<tbody>
	<tr>
    	<td align="right">Số điện thoại</td>
        <td>
        	<input type="text" name="phone" value="{USER.phone}" style="width:100px" />
            Giới tính 
            <select name="sex" class="control_select">
            	<option value="0">Nữ</option>
                <option value="1">Nam</option>
            </select>
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right" valign="top">Địa chỉ</td>
        <td>
        	<textarea style="width:98%; height:30px" name="address">{USER.address}</textarea>
        </td>
    </tr>
</tbody>
<tbody>
	<tr>
    	<td align="right">Phòng ban</td>
        <td>
        	<input type="text" name="room" value="{USER.room}" style="width:98%" />
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right">Chức vụ</td>
        <td>
        	<input type="text" name="position" value="{USER.position}" style="width:98%" />
        </td>
    </tr>
</tbody>
<tbody>
	<tr>
    	<td align="right">Học hàm/học vị</td>
        <td>
        	<input type="text" name="title" value="{USER.title}" style="width:98%" />
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right" valign="top">Ghi chú</td>
        <td>
        	<textarea style="width:98%; height:40px" name="note">{USER.note}</textarea>
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right" valign="top" colspan="2">
        <input type="submit" value="Lưu thay đổi" class="control_button"/>
        </td>
    </tr>
</tbody>
</table>
</form>
<table class="list">
<thead>
	<tr>
    	<td>
        	<strong>Đổi mật khẩu</strong> 
        </td>    
    </tr>
</thead>
</table>
<form action="" name="fpass" method="post">
<input type="hidden" value="1" name="pass" />
<table class="list">
<!-- BEGIN: error -->
<tbody>
	<tr>
    	<td colspan="2"><span style="color:#900">{msg}</span></td>
    </tr>
</tbody>
<!-- END: error -->
<tbody class="second">
	<tr>
    	<td align="right" width="140">Mật khẩu mới</td>
        <td>
        	<input type="password" name="password" value="" style="width:50%" />
        </td>
    </tr>
</tbody>
<tbody>
	<tr>
    	<td align="right">Nhập lại mật khẩu mới</td>
        <td>
        	<input type="password" name="apassword" value="" style="width:50%" />
        </td>
    </tr>
</tbody>
<tbody class="second">
	<tr>
    	<td align="right" valign="top" colspan="2">
        <input type="submit" value="Lưu thay đổi" class="control_button"/>
        </td>
    </tr>
</tbody>
</table>
</form>
</div>
<!-- END: main -->