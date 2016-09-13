<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
    $Email = "";
    $Password = "";
    $FormErr = "";

    require 'connect.php';
    if (isset($_POST['Login'])) {
        echo "Login variable is set";
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        session_start();
        $sql = "SELECT * FROM users WHERE email = '$Email' ";
		var_dump($sql);
        $result = $con->query($sql);
		echo '$result';
		var_dump($result);
        $rowcount = $result->num_rows;
        $row = $result->fetch_assoc();
        echo "Number of rows";
        echo $rowcount;
        echo "Password";
        echo $row['password'];
        if ($rowcount > 1) {
            $FormErr = "More than one entry for this email!";
        }
        echo "About to check result";
        if ($rowcount == 0) {
            $FormErr = "Email not recognised";
            echo $FormErr;
        }
        if ($Password != $row['password']){
            $FormErr = "Incorrect password";
        }

        $con->close();
        // Redirect to the welcome page if login is successful
        if ($FormErr == "") {

            $_SESSION["UserID"]=$row['id'];
            header('Location: .\welcome.php');
            exit();
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
<script src="break.js"></script>
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
        <h1>Login Form</h1>
    </div>
    <div id="ContentLeft">
    </div>
    <div id= "ContentRight">

        <form action="login.php" method="post" name="RegisterForm" id="RegisterForm">

            <div class="FormElement">
            <p>
                <label>Email: </label>
                <input name="Email" type="email" required="required" class="Tfield" id="Email"
                value=<?php echo $Email ?>>
            </p>
            </div>
            <div class="FormElement">
            <p>
                <label>Password: </label>
                <input name="Password" type="password" required="required" class="Tfield" id="Password" 
                value=<?php echo $Password ?>>
            </p>
            </div>
            <div class = "error1">
                <?php echo $FormErr; ?>
            </div>
            <div class="FormElement">
                <input type="submit" class="button" name="Login" value="Login"> 
            </div>
        </form>

    </div>   
</div>
<div id= "Footer"></div>
</div>

</body>
</html>