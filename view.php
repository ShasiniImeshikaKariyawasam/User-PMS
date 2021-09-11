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
    

</body>

</html>
</body>

</html>

<?php 
// Include the database configuration file  
require_once 'connection.php'; 
 
// Get image data from database 
$result = $db->query("SELECT image FROM images ORDER BY uploaded DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>