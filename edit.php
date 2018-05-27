<html>
<body>

<?php
require('connect.php');
$pupil_id = $_GET["id"];
if (is_null($pupil_id)) {
    exit;
}
$connection = mysqli_connect($host, $user, $password, $db);
$pupils_result = mysqli_query($connection, "SELECT DISTINCT pupil_id, pupil_sex, pupil_name, group_id FROM pupils;");
$pupil = mysqli_fetch_assoc($pupils_result);
$result2 = mysqli_query($connection, "SELECT * FROM groups;");
?>

<form action="dbupdate.php" method="get">
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

</body>
</html>