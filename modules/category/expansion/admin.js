
function delete_colum(cid,ck,fn)
{
	if (confirm("Bạn có chắc chắn muốn xóa thuộc tính này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '='+fn+'&ac=del&id='+cid+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function reto_colum(cid,ck,fn)
{
	if (confirm("Bạn có chắc chắn muốn phục hồi thuộc tính này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + 'index.php?'+ module_var + '=' + module + '&' + func_var + '='+fn+'&ac=reto&id='+cid+'&ck='+ck,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}

function clickcheckall(){
	$("#checkall").change(function () {
      $("input:checkbox").prop('checked', $(this).prop("checked"));
  });
}