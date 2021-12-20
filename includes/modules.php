<?php 

if ( ! defined( 'DF_MAIN_FILE' ) ) die( 'Stop!!!' );

global $modules_site, $permission;

$modules_site["home"] = array( "name"=>"home", "title"=>"Dữ liệu xét nghiệm", "active" => 0 );
//$modules_site["file"] = array( "name"=>"file", "title"=>"Hồ sơ ca bệnh", "active" => 0 );
$modules_site["statistic"] = array( "name"=>"statistic", "title"=>"Thống kê", "active" => 0 );
$modules_site["category"] = array( "name"=>"category", "title"=>"QL danh mục", "active" => 0 );
$modules_site["system"] = array( "name"=>"system", "title"=>"Quản lý người dùng", "active" => 0 );

$modules_permission = array ();
$modules_permission["home"] = array( "add"=>"0", "edit"=>"0", "del"=>0, "view" => 1 ,"full" => 0 , "extend" => 0 );
//$modules_permission["file"] = array( "add"=>"0", "edit"=>"0", "del"=>0, "view" => 1,"full" => 0 , "extend" => 0 );
//$modules_permission["category"] = array( "add"=>"0", "edit"=>"0", "del"=>0, "view" => 1,"full" => 0 , "extend" => 0 );
$modules_permission["system"] = array( "add"=>"0", "edit"=>"0", "del"=>0, "view" => 1,"full" => 0 , "extend" => 0 );
$modules_permission_default = array( "add"=>"0", "edit"=>"0", "del"=>0, "view" => 1,"full" => 0 , "extend" => 0 );

?>