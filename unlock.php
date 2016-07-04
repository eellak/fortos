
<?php


mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  $taskid=0;
  $kodikos='';

$sql="select kodikos from tasks where taskid=".$_REQUEST['taskid'];
  $data = mysql_query($sql)
 or die(mysql_error()); 
 $passed=false;
  while($info = mysql_fetch_array( $data )) 
  {
  $kodikos=$info['kodikos'];
  if ($_REQUEST['kodikos']=="'".$info['kodikos']."'") $passed=true;
    }
  //print "PERASE?".$_REQUEST['kodikos']."-";
  if ($passed==true) 
  {
$sql="UPDATE tasks set kodikos='' ";
$sql=$sql."where taskid=".$_REQUEST['taskid'];

//print $sql;
 $data = mysql_query($sql)
 or die(mysql_error()); 
  print 'Σ';
}

if ($passed==false) print 'Λ';


?>
