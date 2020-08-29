<?php
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
        text-align: <center></center>;
        background-color: #4CAF50;
        color: white;
        }

    </style>
</head>
<body>
    <section class="instructorList">
        <div class="container">
            <div class="instructorList-binder">
                <table id="list">
                    <thead>
                        <tr>
                            <th>Instructor ID</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Birth Date</th>
                            <th>Mobile No.</th>
                            <th>Address</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        // if(isset($_POST["show"])){
                            $instructor_list = "SELECT * FROM instructor";
                            $result = mysqli_query($conn, $instructor_list);
                        
                            if($result->num_rows > 0){
                               
                                //output data of each row
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                            <td>".$row['inst_id']."</td>
                                            <td>".$row['first_name']." ".$row['last_name']."</td>
                                            <td>".$row['gender']."</td>
                                            <td>".$row['BOD']."</td>
                                            <td>".$row['mobile']."</td>
                                            <td>".$row['inst_address']."</td>
                                            <td>".$row['email']."</td>
                                        </tr>";
                                }
                            }else{
                                echo "0 result";
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