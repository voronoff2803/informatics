<?php
require('connect.php');
$group_id = $_GET["group_id"];
$pupil_sex = $_GET["pupil_sex"];
$pupil_name = $_GET["pupil_name"];
$connection = mysqli_connect($host, $user, $password, $db);
$sql = "INSERT INTO pupils (group_id, pupil_sex, pupil_name)
        VALUES ('" . $group_id . "','" . $pupil_sex . "','" . $pupil_name . "');";
$result = mysqli_query($connection, $sql);
echo("<script>location.href='list.php'</script>");
?>