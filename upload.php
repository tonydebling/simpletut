<?php

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);		
	
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

	// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	echo 'End of upload code reached';
	die();
	header('location: home.html');
}
?>


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
            <li><a href = "home.html">Home</a>
                                   
        </ul>
    </nav>
</div>
<div id= "Content">
    <div id= "ContentHeading">
        <h1>File Upload Experiment</h1>
    </div>
    </div>
    <div id="ContentLeft">
    </div>
    <div id= "ContentRight">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<div class="FormElement">
            <p>
			Select image to upload:
			<input type="file" name="fileToUpload" id="fileToUpload">
			</p>
            </div>
			<div class="FormElement">
            <p>
			<input type="submit" value="Upload Image" name="submit">
			</p>
            </div>
		</form>
    </div>   
</div>
<div id= "Footer"></div>
</div>

</body>
</html>