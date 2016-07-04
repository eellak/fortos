<?php

mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
   $sql="INSERT INTO tasks (diadikasia) VALUES ('меа диадийасиа')";
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
 header('Location:edittasks.php?taskid='.mysql_insert_id());
  
  ?>