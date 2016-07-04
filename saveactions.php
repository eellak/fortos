
<?php


mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  $taskid=0;
if (isset($_REQUEST['taskid'])) $taskid=$_REQUEST['taskid'];

$sql="UPDATE tasks set ";
$sql=$sql."gdieythinsi=".$_REQUEST['gdieythinsi'];
$sql=$sql.",dieythinsi=".$_REQUEST['dieythinsi'];
$sql=$sql.",tmima=".$_REQUEST['tmima'];
$sql=$sql.",armodiotita='".$_REQUEST['armodiotita']."' ";
$sql=$sql.",diadikasia='".$_REQUEST['diadikasia']."' ";
$sql=$sql.",paratiriseis='".$_REQUEST['paratiriseis']."' ";
$sql=$sql.",completed=".$_REQUEST['completed']." ";
for ($x=1;$x<=7;$x++) 
{
$sql=$sql.",Y".$x."='".$_REQUEST['Y'.$x]."' ";
}
$sql=$sql."where taskid=".$_REQUEST['taskid'];

//print $sql;
 $data = mysql_query($sql)
 or die(mysql_error()); 




 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");

$sql = "delete FROM actions where taskid=".$_REQUEST['taskid'];
//print $sql."<br>";
 $data = mysql_query($sql)
 or die(mysql_error()); 

  for ($x=1;$x<=20;$x++)
	  
	  {
$sql="INSERT INTO actions (taskid,energeia,stoxos,syxnotita,monada,Y1,Y2,Y3,Y4,Y5,Y6,Y7)
VALUES (".$_REQUEST['taskid'].",'".$_REQUEST['energeia'.$x]."','".$_REQUEST['stoxos'.$x]."','".$_REQUEST['syxnotita'.$x]."','".$_REQUEST['monada'.$x]."'";
for ($y=1;$y<=7;$y++)
{
	$sql=$sql.",'".$_REQUEST["Y".$x."-".$y]."'";
	  }
$sql=$sql.")";

//print $x."---".$sql."<br>";
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
	  }
  ;
//print "<a href=edittasks.php?taskid=".$_REQUEST['taskid'].">ΕΠΙΣΤΡΟΦΗ</A>";

header('Location: edittasks.php?taskid='.$_REQUEST['taskid']);

?>
