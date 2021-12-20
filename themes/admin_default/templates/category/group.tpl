<!-- BEGIN: main -->
<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px; background:#EEE">
    <tbody>
        <tr><td>
           <span class="menu_cate"> <a class="gray mytab" href="{link_noinhiem}" data-toggle="tab">Nơi nghi ngờ nhiễm bệnh</a> </span>
           <span class="menu_cate_active"> <a class="gray mytab" href="{link_group}" data-toggle="tab">Nhóm tiếp xúc</a> </span>
           <span class="menu_cate"> <a class="gray mytab" href="{link_kcn}" data-toggle="tab">Khu công nghiệp</a> </span>
           <span class="menu_cate"> <a class="gray mytab" href="{link_job}" data-toggle="tab">Nghề nghiệp</a> </span>
           <span class="menu_cate"> <a class="gray mytab" href="{link_hospital}" data-toggle="tab">Bệnh viện điều trị</a></span>
           <span class="menu_cate"> <a class="gray mytab" href="{link_type}" data-toggle="tab">Phân loại tiếp xúc</a> </span>
        </td></tr>
	</tbody> 
</table>

<table width="100%" style="border-bottom:#CCC 1px solid; padding:3px;">
    <tbody>
       <tr>
           <td> 
            <input onclick="radio_del()" type="radio" class="invalid" id="invalid_10" name="invalid_1" value="0" {radio_del0}> <label for="invalid_10"> Đang sử sụng</label>&emsp;&emsp;
            <input onclick="radio_del()" type="radio" class="invalid" id="invalid_11" name="invalid_1" value="1" {radio_del1}> <label for="invalid_11"> Đã xóa</label>
            <span style="float:right">
            	{page_html}
            </span>
           </td>
           <td></td>
           <td width="450"></td>
       </tr>
       <tr>
           <td valign="top"> 
            <table class="list">
              <thead>
                 <tr>
                    <td width="50" align="center">TT</td>
                    <td>Tiêu đề/ tên/ nội dung</th>
                    <td width="80" align="center">Thao tác</td>
                 </tr>
              </thead>
              <tbody>
              <!-- BEGIN: loop -->
                 <tr>
                    <td class="tc stt" align="center">{ROW.no}</td>
                    <td class="tl word-wrap">{ROW.title}</td>
                    <td class="tc" align="center">
                        <a class="edit_custom_field" href="{ROW.edit}"><i class="fa fa-pencil"></i></a>
                        <!-- BEGIN: del -->
                        &nbsp;&nbsp;
                        <a class="edit_custom_field" href="javascript:void(0)" onclick="delete_colum('{ROW.id}','{ROW.ck}','group')">
                        <i class="fa fa-trash" aria-hidden="true"></i></a>
                        <!-- END: del -->
                        <!-- BEGIN: reto -->
                        &nbsp;&nbsp;
                        <a class="edit_custom_field" href="javascript:void(0)" onclick="reto_colum('{ROW.id}','{ROW.ck}','group')">
                        <i class="fa fa-refresh" aria-hidden="true"></i></a>
                        <!-- END: reto -->
                    </td>
                 </tr>
              <!-- END: loop -->
              </tbody>
            </table>
           </td>
           <td></td>
           <td valign="top">
           		<form action="" method="post" enctype="multipart/form-data" id="iform">
                    <input type="hidden" value="1" name="save">
                    <div style="padding:10px; border:10px solid #EEE">
                       <div class="bold pt10 pb10 bor-bot" id="title_form" style="margin-bottom:10px; padding-bottom:5px">Cập nhật thông tin</div>
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
                             <p>Tiêu đề<span class="red"> (*)</span></p>
                             <div class="controls"> <input type="text" name="title" class="form-control" value="{DATA.title}"> </div>
                          </div>
                       </div>
                       <div class="mt10"> 
                           <a class="btn btn-info" href="javascript:void(0);" id="save_custom_field" onclick="$('#iform').submit()">Ghi dữ liệu</a>
                           <a class="btn btn-default" href="javascript:void(0);" onclick="javascript:window.location.href='{link_group}'">Hủy</a>
                       </div>
                    </div>
                </form>
           </td>
       </tr>
    </tbody>
</table>   
<script type="text/javascript">
    function radio_del() {
		var lastSelected = $('[name="invalid_1"]:checked').val();
        window.location.href = '{link_cdel}' + lastSelected;    
	}
</script>           
<!-- END: main -->