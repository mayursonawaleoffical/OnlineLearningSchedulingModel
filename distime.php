<?php
require_once 'dbconfig.php';

if (isset($_POST['date'])) {
    $date = $_POST['date'];
    $instID = $_POST['instID'];

    $assign_list = "SELECT * FROM assign WHERE `inst_id`='$instID' AND `date`='$date'";
    $result = mysqli_query($conn, $assign_list);

    if($result->num_rows > 0){

        //output data of each row
        while($row = $result->fetch_assoc()){
            $times=$row['time_slot'];
            echo "<input class='time_array' value='$times'/>";
        }
    }
}

?>