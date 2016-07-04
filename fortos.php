
<?php

function selectunits($inf)
 {

print "<select name=units>";

  print "<option ";
  if($inf==1) print " SELECTED ";
    PRINT "VALUE='1'>ΗΜΕΡΕΣ";
	print "</OPTION>";
	  print "<option ";
if($inf==2) print " SELECTED ";
    PRINT "VALUE='2'>ΑΝΘΡΩΠΟΕΤΗ";
	print "</OPTION>";

 PRINT" </select>"; 
 };

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
  if($inf==-1) print " SELECTED ";
    PRINT "VALUE=-1> ΟΛΕΣ </OPTION>";
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


 function showdieythinsi($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM dieythinsi where id=".$inf);
while($info = mysql_fetch_array( $data )) 
  {
return $info['dieythinsi'];
}
} 
 
 function showdieythinsi_atoma($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM dieythinsi where id=".$inf);
while($info = mysql_fetch_array( $data )) 
  {
return $info['atoma'];
}
}

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
 
 
  function showeidikotita($inf)
 {
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");
 $data = mysql_query("SELECT * FROM EIDIKOTHTA where id=".$inf);
while($info = mysql_fetch_array( $data )) 
  {
return $info['EIDIKOTHTA'];
}
} 

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

 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");


$gdieythinsi=0;
$dieythinsi=0;
$tmima=0;
$armodiotita='';
$diadikasia='';
$units=1;
$coltot=array();
$completed=-2;
if (isset($_REQUEST['gdieythinsi'])) $gdieythinsi=$_REQUEST['gdieythinsi'];
if (isset($_REQUEST['dieythinsi'])) $dieythinsi=$_REQUEST['dieythinsi'];
if (isset($_REQUEST['tmima'])) $tmima=$_REQUEST['tmima'];
if (isset($_REQUEST['armodiotita'])) $armodiotita=$_REQUEST['armodiotita'];
if (isset($_REQUEST['diadikasia'])) $diadikasia=$_REQUEST['diadikasia'];
if (isset($_REQUEST['units'])) $units=$_REQUEST['units'];
if (isset($_REQUEST['completed'])) $completed=$_REQUEST['completed'];
PRINT "<h2> ΥΠΟΛΟΓΙΣΜΟΣ ΦΟΡΤΟΥ</H2>";
PRINT "<HR>";
print "Με τη λειτουργία αυτή μπορείτε να δείτε απαιτήσεις (ανα κλάδο και συνολικές) για την εκτέλεση διαδικασίας/διαδικασιών σε κάποιο τμήμα, διεύθυνση ή γενική διεύθυνση... Προτεινόμενη ομαδοποίηση: Διεύθυνση<br>";
print "<form action=fortos.php method=post>";
PRINT "<HR>";
print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:";SELECTGD($gdieythinsi);print "<br>";
print "ΔΙΕΥΘΥΝΣΗ:";SELECTDIEYTHINSI($dieythinsi);print "<br>";
print "ΤΜΗΜΑ:";SELECTTMIMA($tmima);print "<br>";


print "ΑΡΜΟΔΙΟΤΗΤΑ:<input type=text id=inputfield4 name=armodiotita value='".$armodiotita."' size=100><BR>";
print "ΔΙΑΔΙΚΑΣΙΑ:<input type=text id=inputfield5 name=diadikasia value='".$diadikasia."' size=100><BR>";
print "Η διαδικασία ολοκληρώθηκε;";SELECTCOMPLETED($completed);
print "<br>";

print "ΜΟΝΑΔΑ ΜΕΤΡΗΣΗΣ ΑΠΟΤΕΛΕΣΜΑΤΩΝ:";selectunits($units);print "<br>";
print "<input type=submit value=αναζητηση>";
print "</form>";

/*
if ($units==2) $units=0.0033;//1/25/12
*/
if ($units==2) $units=0.00476;//1/210
 
$sql = "SELECT * FROM tasks where gdieythinsi";
if ($gdieythinsi==0) 
{$sql=$sql.">=0";} 
else 
{$sql=$sql."=".$gdieythinsi;};
$sql=$sql." and dieythinsi";
if ($dieythinsi==0) {$sql=$sql.">=0";} else {$sql=$sql."=".$dieythinsi;};
$sql=$sql." and tmima";
if ($tmima==0) {$sql=$sql.">=0";} else {$sql=$sql."=".$tmima;};

if ($armodiotita!='') $sql=$sql." and armodiotita like '%".$armodiotita."%'";
if ($diadikasia!='') $sql=$sql." and diadikasia like '%".$diadikasia."%'";
if ($completed>=0) $sql=$sql." and completed=".$completed;
$sql=$sql." order by gdieythinsi,dieythinsi,tmima,armodiotita";

 $data = mysql_query($sql)
 or die(mysql_error()); 
 
PRINT $sql."<BR>";
if ($units==1) PRINT "ΑΡΙΘΜΟΙ ΣΕ ΜΕΡΕΣ - 1 ΜΕΡΑ=6 ΩΡΕΣ";
if ($units!=1) PRINT "ΑΡΙΘΜΟΙ ΣΕ ΑΝΘΡΩΠΟΕΤΗ (210 ΗΜΕΡΕΣ)" ;

if (($gdieythinsi>0)||($dieythinsi>0)||($tmima>0)||$diadikasia!=''||$armodiotita!='')
 {
print "<table border=1><tr><td>α/α</td><td>ΑΡΜΟΔΙΟΤΗΤΑ</TD><TD>ΕΝΕΡΓΕΙΑ</TD><td>ΔΙΕΥΘΥΝΣΗ</td>";
for ($y=1;$y<=61;$y++)
{
print "<td>".showeidikotita($y)."</td>";
$coltot[$y]=0;
}
print "<TD>ΣΥΝ. ΔΙΑΔΙΚΑΣΙΑΣ</TD>";
print "</TR>";
 $x=0;
 while($info = mysql_fetch_array( $data )) 
 
 {
$x++;
print "<tr><td><a href=edittasks.php?taskid=".$info['taskid'].">".$info['taskid']."</a></td><td>".$info['armodiotita']."</td><td>".$info['diadikasia']."</td><td>".showdieythinsi($info['dieythinsi'])."(".showdieythinsi_atoma($info['dieythinsi'])." ατομα)</td>";
$rowtot=0;
for ($y=1;$y<=61;$y++)
{
	$CF=CalcFortos($info['taskid'],$y);
	$rowtot=$rowtot+$CF;
	$coltot[$y]=$coltot[$y]+$CF;

print "<td>".($CF*$units)."</td>";
}
print "<TD>".($rowtot*$units)."</TD>";

print "</tr>";
 }
 $grandtotal=0;
 print "<tr><td COLSPAN=3>ΣΥΝΟΛΟ ΕΙΔΙΚΟΤΗΤΑΣ</td><td></td>";
 
 for ($y=1;$y<=61;$y++)
 {
	 print "<TD>".($coltot[$y]*$units)."</TD>";
	$grandtotal=$grandtotal+$coltot[$y];
 }
 print "<td>".($grandtotal*$units)."</td>";
 print "</tr>";
 
 PRINT "</TABLE>";



}





?>
