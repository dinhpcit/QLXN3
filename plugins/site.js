function search_all()
{
	var gid = $('#g_pid').val();
	var uid = $('#users_id').val();
	var q = $('#account_name').val();
	var nc = $('#contact_name').val();
	var pc = $('#contact_phone').val();
	var ec = $('#contact_email').val();
	var gc = $('#contact_gender').val();
	var ca = $('#account_code').val();
	var pa = $('#account_phone').val();
	var ea = $('#account_email').val();
	var aa = $('#account_address').val();
	var scode = $('#sic_code').val();
	var pcode = $('#publisher_code').val();
	var corder = $('#count_order').val();
	var tamount = $('#total_amount').val();
	var csid = $('#cs_pid').val();
	var bid = $('#b_pid').val();
	var nid = $('#n_pid').val();
	var cid = $('#afieldid').val();
	var did = $('#adisnt').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&uid='+uid+'&gid='+gid+'&nc='+nc+'&pc='+pc+'&ec='+ec+'&gc='+gc+'&ca='+ca+'&pa='+pa+'&ea='+ea+'&aa='+aa+'&scode='+scode+'&pcode='+pcode+'&corder='+corder+'&tamount='+tamount+'&csid='+csid+'&bid='+bid+'&nid='+nid+'&cid='+cid+'&did='+did+'&q='+q;
	return false;
}
function search_orders()
{
	var code = $('#code').val();
	var pid = $('#pid').val();
	var gid = $('#g_id').val();
	var aid = $('#a_id').val();
	var bid = $('#b_id').val();
	var cgid = $('#cg_id').val();
	var csid = $('#cs_id').val();
	var puid = $('#pu_id').val();
	var uid = $('#u_id').val();
	var rid = $('#r_id').val();
	var paid = $('#pa_id').val();
	var sid = $('#s_id').val();
	var mid = $('#m_id').val();
	var sdate = $('#start_date').val();
	var edate = $('#end_date').val();
	var lcode = $('#lading_code').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&code='+code+'&pid='+pid+'&gid='+gid+'&aid='+aid+'&bid='+bid+'&cgid='+cgid+'&csid='+csid+'&puid='+puid+'&uid='+uid+'&rid='+rid+'&paid='+paid+'&sid='+sid+'&mid='+mid+'&lcode='+lcode+'&sdate='+sdate+'&edate='+edate;
	return false;
}
function search_mar()
{
	var q = $('#q').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&q='+q;
	return false;
}
function search_pr()
{
	var uid = $('#users_id').val();
	var q = $('#q').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&uid='+uid+'&q='+q;
	return false;
}
function search_acc(aid,ck)
{
	var uid = $('#users_id').val();
	var q = $('#q').val();
	var re = $('#re').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=task&aid='+aid+'&re='+re+'&uid='+uid+'&q='+q+'&ck='+ck;
	return false;
}
function search_quote()
{
	var uid = $('#users_id').val();
	var q = $('#account_name').val();
	var code = $('#quote_code').val();
	var date = $('#start_date').val();
	
	window.location = site_url + '?'+ module_var + '=' + module + '&' + func_var + '=main&uid='+uid+'&code='+code+'&date='+date+'&q='+q;
	return false;
}
function PopupCenter(pageURL, title,w,h) {
	var left = (screen.width/2)-(w/2);
	var top = (screen.height/2)-(h/2);
	var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
} 
//JavaScript Document
//Copyright (C) 2005 Ilya S. Lyubinskiy. All rights reserved.
//Technical support: http://www.php-development.ru/
//----- Auxiliary -------------------------------------------------------------
function tabview_aux(TabViewId, id)
{
var TabView = document.getElementById(TabViewId);
//----- Tabs -----
var Tabs = TabView.firstChild;
while (Tabs.className != "Tabs" ) Tabs = Tabs.nextSibling;
var Tab = Tabs.firstChild;
var i   = 0;
do
{
if (Tab.tagName == "A")
{
 i++;
 Tab.href      = "javascript:tabview_switch('"+TabViewId+"', "+i+");";
 Tab.className = (i == id) ? "Active" : "";
 Tab.blur();
}
}
while (Tab = Tab.nextSibling);
//----- Pages -----
var Pages = TabView.firstChild;
while (Pages.className != 'Pages') Pages = Pages.nextSibling;
var Page = Pages.firstChild;
var i    = 0;
do
{
if (Page.className == 'Page')
{
 i++;
 //if (Pages.offsetHeight) Page.style.height = (Pages.offsetHeight-2)+"px";
 //Page.style.overflow = "auto";
 Page.style.display  = (i == id) ? 'block' : 'none';
}
}
while (Page = Page.nextSibling);
}
//----- Functions ------
function SetCookieForTabView(cookieName,cookieValue,nDays) {
var today = new Date();
var expire = new Date();
if (nDays==null || nDays==0) nDays=1;
expire.setTime(today.getTime() + 3600000*24*nDays);
document.cookie = cookieName+"="+escape(cookieValue)+ ";expires="+expire.toGMTString();
}
function ReadCookie(cookieName) {
var theCookie=""+document.cookie;
var ind=theCookie.indexOf(cookieName);
if (ind==-1 || cookieName=="") return ""; 
var ind1=theCookie.indexOf(';',ind);
if (ind1==-1) ind1=theCookie.length; 
return unescape(theCookie.substring(ind+cookieName.length+1,ind1));
}
function tabview_switch(TabViewId, id) { tabview_aux(TabViewId, id); SetCookieForTabView('tvID',id,36) }
function tabview_initialize(TabViewId) 
{ 
	tvID2 = ReadCookie('tvID')
	if (tvID2==-1 || tvID2=="") { SetCookieForTabView('tvID',1,36); tabview_aux(TabViewId,  1);  }
	else {tabview_aux(TabViewId,  tvID2); }
}

function create_editor(id,w,h)
{
	$("#"+id).cleditor({
		width:w,
		height: h, // height not including margins, borders or padding
		controls: // controls to add to the toolbar
			"bold italic underline strikethrough | font size " +
			"color removeformat | bullets numbering | " +
			"alignleft center alignright justify | " +
			"image link unlink",
		fonts: // font names in the font popup
			"Arial,Arial Black,Tahoma,Verdana",
		sizes: // sizes in the font size popup
			"1,2,3,4,5",
		useCSS: false, // use CSS to style HTML when possible (not supported in ie)
		bodyStyle: // style to assign to document body contained within the editor
			"padding:5px; font:12px Arial; cursor:text; color:#666; line-height:20px"
	});
}
function reload_iframe_n(id)
{
	document.getElementById(id).contentDocument.location.reload(false);
}
function reload_iframe(id)
{
	$.fancybox.close();
	document.getElementById(id).contentDocument.location.reload(false);
}
function reload_site()
{
	$.fancybox.close();
	window.location.reload(false);
}
function redriect_site(url)
{
	window.location.href = url;
}
function redriect_site_and_close(url)
{
	$.fancybox.close();
	window.location.href = url;
}
function open_iframe(h,w,url)
{
    $.fancybox({
        'type': 'iframe',
        'width': w,
        'height': h,
        'href' : url,
		'scrolling' : false, 
		'helpers' : {'overlay' : {'closeClick': false}},
		'autoSize':false
    });
}
function setshow(id)
{
	if( pindex == 1 ) { $('#aback').hide(); $('#anext').show() }
	else if( pindex >= 1 && pindex < maxindex ) { $('#aback').show(); $('#anext').show() }
	if( pindex < maxindex ) { $('#asend').hide();  }
	else if( pindex == maxindex ) { $('#asend').show(); $('#anext').hide(); $('#aback').show(); }
	$('#'+id).show('fade');
	window.location.href = "#mark";
	percen = ( pindex / maxindex )  * 100;
	percen = Math.floor(percen);
	progressBar(percen, $('#progressBar'));
}
function snext()
{
	if( pindex < maxindex ) 
	{
		if ($("#iform").valid() == true ) {
			$('.group').hide();
			pindex = pindex + 1;
			setshow('gr' + pindex.toString());	
		}
	}
}
function sback()
{
	if( pindex > 0 ) 
	{
		$('.group').hide();
		pindex = pindex - 1;
		setshow('gr' + pindex.toString());
	}
}
function getpoint(url){ $.fancybox.close();
	window.location.href = url; 
}

$(document).ready(function() {
	$('#showmenu1').click(function() {
		$('.dropdown-menu').slideToggle("fast");
	});
});
$(document).ready(function() {
	$('#showmenu2').click(function() {
		$('.dropdown-time').slideToggle("fast");
	});
});