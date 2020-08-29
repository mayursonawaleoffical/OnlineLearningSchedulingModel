<?php
    require_once 'dbconfig.php';
    require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OLSM</title>
</head>
<body>
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
        text-align: <center></center>;
        background-color: #4CAF50;
        color: white;
        }

    </style>
</head>
<body>
    <section class="courseList">
        <div class="container">
            <div class="courseList-binder">
                <table id="list">
                    <thead>
                        <tr>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Course Level</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $course_list = "SELECT * FROM courses";
                        $result = mysqli_query($conn, $course_list);
                    
                        if($result->num_rows > 0){
                            
                            //output data of each row
                            while($row = $result->fetch_assoc()){
                                echo "<tr>
                                        <td>".$row['course_code']."</td>
                                        <td>".$row['course_name']."</td>
                                        <td>".$row['course_level']."</td>
                                    </tr>";
                            }
                        }else{
                            echo "0 result";
                        }
                        $conn->close();	
                    ?>
                    </tbody>                  
                </table>
            </div>
        </div>
    </section>
</body>
</html>