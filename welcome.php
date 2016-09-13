<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<?php
    require 'connect.php';
    session_start();
    if (isset($_SESSION['UserID'])) {
        echo "UserID variable is set";
    } else {
        header('Location: login.php');
    }
    $UserID = $_SESSION['UserID'];

    $sql = "SELECT * from users where id = '$UserID' ";
    $result = $con->query($sql);
	var_dump($result);
    $row = $result->fetch_assoc();
    $FName = $row['first_name'];
    $LName = $row['last_name'];
    $Email = $row['email'];
    $Password = $row['password'];
    $Timestamp = $row['created_at'];
    echo $FName;
    echo $Email;
    echo "About to enter html part";
    $con->close();

?>

<html>
<head>

<link rel="stylesheet" type="text/css" href=".\layout.css">
<link rel="stylesheet" type="text/css" href=".\menu.css">

<title>Account Page</title>
</head>

<body>
<script src="break.js"></script>
<div id= "Container">
<div id= "Header"></div>
<div id= "Menu">
    <nav>
        <ul>
            <li><a href = "login.php">Login</a>
            <li><a href = "register.php">Register</a>
            <li><a href = "logout.php">Logout</a>
                                   
        </ul>
    </nav>
</div>
<div id= "Content">
    <div id= "ContentHeading">
        <h1>Welcome to Paradise</h1>
    </div>
    <div id="ContentLeft">
    Welcome <?php echo $FName ?> <br>
    Last name:  <?php echo $LName ?> <br>
    Email: <?php echo $Email ?> <br>
    Password: <?php echo $Password ?> <br>
    UserID: <?php echo $UserID ?> <br>
    <?php echo $Timestamp ?> <br>
    </div>
    <div id= "ContentRight">
    </div>   
</div>
<div id= "Footer"></div>
</div>

</body>
</html>