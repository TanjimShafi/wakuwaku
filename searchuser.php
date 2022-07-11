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


$searchErr = '';
$user_details='';

if(isset($_GET['save']))
{
    if(!empty($_GET['search']))
    {
        $search = $_GET['search'];
        $result = mysqli_query($conn,"SELECT * FROM users WHERE  username='$search' or name='$search' ");
        //$stmt = $conn->prepare("select * from users where name like '%$search%' or username like '%$search%'");
        // $stmt->execute();
        // $user_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //print_r($user_details);
         
    }
    else
    {
        $searchErr = "Please enter the information";
    }
    
}
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
        
        <style>
            .nav-bar-profilepic {
                object-fit: cover;
                height: 20px; 
                width: 20px;
                border-radius: 50%;
            }
        </style>
    </head>
    
    
    
    <body>
        <?php 
        //include navigation bar component
        require_once "component/navigationbar.php"; 
        ?>
        
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                    ?>
                    
                      <table class="table">
                        <thead>
                          <tr>
                              <th></th>
                            <th>Username</th>
                              <th>Name</th>
                          </tr>
                        </thead>
                          
                        <tbody>
                          <?php
                        
                            $i=1;
                            while($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td>
                                <?php
                                   /* $profilepicture_query = ($conn, "SELECT * from users profilepicture WHERE username='$row["username"]' "); */
                                ?>
                                <img src="img/profilepicture/<?php echo $row["profilepicture"]; ?>" class="nav-bar-profilepic">  
                                </td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                            </tr>
			             <?php
			                 $i++;
			             }
			             ?>
                            
                        </tbody>
                      </table>
                    
                    <?php
                    }
                    else {
                        echo " <h1>No user Found</H1>";
                    }
                    ?>
                </div>
                
                <div class="col-sm-5">
                    
                    
                </div>
                
                
            </div>
        </div>
        
</body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</html>