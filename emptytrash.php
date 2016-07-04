<html>

<?php

 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");

  $sql = "SELECT * FROM tasks where completed=2";
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
//PRINT $sql;

print "<table border=1><tr><td>α/α</td><td>ΚΑΤΑΣΤΑΣΗ</td><td>ΑΡΜΟΔΙΟΤΗΤΑ</TD><TD>ΔΙΑΔΙΚΑΣΙΑ</TD></TR>";
 $x=0;
 while($info = mysql_fetch_array( $data )) 
 
 {
$x++;
print "<tr><td>";
print $info['taskid'];
$taskid=$info['taskid'];
print "</td>";
print "<td ALIGN=LEFT><img src=";
if ($info['completed']==0) print "no.jpg title='Η ΚΑΤΑΧΩΡΗΣΗ ΔΕΝ ΟΛΟΚΛΗΡΩΘΗΚΕ'";
if ($info['completed']==1) print "yes.jpg title='Η ΚΑΤΑΧΩΡΗΣΗ ΟΛΟΚΛΗΡΩΘΗΚΕ'";
if ($info['completed']==2) print "delete.jpg  title='ΚΑΤΑΧΩΡΗΣΗ ΠΡΟΣ ΔΙΑΓΡΑΦΗ'";

print ">";

PRINT "</td><td>";

PRINT $info['armodiotita']."</td><td>".$info['diadikasia']."</td>";

 
 mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
    $sql1 = "DELETE FROM ACTIONS where taskid=".$taskid;
	print $sql1;
 $data1 = mysql_query($sql1)
 or die(mysql_error()); 
 
 print "</tr>";
 }
 
 PRINT "</TABLE>";

 $sql="DELETE FROM TASKS WHERE completed=2";
 $data = mysql_query($sql)
 or die(mysql_error()); 
print "ΤΕΛΟΣ";
?>

</html>