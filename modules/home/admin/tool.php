<?php

die("Stops");
/*
$sql = "SELECT `sheet1`.hovaten,`tbl_bmxn`.* FROM `tbl_bmxn`, `sheet1` WHERE `tbl_bmxn`.`mamaubenhpham` = `sheet1`.`mamaubenhpham` AND `tbl_bmxn`.`dienthoai` = `sheet1`.dienthoai";

$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$sql_up = "DELETE FROM `tbl_bmxn` WHERE `id` = ".$db->dbescape($row['id']).""; 
	$db->sql_query( $sql_up );
}
*/
/*
$sql = "SELECT * FROM `tbl_bmxn` WHERE `madonvi` = 'ĐP' AND mangay ='210904'";
$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$mamaubenhpham = str_replace("ĐP","DP", $row['mamaubenhpham']);
	$manguoiduoclaymau = str_replace("ĐP","DP", $row['manguoiduoclaymau']);
	$maongbenhpham = "";
	if ( !empty($row['maongbenhpham'])) $maongbenhpham = str_replace("ĐP","DP", $row['maongbenhpham']);
	$sql_up = "UPDATE `tbl_bmxn` SET
					`madonvi` = ".$db->dbescape('DP').",
					`mamaubenhpham` = ".$db->dbescape($mamaubenhpham).", 
					`maongbenhpham` =".$db->dbescape($maongbenhpham).",
					`manguoiduoclaymau` = ".$db->dbescape($manguoiduoclaymau)."
				WHERE `id` = ".$db->dbescape($row['id'])."";
	$db->sql_query( $sql_up );
}
*/
/*
$sql = "SELECT `tbl_kqxn`.* FROM `tbl_kqxn`, `sheet2` WHERE `tbl_kqxn`.`kmamaubenhpham` = `sheet2`.`mabp`";

$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$sql_up = "DELETE FROM `tbl_kqxn` WHERE `kid` = ".$db->dbescape($row['kid']).""; 
	$db->sql_query( $sql_up );
}
*/
/*
$sql = "SELECT * FROM `tbl_bmxn` WHERE `mamaubenhpham` LIKE '%210819B.NT%'";
$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$mamaubenhpham = str_replace("B.NT","B.HN", $row['mamaubenhpham']);
	$manguoiduoclaymau = str_replace("B.NT","B.HN", $row['manguoiduoclaymau']);
	$maongbenhpham = "";
	if ( !empty($row['maongbenhpham'])) $maongbenhpham = str_replace("B.NT","B.HN", $row['maongbenhpham']);
	$sql_up = "UPDATE `tbl_bmxn` SET
					`madonvi` = ".$db->dbescape('HN').",
					`chukymatt` = ".$db->dbescape('B').",
					`mamaubenhpham` = ".$db->dbescape($mamaubenhpham).", 
					`maongbenhpham` =".$db->dbescape($maongbenhpham).",
					`manguoiduoclaymau` = ".$db->dbescape($manguoiduoclaymau)."
				WHERE `id` = ".$db->dbescape($row['id']).""; 
	$db->sql_query( $sql_up );
}
*/
/*
$sql = "SELECT `tbl_bmxn`.* FROM `tbl_bmxn`, `sheet1` WHERE `tbl_bmxn`.`mamaubenhpham` = `sheet1`.`mabp`";

$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$mamaubenhpham = str_replace("A.NT","B.HN", $row['mamaubenhpham']);
	$manguoiduoclaymau = str_replace("A.NT","B.HN", $row['manguoiduoclaymau']);
	$maongbenhpham = "";
	if ( !empty($row['maongbenhpham'])) $maongbenhpham = str_replace("A.NT","B.HN", $row['maongbenhpham']);
	$sql_up = "UPDATE `tbl_bmxn` SET
					`madonvi` = ".$db->dbescape('HN').",
					`chukymatt` = ".$db->dbescape('B').",
					`mamaubenhpham` = ".$db->dbescape($mamaubenhpham).", 
					`maongbenhpham` =".$db->dbescape($maongbenhpham).",
					`manguoiduoclaymau` = ".$db->dbescape($manguoiduoclaymau)."
				WHERE `id` = ".$db->dbescape($row['id']).""; 
	$db->sql_query( $sql_up );
}
*/
/*
INSERT INTO `tbl_bmxn` (`mangay`, `madonvi`, `chukymatt`, `mamaubenhpham`, `hinhthuclaymau`, `matt`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `doituonglaymau`, `lanlaymau`, `odich`, `phanloainoilaymau`, `diadiemnoilaymau`, `huyennoilaymau`, `xanoilaymau`, `thonnoilaymau`, `loaimau`, `donvilaymau`, `maongbenhpham`, `manguoiduoclaymau`, `ngaylaymau`, `hinhthuc`, `loaigop`, `userid`) SELECT `mangay`, `madonvi`, `chukymatt`, `mamaubenhpham`, `hinhthuclaymau`, `matt`, `hovaten`, `namsinh`, `gioitinh`, `dienthoai`, `huyennoio`, `xanoio`, `thonnoio`, `nghenghiep`, `noilamviec`, `doituonglaymau`, `lanlaymau`, `odich`, `phanloainoilaymau`, `diadiemnoilaymau`, `huyennoilaymau`, `xanoilaymau`, `thonnoilaymau`, `loaimau`, `donvilaymau`, `maongbenhpham`, `manguoiduoclaymau`, `ngaylaymau`, `hinhthuc`, `loaigop`, `userid` FROM `tbl_bmxn_old` WHERE 1 GROUP BY `manguoiduoclaymau`

INSERT INTO `tbl_kqxn` (`kmamaubenhpham`, `maxn`, `ngayxetnghiem`, `phuongphapxetnghiem`, `ngaytrakqxn`, `donviguimau`, `tinhtrangmau`, `ketquaxetnghiem`, `ctvalue`) SELECT `mamaubenhpham`, `maxn`, `ngayxetnghiem`, `phuongphapxetnghiem`, `ngaytrakqxn`, `donviguimau`, `tinhtrangmau`, `ketquaxetnghiem`, `ctvalue` FROM `tbl_bmxn_old` WHERE `ketquaxetnghiem` IS NOT NULL OR `ketquaxetnghiem` !='' GROUP BY `mamaubenhpham`
*/

/*
$sql = "SELECT * FROM `tbl_kqxn` WHERE 1";
$result = $db->sql_query( $sql );
$i=0;
while ( $row = $db->sql_fetchrow( $result, 2 ) )
{
	$sql_up = "UPDATE `tbl_bmxn` SET
					`bmaxn` = ".$db->dbescape($row['maxn']).",
					`bngayxetnghiem` = ".$db->dbescape($row['ngayxetnghiem']).",
					`bphuongphapxetnghiem` = ".$db->dbescape($row['phuongphapxetnghiem']).", 
					`bngaytrakqxn` =".$db->dbescape($row['ngaytrakqxn']).",
					`bdonviguimau` = ".$db->dbescape($row['donviguimau']).", 
					`btinhtrangmau` = ".$db->dbescape($row['tinhtrangmau']).", 
					`bketquaxetnghiem` = ".$db->dbescape($row['ketquaxetnghiem']).", 
					`bctvalue` = ".$db->dbescape($row['ctvalue']).", 
					`bkuptime` = ".$db->dbescape($row['kuptime']).", 
					`bkuserid` = ".$db->dbescape($row['kuserid']).",
					`bkfilepath` = ".$db->dbescape($row['kfilepath'])."
				WHERE `mamaubenhpham` = ".$db->dbescape($row['kmamaubenhpham'])."";
	$db->sql_query( $sql_up );
}
*/
echo "so ban ghi: ".$i;
die('done!!!');
?>
