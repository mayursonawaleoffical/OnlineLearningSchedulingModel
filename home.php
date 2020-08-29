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
        .home{
            width: 100%;
            height: 90vh;
            background: url("./images/bg.jpg") center no-repeat;
            background-size: cover;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: #fff;
        }

        .home .container{
            width: 100%;
            height: 90vh;
            background: rgba(0, 0, 0, 0.3); 
            display: flex;
            justify-content: center;
            align-items: center;  
        }

        .welcome-note .subheadlne{
            font-size: 2.5rem;
        }

    </style>
</head>
<body>
    <section class="home">
        <div class="container">
            <div class="home-binder">
                <div class="welcome-note">
                    <h3 class="subheadlne">
                        Welcome To,
                    </h3>
                    <h2 class="headline">
                        <span>ideamagix</span> Online Learning Platform.
                    </h2>
                </div>
            </div>
        </div>
    </section>
</body>
</html>