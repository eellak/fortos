
<?php
$units=0.00476;//μετατροπη απο ανθρωποημερες σε ανθρωποετη

function CalcFortos($a,$b)
{
$tot=0;$sub=0;
/*
$mon=array(1,0.125,0.0021); // 1/60/8=0.0021 1/8=0.125
*/

$mon=array(1,0.166,0.00277); // 1/60/6=0.00277 1/6=0.166

mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  $sql = "SELECT * FROM tasks where taskid=".$a;
  
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
 while($info = mysql_fetch_array( $data )) 
 
 {
 
 for ($z=1;$z<=7;$z++)
 {
	 if ($info['Y'.$z]==$b)
	 {
  //calc subtotal for task for eidikotita
		mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
  
  $sql1 = "SELECT syxnotita,monada, Y".$z." as TOT FROM actions where taskid=".$a;
   $data1 = mysql_query($sql1)
 or die(mysql_error());
 //$sub=0;
 while($info1 = mysql_fetch_array( $data1 )) 
 
 {
	 $syxnotita=$info1['syxnotita'];
	 $monada=$info1['monada'];
	 $tot=$info1['TOT'];
	 $sub=$sub+$syxnotita*$tot*$mon[$monada];
 }
 
	 }
 }
  
 }
return $sub;
 }
 
 

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
print "<select name=gdieythinsi disabled>";
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
print "<select name=dieythinsi disabled>";

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
 
print "<select name=completed  disabled>";
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
print "<select name=Y".$col."  disabled>";

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
print "<select name=tmima  disabled>";

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
print "<select name=monada".$row."  disabled>";

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
 
 
PRINT "<h2> ΔΙΑΔΙΚΑΣΙΑ #".$taskid;
PRINT "</H2>";
PRINT "<HR>";
print "<form id=forma action=# method=post>";

 PRINT "<input name=taskid type=hidden value=".$taskid."></td>";

 while($info = mysql_fetch_array( $data )) 
 {
//print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:<input type=text id=inputfield1 name=gdieythinsi value='".$info['gdieythinsi']."'><BR>";

PRINT "<H2>ΜΕΡΟΣ Α</H2>";
print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:";SELECTGD($info['gdieythinsi']);print "<br>";
print "ΔΙΕΥΘΥΝΣΗ:";SELECTDIEYTHINSI($info['dieythinsi']);print "<br>";
print "ΤΜΗΜΑ:";SELECTTMIMA($info['tmima']);print "<br>";
print "ΑΡΜΟΔΙΟΤΗΤΑ:<input type=text id=inputfield4 name=armodiotita value='".$info['armodiotita']."' size=100  disabled><BR>";
print "ΔΙΑΔΙΚΑΣΙΑ:<input type=text id=inputfield5 name=diadikasia value='".$info['diadikasia']."' size=100  disabled><BR>";
print "Η ΚΑΤΑΧΩΡΗΣΗ ΕΧΕΙ ΟΛΟΚΛΗΡΩΘΕΙ; ";SELECTCOMPLETED($info['completed']); 
print "<br>ΠΑΡΑΤΗΡΗΣΕΙΣ:<br>";

print"<textarea rows=2 cols=100 name=paratiriseis  disabled>";
print $info['paratiriseis'];
print "</textarea>";
 
PRINT "<H2>ΜΕΡΟΣ B</H2>";
print "<table><tr><td>α/α</td><td>ΕΝΕΡΓΕΙΑ</td><td>ΕΠΙΘΥΜΗΤΕΣ<BR> ΔΙΕΚΠΕΡΑΙΩΣΕΙΣ/ΕΤΟΣ</td><td>ΔΙΕΚΠΕΡΑΙΩΣΕΙΣ/ΕΤΟΣ</td><td>ΜΟΝΑΔΑ ΧΡΟΝΟΥ</td>";

for ($y=1;$y<=7;$y++)
{
PRINT "<TD size=2> Κ".$y."</td>";
	$k[$y]=$info['Y'.$y];
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
print"<td><textarea rows=2 cols=60 name=energeia".$x."  disabled>";
print $info['energeia'];
print "</textarea></td>";
PRINT "<TD><input name=stoxos".$x." value='".$info['stoxos']."'  disabled></td>";
PRINT "<TD><input name=syxnotita".$x." value='".$info['syxnotita']."'  disabled></td>";
PRINT "<TD>";SELECTMONADA($x,$info['monada']);print "</td>";


for ($y=1;$y<=7;$y++)
{
	PRINT "<TD size=5>".$info['Y'.$y]."</td>";

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
print"<td><textarea rows=2 cols=60 name=energeia".$x."  disabled>";
print $info['energeia'];
print "</textarea></td>";

PRINT "<TD><input name=stoxos".$x." value='".$info['stoxos']."'  disabled></td>";
PRINT "<TD><input name=syxnotita".$x." value='".$info['syxnotita']."'  disabled></td>";
PRINT "<TD>";SELECTMONADA($x,$info['monada']);print "</td>";

for ($y=1;$y<=7;$y++)
{
	PRINT "<TD>".$info['Y'.$y]."</td>";
}
print "</tr>";

	 
 }	 
  //}
 
 
print "</table>";

print "<table>";
print "<TR><TD>ΕΙΔΙΚΟΤΗΤΑ</TD><td align=center>ΦΟΡΤΟΣ<BR>(ΑΝΘΡΩΠΟΕΤΗ)</TD></TR>";
$sum=0;
for ($y=1;$y<=7;$y++)
{
$CF=CalcFortos($taskid,$k[$y])*$units;
	PRINT "<TR><TD>K".$y;SELECTEIDIKOTHTA($y,$k[$y]);print "</td><td align=right>".$CF."</td></TR>";
	$sum=$sum+$CF;
}
print "<TR><td>ΣΥΝΟΛΟ</TD><TD align=right>".$sum."</td></tr>";
print "</table>";

//print "<INPUT TYPE=SUBMIT VALUE='ΑΠΟΘΗΚΕΥΣΗ'>" ;
print "</form>";

?>


