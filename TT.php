<?php

require_once 'dbconfig.php';

if(isset($_POST['date'])){
    $date = $_POST['date'];
    // $instructor_email = $_SESSION['username'];
    // $instructor_list = "SELECT * FROM instructor WHERE `email`='$instructor_email'";
    // $result = mysqli_query($conn, $instructor_list);

    // if($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         $instructor_id = $row['inst_id'];
    //     }
    // }


    $join_result = "SELECT instructor.first_name, instructor.last_name, assign.course_code, assign.course_name, assign.date, assign.time_slot
                    FROM instructor INNER JOIN assign ON instructor.inst_id = assign.inst_id
                    WHERE  assign.date = '$date' ";

    $join_result = mysqli_query($conn, $join_result);
                    
        if($join_result->num_rows > 0){

            // output data of each row
            while($row = $join_result->fetch_assoc()){
                    $fname = $row['first_name'];
                    $lname = $row['last_name'];
                    $fullName = $fname.' '.$lname;
                echo "<tr>
                        <td>".$fullName."</td>
                        <td>".$row['course_code']."</td>
                        <td>".$row['course_name']."</td>
                        <td>".$row['date']."</td>
                        <td>".$row['time_slot']."</td>
                    </tr>";
            }
        }else{
            echo "0 result";
        }



    // $assign_list = "SELECT * FROM assign WHERE `date`='$date' ORDER BY `time_slot`";
    // $result = mysqli_query($conn, $assign_list);

    // if($result->num_rows > 0){

    //     // output data of each row
    //     while($row = $result->fetch_assoc()){

    //         echo "<tr>
    //                 <td>".$row['inst_id']."</td>
    //                 <td>".$row['course_code']."</td>
    //                 <td>".$row['course_name']."</td>
    //                 <td>".$row['date']."</td>
    //                 <td>".$row['time_slot']."</td>
    //             </tr>";
    //     }
    // }else{
    //     echo "0 result";
    // }
    $conn->close();	
}

?>