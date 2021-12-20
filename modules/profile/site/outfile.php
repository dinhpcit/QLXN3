<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

include_once DF_ROOTDIR.'/includes/countrys.php';

$view = $Request->GetInt( "view", "get", 0 );
$print = $Request->GetInt( "print", "get", 0 );
$pdf = $Request->GetInt( "pdf", "get", 0 );
$sid = $Request->GetInt( "sid", "get", $user_info['s_id'] );

if ( $pdf == 0 )
{
	$content = view_profile ( $sid, $view, $print );
	echo $content;
}
else 
{
	$content = view_profile ( $sid, 1, 0 );
	downfile ( "CV_". $sid.'_'.date('d_m_Y').".pdf" , $content );
}
exit();

?>