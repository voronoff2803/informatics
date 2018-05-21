 <?php


// Подключение к базе данных

require_once 'connect.php';


  $connection = mysqli_connect($host, $user, $password, $db);

  if($connection == false)
  {
  	echo mysqli_connect_error();
  	exit();
  }

$pupils_result = mysqli_query($connection, "SELECT DISTINCT pupils.pupil_id, pupils.pupil_name, pupils.pupil_sex, groups.group_id, groups.group_name, teachers.teacher_id, teachers.teacher_name FROM pupils, groups, teachers WHERE pupils.group_id = groups.group_id and groups.teacher_id = teachers.teacher_id");

  echo "<br><h2 align=center>3 ТАБЛИЦЫ</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>pupil_id</td>
  <td align=center width = 100>pupil_name</td>
  <td align=center width = 100>pupil_sex</td>
  <td align=center width = 100>group_id</td>
  <td align=center width = 100>group_name</td>
  <td align=center width = 100>teacher_id</td>
  <td align=center width = 100>teacher_name</td>
  </tr>";

  while ($pupils = mysqli_fetch_assoc($pupils_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$pupils[pupil_id]</td>
  <td align=center width = 100>$pupils[pupil_name]</td>
  <td align=center width = 100>$pupils[pupil_sex]</td>
  <td align=center width = 100>$pupils[group_id]</td>
  <td align=center width = 100>$pupils[group_name]</td>
  <td align=center width = 100>$pupils[teacher_id]</td>
  <td align=center width = 100>$pupils[teacher_name]</td>
  </tr> 
  </table>"; 
  }

 // <td align=center width = 80>$contracts[client_id]</td>

  ?>