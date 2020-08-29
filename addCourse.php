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
    <link rel="stylesheet" type="text/css" href="./css/addCourse.css">
    <title>OLSM</title>
</head>
<body>
    <section class="addCourse">
        <div class="container">
            <div class="binder addCourse-binder">
                <div class="headline">
                    <h2>Add Courses In System</h2>
                </div>
                <form action="" method="post" class="form-container course-form" enctype="multipart/form-data">
                    
                <!-- Course Code -->
                    <div class="input-title">
                        <h3 class="title" style="color:red">Note:</h3>
                    </div>
                    <h4>To See Available Course, <a href="courseList.php">Click Here</a> </h4>

                    <!-- Course Code -->
                    <div class="input-title">
                        <h3 class="title">Course Code</h3>
                    </div>
                    <input type="text" name="course_Code" class="course_Code txt-area" placeholder="Ex: CO101" required/>

                    <!-- Course Name -->
                    <div class="input-title">
                        <h3 class="title">Course Name</h3>
                    </div>
                    <input type="text" name="course_name" class="course_name txt-area" placeholder="Ex: Java, C++ etc." required/>

                    <!-- Course Level -->
                    <div class="input-title">
                        <h3 class="title">Course Level</h3>
                    </div>
                    <select class="select level" name="level" required>
                        <option value="" disabled selected>Select difficulty level</option>
                        <option value="easy">Easy</option>
                        <option value="mediocre">Mediocre</option>
                        <option value="hard">Hard</option>
                    </select>

                    <!-- Course Description -->
                    <div class="input-title">
                        <h3 class="title">Course Description</h3>
                    </div>
                    <textarea name="description" class="description txt-area" required></textarea>

                    <!-- Course image -->
                    <div class="input-title">
                        <h3 class="title">Course Image</h3>
                    </div>
                    <input type="file" name="ima" class="file txt-area" required/>

                    <!-- Submit/Reset -->
                    <div class="button-binder">
                        <input type="reset" name="reset" class="reset btn" value="Reset"/>
                        <input type="submit" name="submit" class="submit btn" value="Submit"/>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php

if (isset($_POST['submit'])) 
{

    $CC = $_POST['course_Code'];
    $code_list = "SELECT * FROM courses where `course_code`= '$CC'";

    $code_result = mysqli_query($conn, $code_list);
                    
        if($code_result->num_rows > 0){
            echo "<script type='text/javascript'>
                    alert('Course is already available with code :".$CC.", Use different course code.');
                    </script>";
        }
        else{

            $course_Code = $_POST['course_Code'];
            $course_name = $_POST['course_name'];
            $level = $_POST['level'];
            $description = $_POST['description'];
            $fileName = $_FILES["ima"]["tmp_name"];
            $image = $_FILES["ima"]["name"];
            $Name = basename($_FILES["ima"]["name"]);
            
            $fileExt = explode('.', $image);
            $fileActualExt = strtolower(end($fileExt));
            $fileNewName = uniqid('CO_').".".$fileActualExt;
        
            $fileDr = "uploads/course/";
            $uploadFile = $fileDr.$fileNewName;

            move_uploaded_file($fileName, $uploadFile);

            $addCourse = "INSERT INTO courses (course_code, course_name, course_level, course_desc, course_image, time_stamp) 
                            VALUES ('$course_Code', '$course_name', '$level', '$description', '$fileNewName', NOW())";

            if(mysqli_query($conn, $addCourse))
            {
                echo "<script type='text/javascript'>alert('Course has been added.');</script>";	
            }
            else
            {
                echo "<script type='text/javascript'> alert('Course not added!!');</script>";
            }

        }
}

?>