function del_publication(id,ck)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'POST',
			url: site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=publication&ac=del&pid='+id+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.reload(true);
			}
		});
	}
}

function formreset()
{
	$('#iform').submit();
}

function view_profile(view,print,pdf)
{
	var w = 800 ; 
	var h = 600 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=outfile&view='+view+'&print='+print+'&pdf='+pdf;
	PopupCenter (url,'view_profile',w,h);
}

function save_next ()
{
	$('#savenext').val(1);
	$('#iform').submit();
}

function add_lang(sid)
{
	var w = 900 ; 
	var h = 380 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=lang&sid='+sid;
	PopupCenter (url,'lang',w,h);
}
function edit_lang(id,ck)
{
	var w = 900 ; 
	var h = 380 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=lang&id='+id+'&ck='+ck;
	PopupCenter (url,'editlang',w,h);
}
function del_lang(id,ck)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'POST',
			url: site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=lang&ac=del&id='+id+'&ck='+ck,
			data:'',
			success: function(data){
				$('#iform').submit();
			}
		});
	}
}
function add_work(sid)
{
	var w = 750 ; 
	var h = 380 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=work&sid='+sid;
	PopupCenter (url,'lang',w,h);
}
function edit_work(id,ck)
{
	var w = 750 ; 
	var h = 380 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=work&id='+id+'&ck='+ck;
	PopupCenter (url,'editlang',w,h);
}
function del_work(id,ck)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'POST',
			url: site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=work&ac=del&id='+id+'&ck='+ck,
			data:'',
			success: function(data){
				$('#iform').submit();
			}
		});
	}
}
function search_profile()
{
	var mabn = $('#mabn').val();
	var hoten = $('#hoten').val();
	var ngaylm = $('#ngaylm').val();
	var ngaykq = $('#ngaykq').val();
	var s_email = $('#s_email').val();
	var phanloai = $('#phanloai').val();
	var status = $('#status').val();
	var tinhthanh = $('#tinhthanh').val();
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=mcb&mabn='+mabn+'&hoten='+hoten+'&ngaylm='+ngaylm+'&ngaykq='+ngaykq+'&phanloai='+phanloai+'&status='+status+'&tinhthanh='+tinhthanh;
	return false;
}