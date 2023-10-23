<?php
require_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration | PHP</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
    <div>
        <?php
        if(isset($_POST["create"])){
            
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phonenumber = $_POST['phonenumber']; 
            $email = $_POST['email'];
            $password = $_POST['password'];

            
            $sql= "INSERT INTO users (firstname, lastname, email, phonenumber, password ) VALUES(?,?,?,?,?)";
            $stmt = $db->prepare($sql);
            $result= $stmt->execute([$firstname, $lastname, $phonenumber, $email, $password]);
            if($result){
                echo "Successfully saved.";
            }else{
                echo "There were errors while saving the data.";
            }

        } 
        ?>
    </div>
    <div>
        <form action="registration.php" method="post">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">

                        <h1>Registration</h1>
                        <p>Fill up the form with your information</p>
                        <hr class="mb-3">
                        <label for="firstname"><b>First Name</b></label>
                        <input class="form-control" type="text" name="firstname" required>

                        <label for="lastname"><b>Last Name</b></label>
                        <input class="form-control" type="text" name="lastname" required>

                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="email" name="email" required>

                        <label for="phonenumber"><b>Phone number</b></label>
                        <input class="form-control" type="text" name="phonenumber" required>

                        <label for="password"><b>Password</b></label>
                        <input class="form-control" type="password" name="password" required>
                        <hr class="mb-3">

                        <input class="btn btn-primary" type="submit" name="create" value="Sign up">
                    </div>
                </div>
                
            </div>
    </div>
    
</body>
</html>