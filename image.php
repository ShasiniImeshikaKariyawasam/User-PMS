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

    

    <div class="Headline">
        <header>
            <P><h2>Upload Prescription </h2></P>
        </header>
    </div>
    <form action="image.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
    
   <!--
    <form action="uploadImage.php" method="post" enctype="multipart/form-data">
        <div class="container">
            <label for="prescription"><h3><b>Select image to upload:</b></h3></label>
            <input type="hidden" name="size" value="1000000">
            <input type="file" name="image">
            </br>
            <textarea name="text" cols="50" rows="4" placeholder="Say something about image..."></textarea></br>
            <label for="email"><h3><b>Email Address : </b></h3></label>
    `       <input type="text" id="email" name="email" placeholder="Your email address.." maxlength="30" required>
            <input type="submit" value="Upload Image" name="upload">

            <div class="button">
                <a href="userInterface.php" class="bttn btt2" >Back</a>
            </div>

        </div>
    </form>
-->

</body>

</html>



<?php 
// Include the database configuration file  
require_once 'connection.php'; 
 
// If file upload form is submitted 
$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 
         
            // Insert image content into database 
            $insert = $db->query("INSERT into images (image, uploaded) VALUES ('$imgContent', NOW())"); 
             
            if($insert){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
} 
 
// Display status message 
echo $statusMsg; 
?>


