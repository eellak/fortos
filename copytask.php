<?php

$id=$_REQUEST['taskid'];
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  

   $sql="CREATE TEMPORARY TABLE tmp SELECT * FROM tasks WHERE taskid = ".$id.";";
    print $sql;
    $data = mysql_query($sql)
 or die(mysql_error()); 
 $sql= "UPDATE tmp SET completed=0,kodikos='' WHERE taskid =".$id.";";
    print $sql;
    $data = mysql_query($sql)
 or die(mysql_error()); 
   $sql= "UPDATE tmp SET taskid=(SELECT MAX(taskid)+1 FROM tasks) WHERE taskid =".$id.";";
    print $sql;
    $data = mysql_query($sql)
 or die(mysql_error()); 
 
	$sql="INSERT INTO tasks SELECT * FROM tmp;";
	 print $sql;
	 $data = mysql_query($sql)
 or die(mysql_error()); 
  $newrecord=mysql_insert_id();
 $sql="DROP TEMPORARY TABLE tmp";
 	 $data = mysql_query($sql)
 or die(mysql_error()); 
 print $sql;

 

 
    $sql="CREATE TEMPORARY TABLE tmp SELECT * FROM actions WHERE taskid = ".$id." order by actionid;";
	    print $sql;
	$data = mysql_query($sql)
 or die(mysql_error()); 
	$sql="UPDATE tmp SET taskid=".$newrecord." WHERE taskid =".$id." order by actionid;";
	    print $sql;
	$data = mysql_query($sql)
 or die(mysql_error()); 
	  
//$sql="UPDATE tmp SET actionid=(SELECT MAX(actionid)+1 FROM actions) WHERE taskid =".$id.";";
//$sql="UPDATE tmp SET actionid=(SELECT MAX(actionid)+1 FROM actions);";
$sql="UPDATE tmp SET actionid=null";
	    print $sql;
	$data = mysql_query($sql)
 or die(mysql_error()); 
	$sql="INSERT INTO actions SELECT * FROM tmp";
	    print $sql;
	$data = mysql_query($sql)
 or die(mysql_error());
    print $sql; 
	 $sql="DROP TEMPORARY TABLE tmp";
	 	$data = mysql_query($sql)
 or die(mysql_error());
 
	print $sql;

 
header('Location:edittasks.php?taskid='.$newrecord);
  
  ?>