<?php
require_once 'connect.php';
 
$connection = mysqli_connect($host, $user, $password, $db);
echo "<form method='GET' action='search.php'>
<p>Введите имя ученика: <input type='text' name='full_name' value='$full_name'></p>
<p>Введите номер ученика: <input type='text' name='number' value='$number'></p>
<p><input type='submit' name='enter' value='Поиск'></p>
</form>";
$full_name = strtr($_GET['full_name'], '*', '%');
$number = strtr($_GET['number'], '*', '%');
if (isset($_GET['enter'])) {
    $sql="SELECT pupil_name, pupil_id
    FROM pupils
    WHERE pupil_name LIKE '%$full_name%' AND pupil_id LIKE '%$number%'";
    $result = mysqli_query($connection, $sql);
    echo "<table border='1'>
    <tr> 
    <th>pupil_name</th>
    <th>pupil_id</th>
    </tr>";
    while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['pupil_name'] . "</td>";
        echo "<td>" . $row['pupil_id'] . "</td>";
        echo "</tr>";
    }
echo "</table>";
}
mysqli_close($connection);
?>