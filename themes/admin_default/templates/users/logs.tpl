<!-- BEGIN: main -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Lịch sử truy cập</title>
        <link rel="stylesheet" type="text/css" href="{DF_BASE_SITEURL}themes/{TEMPLATE}/css/template.css" />
    </head>
    <body>    
    <table class="list">
    <thead>
        <tr>
            <td width="20" align="center">STT</td>  
            <td width="120">Địa chỉ IP</td> 
            <td width="120">Thời gian</td>  
            <td></td>
        </tr>
    </thead>
    <!-- BEGIN: loop -->
    <tbody>
        <tr>
            <td align="center">{ROW.no}</td>  
            <td>{ROW.ip}</td> 
            <td>{ROW.time}</td>  
            <td></td>
        </tr>
    </tbody>
    <!-- END: loop -->
    </table>
	</body>
</html>    
<!-- END: main -->