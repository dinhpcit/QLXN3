function add_exp(sid)
{
	if (confirm("Bạn có chắc chắn muốn thêm người này vào danh sách chuyên gia?"))
	{
		$.ajax({	
			type: 'POST',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=edit&ac=exp&sid='+sid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function del_profile(sid,ck)
{
	if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này?"))
	{
		$.ajax({	
			type: 'POST',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=edit&ac=del&sid='+sid+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}

function formreset()
{
	window.location.reload();
}

function view_profile(view,print,pdf,sid)
{
	var w = 800 ; 
	var h = 600 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=outfile&sid='+sid+'&view='+view+'&print='+print+'&pdf='+pdf;
	PopupCenter (url,'view',w,h);
}

function export_profile()
{
	window.location.href = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=main&ac=export';
}
function export_table6()
{
	var w = 400 ; 
	var h = 600 ;
	var url = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=export&ac=6';
	PopupCenter (url,'export',w,h);
}
function edit_profile(sid,ck)
{
	var w = 800 ; 
	var h = 600 ;
	var url = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=edit&sid='+sid+'&ck='+ck;
	PopupCenter (url,'edit',w,h);
}

function add_profile()
{
	var w = 800 ; 
	var h = 600 ;
	var url = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=add';
	PopupCenter (url,'add',w,h);
}

function search_profile()
{
	var s_field = $('#s_field').val();
	var s_name = $('#s_name').val();
	var middle_name = $('#s_middle_name').val();
	var family_name = $('#s_family_name').val();
	var s_email = $('#s_email').val();
	var s_current = $('#s_current').val();
	window.location.href = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=main&s_field='+s_field+'&s_name='+s_name+'&middle_name='+middle_name+'&family_name='+family_name+'&s_email='+s_email+'&s_current='+s_current;
	return false;
}