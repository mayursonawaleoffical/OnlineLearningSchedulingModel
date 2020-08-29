<?php  

session_start();

// remove all session variables
session_unset();

// destroy the session
session_destroy();

echo '<script type="text/javascript">
alert("Logout");
    location="login.php";
    </script>';
?>  