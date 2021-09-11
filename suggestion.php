<html>
<head>
	<title>Login Page</title>
		<link href="css/suggestion.css" rel="stylesheet" type="text/css">
		<style type="text/css">
        body
		{
   			background-image:linear-gradient(rgba(0,0,0,0.5),rgba(0,0,0,0.5)), url(css/bg.jpg);
    		height:100vh;
    		background-size:cover;
    		background-position:left;
		}
		.nav
		{
			float:right;
			margin-top:20px;
			margin-right:50px;
	
		}
	
		.nav li
		{
			display:inline-block;
		}

		.nav li a
		{
			color: #e6b800;
		text-decoration:none;
		padding: 5px 20px;
		font-size:25px;
		}

		.nav li.active.a
		{
		border:3px solid white;
		}

	input[type=text], select, textarea {
	width: 100%;
	padding: 12px;
	color: black;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	margin-top: 6px;
	margin-bottom: 16px;
	resize: vertical;
}
	.nav li a:hover
	{
		border: 3px solid black;
	}
    </style>
</head>

<body>
	<div class="logo">
		<img src="images/logo.png">

		<ul class="nav">
			<li><a href="userInterface.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="suggestion.php">Suggestions</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		</ul>
	</div>

	<div class="Headline">
		<header>
			<P><h2>Suggessions</h2></P>
		</header>
	</div>

	<form method="post" action="">
		<div class="container">
			<label for="name">Name : </label>
			<input type="text" id="name" name="name" placeholder="Your name..">
    		</br>

    		<label for="email">Email Address : </label>
			<input type="text" id="email" name="email" placeholder="Your email address..">
			</br>
 
			<label for="comment">Comments : </label>
			</br>
			<textarea id="comment" name="comment" placeholder="Write something.." style="height:100px"></textarea>

			<input type="submit" name="submit" value="Submit">

  		</div>
	</form>

</body>
</html>


<?php
include('connection.php');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $name = mysqli_real_escape_string($db,$_POST['name']);
 	$email = mysqli_real_escape_string($db,$_POST['email']);
 	$comment = mysqli_real_escape_string($db,$_POST['comment']);
 
    $sql = "INSERT INTO customer(name, email, comment) VALUES('$name', '$email', '$comment')";

    if($db->query($sql) == TRUE)
    {
    	echo "<script type='text/javascript'>alert('Got your feedback');
    	window.location='suggestion.php';
    	</script>";
  	}
  	else
  	{
   		$error =  "Error: " .$sql . "<br>".$db->error;
	}
}

?>
