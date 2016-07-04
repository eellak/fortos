
<?php
$units=0.00476;//μετατροπη απο ανθρωποημερες σε ανθρωποετη

function CalcTotalFortos($a)
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
return $sub;
 }




 
mysql_connect("localhost", "root", "") or die(mysql_error()); 
 mysql_select_db("tasks") or die(mysql_error()); 
    mysql_query("set character_set_client=utf8");
  mysql_query("set character_set_connection=utf8"); 
  mysql_query("set collation_connection=utf8"); 
  mysql_query("set character_set_results=utf8");

 print "<H2> ΚΑΤΑΧΩΡΗΣΕΙΣ ΑΝΑ ΔΙΕΥΘΥΝΣΗ </H2>";
$s1=0;$s2=0;
print "<table BORDER=1>"; 
print "<tr><td>ΔΙΕΥΘΥΝΣΗ</td><td>ΟΛΟΚΛΗΡΩΜΕΝΕΣ</td><td>ΣΥΝΟΛΟ</td></tr>";
 for ($x=0;$x<=69;$x++)
 {
 $sql="SELECT * FROM dieythinsi where id=".$x;
$data = mysql_query($sql)
 or die(mysql_error()); 
 while($info = mysql_fetch_array( $data )) 
{
 print "<tr><td>".$info['dieythinsi']."</td>";
 $sql1="SELECT count(dieythinsi) as count1 FROM tasks where completed=1 and dieythinsi=".$x;
$data1 = mysql_query($sql1)
 or die(mysql_error()); 
 while($info1 = mysql_fetch_array( $data1)) 
{
print "<td ALIGN=RIGHT>".$info1['count1']."</td>";
$s1=$s1+$info1['count1'];
}

 $sql1="SELECT count(dieythinsi) as count1 FROM tasks where dieythinsi=".$x;
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

print "<a href=status-t.php target=new> ΠΑΤΗΣΤΕ ΕΔΩ ΓΙΑ ΚΑΤΑΣΤΑΣΗ ΑΝΑ ΤΜΗΜΑ </A><BR>";
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

  document.write('<a href="http://www.1freecounter.com/stats.php?i=117013" target=\"_blank\" >');
  document.write('<img alt="Free Counter" border=0 hspace=0 '+'vspace=0 src="http://www.1freecounter.com/counter.php?i=117013' + data + '">');
  document.write('</a>');
  </script>

<!-- End 1FreeCounter.com code -->
 <?php


print "<H2> ΑΡΜΟΔΙΟΤΗΤΕΣ </H2>";
if ((isset($_REQUEST['short']))) print "<a href=organogramma.php> ΣΥΝΤΟΜΕΥΜΕΝΗ ΕΚΔΟΣΗ - ΠΑΤΑ ΓΙΑ ΑΛΛΑΓΗ</a>";
if (!(isset($_REQUEST['short']))) print "<a href=organogramma.php?short> ΠΛΗΡΗΣ ΕΚΔΟΣΗ - ΠΑΤΑ ΓΙΑ ΑΛΛΑΓΗ</a>";
 
$gdieythinsi='---';
$dieythinsi='---';
$tmima='---';
$armodiotita='---';
$diadikasia='---';
$l1=0;$l2=0;$l3=0;$l4=0;$l5=0;


$sql="SELECT * FROM completed";
$data = mysql_query($sql)
 or die(mysql_error()); 
  print "<table>";
 while($info = mysql_fetch_array( $data )) 

{
if ($info['gd1']!=$gdieythinsi)
{
$l1=$l1+1;$l2=0;$l3=0;$l4=0;$l5=0;
$dieythinsi='---';$tmima='---';
$armodiotita='---';
$diadikasia='---';

$gdieythinsi=$info['gd1'];

print "<tr style='color:green'><td>".$l1."."."</td><td><hr>Γ.Δ. ".$gdieythinsi."<hr></td></tr>";
}

if ($info['d1']!=$dieythinsi)
{
$l2=$l2+1;$l3=0;$l4=0;$l5=0;
$tmima='---';
$armodiotita='---';
$diadikasia='---';
$dieythinsi=$info['d1'];

print "<tr style='color:blue'><td>".$l1.".".$l2."."."</td><td>Δ. ".$dieythinsi."</td></tr>";
}

if ($info['t1']!=$tmima)
{
$l3=$l3+1;$l4=0;$l5=0;
$armodiotita='---';
$diadikasia='---';

$tmima=$info['t1'];

print "<tr style='color:red'><td>".$l1.".".$l2.".".$l3."."."</td><td>Τμ. ".$tmima."</td></tr>";

}

if ($info['armodiotita']!=$armodiotita)
{
$l4=$l4+1;$l5=0;
$diadikasia='---';
$armodiotita=$info['armodiotita'];
print "<tr style='font-style: italic'><td>".$l1.".".$l2.".".$l3.".".$l4."."."</td><td>".$armodiotita."</td></tr>";
}

if (!(isset($_REQUEST['short'])))
{
if ($info['diadikasia']!=$diadikasia)
{
$l5=$l5+1;
$diadikasia=$info['diadikasia'];
print "<tr style='font-size:x-small'><td><a href=edittasks.php?taskid=".$info['taskid'].">".$l1.".".$l2.".".$l3.".".$l4.".".$l5."."."</td><td>".$diadikasia."</a>";

if (isset($_REQUEST['fortos'])) print "----Φόρτος:(".(CalcTotalFortos($info['taskid'])*$units).") ανθρωποέτη ";

print "</td></tr>";
}
}

}
 print "</table>";
 
 
?>

