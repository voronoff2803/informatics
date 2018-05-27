<html>
<body>

<?php

require('connect.php');
$pupil_id = $_GET["id"];
if (is_null($pupil_id)) {
    exit;
}
$connection = mysqli_connect($host, $user, $password, $db);
?>

<form action="dbupdate.php" method="get">
    <input type="hidden" name="pupil_id" value=<?php echo $record['pupil_id']; ?>><br>
    pupil_sex:
    <input type="text" name="pupil_sex" value=<?php echo $record['pupil_sex']; ?>><br>
    pupil_name:
    <input type="text" name="pupil_name" value=<?php echo $record['pupil_name']; ?>><br>
    group:
    <select name="group_id">
        <?php 
            while($row = mysqli_fetch_assoc($result2)) {
                if ($row['group_id'] == $record['group_id'])
                    echo "<option selected value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";
                else
                    echo "<option value='" . $row['group_id'] . "'>" . $row['group_name'] . "</option>";                    
            }
        ?>
    </select><br>

    <input type="submit">
</form>

</body>
</html>