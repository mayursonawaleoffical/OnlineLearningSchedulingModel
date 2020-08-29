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
        .profile-binder{
            display:flex;
            justify-content: space-evenly;
        }

        .profile-binder{
            width : 100%;
        }

        #DataTable tr:hover {background-color: #ddd;}

        #DataTable td{
            width: 100%;
            padding: .5rem;
        }

        @media screen and (min-width: 600px){
            #DataTable td{
                width: 0;
            }
        }

        @media screen and (min-width: 900px){
            #DataTable td{
                width: 20%;
            }
        }

    </style>
</head>
<body>
    <section class="profile">
        <div class="container">
            <div class="binder profile-binder">
                <table id="DataTable">
                    <?php
                        $login_type = $_SESSION['login_type'];
                        $username = $_SESSION['username'];

                        if($login_type == 'student'){
                            $student_profile = "SELECT * FROM student WHERE `email`='$username'";
                            $result = mysqli_query($conn, $student_profile);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                            <td><h3 class='title'>Name :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['first_name']." ".$row['last_name']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Gender :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['gender']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Birth Date :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['BOD']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Mobile No. :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['mobile']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Address :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['stud_address']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Email :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['email']."</h3></div>
                                            </td>";
                                }
                            }

                        }elseif($UserType == 'instructor'){
                            $instructor_profile = "SELECT * FROM instructor WHERE `email`='$username'";
                            $result = mysqli_query($conn, $instructor_profile);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    echo "<tr>
                                            <td><h3 class='title'>Name :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['first_name']." ".$row['last_name']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Gender :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['gender']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Birth Date :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['BOD']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Mobile No. :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['mobile']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Address :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['inst_address']."</h3>
                                            </td>";

                                    echo "<tr>
                                            <td><h3 class='title'>Email :</h3></td>
                                            <td>
                                                <h3 class='data'>".$row['email']."</h3></div>
                                            </td>";
                                }   
                            }
                        }
                        $conn->close();	
                    ?>
                </table>
            </div>
        </div>
    </section>
</body>
</html>