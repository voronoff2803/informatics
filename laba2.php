<!doctype html>
<head>
    <meta charset="utf-8">
    <title>SETUP</title>
</head>
<body>

  <?php


// Подключение к базе данных

require_once 'connect.php';


  $connection = mysqli_connect($host, $user, $password, $db);

  if($connection == false)
  {
  	echo "(((((((";
  	echo mysqli_connect_error();
  	exit();
  }

$query = "CREATE TABLE `classrooms` (
  `classroom_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `classroom_name` varchar(30) NOT NULL,
  PRIMARY KEY (`classroom_id`)
)";
$result = mysqli_query($connection, $query);
$query = "INSERT INTO `classrooms` VALUES (1,'Кабинет русского языка'),(2,'Кабинет математики'),(3,'Кабинет физики'),(4,'кабинет информатики')";
$result = mysqli_query($connection, $query);

$query = "CREATE TABLE `gradebook` (
  `grade_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) NOT NULL,
  `pupil_id` bigint(20) NOT NULL,
  `grade` varchar(30) NOT NULL,
  PRIMARY KEY (`grade_id`))";
$result = mysqli_query($connection, $query);


$query = "INSERT INTO `gradebook` VALUES (1,1,1,'a'),(2,1,2,'a'),(3,1,3,'a'),(4,1,4,'a'),(5,1,5,'a'),(6,1,6,'a'),(7,2,1,'a'),(8,3,2,'a'),(9,4,3,'a'),(10,3,4,'a'),(11,2,5,'a'),(12,1,6,'a')";
$result = mysqli_query($connection, $query);


$query = "CREATE TABLE `groups` (
  `group_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) NOT NULL,
  `group_name` varchar(30) NOT NULL,
  PRIMARY KEY (`group_id`))";
$result = mysqli_query($connection, $query);


$query = "INSERT INTO `groups` VALUES (1,1,'11а'),(2,2,'11б'),(3,3,'5а'),(4,4,'5б');";
$result = mysqli_query($connection, $query);


$query = "CREATE TABLE `teachers` (
  `teacher_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  PRIMARY KEY (`teacher_id`))";
$result = mysqli_query($connection, $query);


$query = "INSERT INTO `teachers` VALUES (1,1,'Вавилов А.С.'),(2,2,'Куликова О.Н.'),(3,3,'Иванова И.С.'),(4,4,'Коваленко Д.Р.')";
$result = mysqli_query($connection, $query);


$query = "CREATE TABLE `pupils` (
  `pupil_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `group_id` bigint(20) NOT NULL,
  `pupil_sex` char(1) NOT NULL,
  `pupil_name` varchar(30) NOT NULL,
  PRIMARY KEY (`pupil_id`))";
$result = mysqli_query($connection, $query);


$query = "INSERT INTO `pupils` VALUES (1,1,'м','Иванов'),(2,1,'м','Максимов'),(3,1,'м','Куликов'),(4,1,'ж','Станенко'),(5,2,'м','Воронов'),(6,2,'ж','Голубева'),(7,2,'м','Столяров'),(8,2,'ж','Аникина'),(9,3,'ж','Красавина'),(10,3,'м','Голубин'),(11,3,'м','Кошкин'),(12,3,'м','Максимов'),(13,4,'ж','Егорова'),(14,4,'м','Колобков'),(15,4,'м','Ильюшин'),(16,4,'м','Петухов')";
$result = mysqli_query($connection, $query);



$query = "CREATE TABLE `schedule` (
  `schedule_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) NOT NULL,
  `classroom_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `schedule_time` time NOT NULL,
  PRIMARY KEY (`schedule_id`))";
$result = mysqli_query($connection, $query);



$query = "INSERT INTO `schedule` VALUES (1,1,1,1,'08:00:00'),(2,1,1,2,'08:00:00'),(3,4,4,3,'08:00:00'),(4,2,2,4,'08:00:00'),(5,2,2,1,'08:45:00'),(6,1,1,2,'08:45:00'),(7,4,4,3,'08:45:00'),(8,1,1,4,'08:45:00'),(9,3,3,1,'09:30:00'),(10,2,2,2,'09:30:00'),(11,2,2,3,'09:30:00'),(12,4,4,4,'09:30:00')";
$result = mysqli_query($connection, $query);


$query = "CREATE TABLE `subjects` (
  `subject_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject_name` varchar(30) NOT NULL,
  PRIMARY KEY (`subject_id`))";
$result = mysqli_query($connection, $query);



$query = "INSERT INTO `subjects` VALUES (1,'Русский язык'),(2,'Математика'),(3,'Физика'),(4,'Информатика')";
$result = mysqli_query($connection, $query);



  $classrooms_result = mysqli_query($connection, "SELECT * FROM `classrooms`");

  echo "<br><h2 align=center>classrooms</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 70>classroom_id</td>
  <td align=center width = 100>classroom_name</td>
  </tr>";

  while ($classrooms = mysqli_fetch_assoc($classrooms_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 70 >$classrooms[classroom_id]</td>
  <td align=center width = 100>$classrooms[classroom_name]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



$gradebook_result = mysqli_query($connection, "SELECT * FROM `gradebook`");

  echo "<br><h2 align=center>gradebook</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>grade_id</td>
  <td align=center width = 80>subject_id</td>
  <td align=center width = 130>pupil_id</td>
  <td align=center width = 130>grade</td>
  </tr>";

  while ($gradebook = mysqli_fetch_assoc($gradebook_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$gradebook[grade_id]</td>
  <td align=center width = 80>$gradebook[subject_id]</td>
  <td align=center width = 130>$gradebook[pupil_id]</td>
  <td align=center width = 130>$gradebook[grade]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



$groups = mysqli_query($connection, "SELECT * FROM `groups`");

  echo "<h2 align=center>groups</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 70>group_id</td>
  <td align=center width = 70>teacher_id</td>
  <td align=center width = 80>group_name</td>
  </tr>";

  while ($group = mysqli_fetch_assoc($groups))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 70 >$group[group_id]</td>
  <td align=center width = 70>$group[teacher_id]</td>
  <td align=center width = 80>$group[group_name]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



$pupils_result = mysqli_query($connection, "SELECT * FROM `pupils`");

  echo "<br><h2 align=center>pupils</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 90>pupil_id</td>
  <td align=center width = 100>group_id</td>
  <td align=center width = 110>pupil_sex</td>
  <td align=center width = 110>pupil_name</td>
  </tr>";

  while ($pupils = mysqli_fetch_assoc($pupils_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 90>$pupils[pupil_id]</td>
  <td align=center width = 100>$pupils[group_id]</td>
  <td align=center width = 110>$pupils[pupil_sex]</td>
  <td align=center width = 110>$pupils[pupil_name]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



$schedule_result = mysqli_query($connection, "SELECT * FROM `schedule`");

  echo "<br><h2 align=center>schedule</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>schedule_id</td>
  <td align=center width = 80>teacher_id</td>
  <td align=center width = 130>classroom_id</td>
  <td align=center width = 130>schedule_time</td>
  </tr>";

  while ($schedule = mysqli_fetch_assoc($schedule_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$schedule[schedule_id]</td>
  <td align=center width = 80>$schedule[teacher_id]</td>
  <td align=center width = 130>$schedule[classroom_id]</td>
  <td align=center width = 130>$schedule[schedule_time]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



  $subjects_result = mysqli_query($connection, "SELECT * FROM `subjects`");

  echo "<br><h2 align=center>subjects</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 110>subject_id</td>
  <td align=center width = 100>subject_name</td>
  </tr>";

  while ($subjects = mysqli_fetch_assoc($subjects_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 110>$subjects[subject_id]</td>
  <td align=center width = 100>$subjects[subject_name]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



  $teachers_result = mysqli_query($connection, "SELECT * FROM `teachers`");

  echo "<br><h2 align=center>teachers</h2>";

  echo "<table border=1 align=center>
  <tr>
  <td align=center width = 100>teacher_id</td>
  <td align=center width = 100>subject_id</td>
  <td align=center width = 100>teacher_name</td>
  </tr>";

  while ($extra = mysqli_fetch_assoc($teachers_result))
  {
  echo "
  <table border=1 align=center>
  <tr>
  <td align=center width = 100>$extra[teacher_id]</td>
  <td align=center width = 100>$extra[subject_id]</td>
  <td align=center width = 100>$extra[teacher_name]</td>
  </tr> 
  </table>"; 
  }

  echo "</table><br><br><br>";



?>

</body>
</html>