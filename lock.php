
<?php


mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  $taskid=0;
if (isset($_REQUEST['taskid'])) $taskid=$_REQUEST['taskid'];

$sql="UPDATE tasks set kodikos=".$_REQUEST['kodikos'];
$sql=$sql."where taskid=".$_REQUEST['taskid'];

//print $sql;
 $data = mysql_query($sql)
 or die(mysql_error()); 


?>
