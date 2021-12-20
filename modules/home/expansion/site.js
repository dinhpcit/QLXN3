function reload_site()
{
	location.reload(false);
}
function go_research ()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main';
	return false;
}
function go_bmxn ()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=bmxn';
	return false;
}
function go_kqxn (id,ck)
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=kqxn';
	return false;
}
function go_ktest (id,ck)
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=ktest';
	return false;
}
function go_update()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=update';
	return false;
}
function change_per_page()
{
	var per = $('#id_per_page').val();
	$.ajax({	
		type: 'GET',
		url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&ac=set&per='+per,
		data:'',
		success: function(data){
			window.location.reload();
		}
	});
}
function OpenPrint()
{
  if (document.all) {
   var xMax = screen.width, yMax = screen.height
  }
  else if (document.layers) {
   var xMax = window.outerWidth, yMax = window.outerHeight
  }
  else {
   var xMax = 950, yMax=600
  }; 
  window.open(site_url + '?'+ module_var + '=' + module + '&' + func_var + '=print','', 'scrollbars=yes,width='+xMax+',height='+yMax+',top=0,left=0,resizable=yes'); 
}
function change_per_page()
{
	var per = $('#id_per_page').val();;
	$.ajax({	
		type: 'GET',
		url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&ac=set&per='+per,
		data:'',
		success: function(data){
			window.location.reload();
		}
	});
}
function onloadtbl()
{
	var tbl = $("input[name='tbl']:checked").val();
	$.ajax({	
		type: 'GET',
		url: site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&ac=set&tbl='+tbl,
		data:'',
		success: function(data){
			window.location.reload();
		}
	});
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
	var xn = $('#donvixn').val();
	var htlm = $('#htlm').val();
	var dtlm = $('#dtlm').val();
	var dd = $('#diadiem').val();
	var plm = $('#plm').val();
	var pxo = $('#pxo').val();
	var qho = $('#qho').val();
	var ppxn = $('#id_ppxn').val();
	var tto = $('#tto').val();
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&mabn='+mabn+'&hoten='+hoten+'&blm='+blm+'&elm='+elm+'&bkq='+bkq+'&ekq='+ekq+'&kq='+kq+'&bcn='+bcn+'&ecn='+ecn+'&htlm='+htlm+'&dt='+dtlm+'&dd='+dd+'&plm='+plm+'&pxo='+pxo+'&qho='+qho+'&ppxn='+ppxn+'&tto='+tto;
	return false;
}
function search_reset()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main';
}
function go_duplicate()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=duplicate';
}
function export_file()
{
	window.location.href = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=export&tp=2';
}
function close_fn()
{
	window.location.reload(false);
	$.fn.fancybox.close();	
}
function setCookie(key, value, expiry) {
	var expires = new Date();
	expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
	document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
}

function getCookie(key) {
	var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
	return keyValue ? keyValue[2] : null;
}

function eraseCookie(key) {
	var keyValue = getCookie(key);
	setCookie(key, keyValue, '-1');
}
function hidensearch()
{
	$('#searchadv').hide();
	$('#advs').show();
	setCookie('searchadv','0','10');
}
function showsearch()
{
	$('#searchadv').show();
	$('#advs').hide();
	setCookie('searchadv','1','10');
}