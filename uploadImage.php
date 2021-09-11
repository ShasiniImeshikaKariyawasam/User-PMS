<?php
require_once 'connection.php';

if(isset($_POST['but_upload'])){
  $email = $_POST['email'];
  $text = $_POST['text'];
  $name = $_FILES['file']['name'];
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) ){
 
     // Insert record
     $query = "INSERT INTO image(image,email,text) VALUES('$name', '$email','$text')";
     mysqli_query($db,$query);
  
     // Upload file
     move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$name);

  }
 
}
?>



<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" href="addPrescription.css"  type="text/css" >
    <style type="text/css">
        body
        {
            background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(css/bg.jpg);
            height:100vh;
            background-size:cover;
            background-position:left;
        }
    </style>
</head>


<body>
    <div class="logo">
        <img src="images/logo.png">
    </div>

    <div class="errorMsg"><h3><?php include('message.php'); ?></h3></div>

    <div class="Headline">
        <header>
            <P><h2>Upload Prescription </h2></P>
        </header>
    </div>
    
    <form method="post" action="" enctype='multipart/form-data'>
  <input type='file' name='file' >
  <input type='email' name='email' id="email">
  <input type='text' name='text' id="text">
  <input type='submit' value='Save name' name='but_upload'>
</form>

</body>

</html>





