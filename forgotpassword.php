<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html>
<head>

<link rel="stylesheet" type="text/css" href=".\layout.css">
<link rel="stylesheet" type="text/css" href=".\menu.css">

<title>Registration System</title>
</head>

<body>
<div id= "Container">
<div id= "Header"></div>
<div id= "Menu">
    <nav>
        <ul>
            <li><a href = "index.php">Home</a>
            <li><a href = "login.php">Login</a>
            <li><a href = "register.php">Register</a>
            <li><a href = "forgotpassword.php">Forgot Password</a>
                                   
        </ul>
    </nav>
</div>
<div id= "Content">
    <div id= "ContentHeading">
        <h1>Forgotten Password</h1>
    </div>
    </div>
    <div id="ContentLeft">
    </div>
    <div id= "ContentRight">

        <form action="" method="post" name="ForgotPasswordForm" id="ForgotPasswordForm">

            <div class="FormElement">
            <p>
                <label>Email: </label>
                <input name="Email" type="email" required="required" class="Tfield" id="Email" placeholder="Your Email">
            </p>
            </div>

            <div class="FormElement">
                <input type="submit" class="button" name="RequestReset" value="Request Reset"> 
            </div>
        </form>

    </div>   
</div>
<div id= "Footer"></div>
</div>

</body>
</html>