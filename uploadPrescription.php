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
    
    <form action="prescription.php" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>

</body>

</html>
</body>

</html>