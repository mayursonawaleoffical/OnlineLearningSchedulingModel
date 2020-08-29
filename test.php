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
                                    alert('Do not assign course on same date at same time');
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
                $time_check = $date[$i];
                
                $check_instructor = "SELECT * FROM assign WHERE `inst_id`='$instructor' AND `time_slot`='$time_check'";
                
                $instructor_sql = mysqli_query($conn, $check_instructor);

                if(mysqli_num_rows ($instructor_sql) > 0)
                {
                    echo "<script type='text/javascript'>
                            alert('Instructor is busy on assign');
                        </script>";
                    // while($row = $instructor_sql->fetch_assoc())
                    // {
                    //     $dbDate = $row['date'];
                    //     echo gettype($dbDate);
                    //     $dbTime = $row['time_slot'];
                    // }

                    // fetch time from timeslot table
                    // $get_time_id = "SELECT * FROM timeslot WHERE slots='$dbTime'";
                    // $get_time_id_sql = mysqli_query($conn, $get_time_id);

                    // if($get_time_id_sql->num_rows > 0)
                    // {
                    //     while($row = $get_time_id_sql->fetch_assoc())
                    //     {
                    //         $dbTimeSlotId = $row['time_slot_id'];
                    //     }
                    // }
                    // else{
                    //     echo 'time slot is not available';
                    // }
                    
                    // //now check assign date time with database date time
                    // for ($i=0; $i < count($date); $i++){
                    //     if(in_array($date[$i], $dbDate)){
                    //         // for ($j=0; $j < count($time); $j++){
                    //             // if(in_array($time[$i], $dbTimeSlotId)){
                    //                 echo "<script type='text/javascript'>
                    //                         alert('Instructor is busy on assign');
                    //                             </script>";
                    //                 break;
                    //             // }
                    //         // }
                    //     }
                    // }
                }	 
                else
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
                        $get_time = "SELECT * FROM timeslot WHERE time_slot_id='$assign_time'";
                        $query = mysqli_query($conn, $get_time);

                        if($query->num_rows > 0)
                        {
                            while($row = $query->fetch_assoc())
                            {
                                $dbTimeSlot = $row['slots'];
                            }
                        }	 
                        else{
                            echo 'time slot is not available';
                        }

                        $user_id = mysqli_insert_id( $conn );
                        $assign_query = "INSERT INTO assign (inst_id, course_code, course_name, date, time_slot, time_stamp) 
                                        VALUES ('$instructor', '$courses', '$course_name', '$assign_date', '$dbTimeSlot', NOW())";

                        if($flag == false && mysqli_query($conn, $assign_query)){
                            echo "<script type='text/javascript'>
                                alert('Instructor is busy on assign');
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

            
                
            

            //     //fetch time from timeslot table
            //     $get_time = "SELECT * FROM timeslot WHERE time_slot_id='$assign_time'";
            //     $query = mysqli_query($conn, $get_time);

            //     if($query->num_rows > 0)
            //     {
            //         while($row = $query->fetch_assoc())
            //         {
            //             $dbTimeSlot = $row['slots'];
            //         }
            //     }	 
            //     else{
            //         echo 'time slot is not available';
            //     }

                
        }
    }

?>