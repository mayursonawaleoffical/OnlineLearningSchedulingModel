<?php
    session_start();
    require_once 'dbconfig.php';
    require_once 'homeNav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/login.css">
    <title>OLSM</title>
</head>
<body>
    <section class="login-page">
        <div class="container">
            <div class="binder login-binder">
                <div class="headline">
                    <h2>Login Panel</h2>
                </div>
                <form action="" method="post" class="form-container login-form" enctype="multipart/form-data">
                    <!-- Login Type -->
                    <div class="type-binder">
                        <div class="input-title">
                            <h3 class="title">Choose your login type</h3>
                        </div>
                        <select class="select login-type" name="type" required>
                            <option value="" disabled selected>Login type</option>
                            <option value="student">Student</option>
                            <option value="instructor">Instructor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <input type="text" name="username" class="username txt-area" placeholder="Username" required/>
                    <br>
                    <input type="password" name="password" class="password txt-area" placeholder="Password" required/>
                    <br>
                    <input type="submit" name="submit" class="submit btn" value="Login"/>
                </form>
                <br>
                <font>Don't have an acount? </font><a href="registration.php">Register here </a>
            </div>
        </div>
    </section>
</body>
</html>

<!-- ================== PHP code ================== -->

<?php
if(isset($_POST['submit'])) 
{
        $username = $_POST['username'];
        $password = $_POST['password'];
        $login_type = $_POST['type'];
        
        if ($username && $password)
        {

            if ($login_type == 'admin') {
                
                $sql_query = "SELECT * FROM admin WHERE username='$username'";

                $query = mysqli_query($conn, $sql_query);            
            
                if($query->num_rows > 0)
                {
                    while($row = $query->fetch_assoc())
                    {
                        $dbusername = $row['username'];
                        $dbpassword = $row['password'];
                    }
                    if ($username==$dbusername && $password==$dbpassword)
                    {
                        echo '<script type="text/javascript">
                                alert("Hi Admin!");
                                    location="home.php";
                                    </script>';
                        $_SESSION['login_type'] = $login_type;
                        $_SESSION['username'] = $username;
                    }
                    else
                        echo '<script type="text/javascript">
                                alert("Wrong Password!");
                                    location="login.php";
                                    </script>';
                }	 
                else
                    echo'<script type="text/javascript">
                                alert("That user doesn`t exist!");
                                    location="login.php";
                                    </script>';	
            }
            elseif ($login_type == 'student') {

                $sql_query = "SELECT * FROM student WHERE email='$username'";

                $query = mysqli_query($conn, $sql_query);            
            
                if($query->num_rows > 0)
                {
                    while($row = $query->fetch_assoc())
                    {
                        $dbusername = $row['email'];
                        $dbpassword = $row['stud_password'];
                        $name = $row['first_name'];
                    }
                    if ($username==$dbusername && $password==$dbpassword)
                    {
                        echo '<script type="text/javascript">
                                alert("Welcome User!");
                                    location="home.php";
                                    </script>';
                        $_SESSION['login_type'] = $login_type;
                        $_SESSION['username'] = $username;
                    }
                    else
                        echo '<script type="text/javascript">
                                alert("Wrong Password!");
                                    location="login.php";
                                    </script>';
                }	 
                else
                    echo'<script type="text/javascript">
                                alert("That user doesn`t exist!");
                                    location="login.php";
                                    </script>';	                
            }else {
                $sql_query = "SELECT * FROM instructor WHERE email='$username'";

                $query = mysqli_query($conn, $sql_query);            
            
                if($query->num_rows > 0)
                {
                    while($row = $query->fetch_assoc())
                    {
                        $dbusername = $row['email'];
                        $dbpassword = $row['inst_password'];
                        $name = $row['first_name'];
                    }
                    if ($username==$dbusername && $password==$dbpassword)
                    {
                        echo '<script type="text/javascript">
                                alert("Welcome instructor!");
                                    location="home.php";
                                    </script>';
                        $_SESSION['login_type'] = $login_type;
                        $_SESSION['username'] = $username;
                    }
                    else
                        echo '<script type="text/javascript">
                                alert("Wrong Password!");
                                    location="login.php";
                                    </script>';
                }	 
                else
                    echo'<script type="text/javascript">
                                alert("That instructor doesn`t exist!");
                                    location="login.php";
                                    </script>';	
            }
            
        }
          else 
        	  echo '<script type="text/javascript">
                              alert("Please enter a username and password!");
                                 location="login.php";
                                   </script>';
}
	  	 
?>
