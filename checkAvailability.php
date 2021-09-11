<?php 
include('connection.php');
?>

<!DOCTYPE html>
<html>

<head>
	<title>chech Availlability</title>
	<link href="css/searchAvailability.css" rel="stylesheet" type="text/css" >
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
			<P><h2>Search Drug</h2></P>
		</header>
	</div>
	
	<form method="post" action="viewAvailability.php">
		<div class="container">
			<label for="drug_name"><b>Enter Drug Name</b></label>
    		<input type="text" placeholder="Enter Drug Name" name="drug_name" required>
    		</br>
			<input type="submit" name="submit" value="Search">
			<div class="button">
				<a href="userInterface.php" class="bttn btt2">Back</a>
			</div>

  		</div>
	</form>

</body>
</html>
