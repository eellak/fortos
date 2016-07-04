
<?php


 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");

 print "<H2> ΚΑΤΑΧΩΡΗΣΕΙΣ ΑΝΑ ΤΜΗΜΑ </H2>";
$s1=0;$s2=0;
print "<table BORDER=1>"; 
print "<tr><td>ΤΜΗΜΑ</td><td>ΟΛΟΚΛΗΡΩΜΕΝΕΣ</td><td>ΣΥΝΟΛΟ</td></tr>";
 for ($x=0;$x<=200;$x++)
 {
 $sql="SELECT * FROM tmima where id=".$x." order by tmima";
$data = mysql_query($sql)
 or die(mysql_error()); 
 while($info = mysql_fetch_array( $data )) 
{
 print "<tr><td>".$info['tmima']."</td>";
 $sql1="SELECT count(tmima) as count1 FROM tasks where completed=1 and tmima=".$x;
$data1 = mysql_query($sql1)
 or die(mysql_error()); 
 while($info1 = mysql_fetch_array( $data1)) 
{
print "<td ALIGN=RIGHT";
if ($info1['count1']==0) print " bgcolor=yellow";
print ">";
print $info1['count1']."</td>";
$s1=$s1+$info1['count1'];
}

 $sql1="SELECT count(tmima) as count1 FROM tasks where tmima=".$x;
$data1 = mysql_query($sql1)
 or die(mysql_error()); 
 while($info1 = mysql_fetch_array( $data1)) 
{
print "<td ALIGN=RIGHT>".$info1['count1']."</td>";
$s2=$s2+$info1['count1'];
}
 
 print "</tr>";
 }
 }
print "<tr><td>ΣΥΝΟΛΟ</td><td align=right>".$s1."</td><td align=right>".$s2."</td></tr>";
print "</table>"; 
?>

 


