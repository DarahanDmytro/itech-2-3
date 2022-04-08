<?php
include("bd.php");
$department=$_POST['department'];

$sth = $dbh->prepare("SELECT DISTINCT name, shift FROM nurse 
                      WHERE department=:department");
$sth->bindParam(':department',$department,PDO::PARAM_STR);
$sth->execute();
$res=$sth->fetchAll(PDO::FETCH_NUM);
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
echo '<?xml version="1.0" encoding="utf8" ?>';
echo "<root>";
foreach ($res as $row)
{
  $NurseName=$row[0];
  $Shift=$row[3];
  print "<row><NurseName>$name</NurseName>
  <Shift>$shift</Shift> </row>";
}
echo "</root>";
?>