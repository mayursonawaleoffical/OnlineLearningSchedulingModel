<?php
    // include_once 'dbconfig.php';

    // if (isset($_POST['submit'])) {
        
    //     $user_id = mysqli_insert_id( $conn );
    //     $first_name = $_POST['first_name'];
    //     $last_name = $_POST['last_name'];
        // $gender = $_POST['gender'];
        // $bod = $_POST['bod'];
        // $mobile = $_POST['tel'];
        // $address = $_POST['address'];
        // $email = $_POST['email'];
        // $password = $_POST['password'];
        // $repassword = $_POST['repassword'];

        // $existing_query = "SELECT * FROM student WHERE `first_name`='$first_name' AND `last_name`='$last_name' AND `BOD`='$bod' OR (`mobile`='$mobile' AND `email`='$email')";

        // $exisiting_result = mysqli_query($conn, $existing_query);

        // if(0 < mysqli_num_rows ($exisiting_result)){
        //     echo '<script type="text/javascript">
        //             alert("Student is already registered!");
        //                 location="registration.php";
        //              </script>';
        // }
        // else{

        //         if ($password === $repassword) {

        //             $reg = "INSERT INTO student (first_name, last_name, gender, BOD, mobile, stud_address, email, stud_password, time_stamp) VALUES ('$first_name', '$last_name', '$gender', '$bod', '$mobile', '$address', '$email', '$password', NOW())";

        //             if (mysqli_query($conn, $reg)) {
        //                 echo "<script type='text/javascript'>
        //                                 alert('Student registration successfull');
        //                                 window.location='login.php';
        //                                     </script>";
        //             } else {
        //                 echo "<script type='text/javascript'>
        //                                 alert('Registration not completed!');
        //                                 window.location='registration.php';
        //                                     </script>";
        //             }
                    
        //         }
        //         else {
        //             echo "<script type='text/javascript'>
        //                             alert('Please enter same password in both the colunm!');
        //                                 </script>";
        //             }                                        
        //     }
    //}

?>