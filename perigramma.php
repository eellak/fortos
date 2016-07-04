
<?php

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
print "<select name=eidikotita>";

 while($info = mysql_fetch_array( $data )) 
  {

  print "<option ";
  if($info['ID']==$inf) print " SELECTED ";
    PRINT "VALUE='".$info['ID']."'>".$info['EIDIKOTHTA'];
	print "</OPTION>";
 }
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
$completed=-1;
$eidikotita=0;
if (isset($_REQUEST['gdieythinsi'])) $gdieythinsi=$_REQUEST['gdieythinsi'];
if (isset($_REQUEST['dieythinsi'])) $dieythinsi=$_REQUEST['dieythinsi'];
if (isset($_REQUEST['tmima'])) $tmima=$_REQUEST['tmima'];
//if (isset($_REQUEST['armodiotita'])) $armodiotita=$_REQUEST['armodiotita'];
//if (isset($_REQUEST['diadikasia'])) $diadikasia=$_REQUEST['diadikasia'];
if (isset($_REQUEST['completed'])) $completed=$_REQUEST['completed'];
if (isset($_REQUEST['eidikotita'])) $eidikotita=$_REQUEST['eidikotita'];

PRINT "<h2> ΠΕΡΙΓΡΑΜΜΑ ΘΕΣΗΣ </H2>";
PRINT "<HR>";
print "Με τη λειτουργία αυτή μπορείτε να δείτε με τι ασχολείται υπάλληλος συγκεκριμένου κλάδου σε κάποιο τμήμα, διεύθυνση ή γενική διεύθυνση...<br>";
PRINT "<HR>";
print "<form action=perigramma.php method=post>";
print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ";SELECTGD($gdieythinsi);print "<br>";
print "ΔΙΕΥΘΥΝΣΗ";SELECTDIEYTHINSI($dieythinsi);print "<br>";

print "ΤΜΗΜΑ:";SELECTTMIMA($tmima);print "<br>";
print "ΚΛΑΔΟΣ:";SELECTEIDIKOTHTA(0,$eidikotita);print "<br>";

//print "�����������:<input type=text id=inputfield4 name=armodiotita value='".$armodiotita."' size=100><BR>";
//print "����������:<input type=text id=inputfield5 name=diadikasia value='".$diadikasia."' size=100><BR>";
print "Η διαδικασία ολοκληρώθηκε;";SELECTCOMPLETED($completed);
print "<br>";
print "<input type=submit value=ΑΝΑΖΗΤΗΣΗ>";
print "</form>";

$sql = "SELECT * FROM tasks where gdieythinsi";
if ($gdieythinsi==0) 
{$sql=$sql.">=0";
} 
else 
{$sql=$sql."=".$gdieythinsi;};
$sql=$sql." and dieythinsi";
if ($dieythinsi==0) {$sql=$sql.">=0";} else {$sql=$sql."=".$dieythinsi;};
$sql=$sql." and tmima";
if ($tmima==0) {$sql=$sql.">=0";} else {$sql=$sql."=".$tmima;};

//if ($armodiotita!='') $sql=$sql." and armodiotita like '%".$armodiotita."%'";
//if ($diadikasia!='') $sql=$sql." and diadikasia like '%".$diadikasia."%'";
if ($eidikotita>0) $sql=$sql." and (Y1=".$eidikotita." OR Y2=".$eidikotita." OR Y3=".$eidikotita." OR Y4=".$eidikotita." OR Y5=".$eidikotita." OR Y6=".$eidikotita." OR Y7=".$eidikotita.")";
if ($completed>=0) $sql=$sql." and completed=".$completed;
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
//PRINT $sql;

if (($gdieythinsi>0)||($dieythinsi>0)||($tmima>0))
 {
print "<table border=1>";
 $x=0;
 while($info = mysql_fetch_array( $data )) 
 
 {
$x++;
print "<tr><td><a href=copytask.php?taskid=".$info['taskid']."><img src=copy.jpg title=''></a><a href=edittasks.php?taskid=".$info['taskid']."><img src=edit.png title=''></a>(".$info['taskid'].")";
PRINT"<td>";
PRINT $info['armodiotita']."</td><td>".$info['diadikasia']."</td></tr>";
 }
 
 PRINT "</TABLE>";



}





?>

<!-- Start 1FreeCounter.com code -->
  
  
  <script language="JavaScript">
  var data = '&r=' + escape(document.referrer)
	+ '&n=' + escape(navigator.userAgent)
	+ '&p=' + escape(navigator.userAgent)
	+ '&g=' + escape(document.location.href);

  if (navigator.userAgent.substring(0,1)>'3')
    data = data + '&sd=' + screen.colorDepth 
	+ '&sw=' + escape(screen.width+'x'+screen.height);

  document.write('<a href="http://www.1freecounter.com/stats.php?i=107335" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=107335' + data + '">');
  document.write('</a>');
  </script>

<!-- End 1FreeCounter.com code -->

