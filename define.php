<?php 
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

if ( ! defined( 'DF_MAIN_FILE' ) ) die( 'Stop!!!' );

date_default_timezone_set('Asia/Ho_Chi_Minh');
define( "VERSION", "1.24" );

define( "DF_BASE_SITEURL", "/" );
define( "DF_BASE_ADMINURL", "/admin/" );
//Ten file config
define( "DF_CONFIG_FILENAME", "config.php" );
//Ten thu muc admin
define( "DF_ADMIN_FOLDER", "admin" );
//Thu muc chua file upload
define( "DF_UPLOAD_FOLDER", "uploads" );
//Thu muc chua cac file logs
define( "DF_LOGS_DIR", "logs" );
//Thu muc chua cac file
define( "DF_FILES_DIR", "files" );
//Thu muc chua sessions
define( "DF_SESSION_SAVE_PATH", DF_FILES_DIR."/sessions" );
//Thu muc chua cac file tam thoi
define( "DF_TEMP_DIR", DF_FILES_DIR."/tmp" );
//Ten thu muc cache
define( "DF_CACHEDIR", DF_FILES_DIR."/cache" );
define( "DF_CACHE_PREFIX", "ca" );
//Ten cho bien dau tien csdl
define( "DF_FIRST_TABLE", "tbl" );
//Ten thay the cho bien $name
define( "DF_MODULE_VARIABLE", "mod" );
//Ten thay the cho bien $op
define( "DF_FUNCTION_VARIABLE", "fun" );
//Ten thay the cho bien ngon ngu
define( "DF_LANG_VARIABLE", "lang" );
//Neu sau so lan do ma van khai bao sai, he thong se tuoc quyen admin va day ra trang chu
define( "DF_ADMINRELOGIN_MAX", 3 );
//Quang thoi gian de kiem tra lai pass cua admin (Neu admin khong hoat dong)
define( "DF_ADMIN_CHECK_PASS_TIME", 3600 );
//Thoi gian ton tai cua cookie, 31536000 giay = 1 nam
define( 'DF_LIVE_COOKIE_TIME', 31536000 );
//Thoi gian ton tai cua session, 0  = ton tai cho den khi dong trinh duyet
define( 'DF_LIVE_SESSION_TIME', 0 );
define( 'DF_GFX_WIDTH', 120 );
define( 'DF_GFX_HEIGHT', 25 );
//Thoi gian de tinh online, tinh bang giay, 300 = 5 phut
define( 'DF_ONLINE_UPD_TIME', 300 );
//Thoi gian luu tru referer, 2592000 = 30 ngay
define( 'DF_REF_LIVE_TIME', 2592000 );
//Chieu rong toi da cua hinh tai len
define( 'DF_MAX_WIDTH', 1500 );
//Chieu dai toi da cua hinh tai len
define( 'DF_MAX_HEIGHT', 1500 );
//Co bat tinh nang chong flood hay khong
define( 'DF_IS_FLOOD_BLOCKER', 1 );
//So requests toi da trong 1 phut
define( 'DF_MAX_REQUESTS_60', 40 );
//So requests toi da trong 5 phut
define( 'DF_MAX_REQUESTS_300', 150 );
define( 'DF_CURRENTTIME', time());
// Thiet lap cho get,post,cookie,session,request,env,server
define( "DF_COOKIE_SECURE", 0 );
define( "DF_COOKIE_HTTPONLY", 1 );
define( "DF_ALLOW_REQUEST_MODS", "get,post,cookie,session,request,env,server" );
define( "DF_REQUEST_DEFAULT_MODE", "request" );
//Mac dinh, neu cac thong so khong thay doi, MySQL khong ket noi moi
//ma quay lai voi ket noi cu. Neu NEW_LINK = true se khien MySql luon ket noi moi
define( 'DF_MYSQL_NEW_LINK', false );

//Neu true: Ket noi thuong xuyen
//false: Ket noi khi can
define( 'DF_MYSQL_PERSISTENCY', true );
//Hien thi, ghi loi
//Khong chinh sua gi o 4 dong duoi nay
if ( ! defined( 'E_STRICT' ) ) define( 'E_STRICT', 2048 ); //khong sua
if ( ! defined( 'E_RECOVERABLE_ERROR' ) ) define( 'E_RECOVERABLE_ERROR', 4096 ); //khong sua
if ( ! defined( 'E_DEPRECATED' ) ) define( 'E_DEPRECATED', 8192 ); //khong sua
if ( ! defined( 'E_USER_DEPRECATED' ) ) define( 'E_USER_DEPRECATED', 16384 ); //khong sua
define( "DF_DISPLAY_ERRORS_LIST", E_ALL ); //Danh sach cac loi se hien thi
//define( "DF_DISPLAY_ERRORS_LIST", 0); //tat thong bao loi
define( "DF_LOG_ERRORS_LIST", E_ALL | E_STRICT ); //Danh sach cac loi se ghi log
define( "DF_SEND_ERRORS_LIST", E_USER_ERROR ); //Danh sach cac loi se gui den email
//define( 'DF_ALLOWED_HTML_TAGS', 'a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, sub, sup, table, tbody, td, th, tr, u, ul' );
define( 'DF_ALLOWED_HTML_TAGS', 'embed, object, param, a, b, blockquote, br, caption, col, colgroup, div, em, h1, h2, h3, h4, h5, h6, hr, i, img, li, p, span, strong, sub, sup, table, tbody, td, th, tr, u, ul' );

define( "DF_SITE_CHARSET", "utf-8" );
define( "DF_CHECK_EMAIL", '/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/' );

global $array_file_ex;
$array_file_ex = array(1=>".pdf",2=>".xls",3=>".xlsx",4=>"LaTeX(.tex)");
$array_type_input =  array(0=>"Chọn", 1=>"Text","2" =>"Ngày tháng","3" =>"Select box","4" =>"Check box","5" =>"Radio","6" =>"File upload", "7" =>"Textarea","8" =>"Label","9" =>"Radio Other","10" =>"Check box Other");
$array_name_input =  array(0=>"none", 1=>"text","2" =>"date","3" =>"select","4" =>"checkbox","5" =>"radio","6" =>"file","7" => "textarea","8" => "label","9" => "oradio","10" => "ocheck");
$array_profile_title =  array(0=>"Please select", 1=>"Professor","2" =>"Associate Professor","3" =>"PhD (Doctor)","4" =>"Graduate Student","5" =>"Other");

?>