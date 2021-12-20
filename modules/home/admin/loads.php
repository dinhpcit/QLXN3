<?php
$tp = $Request->GetString( "tp", "get", "" );
if ($tp==1)
{	
	$code = $Request->GetString( "matt", "get", "" );
	$maqh = $Request->GetString( 'maqh', 'get', 0 );
	
	$sql = "SELECT * FROM `tbl_diachi_quanhuyen` WHERE `matinhthanh` = ".$db->dbescape($code)." ORDER BY `maqh` ASC";
	$result = $db->sql_query( $sql );

	$html = '<select id="quanhuyentamtru1" name="quanhuyentamtru" class="chosen-select" onchange="getphuongxa()">';
	$html .= '<option value="0">Quận/Huyện</option>';

	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$select = ( $maqh == $row["maqh"] ) ? 'selected="selected"' : '';
		$html .= '<option value="'.$row["maqh"].'" '.$select.'>'.$row["quanhuyen"].'</option>';
	}

	$html .= '</select>';
	echo $html;
}
elseif ($tp==2)
{	
	$maqh = $Request->GetString( 'maqh', 'get', "" );
	$mapx = $Request->GetString( "mapx", "get", "" );
	
	$sql = "SELECT * FROM `tbl_diachi_phuongxa` WHERE `maqh` = ".$db->dbescape($maqh)." ORDER BY `mapx` ASC";
	$result = $db->sql_query( $sql );

	$html = '<select id="phuongxatamtru" name="phuongxatamtru" class="chosen-select">';
	$html .= '<option value="0">Phường/Xã</option>';

	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$select = ( $mapx == $row["mapx"] ) ? 'selected="selected"' : '';
		$html .= '<option value="'.$row["mapx"].'" '.$select.'>'.$row["phuongxa"].'</option>';
	}

	$html .= '</select>';
	echo $html;
}
elseif ($tp==3)
{	
	$code = $Request->GetString( "matt", "get", "" );
	$maqh = $Request->GetString( 'maqh', 'get', 0 );
	
	$sql = "SELECT * FROM `tbl_diachi_quanhuyen` WHERE `matinhthanh` = ".$db->dbescape($code)." ORDER BY `maqh` ASC";
	$result = $db->sql_query( $sql );

	$html = '<select id="quanhuyenthuongtru1" name="quanhuyenthuongtru" class="chosen-select" onchange="getphuongxa1()">';
	$html .= '<option value="0">Quận/Huyện</option>';

	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$select = ( $maqh == $row["maqh"] ) ? 'selected="selected"' : '';
		$html .= '<option value="'.$row["maqh"].'" '.$select.'>'.$row["quanhuyen"].'</option>';
	}

	$html .= '</select>';
	echo $html;
}
elseif ($tp==4)
{	
	$maqh = $Request->GetString( 'maqh', 'get', "" );
	$mapx = $Request->GetString( "mapx", "get", "" );
	
	$sql = "SELECT * FROM `tbl_diachi_phuongxa` WHERE `maqh` = ".$db->dbescape($maqh)." ORDER BY `mapx` ASC";
	$result = $db->sql_query( $sql );

	$html = '<select id="phuongxathuongtru" name="phuongxathuongtru" class="chosen-select">';
	$html .= '<option value="0">Phường/Xã</option>';

	while ( $row = $db->sql_fetchrow( $result, 2 ) )
	{
		$select = ( $mapx == $row["mapx"] ) ? 'selected="selected"' : '';
		$html .= '<option value="'.$row["mapx"].'" '.$select.'>'.$row["phuongxa"].'</option>';
	}

	$html .= '</select>';
	echo $html;
}
else {echo "none!!!";}
exit();

?>