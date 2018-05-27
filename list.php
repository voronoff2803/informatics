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

  echo "<br><h2 align=center>ГЛАВТАБЛИЦА !</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>pupil_id</td>
  <td align=center width = 100>pupil_name</td>
  <td align=center width = 100>pupil_sex</td>
  <td align=center width = 100>group_id</td>
  <td align=center width = 100>group_name</td>
  <td align=center width = 100>teacher_id</td>
  <td align=center width = 100>teacher_name</td>
  <td align=center width = 100>Update</td>
  <td align=center width = 100>Delete</td>
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
  <td><a href='edit.php?id=" . $pupils[pupil_id] . "'>update</a></td>
  <td><a href='delete.php?id=" . $pupils[pupil_id] . "'>delete</a></td>
  </tr> 
  </table>"; 
  }

 // <td align=center width = 80>$contracts[client_id]</td>
  $result2 = mysqli_query($connection, "SELECT * FROM groups;");
  ?>

  Добавить ученика:
  <form action="dbadd.php" method="get">
    <input type="hidden" name="pupil_id" value=<?php echo $pupil['pupil_id']; ?>><br>
    pupil_sex:
    <input type="text" name="pupil_sex" value=<?php echo $pupil['pupil_sex']; ?>><br>
    pupil_name:
    <input type="text" name="pupil_name" value=<?php echo $pupil['pupil_name']; ?>><br>
    group:
    <select name="group_id">
        <?php 
            while($row = mysqli_fetch_assoc($result2)) {
                if ($row['group_id'] == $pupil['group_id'])
                    echo "<option selected value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                else
                    echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";                    
            }
        ?>
    </select><br>

    <input type="submit">
</form>