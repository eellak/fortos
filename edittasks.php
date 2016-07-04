
<?php


function SELECTGD($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM gd")
 or die(mysql_error()); 
print "<select name=gdieythinsi>";
$x=0;
 while($info = mysql_fetch_array( $data )) 
  {
	  $x++;
  print "<option ";
  if($info['id']==$inf) print " SELECTED ";
    PRINT "VALUE='".$info['id']."'>".$info['gdieythinsi'];
	print "</OPTION>";
 }
 PRINT" </select>"; 
 };
 
 
 function SELECTDIEYTHINSI($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM dieythinsi order by dieythinsi")
 or die(mysql_error()); 
print "<select name=dieythinsi>";

 while($info = mysql_fetch_array( $data )) 
  {

  print "<option ";
  if($info['id']==$inf) print " SELECTED ";
    PRINT "VALUE='".$info['id']."'>".$info['dieythinsi'];
	print "</OPTION>";
 }
 PRINT" </select>"; 
 };
 
 function SELECTCOMPLETED($inf)
 {
 
print "<select name=completed>";
 print "<option ";
  if($inf==0) print " SELECTED ";
    PRINT "VALUE=0>ΟΧΙ</OPTION>";
  print "<option ";
  if($inf==1) print " SELECTED ";
    PRINT "VALUE=1>ΝΑΙ</OPTION>";
	print "<option ";
  if($inf==2) print " SELECTED ";
    PRINT "VALUE=2>ΠΡΟΣ ΔΙΑΓΡΑΦΗ</OPTION>";
 PRINT" </select>"; 
 };

 

 function  SELECTEIDIKOTHTA($col,$inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM EIDIKOTHTA order by EIDIKOTHTA")
 or die(mysql_error()); 
print "<select name=Y".$col.">";

 while($info = mysql_fetch_array( $data )) 
  {

  print "<option ";
  if($info['ID']==$inf) print " SELECTED ";
    PRINT "VALUE='".$info['ID']."'>".$info['EIDIKOTHTA'];
	print "</OPTION>";
 }
 PRINT" </select>"; 
 };
 

  function SELECTTMIMA($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM tmima order by tmima")
 or die(mysql_error()); 
print "<select name=tmima>";

 while($info = mysql_fetch_array( $data )) 
  {

  print "<option ";
  if($info['id']==$inf) print " SELECTED ";
    PRINT "VALUE='".$info['id']."'>".$info['tmima'];
	print "</OPTION>";
 }
 PRINT" </select>"; 
 };
 
 function SELECTMONADA($row,$info1)
 {

$mon=array("ΜΕΡΕΣ","ΩΡΕΣ","ΛΕΠΤΑ"); 
print "<select name=monada".$row.">";

for ($x=0;$x<=2;$x++)
{
print "<option ";
  if($info1==$x) print " SELECTED ";
    PRINT "VALUE='".$x."'>".$mon[$x];
	print "</OPTION>";
}
print "</select>"; 
 }
 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  $taskid=0;
if (isset($_REQUEST['taskid'])) $taskid=$_REQUEST['taskid'];

$sql = "SELECT * FROM tasks where taskid=".$taskid;

 $data = mysql_query($sql)
 or die(mysql_error()); 

/*
 if (mysql_num_rows($sql)==0) 
 {
	 $sql="INSERT INTO tasks (diadikasia) VALUES ('ΝΕΑ ΔΙΑΔΙΚΑΣΙΑ')";
 $data = mysql_query($sql)
 or die(mysql_error()); 
$sql = "SELECT * FROM tasks where taskid=".$taskid;

 $data = mysql_query($sql)
 or die(mysql_error()); 
 
 }	 
 */
 
 ;
 
 
PRINT "<h2> ΚΑΤΑΓΡΑΦΗ ΔΙΑΔΙΚΑΣΙΑΣ #".$taskid;
if ($taskid>1) PRINT "<A HREF=edittasks.php?taskid=".($taskid-1)."> << </a>";
PRINT "<A HREF=edittasks.php?taskid=".($taskid+1)."> >> </a>";
PRINT "</H2>";
PRINT "<HR>";
print "<form action=saveactions.php method=post>";

 PRINT "<input name=taskid type=hidden value=".$taskid."></td>";

 while($info = mysql_fetch_array( $data )) 
 {
//print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:<input type=text id=inputfield1 name=gdieythinsi value='".$info['gdieythinsi']."'><BR>";

PRINT "<H2>ΜΕΡΟΣ Α</H2>";
print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:";SELECTGD($info['gdieythinsi']);print "<br>";
print "ΔΙΕΥΘΥΝΣΗ:";SELECTDIEYTHINSI($info['dieythinsi']);print "<br>";
print "ΤΜΗΜΑ:";SELECTTMIMA($info['tmima']);print "<br>";
print "ΑΡΜΟΔΙΟΤΗΤΑ:<input type=text id=inputfield4 name=armodiotita value='".$info['armodiotita']."' size=100><BR>";
print "ΔΙΑΔΙΚΑΣΙΑ:<input type=text id=inputfield5 name=diadikasia value='".$info['diadikasia']."' size=100><BR>";
print "Η ΚΑΤΑΧΩΡΗΣΗ ΕΧΕΙ ΟΛΟΚΛΗΡΩΘΕΙ; ";SELECTCOMPLETED($info['completed']); 
print "<br>ΠΑΡΑΤΗΡΗΣΕΙΣ:<br>";

print"<textarea rows=2 cols=100 name=paratiriseis>";
print $info['paratiriseis'];
print "</textarea>";
 
PRINT "<H2>ΜΕΡΟΣ B</H2>";
print "<table><tr><td>α/α</td><td>ΕΝΕΡΓΕΙΑ</td><td>ΕΠΙΘΥΜΗΤΕΣ<BR> ΔΙΕΚΠΕΡΑΙΩΣΕΙΣ/ΕΤΟΣ</td><td>ΔΙΕΚΠΕΡΑΙΩΣΕΙΣ/ΕΤΟΣ</td><td>ΜΟΝΑΔΑ ΧΡΟΝΟΥ</td>";

for ($y=1;$y<=7;$y++)
{
	PRINT "<TD>";SELECTEIDIKOTHTA($y,$info['Y'.$y]);print "</td>";
}


PRINT "</tr>";

}
 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");

$sql = "SELECT * FROM actions where taskid=".$taskid." order by actionid";

 $data = mysql_query($sql)
 or die(mysql_error()); 


$x=0;
	while($info = mysql_fetch_array( $data )) 
 {
	$x++; 
if (($x%2)==0) print "<TR>"; 
if (($x%2)!=0) print "<TR bgcolor=lightgrey>";
print "<td>".$x."</td>";
print"<td><textarea rows=2 cols=60 name=energeia".$x.">";
print $info['energeia'];
print "</textarea></td>";
PRINT "<TD><input name=stoxos".$x." value='".$info['stoxos']."'></td>";
PRINT "<TD><input name=syxnotita".$x." value='".$info['syxnotita']."'></td>";
PRINT "<TD>";SELECTMONADA($x,$info['monada']);print "</td>";


for ($y=1;$y<=7;$y++)
{
	PRINT "<TD><input name=Y".$x."-".$y." value='".$info['Y'.$y]."'></td>";
}
print "</tr>";
 }

  //if (mysql_num_rows($data)==0) 
  //{
 
 $z=$x+1;
 for ($x=$z;$x<=20;$x++)
 {
if (($x%2)==0) print "<TR>"; 
if (($x%2)!=0) print "<TR bgcolor=lightgrey>";
print "<td>".$x."</td>";
print"<td><textarea rows=2 cols=60 name=energeia".$x.">";
print $info['energeia'];
print "</textarea></td>";

PRINT "<TD><input name=stoxos".$x." value='".$info['stoxos']."'></td>";
PRINT "<TD><input name=syxnotita".$x." value='".$info['syxnotita']."'></td>";
PRINT "<TD>";SELECTMONADA($x,$info['monada']);print "</td>";

for ($y=1;$y<=7;$y++)
{
	PRINT "<TD><input name=Y".$x."-".$y." value='".$info['Y'.$y]."'></td>";
}
print "</tr>";

	 
 }	 
  //}
 
 
print "</table>";

print "<INPUT TYPE=SUBMIT VALUE='ΑΠΟΘΗΚΕΥΣΗ'>" ;
print "</form>";


PRINT "<a href=printtasks.php?taskid=".$_REQUEST['taskid'].">ΠΑΤΗΣΤΕ ΕΔΩ ΓΙΑ ΕΚΤΥΠΩΣΙΜΗ ΕΚΔΟΣΗ</a>";

?>
