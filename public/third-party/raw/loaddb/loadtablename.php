<?php
$q = $_GET["q"];
$con = mysql_connect("tools.e-corp.cn", "zczx_data", "cos2x=2Sinxcosx");
if(!$con)
{
    die('Could not connect: '. mysql_error() );
}
$tables = array();
$qry = "SHOW TABLES FROM {$q};";
$result = mysql_query($qry);
$str = "";
while($table = mysql_fetch_row($result))
{
	$str .= $table[0]."\n";
}
echo $str;
?>