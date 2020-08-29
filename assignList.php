<?php
    // session_start();
    require_once 'dbconfig.php';
    require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>OLSM</title>
    <style>
        #list{
            width:100%;
            border-collapse: collapse;
        }
        #list td, #list th {
            border: 1px solid #ddd;
            padding: .5rem;
        }
        #list tr:nth-child(even){background-color: #f2f2f2;}

        #list tr:hover {background-color: #ddd;}

        #list th {
        padding: .7rem 0rem;
        text-align: center;
        background-color: #4CAF50;
        color: white;
        }

    </style>
</head>
<body>
    <section class="assignList">
        <div class="container">
            <div class="assignList-binder">
                <table id="list">
                    <thead>
                        <tr>
                            <th>Course_code</th>
                            <th>Course Name</th>
                            <th>Date</th>
                            <th>Timing</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // if(isset($_POST["show"])){
                            $instructor_email = $_SESSION['username'];
                            $instructor_list = "SELECT * FROM instructor WHERE `email`='$instructor_email'";
                            $result = mysqli_query($conn, $instructor_list);
                        
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $instructor_id = $row['inst_id'];
                                }
                            }

                            $assign_list = "SELECT * FROM assign WHERE `inst_id`='$instructor_id' ORDER BY `date`";
                            $result = mysqli_query($conn, $assign_list);
                        
                            if($result->num_rows > 0){

                                //output data of each row
                                while($row = $result->fetch_assoc()){

                                    echo "<tr>
                                            <td>".$row['course_code']."</td>
                                            <td>".$row['course_name']."</td>
                                            <td>".$row['date']."</td>
                                            <td>".$row['time_slot']."</td>
                                        </tr>";
                                }
                            }else{
                                echo "<tr>
                                        <td colspan='4' rowspan='3'><h2 style='text-align:center; font-weight:bold'>Courses are not yet assigned.</h2></td>
                                        </tr>";
                            }
                            $conn->close();	
                        // }    
                    ?>
                    </tbody>                  
                </table>
            </div>
        </div>
    </section>
</body>
</html>
