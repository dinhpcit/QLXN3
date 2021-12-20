function deleta_waiter(sid)
{
	if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=users&del=1&sid='+sid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}

function delete_mod(uid)
{
	if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn tài khoản này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=mod&del=1&uid='+uid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function delete_cate(cid)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=cate&del=1&cid='+cid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function add_mod()
{
	var w = 600 ; 
	var h = 420 ;
	var url = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=addmod';
	PopupCenter (url,'add_mod',w,h);
}

function edit_mod(uid,ck)
{
	var w = 600 ; 
	var h = 420 ;
	var url = site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=addmod&uid='+uid+'&ck='+ck;
	PopupCenter (url,'edit_mod',w,h);
}

function formreset()
{
	window.location.reload();
}