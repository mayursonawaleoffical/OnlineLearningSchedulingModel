<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <title>OLSM</title>
</head>
<body>
    <section class="navbar">
        <div class="container">
            <div class="navbar-binder">
                <div class="logo-container">
                    <a href="#" class="logo"><img src="./images/ideamagix.svg" alt="logo"/></a>
                </div>
                <ul class="nav-list">
                    <li class="nav-item"><a href="home.php" class="nav-link">Home</a></li>
                    <?php
                        $UserType = $_SESSION['login_type'];
                        if($UserType == 'student'){
                            // echo "<li class='nav-item hidden'><a href='studentList.php' class='nav-link'>Student</a></li>";
                            echo "<li class='nav-item'><a href='timetable.php' class='nav-link'>Time Table</a></li>";
                            echo "<li class='nav-item'><a href='profile.php' class='nav-link'>Profile</a></li>";
                        }elseif($UserType == 'instructor'){
                            echo "<li class='nav-item'><a href='studentList.php' class='nav-link'>Student</a></li>";
                            echo "<li class='nav-item'><a href='assignList.php' class='nav-link'>TimeTable</a></li>";
                            echo "<li class='nav-item'><a href='profile.php' class='nav-link'>Profile</a></li>";
                        }elseif($UserType == 'admin'){
                            echo "<li class='nav-item'><a href='studentList.php' class='nav-link'>Student</a></li>";
                            echo "<li class='nav-item'><a href='instructorList.php' class='nav-link'>Faculty</a></li>";
                            echo "<li class='nav-item'><a href='assign.php' class='nav-link'>Schedual</a></li>";
                            echo "<li class='nav-item'><a href='addCourse.php' class='nav-link'>Add Course</a></li>";
                            echo "<li class='nav-item'><a href='timetable.php' class='nav-link'>Time Table</a></li>";
                        }
                        else{
                            echo "<li class='nav-item hidden'><a href='assign.php' class='nav-link'>Schedual</a></li>";
                        }
                    ?>
                    <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div>
            </div>
        </div>
    </section>

    <script>
        //Select element function

        const selectElement = function (element){
            return document.querySelector(element);
        };

        let menuToggler = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggler.addEventListener('click', function(){
            body.classList.toggle('open');
        });
    </script>
</body>
</html>