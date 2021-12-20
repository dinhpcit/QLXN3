<?php
if ( ! defined( 'DF_IS_USER' ) && ! defined( 'DF_IS_ADMIN' ) )
{
    header( "Location: " . DF_BASE_SITEURL . "?" . DF_MODULE_VARIABLE . "=users&" . DF_FUNCTION_VARIABLE . "=login" );
    die();
}

$id = $Request->GetInt( "id", "get", 0);
$tp = $Request->GetString( "tp", "get", '');
$ck = $Request->GetString( "ck", "get", '');

if( $ck != md5($id.$user_info['s_id']) ) die('stop!!!');
if($id > 0){
	if ( $tp == "1" || $tp == "11" ) $sql = "SELECT * FROM `tbl_bmxn` WHERE `id` = ".$id;
    elseif ( $tp == "2" || $tp == "22" ) $sql = "SELECT * FROM `tbl_bmxn` WHERE `id` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
    if(empty($data))die('stop!!!');
}
else 
{
    die('stop!!!');
}

if( $tp == "1" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['filepath'];
    $array_temp = explode( "/", $file_src );
    $file_basename = end(  $array_temp );
    $ext = strtolower( pathinfo($file_src, PATHINFO_EXTENSION) );
    if (file_exists($file_src))
    {
		if( $ext == 'pdf')
		{
			header("Content-type: application/pdf");
			// Send the file to the browser.
			readfile($file_src);
		}
		elseif( $ext == 'xlsx' || $ext == 'xls' || $ext == 'doc' || $ext == 'docx' || $ext == 'jpg')
		{
			//https://docs.google.com/viewer?url= 
			$time = time();
			$url = urlencode( DF_BASE_SITEURL . "".$module."/getfile/1-".$data['id']."-".md5($data['id']).'-'.$time.'-'.md5($time).'.html' );
			$gurl = "https://docs.google.com/viewer?url=".$url;
			$msurl = "https://view.officeapps.live.com/op/embed.aspx?src=".$url;
			//Header( "Location: " . $gurl);
			echo '<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>'.$data['masobn'].'-'.$data['hovaten'].'</title>
					<style type="text/css">
					body {
						margin: 0;            /* Reset default margin */
					}
					iframe {
						display: block;       /* iframes are inline by default */
						background: #000;
						border: none;         /* Reset default border */
						height: 100vh;        /* Viewport-relative units */
						width: 100vw;
					}
					</style>
					</head>
					
					<body>
					<iframe src="'.$msurl.'" frameborder="0"></iframe>
					</body>
					</html>
					';
        	die();
		}
		else
		{
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file_src).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file_src));
			readfile($file_src);
			exit;
		}
    }
    else
    {
        //Header( "Location: " . $data ['filepath']);
        die('stop!!!');
    }
}
elseif( $tp == "2" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['bkfilepath'];
    $array_temp = explode( "/", $file_src );
    $file_basename = end(  $array_temp );
	$ext = strtolower( pathinfo($file_src, PATHINFO_EXTENSION) );

    if (file_exists($file_src))
    {
        if( $ext == 'pdf' )
		{
			header("Content-type: application/pdf");
			// Send the file to the browser.
			readfile($file_src);
		}
		elseif( $ext == 'xlsx' || $ext == 'xls' || $ext == 'doc' || $ext == 'docx' )
		{
			//https://docs.google.com/viewer?url= 
			$time = time();
			$url = urlencode( DF_BASE_SITEURL . "".$module."/getfile/2-".$data['id']."-".md5($data['id']).'-'.$time.'-'.md5($time).'.html' );
			$gurl = "https://docs.google.com/viewer?url=".$url;
			$msurl = "https://view.officeapps.live.com/op/embed.aspx?src=".$url;
			//Header( "Location: " . $gurl);
			echo '<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<title>'.$data['masobn'].'-'.$data['hovaten'].'</title>
					<style type="text/css">
					body {
						margin: 0;            /* Reset default margin */
					}
					iframe {
						display: block;       /* iframes are inline by default */
						background: #000;
						border: none;         /* Reset default border */
						height: 100vh;        /* Viewport-relative units */
						width: 100vw;
					}
					</style>
					</head>
					
					<body>
					<iframe src="'.$msurl.'" frameborder="0"></iframe>
					</body>
					</html>
					';
        	die();
		}
		else
		{
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($file_src).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file_src));
			readfile($file_src);
			exit;
		}
    }
    else
    {
        //Header( "Location: " . $data ['baocaocb']);
        die('stop!!!');
    }
}
if( $tp == "11" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['filepath'];
    $array_temp = explode( "/", $file_src );
    $file_basename = end(  $array_temp );
    $ext = strtolower( pathinfo($file_src, PATHINFO_EXTENSION) );
    if (file_exists($file_src))
    {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file_src).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_src));
		readfile($file_src);
		exit;
    }
    else
    {
        //Header( "Location: " . $data ['baocaocb']);
        die('stop!!!');
    }
}
elseif( $tp == "22" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['bkfilepath'];
    $array_temp = explode( "/", $file_src );
    $file_basename = end(  $array_temp );
	$ext = strtolower( pathinfo($file_src, PATHINFO_EXTENSION) );

    if (file_exists($file_src))
    {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'.basename($file_src).'"');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_src));
		readfile($file_src);
		exit;
    }
    else
    {
        //Header( "Location: " . $data ['baocaocb']);
        die('stop!!!');
    }
}

exit();

?>