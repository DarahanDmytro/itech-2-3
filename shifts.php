<?php
include("bd.php");
$shift=$_POST['shift'];


$sth = $dbh->prepare("SELECT DISTINCT n.name, w.name FROM nurse as n
                          INNER JOIN nurse_ward ON FID_Nurse=ID_Nurse 
                          INNER JOIN ward as w ON FID_Ward=ID_Ward
                      WHERE shift=:shift");
$sth->bindParam(':shift',$shift,PDO::PARAM_STR);
$sth->execute();
$res=$sth->fetchAll();


$table = "<tr><th>Медсестра</th><th>Палата</th></tr>";

foreach($res as $row)
{
  $table=$table."<tr><td>".$row[0]."</td><td>".$row[1]."</td></tr>";			
}

echo <<< END
<table id="myTable" class="table_dark">
  <caption><b>Зміна $shift</b></caption>
    $table
</table>
END;
?>