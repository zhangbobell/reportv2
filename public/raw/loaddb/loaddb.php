<?php
$q = $_GET["q"];
list($table, $db) = explode("$", $q);
$con = mysql_connect("tools.e-corp.cn", "zczx_data", "cos2x=2Sinxcosx");
if(!$con)
{
    die('Could not connect: '. mysql_error() );
}
mysql_select_db($db, $con) or die('Can not use '.$db. mysql_error());
$result = mysql_query("SELECT * FROM {$table}");
$numfields = mysql_num_fields($result);
$str = "";
for($i = 0;$i < $numfields; $i++)
{
    $str .= mysql_field_name($result, $i);
    if($i < $numfields - 1)
        $str .= ",";
}
$str .= "\n";
while($row=mysql_fetch_array($result)){
    for($i = 0;$i < $numfields; $i++)
    {
        $str .=$row[mysql_field_name($result, $i)];
        if($i < $numfields -1)
            $str .= ",";
    }
    $str .= "\n";
}
echo $str;
?>