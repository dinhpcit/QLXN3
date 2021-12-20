<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

define( "DF_MAIN_FILE", TRUE );
//include: begin code
include_once 'main.php';
//include: end code

$code = $Request->GetString("code","get","");

if( !empty($code) )
{
	$code = base64_decode($code);
	$array_value = explode('|', $code);
	if (!empty($array_value[0]) && !empty($array_value[1]))
	{
		ReadFileSite($array_value[0],$array_value[1]);
	}
}
exit();

?>