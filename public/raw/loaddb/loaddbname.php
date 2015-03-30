<?php
$con = mysql_connect("tools.e-corp.cn", "zczx_data", "cos2x=2Sinxcosx");
if(!$con)
{
    die('Could not connect: '. mysql_error() );
}
$list = mysql_list_dbs($con);
$str = "";
while($row = mysql_fetch_object($list)){
	$str .= $row->Database ."\n";
}
echo $str;
?>