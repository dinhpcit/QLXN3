function reFresh()
{
	location.reload(true);
}
function save_data ()
{
	$('#iform').submit();
}
function save_cmt ()
{
	$('#cform').submit();
}
function save_next ()
{
	$('#savenext').val(1);
	$('#iform').submit();
}
function next (id,ck)
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=attend&id='+id+'&ck='+ck;
	return false;
}
function delete_regis(id,pid,sid)
{
	if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn nội dung này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=list&ac=del&id='+id+'&pid='+pid+'&sid='+sid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function select_other (id,oid)
{
	var vl = $('#'+id).val();
	$('#'+oid).val(vl);
	$("#"+oid).prop("checked", true); 
}
function search_regis()
{
	var year = $('#id_year').val();
	var pid = $('#idp').val();
	var cid = $('#cate').val();
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=list&pid='+pid+'&year='+year+'&cid='+cid+'&ck='+md5(cid);
	return false;
}
function search_regis_pos()
{
	var year = $('#id_year').val();
	var pid = $('#idp').val();
	var cid = $('#cate').val();
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=listp&pid='+pid+'&year='+year+'&cid='+cid+'&ck='+md5(cid);
	return false;
}
function search_program()
{
	var year = $('#id_year').val();
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&year='+year;
	return false;
}
function send_review()
{
	$('#send').val(1);
	$('#iform').submit();
}
function remove_abstract(id,ck,alink)
{
	if (confirm("Do you want to delete this Abstract "))
	{
		$.ajax({	
			type: 'GET',
			url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=submit&ac=del&ab='+id+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.href = alink;
			}
		});
	}
	return false;
}
function remove_hotel(id,ck,alink)
{
	if (confirm("Do you want to delete this Hotel "))
	{
		$.ajax({	
			type: 'GET',
			url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=hotel&ac=del&hid='+id+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.href = alink;
			}
		});
	}
	return false;
}
function view_review(id,ck)
{
	var w = 900 ; 
	var h = 600 ;
	var url = site_url + 'index.php?'+ module_var + '=review&' + func_var + '=view&id='+id+'&ck='+ck;
	PopupCenter (url,'view',w,h);
}
function view_his(id)
{
	var w = 900 ; 
	var h = 600 ;
	var url = site_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '=his&id='+id;
	PopupCenter (url,'view',w,h);
}