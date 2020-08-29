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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            text-align: center;
            background-color: #4CAF50;
            color: white;
        }

        .assignList-binder{
            width:100%;
            display:flex;
            flex-direction: column;
            justify-content: center;
            align-items:center;
        }

        .date, .select{
            height: 2.5rem;
            border-radius: 3px;
            border: 1px solid grey;
            padding: .4rem;
            margin: .5rem;
        }

    </style>
</head>
<body>
    <section class="assignList">
        <div class="container">
            <div class="assignList-binder">
                <input type="date" name="date" class="date" id="date" required/>
                <table id="list">
                    <thead>
                        <tr>
                            <th>Instructor Name</th>
                            <th>Course Code</th>
                            <th>Course Name</th>
                            <th>Date</th>
                            <th>Timing</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                       
                    </tbody>                  
                </table>
            </div>
        </div>
    </section>
    <script>
        $(document).ready(function(){ 
            $('#date').change(function(){
                var date = $('#date').val(); 
                $.ajax({
                    url: "TT.php", 
                    type: "post",
                    data:{date:date},
                    success: function(result){
                        $("#tbody").html(result);
                    }
                });
            });
        });
    </script>
</body>
</html>