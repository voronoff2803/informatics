<?php
require('connect.php');
$pupil_id = $_GET["id"];
if (is_null($pupil_id)) {
    exit;
}
$conn = mysqli_connect($host, $user, $password, $db);
$sql = "DELETE
        FROM pupils
        WHERE pupil_id='" . $pupil_id . "';";
$result = mysqli_query($conn, $sql);
echo("<script>location.href='list.php'</script>");
?>