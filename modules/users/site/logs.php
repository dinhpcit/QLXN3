<?php
/*
 * @project: viNagon  
 * @Create by : PCD-GROUP
 * @Create time : 11.11.2011
 * */

$layout = "logs.tpl";
$path_theme = DF_ROOTDIR . "/themes/" . $global_config['site_theme'] . "/templates/".$module;
$xtpl = new XTemplate( $layout, $path_theme );
$xtpl->assign( 'DF_BASE_SITEURL', DF_BASE_SITEURL );
$xtpl->assign( 'TEMPLATE', $global_config['site_theme'] );

$sql = "SELECT * FROM `" . DF_FIRST_TABLE . "_" . $module . "_logs` WHERE `userid` = " . $db->dbescape($user_info['id']) ." ORDER BY logintime DESC LIMIT 0,10" ;
$result = $db->sql_query( $sql ); 
$i=1;
while ( $row = $db->sql_fetchrow($result,2) )
{
	$row['no'] = $i;
	$row['time'] = date("H:i' d/m/Y",$row['logintime']); 
	$xtpl->assign( 'ROW', $row );
	$xtpl->parse( 'main.loop' );
	$i++;
}
$xtpl->parse( 'main' );
$content = $xtpl->text( 'main' );

echo $content;

?>