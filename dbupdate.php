<?php
require('connect.php');
$pupil_id = $_GET["pupil_id"];
$group_id = $_GET["group_id"];
$pupil_sex = $_GET["pupil_sex"];
$pupil_name = $_GET["pupil_name"];
$connection = mysqli_connect($host, $user, $password, $db);
$sql = "UPDATE pupils
        SET group_id = '" . $group_id . "', pupil_sex = '" . $pupil_sex . "', pupil_name = '" . $pupil_name . "'
        WHERE pupil_id=" . $pupil_id . ";";
$result = mysqli_query($connection, $sql);
echo("<script>location.href='list.php'</script>");
?>