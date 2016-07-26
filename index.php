<html>

<script>
function unlock(taskid)
{
var kodikos = prompt("Κωδικός ξεκλειδώματος;", "");
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
//alert(xmlhttp.response);

	if (xmlhttp.responseText.trim()=='Σ')
	{
document.getElementById("unlock").innerHTML="[Ξ]";
document.getElementById("viewimg").src='edit.png';
document.getElementById("viewimg").title='ΔΙΟΡΘΩΣΗ ΔΙΑΔΙΚΑΣΙΑΣ';
document.getElementById("viewaction").href='edittasks.php?taskid='+taskid;
document.getElementById("unlock").onclick=function() {lock(taskid)};
}
if (xmlhttp.responseText.trim()=='Λ')
	{
	alert ('ΛΑΘΟΣ ΚΩΔΙΚΟΣ');
	}
    }
	
  }
xmlhttp.open("GET","unlock.php?taskid="+taskid+"&kodikos='"+kodikos+"'",true);
xmlhttp.send();

}

function lock(taskid)
{
var kodikos = prompt("Κωδικός κλειδώματος;", "");
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
document.getElementById("unlock").innerHTML="[Κ]";
document.getElementById("viewimg").src='show.png';
document.getElementById("viewimg").title='ΠΡΟΒΟΛΗ ΔΙΑΔΙΚΑΣΙΑΣ';
document.getElementById("viewaction").href='showtasks.php?taskid='+taskid;
document.getElementById("unlock").onclick=function() {unlock(taskid)};
    }
  }
xmlhttp.open("GET","lock.php?taskid="+taskid+"&kodikos='"+kodikos+"'",true);
xmlhttp.send();

}



function show_copy_confirm()
{
var result = confirm("Είστε σίγουροι ότι θέλετε να  αντιγραψετε τη διαδικασία;");
    return result;
}
</script>
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
if (isset($_REQUEST['gdieythinsi'])) $gdieythinsi=$_REQUEST['gdieythinsi'];
if (isset($_REQUEST['dieythinsi'])) $dieythinsi=$_REQUEST['dieythinsi'];
if (isset($_REQUEST['tmima'])) $tmima=$_REQUEST['tmima'];
if (isset($_REQUEST['armodiotita'])) $armodiotita=$_REQUEST['armodiotita'];
if (isset($_REQUEST['diadikasia'])) $diadikasia=$_REQUEST['diadikasia'];
if (isset($_REQUEST['completed'])) $completed=$_REQUEST['completed'];

PRINT "<h2> ΑΝΑΖΗΤΗΣΗ</H2>";
PRINT "<HR>";
print "<form action=index.php method=post>";
print "ΓΕΝΙΚΗ ΔΙΕΥΘΥΝΣΗ:";SELECTGD($gdieythinsi);print "<br>";
print "ΔΙΕΥΘΥΝΣΗ:";SELECTDIEYTHINSI($dieythinsi);print "<br>";
print "ΤΜΗΜΑ:";SELECTTMIMA($tmima);print "<br>";
print "ΑΡΜΟΔΙΟΤΗΤΑ:<input type=text id=inputfield4 name=armodiotita value='".$armodiotita."' size=100><BR>";
print "ΔΙΑΔΙΚΑΣΙΑ:<input type=text id=inputfield5 name=diadikasia value='".$diadikasia."' size=100><BR>";
print "Η διαδικασία ολοκληρώθηκε;";SELECTCOMPLETED($completed);
print "<br>";
print "<input type=submit value=αναζητηση>";
print "</form>";

print "<form action=newtask.php>";
print "<input type=submit value='νεα εγγραφή'>";
print "</form>";

print "<a href=manual.pdf target=new> <img src=manual.jpg TITLE='ΛΗΨΗ ΑΡΧΕΙΟΥ ΒΟΗΘΕΙΑΣ'></a>";
print "<a href=erotiseis.doc target=new> <img src=erotiseis.jpg TITLE='ΕΡΩΤΗΣΕΙΣ'></a>";
print "<a href=fortos.php target=new> <img src=workload.jpg TITLE='ΥΠΟΛΟΓΙΣΜΟΣ ΦΟΡΤΟΥ (ΑΠΑΙΤΗΣΕΩΝ)'></a>";
print "<a href=organogramma.php target=new> <img src=organogramma.jpg TITLE='ΑΡΜΟΔΙΟΤΗΤΕΣ ΣΕ ΜΟΡΦΗ ΔΕΝΤΡΟΥ'></a>";
print "<a href=perigramma.php target=new> <img src=perigramma.jpg TITLE='ΠΕΡΙΓΡΑΜΜΑΤΑ ΑΝΑ ΚΛΑΔΟ'></a><BR>"; 
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

if ($armodiotita!='') $sql=$sql." and armodiotita like '%".$armodiotita."%'";
if ($diadikasia!='') $sql=$sql." and diadikasia like '%".$diadikasia."%'";
if ($completed>=0) $sql=$sql." and completed=".$completed;
 $data = mysql_query($sql)
 or die(mysql_error()); 
 
//PRINT $sql;

if (($gdieythinsi>0)||($dieythinsi>0)||($tmima>0)||$diadikasia!=''||$armodiotita!='')
 {
print "<table border=1><tr><td>ΕΝΕΡΓΕΙΕΣ(α/α)</td><td>ΚΑΤΑΣΤΑΣΗ</td><td>ΑΡΜΟΔΙΟΤΗΤΑ</TD><TD>ΔΙΑΔΙΚΑΣΙΑ</TD><td>ΔΙΕΥΘΥΝΣΗ</td></TR>";
 $x=0;
 while($info = mysql_fetch_array( $data )) 
 
 {
$x++;
print "<tr><td><a href=copytask.php?taskid=".$info['taskid']."><img src=copy.jpg title='ΑΝΤΙΓΡΑΦΗ ΔΙΑΔΙΚΑΣΙΑΣ' onclick='return show_copy_confirm();'></a>";
if ((($info['completed']==1)&&($info['kodikos']==''))||($info['completed']==0)||($info['completed']==2))
print "<a href=edittasks.php?taskid=".$info['taskid']." id=viewaction><img id=viewimg src=edit.png title='ΔΙΟΡΘΩΣΗ ΔΙΑΔΙΚΑΣΙΑΣ'></a>";
if (($info['completed']==1)&&($info['kodikos']!=''))
print "<a href=showtasks.php?taskid=".$info['taskid']." id=viewaction><img id=viewimg src=show.png title='ΠΡΟΒΟΛΗ ΔΙΑΔΙΚΑΣΙΑΣ'></a>";
print "</div>";
print "(".$info['taskid'].")</td>";

print "<td ALIGN=LEFT><img src=";
if ($info['completed']==0) print "no.jpg title='Η ΚΑΤΑΧΩΡΗΣΗ ΔΕΝ ΟΛΟΚΛΗΡΩΘΗΚΕ'";
if ($info['completed']==1) print "yes.jpg title='Η ΚΑΤΑΧΩΡΗΣΗ ΟΛΟΚΛΗΡΩΘΗΚΕ'";
if ($info['completed']==2) print "delete.jpg  title='ΚΑΤΑΧΩΡΗΣΗ ΠΡΟΣ ΔΙΑΓΡΑΦΗ'";

print ">";

if (($info['completed']==1)&&($info['kodikos']!='')) print "<div id=unlock onclick='unlock(".$info['taskid'].")'>[Κ]</div>";
if (($info['completed']==1)&&($info['kodikos']=='')) print "<div id=unlock onclick='lock(".$info['taskid'].")'>[Ξ]</div>";
PRINT "</td><td>";

PRINT $info['armodiotita']."</td><td>".$info['diadikasia']."</td><td>".showdieythinsi($info['dieythinsi'])."</td></tr>";
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

</html>