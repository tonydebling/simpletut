<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">

<?php

    $FName = "";
    $LName = "";
    $Email = "";
    $Password = "";
    $Confirm = "";

    $FormOK = TRUE;
    $EmailErr = "";
    $FormErr = "";
    require 'connect.php';
    if (isset($_POST['Register'])) {
        session_start();
        $FName = $_POST['First_Name'];
        $LName = $_POST['Last_Name'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $Confirm = $_POST['Confirm'];

        $sql = "SELECT * from users where email = '$Email' ";
        $result = mysqli_query($con, $sql);
		var_dump($result);
		
        if ($result->num_rows > 0) {
            $FormErr = "Email already in use";
        }
        elseif ($Confirm != $Password) {
            $FormErr = 'Passwords do not match';
        }
        
        if ($FormErr == "") {
			echo '<br>Ready to insert record<br>';
            $PasswordHash = $Password;
            $sql = "INSERT INTO users (first_name, last_name, username, email, password) Values ('{$FName}','{$LName}','{$FName}','{$Email}','{$PasswordHash}')";
			echo $sql;
            if ($con->query($sql) != TRUE) {
				die( "Error: ".$sql.'<br>'.$con->error);
                $FormErr = "Failed to create database record";

            }
        }
        $con->close();
        // Redirect to the login page if registration is successful
        if ($FormErr == "") {
            header('Location: .\login.php');
        }
    }
?>


<html>
<head>

<link rel="stylesheet" type="text/css" href=".\layout.css">
<link rel="stylesheet" type="text/css" href=".\menu.css">

<title>Registration System</title>
</head>

<body>
<!-- Use this to break flow for debugging
<script src="alert.js"></script>
-->

<div id= "Container">
<div id= "Header"></div>
<div id= "Menu">
    <nav>
        <ul>
            <li><a href = "home.html">Home</a>
            <li><a href = "login.php">Login</a>
            <li><a href = "register.php">Register</a>
            <li><a href = "forgotpassword.php">Forgot Password</a>
                                   
        </ul>
    </nav>
</div>
<div id= "Content">
    <div id= "ContentHeading">
        <h1>Registration Form</h1>
        
    </div>
    <div id="ContentLeft">
    </div>
    <div id= "ContentRight">

        <form action="register.php" method="post" name="RegisterForm" id="RegisterForm">
            <div class="FormElement">
            <p>
                <label>First Name: </label>
                <input name="First_Name" type="text" required="required" class="Tfield" id="First_Name" 
                value= <?php echo $FName ?>>
            </p>
            </div>

            <div class="FormElement">
            <p>
                <label>Last Name: </label>
                <input name="Last_Name" type="text" required="required" class="Tfield" id="Last_Name"
                value= <?php echo $LName ?>>
            </p>
            </div>
            <div class="FormElement">
            <p>
                <label>Email: </label>
                <input name="Email" type="email" required="required" class="Tfield" id="Email"
                value= <?php echo $Email ?>>
            </p>
            </div>
            <div class="FormElement">
            <p>
                <label>Password: </label>
                <input name="Password" type="password" required="required" class="Tfield" id="Password"
                value = <?php echo $Password ?>>
            </p>
            </div>
            <div class="FormElement">
            <p>
                <label>Confirm: </label>
                <input name="Confirm" type="password" required="required" class="Tfield" id="Confirm"
                value = <?php echo $Confirm ?>>
            </p>
            </div>
            <div class = "error1">
                <?php echo $FormErr; ?>
            </div>
            <div class="FormElement">
                <input type="submit" class="button" name="Register" value="Register"> 
            </div>
        </form>

    </div>   
</div>
<div id= "Footer"></div>
</div>

</body>
</html>