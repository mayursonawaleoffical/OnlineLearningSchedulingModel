<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <title>OLSM</title>
    <style>
    .navbar{
        background: black;
        height:10vh;
    }

    .navbar-binder{
        width: 100%;
    }

    .logo-container{
        width: 30%;
        padding: 3px 0px;
    }

    .logo-container img{
        width: 100%;
        font-size: 2rem;
    }

    @media screen and (min-width: 600px){
        .logo-container{
            width: 20%;
        }
    }

    @media screen and (min-width: 900px){
        .logo-container{
            width: 10%;
        }
    }

    </style>
</head>
<body>
    <section class="navbar">
        <div class="container">
            <div class="navbar-binder">
                <div class="logo-container">
                    <a href="#" class="logo"><img src="./images/ideamagix.svg" alt="logo"/></a>
                </div>
                <!-- <ul class="nav-list">
                    <li class="nav-item"><a href="Index.html" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Specs</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Product</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
                </ul>
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times"></i>
                </div> -->
            </div>
        </div>
    </section>

    <!-- <script>
        //Select element function

        const selectElement = function (element){
            return document.querySelector(element);
        };

        let menuToggler = selectElement('.menu-toggle');
        let body = selectElement('body');

        menuToggler.addEventListener('click', function(){
            body.classList.toggle('open');
        });
    </script> -->
</body>
</html>