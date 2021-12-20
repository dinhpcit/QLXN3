
function delete_config(id)
{
	if (confirm("Bạn có chắc chắn muốn xóa vĩnh viễn nội dung này?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=config&ac=del&id='+id,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}

function export_file(tp)
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp='+tp;
}
function go_public()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=public';
}
function go_duplicate()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=duplicate';
}
function search_list()
{
	var year = $('#id_year').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&year='+year;
	return false;
}
function go_dellist()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=dellist';
}
function go_delbmxn()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=delbmxn';
}
function go_delkqxn()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=delkqxn';
}
function go_approve()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=accept';
}
function go_approveall()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=acceptlist';
}
function go_amove()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=amove';
}
function search_profile()
{
	var mabn = $('#mabn').val();
	var hoten = $('#hoten').val();
	var blm = $('#bngaylm').val();
	var elm = $('#engaylm').val();
	var bkq= $('#bngaykq').val();
	var ekq = $('#engaykq').val();
	var bcn = $('#bngaycn').val();
	var ecn = $('#engaycn').val();
	var kq = $('#id_kqxn').val();
	var qh = $('#quanhuyen').val();
	var dv = $('#donvilm').val();
	var xn = $('#donvixn').val();
	var tto = $('#tto').val();
	var mdv = $('#madonvi').val();
	var htlm = $('#htlm').val();
	var dtlm = $('#dtlm').val();
	var dd = $('#diadiem').val();
	var plm = $('#plm').val();
	var pxo = $('#pxo').val();
	var qho = $('#qho').val();
	var ppxn = $('#id_ppxn').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&mbn='+mabn+'&ht='+hoten+'&blm='+blm+'&elm='+elm+'&bkq='+bkq+'&ekq='+ekq+'&kq='+kq+'&qh='+qh+'&dv='+dv+'&xn='+xn+'&bcn='+bcn+'&ecn='+ecn+'&tto='+tto+'&mdv='+mdv+'&htlm='+htlm+'&dt='+dtlm+'&dd='+dd+'&plm='+plm+'&pxo='+pxo+'&qho='+qho+'&ppxn='+ppxn;
	return false;
}

function search_duplicate()
{
	var ngaylm = $('#bdate').val();
	var ngaykq = $('#edate').val();
	var phanloai = $('#id_phanloai').val();
	var tinhthanh = $('#tinhthanh').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=duplicate&bdate='+ngaylm+'&edate='+ngaykq+'&phanloai='+phanloai+'&tinhthanh='+tinhthanh;
	return false;
}

function search_trash()
{
    var mabn = $('#mabn').val();
	var hoten = $('#hoten').val();
	var ngaylm = $('#bdate').val();
	var ngaykq = $('#edate').val();
	var phanloai = $('#id_phanloai').val();
	var tinhthanh = $('#tinhthanh').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=trash&hoten='+hoten+'&bdate='+ngaylm+'&edate='+ngaykq;
	return false;
}
function search_public(id,ck)
{
	var phanloai = $('#id_phanloai').val();
	var tinhthanh = $('#tinhthanh').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=analytics&id='+id+'&ck='+ck+'&phanloai='+phanloai+'&thp='+tinhthanh;
	return false;
}
function search_public_text()
{
	var txt = $('#textq').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=public&q='+txt;
	return false;
}
function gostatistic()
{
	var cbegin = $('#code_begin').val();
	var cend = $('#code_end').val();
	var phanloai = $('#id_phanloai').val();
	var tinhthanh = $('#tinhthanh').val();
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=statistic&cbegin='+cbegin+'&cend='+cend+'&phanloai='+phanloai+'&thp='+tinhthanh;
	return false;
}
function order_list (type) 
{
	$.ajax({	
		type: 'GET',
		url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&otype='+type,
		data:'',
		success: function(data){
			window.location.reload();
		}
	});
}
function delete_cate(cid)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=acate&del=1&cid='+cid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function delete_cate_expert(eid)
{
	if (confirm("Bạn có chắc chắn muốn xóa?"))
	{
		$.ajax({	
			type: 'GET',
			url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=acate&del=2&eid='+eid,
			data:'',
			success: function(data){
				window.location.reload();
			}
		});
	}
}
function reload_site()
{
	window.location.reload();
}

function exupdate()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=exupdate';
}
function go_trash()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=trash';
}
function search_reset()
{
	window.location.href = site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main';
}
function check_all()
{
    var at = $('#checkAll').prop('checked');
    alert(at);
    if($('#checkAll').prop('checked')){
        $('.bncheck').prop('checked', true);
    }
    else{
        $('.bncheck').prop('checked', false);
    }
}
function change_per_page()
{
	var per = $('#id_per_page').val();;
	$.ajax({	
		type: 'GET',
		url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&ac=set&per='+per,
		data:'',
		success: function(data){
			window.location.reload();
		}
	});
}
function gorestore(id,ck)
{
	var r = confirm("Bạn có chắc chắn muốn khôi phục bản ghi này?");
	if (r == true) 
	{
		$.ajax({	
            type: 'GET',
            url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=trash&res=1&id='+id+'&ck='+ck,
            data:'',
            success: function(data){
                alert(data);
                window.location.reload();
            }
        });
	}
}
function trashdelall()
{
	var r = confirm("Bạn có chắc chắn muốn xóa hết bản ghi ở thùng rác?");
	if (r == true) 
	{
        $.ajax({	
            type: 'GET',
            url: site_admin_url + '?'+ module_var + '=' + module + '&' + func_var + '=trash&del=2',
            data:'',
            success: function(data){
                window.location.reload();
            }
        });
	}
}
function close_fn()
{
	window.location.reload(false);
	$.fn.fancybox.close();	
}