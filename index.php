<?php
 include("bd.php");
 global $dbh;
 $nurses = prepare_list('Name','Nurse');
 $departments = prepare_list('Department','Nurse');
 $wards = prepare_list('name','ward');
?> 
<!DOCTYPE HTML>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>ЛБ 3</title>
  <link href="style1.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="script.js"></script>
 </head>
 <body>
  <main>
  <h1 style="margin-left: 50px;">Оберіть дію:</h1><br>
  <form action="wards.php" method="post" class="block">
   <h3>Палати по медсестрам</h3>
   <span>
    <select id="select_nurse" name="nurse">
       <?php echo $nurses ?>
    </select>
    <input type="submit" id="wards" value="Перелік палат обраної медсестри" />
    </span>
  </form>
  <form action="nurses.php" method="post" class="block">
    <h3>Медсестри по відділенням</h3>
    <span>
    <select name="department" id="select_department">
	<?php echo $departments ?>
    </select>
    <input type="submit" id="nurses" value="Медсестри обраного відділення" />
    </span>
  </form>
  <form action="shifts.php" method="post" class="block">
  <h3>Чергування в обрану зміну</h3>
    <span>
   <select name="shift" id="select_shift">
     <option value="First">Перша зміна</option>
      <option value="Second">Друга зміна</option>
      <option value="Third">Третя зміна</option>
   </select>
    <input type="submit" id="shifts" value="Чергування" />
    </span>
  </form>
  <form action="add_nurse.php" method="post" class="block">
    <h3>Додати медсестру</h3>
   <span>
   <input name="nurseName"  type="text" value="Ім'я">
   <select name="nurseDepartment">    
	<?php echo $departments ?>
    </select>
   <select name="shift">
     <option value="First">Перша зміна</option>
      <option value="Second">Друга зміна</option>
      <option value="Third">Третя зміна</option>
   </select>
   <input type="submit" value="Додати медсестру" />
   </span>
  </form>
  <form action="add_ward.php" method="post" class="block">
   <h3>Додати палату</h3>
   <span>
   <input name="wardNumber"  type="text" value="Номер" />
   <input type="submit" value="Додати палату" />
   </span>
  </form>
  <form action="bind.php" method="post"  class="block">
     <h3>Призначити медсестру в палату</h3>
    <span>
    <select name="nurse">    
	<?php echo $nurses ?>
    </select>
    <select name="ward">    
	<?php echo $wards ?>
    </select>
   <input type="submit" value="Призначити медсестру">
   </span>
  </form>
  <div class="block" id="report" style="display: none">
  </div>
 </main>
 </body>
</html>
