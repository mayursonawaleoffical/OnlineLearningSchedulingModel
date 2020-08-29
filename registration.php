<?php
    require_once 'dbconfig.php';
    require_once 'homeNav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/registration.css">
    <title>OLSM</title>
</head>
<body>
    <section class="registration-page">
        <div class="container">
            <div class="binder registration-binder">
                <div class="headline">
                    <h2>Registration Panel</h2>
                </div>
                <form action="" method="post" class="form-container registration-form" enctype="multipart/form-data">
                    <!-- User Type -->
                    <div class="input-title">
                        <h3 class="title">I am a </h3>
                    </div>
                    <select class="select user" name="user" required>
                        <option value="" disabled selected>I am a..</option>
                        <option value="student">Student</option>
                        <option value="instructor">Instructor</option>
                    </select>

                    <!-- Name -->
                    <div class="input-title">
                        <h3 class="title">Student Name</h3>
                    </div>
                    <input type="text" name="first_name" class="first_name txt-area" placeholder="First Name" required/>
                    <input type="text" name="last_name" class="last_name txt-area" placeholder="Last Name" required/>
                    
                    <!-- Gender -->
                    <div class="input-title">
                        <h3 class="title">Gender</h3>
                    </div>
                    <select class="select gender" name="gender" required>
                        <option value="" disabled selected>Select Your Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>

                    <!-- Birth Date -->
                    <div class="input-title">
                        <h3 class="title">Birth Date</h3>
                    </div>
                    <input type="date" name="bod" id="bod" class="bod" min="1960-01-01" onclick="validDate()" required/>

                    <!-- Mobile No. -->
                    <div class="input-title">
                        <h3 class="title">Mobile No.</h3>
                    </div>
                    <input type="tel" name="tel" pattern="^\d{10}$" class="tel txt-area" placeholder="Format: 123-456-7890" required/>

                    <!-- Address -->
                    <div class="input-title">
                        <h3 class="title">Address</h3>
                    </div>
                    <textarea name="address" class="address txt-area" required></textarea>

                    <!-- Email -->
                    <div class="input-title">
                        <h3 class="title">Email</h3>
                    </div>
                    <input type="email" name="email" pattern="[^ @]*@[^ @]*" class="email txt-area" placeholder="Ex: abc@domain.com" required/>
                    
                    <!-- Password -->
                    <div class="input-title">
                        <h3 class="title">Password</h3>
                    </div>
                    <input type="password" name="password" class="password txt-area" placeholder="Password" required/>
                    <input type="password" name="repassword" class="repassword txt-area" placeholder="Confirm Password" required/>

                    <!-- Check Box with text -->
                    <div class="input-title">
                        <h3 class="title">Terms and condition</h3>
                    </div>
                    <div class="term-binder">
                        <input type="checkbox" name="terms" class="terms" required/> I accept all terms and conditions regarding the use of this website.
                    </div>

                    <!-- Submit/Reset -->
                    <input type="reset" name="reset" class="reset btn" value="Reset"/>
                    <input type="submit" name="submit" class="submit btn" value="Submit"/>
                </form>
                <br>
                <font>Already have an account? </font><a href="login.php">Login here</a>
            </div>
        </div>
    </section>

    <!-- Script for Date -->
    <script>
        function validDate(){
            var today = new Date().toISOString().split('T')[0];
            $("#bod").attr('max', today);
        }
    </script>
</body>
</html>

<!-- ================== PHP code ================== -->

<?php
    include_once 'dbconfig.php';

    if (isset($_POST['submit'])) {
        
        $user_id = mysqli_insert_id( $conn );
        $type = $_POST['user'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender'];
        $bod = $_POST['bod'];
        $mobile = $_POST['tel'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];

        if ($password === $repassword) {

            if ($type == 'student') {

                $existing_query = "SELECT * FROM student WHERE `first_name`='$first_name' AND `last_name`='$last_name' AND `BOD`='$bod' OR (`mobile`='$mobile' AND `email`='$email')";

                $exisiting_result = mysqli_query($conn, $existing_query);

                if(0 < mysqli_num_rows ($exisiting_result)){
                    echo '<script type="text/javascript">
                            alert("Student is already registered!");
                                location="registration.php";
                            </script>';
                }
                else{

                    $user_id = mysqli_insert_id( $conn );
                
                    $reg = "INSERT INTO student (first_name, last_name, gender, BOD, mobile, stud_address, email, stud_password, time_stamp) VALUES ('$first_name', '$last_name', '$gender', '$bod', '$mobile', '$address', '$email', '$password', NOW())";

                        if (mysqli_query($conn, $reg)) {
                            echo "<script type='text/javascript'>
                                            alert('Student registration successfull');
                                            window.location='login.php';
                                                </script>";
                        } else {
                            echo "<script type='text/javascript'>
                                            alert('Registration not completed!');
                                            window.location='registration.php';
                                                </script>";
                        }
                }

            }
            else{                                     //Instructor

                $user_id = mysqli_insert_id( $conn );
                $reg_inst = "INSERT INTO instructor (first_name, last_name, gender, BOD, mobile, inst_address, email, inst_password, time_stamp) VALUES ('$first_name', '$last_name', '$gender', '$bod', '$mobile', '$address', '$email', '$password', NOW())";

                    if (mysqli_query($conn, $reg_inst)) {
                        echo "<script type='text/javascript'>
                                        alert('Instructor registration successfull');
                                        window.location='login.php';
                                            </script>";
                    } else {
                        echo "<script type='text/javascript'>
                                        alert('Registration not completed!');
                                        window.location='registration.php';
                                            </script>";
                    }

            }
            
        }
        else {
            echo "<script type='text/javascript'>
                            alert('Please enter same password in both the colunm!');
                            return false;
                                </script>";
            }                                        
    }

?>