<?php
    //session_start();
    require_once 'dbconfig.php';
    require_once 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'> -->
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" type="text/css" href="./css/assign.css">
    <link rel="stylesheet" type="text/css" href="./css/datepicker.css">
    <title>OLSM</title>
</head>
<body>
    <section class="assign">
        <div class="container">
            <div class="binder assign-binder">
                <div class="headline">
                    <h2>Assign Instructor To Course</h2>
                </div>
                <form action="" method="post" class="form-container assign-form" enctype="multipart/form-data">
                    <!-- Select instructor -->
                    <div class="input-title">
                        <h3 class="title">Select Instructor</h3>
                    </div>

                    <select class="select instructor" name="instructor" id='insta' required>
                        <option value="" disabled selected>Choose Instructor</option>
                        <?php 
                            $instructor = "SELECT * FROM instructor";
                            $inst_data = mysqli_query($conn, $instructor);

                            while ($data = mysqli_fetch_array($inst_data)){?>

                            <option value="<?php echo $data[0]?>"><?php echo $data[1]." ".$data[2]?></option>
                        <?php } ?>
                    </select>

                    <!-- Select instructor -->
                    <div class="input-title">
                        <h3 class="title">Select Course</h3>
                    </div>

                    <select class="select courses" id="courses" name="courses" required>
                        <option value="" disabled selected>Select Course</option>
                        <?php 
                            $courses = "SELECT * FROM courses ORDER BY 'course_name' ASC";
                            $inst_data = mysqli_query($conn, $courses);

                            while ($course = mysqli_fetch_array($inst_data)){?>

                            <option value="<?php echo $course[0]?>"><?php echo $course[1]." ".$course[2]?></option>
                        <?php } ?>
                    </select>

                    <!-- Course Code -->
                    <div class="input-title">
                        <h3 class="title">Course Code</h3>
                    </div>
                    
                    <input type="text" name="course_Code" id="course_Code" class="course_Code txt-area" disabled/>

                    <!-- Select Date and Time -->
                    <div class="input-title">
                        <h3 class="title">Select Dates and Time</h3>
                    </div>
                    
                    <table class="date-binder" id="date-binder">
                        <tbody id="tbody">
                            <tr>
                                <td>
                                    <input type="date" name="date[]" class="assign-date" id="txtDate" onclick='pastDate()' required/>
                                    <!-- <input type="text" class="form-control date" id="date-collector" placeholder="Pick the multiple dates" required/> -->
                                </td>
                                <td>
                                    <select class="select time-slot" name="assign-time[]" required>
                                        <option value="" disabled selected>Select Time Slot</option>    
                                        <?php
                                            $timeslots = "SELECT * FROM timeslot";
                                            $time_data = mysqli_query($conn, $timeslots);

                                            while ($data = mysqli_fetch_array($time_data)){?>

                                            <option value="<?php echo $data[0]?>"><?php echo $data[1]?></option>
                                        <?php }?>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn add-btn" id="add-btn">Add</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Ajax DOM -->
                    <input type='text' id="div1"/>

                    <!-- Submit/Reset -->
                    <input type="reset" name="reset" class="reset btn" value="Reset"/>
                    <input type="submit" name="submit" class="submit btn" id="submit" value="Submit"/>

                </form>
            </div>
        </div>
    </section>


<script>

    // Disable past dates in calender.
    function pastDate(){
        var dtToday = new Date();
        
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if(month < 10)
            month = '0' + month.toString();
        if(day < 10)
            day = '0' + day.toString();
        
        var minDate= year + '-' + month + '-' + day;
        
        var table = document.getElementById("date-binder");
        var totalRowCount = table.rows.length;

        // $('#txtDate').attr('min', minDate);
        for(var i = 0; i < totalRowCount; i++) {
            $('tr:nth-child('+totalRowCount+') #txtDate').attr('min', minDate);
       }
    }

    $(document).ready(function(){  

        //
        $('#txtDate').change(function(){  
        var date = $('#txtDate').val(); 
        var instID = $('#insta').val();
            $.ajax({
                url: "distime.php", 
                type: "post",
                data:{date:date, instID:instID},
                success: function(result){
                    $("#div1").html(result);
                }
            });
            var timeArray = $('.time_array').val();
            var dateCheck = $('#txtDate').val(); 
        });

        // Display Course Code 
        $('#courses').change(function(){  
           var course_name = $(this).val();  
           $('#course_Code').val(course_name);
        }); 

        //add more dates amd time.
        $('#add-btn').click(function(){  
            var addrow = "<tr><td><input type='date' name='date[]' class='assign-date' id='txtDate' onclick='pastDate()' required/></td><td><select class='select time-slot' name='assign-time[]' required><option value='' disabled selected>Select Time Slot</option><?php $timeslots = 'SELECT * FROM timeslot'; $time_data = mysqli_query($conn, $timeslots);while ($data = mysqli_fetch_array($time_data)){?><option value='<?php echo $data[0]?>'><?php echo $data[1]?></option><?php }?></select></td><td><button class='btn delete-btn' id='delete-btn'>Delete</button></td></tr>";
                $('#tbody').append(addrow);
        });

        //delete more dates and time.
        $('#date-binder').on('click', '#delete-btn', function(){
                $(this).parent().parent().remove();
        });

        //disbale time on same date for instructor

    });
</script>

</body>
</html>


<!-- ================== PHP code ================== -->

<?php

require_once 'dbconfig.php';

    if (isset($_POST['submit'])) {
        
        $instructor = $_POST['instructor'];
        $courses = $_POST['courses'];
        $course_Code = $_POST['courses'];
        $date = $_POST['date'];
        $time = $_POST['assign-time'];

        if( 0 < count($date)){

            $date_array = [];
            $time_array = [];
            $flag = false;
            //check all assign date and time with each other
            for ($i=0; $i < count($date); $i++){
                if(in_array($date[$i], $date_array)){
                    for ($j=0; $j < count($time); $j++){
                        if(in_array($time[$i], $time_array)){
                            echo "<script type='text/javascript'>
                                    alert('Do not assign course on same date at same time, Course not added');
                                    </script>";
                                $flag = true;
                            break;
                        }
                        else{
                            array_push($time_array, $time[$i]);
                        }
                    }
                }
                else{
                    array_push($date_array, $date[$i]);
                    array_push($time_array, $time[$i]);
                }
            }

            // fetch assign date and time for instructor from assign table
            for ($i=0; $i < count($date); $i++){
                $date_check = $date[$i];
                $time_check = $time[$i];

                //fetch time from timeslot table
                $time = "SELECT * FROM timeslot WHERE time_slot_id='$time_check'";
                $query = mysqli_query($conn, $time);
                if($query->num_rows > 0)
                {
                    while($row = $query->fetch_assoc())
                    {
                        $dbTime = $row['slots'];
                    }
                }

                $check_instructor = "SELECT * FROM assign WHERE `inst_id`='$instructor' AND `date`='$date_check' AND time_slot='$dbTime'";
                $instructor_sql = mysqli_query($conn, $check_instructor);

                if($instructor_sql->num_rows > 0)
                {
                    echo "<script type='text/javascript'>
                            alert('Instructor is busy on assign Date : ".$date_check." at time : ".$dbTime."');
                        </script>";
                        $flag = true;
                break;
                }
            }	 
                if($flag == false)
                {
                    for ($i=0; $i < count($date); $i++) { 

                        $assign_date = $date[$i];
                        $assign_time = $time[$i];

                        //fetch course from courses table
                        $get_course = "SELECT * FROM courses WHERE course_code = '$course_Code'";
                        $query = mysqli_query($conn, $get_course);

                        if($query->num_rows > 0)
                        {
                            while($row = $query->fetch_assoc())
                            {
                                $dbCourseName = $row['course_name'];
                                $dbCourseLevel = $row['course_level'];
                            }

                            $course_name = $dbCourseName.' '.$dbCourseLevel;
                        }	 
                        else{
                            echo "<script type='text/javascript'>
                            alert('course is not availabel');
                            </script>";
                        }

                        //fetch time from timeslot table
                        // $get_time = "SELECT * FROM timeslot WHERE time_slot_id='$assign_time'";
                        // $time_query = mysqli_query($conn, $get_time);

                        // if($time_query->num_rows > 0)
                        // {
                        //     while($row = $time_query->fetch_assoc())
                        //     {
                        //         $dbTimeSlot = $row['slots'];
                        //     }
                        // }	 
                        // else{
                        //     echo 'time slot is not available';
                        // }

                        $user_id = mysqli_insert_id( $conn );
                        $assign_query = "INSERT INTO assign (inst_id, course_code, course_name, date, time_slot, time_stamp) 
                                        VALUES ('$instructor', '$courses', '$course_name', '$assign_date', '$dbTime', NOW())";

                        if($flag == false && mysqli_query($conn, $assign_query)){
                            echo "<script type='text/javascript'>
                                alert('Instructor is assign');
                                window.location='assign.php'
                                </script>";
                        }
                        else{
                            echo "<script type='text/javascript'>
                            alert('Course not added');
                            window.location='assign.php'
                            </script>";
                        }
                    }
                }               
        }
    }

?>