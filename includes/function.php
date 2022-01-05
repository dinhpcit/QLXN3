<?php

/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

/**
 * GetSiteJavscriptModule()
 * @return
 */ 
 
function GetSiteJavscriptModule($jsfile) {
	global $module, $function;
	$javascript = "";
	if (file_exists ( DF_ROOTDIR . "/modules/" . $module . "/expansion/" . $jsfile )) {
		$code = base64_encode ( DF_ROOTDIR . "/modules/" . $module . "/expansion/" . $jsfile . '|' . 'js' );
		$javascript = '<script type="text/javascript" src="' . DF_BASE_SITEURL . "modules/" . $module . "/expansion/" . $jsfile . '?v='.VERSION.'"></script>';
	}
	return $javascript;
}

function GetSiteCssModule($csfile) {
	global $module, $function, $global_config;
	$javascript = "";
	if (file_exists ( DF_ROOTDIR . "/themes/" . $global_config ['site_theme'] . "/css/" . $csfile )) {
		$code = base64_encode ( DF_ROOTDIR . "/themes/" . $global_config ['site_theme'] . "/css/" . $csfile . '|' . 'css' );
		$javascript = '<link rel="stylesheet" type="text/css" href="' . DF_BASE_SITEURL . 'getfile.php?code=' . $code . '?v='.VERSION.'" />';
	}
	return $javascript;
}
function GetSiteJavscriptAdminModule($jsfile) {
	global $module, $function;
	$javascript = "";
	if (file_exists ( DF_ROOTDIR . "/modules/" . $module . "/expansion/" . $jsfile )) {
		$code = base64_encode ( DF_ROOTDIR . "/modules/" . $module . "/expansion/" . $jsfile . '|' . 'js' );
		$javascript = '<script type="text/javascript" src="' . DF_BASE_SITEURL . "modules/" . $module . "/expansion/" . $jsfile . '?v='.VERSION.'"></script>';
	}
	return $javascript;
}

function GetSiteCssAdminModule($csfile) {
	global $module, $function, $global_config;
	$javascript = "";
	if (file_exists ( DF_ROOTDIR . "/themes/" . $global_config ['admin_theme'] . "/css/" . $csfile )) {
		$code = base64_encode ( DF_ROOTDIR . "/themes/" . $global_config ['site_theme'] . "/css/" . $csfile . '|' . 'css' );
		$javascript = '<link rel="stylesheet" type="text/css" href="' . DF_BASE_SITEURL . 'getfile.php?code=' . $code . '?v='.VERSION.'" />';
	}
	return $javascript;
}
/**
 * ReadFileCss()
 * @return
 */
function ReadFileSite($file, $type) {
	$content = '';
	if ($type == 'css') {
		//will be output as css
		header ( 'Content-type: text/css' );
		//set an expiration date
		$days_to_cache = 10;
		header ( 'Expires: ' . gmdate ( 'D, d M Y H:i:s', time () + (60 * 60 * 24 * $days_to_cache) ) . ' GMT' );
		$content = @file_get_contents ( $file );
		/* spit it out */
	} elseif ($type == 'js') {
		//will be output as css
		header ( 'Content-type: text/javascript' );
		//set an expiration date
		$days_to_cache = 10;
		header ( 'Expires: ' . gmdate ( 'D, d M Y H:i:s', time () + (60 * 60 * 24 * $days_to_cache) ) . ' GMT' );
		$content = @file_get_contents ( $file );
		$content = preg_replace ( array ('/\s{2,}/', '/[\t\n]/' ), ' ', $content );
	}
	
	echo $content;
}

/**
 * CheckEmpty()
 * @return
 */
function CheckEmptyText($value, $val) {
	if ($value == '')
		$value = $val;
	return $value;
}

/**
 * CheckEmpty()
 * @return
 */
function CheckEmptyTextArray($array_value, $val = '') {
	foreach ( $array_value as $title => $value ) {
		$array_value [$title] = CheckEmptyText ( $value, $val );
	}
	return $array_value;
}

function drawselect_number($select_name = "", $number_start = 0, $number_end = 1, $number_curent = 0, $func_onchange = "", $enable = "", $class = "", $required = false) {
    $required_text = ($required)? "required" : ""; 
	$html = '<select name="' . $select_name . '" id="id_' . $select_name . '" '.$required_text.' onchange="' . $func_onchange . '" ' . $enable . ' class="' . $class . '">';
	for($i = $number_start; $i <= $number_end; $i ++) {
		$select = ($i == $number_curent) ? 'selected="selected"' : '';
		$html .= '<option value="' . $i . '" ' . $select . '>' . $i . '</option>';
	}
	$html .= '</select>';
	return $html;
}

function drawselect_status($select_name = "", $array_control_value, $value_curent = 0, $func_onchange = "", $enable = "", $class = "", $required = false) {
    $required_text = ($required)? "required" : ""; 
	$html = '<select name="' . $select_name . '" id="id_' . $select_name . '" '.$required_text.' onchange="' . $func_onchange . '" ' . $enable . ' class="' . $class . '">';
	foreach ( $array_control_value as $val => $title ) {
		if (! empty ( $title )) {
			$select = ($val == $value_curent) ? "selected=\"selected\"" : "";
			$html .= '<option value="' . $val . '" ' . $select . '>' . $title . '</option>';
		}
	}
	$html .= '</select>';
	return $html;
}

function drawradio_status($input_name = "", $array_control_value, $value_curent = "", $func_onchange = "", $enable = "", $class = "", $required = false) {
    $required_text = ($required)? "required" : ""; 
    $html ='';
	foreach ( $array_control_value as $val => $title ) {
		if (! empty ( $title )) {
            $checked = ($val == $value_curent) ? 'checked="checked"' : "";
			$html .='<input type="radio" '.$required_text.' name="' . $input_name . '" value="'.$val.'" id="id_' . $input_name . '_'.$val.'" '.$checked.'/>';
            $html .='&nbsp;<label for="id_' . $input_name . '_'.$val.'">'.$title.'</label>&nbsp;&nbsp;&nbsp;&nbsp;';
		}
	}
	return $html;
}

function drawselect_items($select_name = "", $array_control_value, $items = "", $value_curent = 0, $func_onchange = "", $enable = "", $class = "",$required = false) {
    $required_text = ($required)? "required" : ""; 
	$html = '<select name="' . $select_name . '" id="id_' . $select_name . '" '.$required_text.' onchange="' . $func_onchange . '" ' . $enable . ' class="' . $class . '">';
	foreach ( $array_control_value as $val => $infor ) {
		if (! empty ( $infor [$items] )) {
			$select = ($val == $value_curent) ? "selected=\"selected\"" : "";
			$html .= '<option value="' . $val . '" ' . $select . '>' . $infor [$items] . '</option>';
		}
	}
	$html .= '</select>';
	return $html;
}
function find_code_inarray($title,$array_value)
{
    $title = trim($title);
    foreach($array_value as $code_i=>$title_i)
    {
        if($title == $title_i) return $code_i;
    }
    return "";
}
function string_substr($string, $num = 60) {
	$len = strlen ( $string );
	if ($num < $len) {
		$pos = 0;
		$i = 0;
		while ( $i < $num ) {
			$pos = strpos ( $string, " ", $i );
			$i ++;
		}
		if ($pos > 0) {
			$string = substr ( $string, 0, $pos ) . "...";
		}
	}
	return $string;
}

function draw_page($base_url, $num_items, $per_page, $start_item, $add_prevnext_text = true) {
	$total_pages = ceil ( $num_items / $per_page );
	if ($total_pages == 1)
		return '';
	@$on_page = floor ( $start_item / $per_page ) + 1;
	$page_string = "";
	if ($total_pages > 10) {
		$init_page_max = ($total_pages > 3) ? 3 : $total_pages;
		for($i = 1; $i <= $init_page_max; $i ++) {
			$href = "href=\"" . $base_url . "page=" . (($i - 1) * $per_page) . "\"";
			$page_string .= ($i == $on_page) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
			if ($i < $init_page_max)
				$page_string .= " ";
		}
		if ($total_pages > 3) {
			if ($on_page > 1 && $on_page < $total_pages) {
				$page_string .= ($on_page > 5) ? " ... " : ", ";
				$init_page_min = ($on_page > 4) ? $on_page : 5;
				$init_page_max = ($on_page < $total_pages - 4) ? $on_page : $total_pages - 4;
				for($i = $init_page_min - 1; $i < $init_page_max + 2; $i ++) {
					$href = "href=\"" . $base_url . "page=" . (($i - 1) * $per_page) . "\"";
					$page_string .= ($i == $on_page) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
					if ($i < $init_page_max + 1) {
						$page_string .= " ";
					}
				}
				$page_string .= ($on_page < $total_pages - 4) ? " ... " : ", ";
			} else {
				$page_string .= " ... ";
			}
			
			for($i = $total_pages - 2; $i < $total_pages + 1; $i ++) {
				$href = "href=\"" . $base_url . "page=" . (($i - 1) * $per_page) . "\"";
				$page_string .= ($i == $on_page) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
				if ($i < $total_pages) {
					$page_string .= " ";
				}
			}
		}
	} else {
		for($i = 1; $i < $total_pages + 1; $i ++) {
			$href = "href=\"" . $base_url . "page=" . (($i - 1) * $per_page) . "\"";
			$page_string .= ($i == $on_page) ? "<strong>" . $i . "</strong>" : "<a " . $href . ">" . $i . "</a>";
			if ($i < $total_pages) {
				$page_string .= " ";
			}
		}
	}
	if ($add_prevnext_text) {
		if ($on_page > 1) {
			$href = "href=\"" . $base_url . "page=" . (($on_page - 2) * $per_page) . "\"";
			$page_string = "&nbsp;&nbsp;<span><a " . $href . ">Trang sau</a></span>&nbsp;&nbsp;" . $page_string;
		}
		if ($on_page < $total_pages) {
			$href = "href=\"" . $base_url . "page=" . ($on_page * $per_page) . "\"";
			$page_string .= "&nbsp;&nbsp;<span><a " . $href . ">Trang trước</a></span>";
		}
	}
	return $page_string;
}

function capchar() {
	$char = "";
	$array_char = array ("0", "1", "2", "3", "4", "5", "6", "7", "8", "9" );
	$char .= $array_char [rand ( 0, 9 )];
	$char .= $array_char [rand ( 0, 9 )];
	$char .= $array_char [rand ( 0, 9 )];
	$char .= $array_char [rand ( 0, 9 )];
	$char .= $array_char [rand ( 0, 9 )];
	$char .= $array_char [rand ( 0, 9 )];
	$_SESSION ['capchar'] = $char;
	return $char;
}

function check_capchar($capchar) {
	$cap = isset ( $_SESSION ['capchar'] ) ? $_SESSION ['capchar'] : "";
	if (strtolower ( $capchar ) == strtolower ( $cap )) {
		return true;
	} else {
		return false;
	}
}

function check_email_mx($email) {
	if ((preg_match ( '/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/', $email )) || (preg_match ( '/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,3}|[0-9]{1,3})(\]?)$/', $email ))) {
		return true;
	}
	return false;
}

function send_mail($strSubject, $strBody, $strEmail, $ishml = false) {
	$strSMTPHost = "mail.vista.gov.vn";
	$strSMTPPort = 587;
	$strSTMPUser = "";
	$strSTMPPassword = "";
	$strMailFrom = "";
	$strMailFromName = "ĐĂNG KÝ MÃ SỐ CA BỆNH DƯƠNG TÍNH COVI-19";
	//Confirm registration
	include_once (DF_ROOTDIR."/includes/phpmailer/class.phpmailer.php"); 
	$mail = new PHPMailer ();
	$mail->IsSMTP (); // set mailer to use SMTP
	$mail->Host = $strSMTPHost; // specify main and backup server
	$mail->Port = $strSMTPPort; // set the port to use
	$mail->SMTPAuth = true; // turn on SMTP authentication
	$mail->SMTPSecure = 'tls';
	$mail->Username = $strSTMPUser; // your SMTP username or your gmail username
	$mail->Password = $strSTMPPassword; // your SMTP password or your gmail password		 
	$mail->From = $strMailFrom;
	$mail->FromName = $strMailFromName; // Name to indicate where the email came from when the recepient received	 
	$mail->IsHTML ( $ishml ); // send as HTML
	$mail->CharSet = "utf-8";
	
	$mail->AddAddress ( $strEmail );
	
	$mail->Subject = $strSubject;
	$mail->Body = $strBody;
	if ($mail->Send ()) {
		return true;
	} else {
		return false;
	}
}
///////////////////////////////////////////////////////
function curPageName() {
	$url = (! empty ( $_SERVER ['HTTPS'] )) ? "https://" . $_SERVER ['SERVER_NAME'] . $_SERVER ['REQUEST_URI'] : "http://" . $_SERVER ['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
	$parse = parse_url ( $url );
	return 'http://' . $parse ['host'];
}

function SetCookieLive($name, $value = '', $expire = 0, $path = '', $domain = '', $secure = false, $httponly = false) {
	$_COOKIE [$name] = $value;
	return setcookie ( $name, $value, $expire, $path, $domain, $secure, $httponly );
}

function RemoveCookieLive($name) {
	unset ( $_COOKIE [$name] );
	return setcookie ( $name, NULL, - 1 );
}

function GetCookieLive($name,$default) {
	$default = isset ( $_COOKIE [$name] ) ? $_COOKIE [$name] : $default;
}


function nv_EncString( $string )
{
    include ( DF_ROOTDIR."/includes/lookup.php" );

    return strtr( $string, $utf8_lookup['romanize'] );
}

/**
 * change_alias()
 * 
 * @return
 */
function change_alias( $alias )
{
    $alias = nv_EncString( $alias );

    $search = array ('&amp;', '&#039;', '&quot;', '&lt;', '&gt;', '&#x005C;', '&#x002F;', '&#40;', '&#41;', '&#42;', '&#91;', '&#93;', '&#33;', '&#x3D;', '&#x23;', '&#x25;', '&#x5E;', '&#x3A;', '&#x7B;', '&#x7D;', '&#x60;', '&#x7E;' );
	$alias = str_replace ( $search, " ", $alias );
    
    $alias = preg_replace( "/([^a-z0-9-\s])/is", "", $alias );
    $alias = preg_replace( "/[\s]+/", " ", $alias );
    $alias = preg_replace( "/\s/", "-", $alias );
    $alias = preg_replace( '/(\-)$/', '', $alias );
    $alias = preg_replace( '/^(\-)/', '', $alias );
    $alias = preg_replace( '/[\-]+/', '-', $alias );
    return strtolower($alias);
}

function nv_strpos( $haystack, $needle, $offset = 0 )
{
    global $global_config;
    return iconv_strpos( $haystack, $needle, $offset, $global_config['site_charset'] );
}

/**
 * nv_strtolower()
 * 
 * @param mixed $string
 * @return
 */
function nv_strtolower( $string )
{
    include ( DF_ROOTDIR."/includes/lookup.php" );

    return strtr( $string, $utf8_lookup['strtolower'] );
}

function keyword_in_string ( $keyword, $string )
{
    return nv_strpos( $string, $keyword);
}
function str_unicode ( $str )
{    
	$str = trim($str);
	$str = str_replace(" ", "_", $str);
    $marTViet = array( 
        "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ", "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ", "ì", "í", "ị", "ỉ", "ĩ", "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ", "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ", "ỳ", "ý", "ỵ", "ỷ", "ỹ", "đ", "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ", "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ", "Ì", "Í", "Ị", "Ỉ", "Ĩ", "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ", "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ", "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ", "Đ" 
    );
    
    $marKoDau = array( 
        "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "i", "i", "i", "i", "i", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "y", "y", "y", "y", "y", "d", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "I", "I", "I", "I", "I", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "Y", "Y", "Y", "Y", "Y", "D" 
    );
    return str_replace( $marTViet, $marKoDau, $str );
}
function get_exfile ( $name )
{
    $temp = explode('.', $name);
    return end( $temp );
}

function decodeHtmlEnt($str) {
    $ret = html_entity_decode($str, ENT_COMPAT, 'UTF-8');
    $p2 = -1;
    for(;;) {
        $p = strpos($ret, '&#', $p2+1);
        if ($p === FALSE)
            break;
        $p2 = strpos($ret, ';', $p);
        if ($p2 === FALSE)
            break;
           
        if (substr($ret, $p+2, 1) == 'x')
            $char = hexdec(substr($ret, $p+3, $p2-$p-3));
        else
            $char = intval(substr($ret, $p+2, $p2-$p-2));
           
        //echo "$char\n";
        $newchar = iconv(
            'UCS-4', 'UTF-8',
            chr(($char>>24)&0xFF).chr(($char>>16)&0xFF).chr(($char>>8)&0xFF).chr($char&0xFF)
        );
        //echo "$newchar<$p<$p2<<\n";
        $ret = substr_replace($ret, $newchar, $p, 1+$p2-$p);
        $p2 = $p + strlen($newchar);
    }
    return $ret;
}

function html_2text ($html)
{
	return strip_tags ( decodeHtmlEnt($html) );
}

function check_permission($module)
{
	global $main_permission;
	foreach( $main_permission[$module] as $key => $val )
	{
		if ( $val == "1") return true;
	}
	return false;
}
function text_number_format ($number)
{
	return number_format($number, 0, ',', '.'); 
}
function get_client_ip() 
{
	//whether ip is from the share internet  
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) 
	{  
	  $ip = $_SERVER['HTTP_CLIENT_IP'];  
	}  
	//whether ip is from the proxy  
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
	{  
	  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
	}  
	//whether ip is from the remote address  
	else
	{  
	   $ip = $_SERVER['REMOTE_ADDR'];  
	}  
	return $ip;  
}

function savelog($user_info,$admin_info)
{
	# get the client's IP address
	$ip = get_client_ip() ;
	# get some date/time information
	$today = date('d/m/Y H:i:s');
	# get the drupal URI
	$curr_uri = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	# create a string to print
	$format = "%s, %s, %s, %s, %s\n";
	$text = sprintf($format, $today, $user_info['s_username'],$admin_info['u_username'], $ip, $curr_uri);
	# append the string to the log file
	$filename = 'files/temp.log';
	$filename = DF_ROOTDIR.'/files/logs/'.date('dmY').'.log';
	$fp = fopen($filename, 'a');
	fwrite($fp, $text);
	fclose($fp);
}
//savelog();die('stop!!!');
?>
