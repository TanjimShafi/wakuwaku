<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
//include config file
require_once "config.php";
?>
 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Welcome</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    </head>
    
    <body>
        
        <?php 
        //include navigation bar component
        require_once "component/navigationbar.php"; 
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                    <div class="container-canvas">
                        <img src="img/bg_0.jpg" alt="Nature" class="featured-section-canvas">
                        <div class="text-block-canvas">
                            <h4>Dear 
                                <?php 
                                $username = $_SESSION["username"];
                                echo $username;
                                ?>
                                
                            </h4>
                            <p>Welcome to প্রজন্ম</p>
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-sm-5">
                    
                    
                </div>
                
                
            </div>
        </div>
        
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</html>