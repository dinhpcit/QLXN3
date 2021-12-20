<?php
$para = $Request->GetString( "pr", "get", '');
$array_para = explode("-",$para);

$tp = $array_para[0];
$id = $array_para[1];
$ck = $array_para[2];
$time = $array_para[3];
$cktime = $array_para[4];

if( $ck != md5($id) ) die('stop!!!');
if( $cktime != md5($time) ) die('stop!!!');

$delay = time() - $time;
if( $delay > 5*60 ) die('not found!!!');

if($id > 0){
	if ( $tp == "1" || $tp == "11" ) $sql = "SELECT * FROM `tbl_bmxn` WHERE `id` = ".$id;
    elseif ( $tp == "2" || $tp == "22" ) $sql = "SELECT * FROM `tbl_kqxn` WHERE `kid` = ".$id;
	$result = $db->sql_query( $sql );
	$data = $db->sql_fetchrow( $result, 2 );
    if(empty($data))die('stop!!!');
}
else 
{
    die('stop!!!');
}
//http://docs.google.com/viewer?url= ".urlencode($document_url)."";
//https://docs.google.com/viewer?url=http://macabenh.vncdc.gov.vn/form/20_202107290008_BC.docx
if( $tp == "1" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['filepath'];
}
elseif( $tp == "2" )
{
    $file_src = DF_ROOTDIR .'/'.DF_UPLOAD_FOLDER.'/'.$module.'/' .$data ['kfilepath'];
}

$array_temp = explode( "/", $file_src );
$file_basename = end(  $array_temp );
    
if (file_exists($file_src))
{
	header('Content-Description: File Transfer');
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment; filename="'.basename($file_src).'"');
	header('Pragma: public');
	header('Content-Length: ' . filesize($file_src));
	readfile($file_src);
	exit;
}

exit();

?>