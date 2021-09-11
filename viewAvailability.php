<!DOCTYPE html>
<html>
<head>
	<title>view availability</title>
	<link href="css/viewAvailability.css" rel="stylesheet" type="text/css" >
</head>

<body>
	<div class="logo">
		<img src="images/logo.png">

		<ul class="nav">
			<li class="active"><a href="userInterface.php">Home</a></li>
			<li><a href="about.php">About</a></li>
			<li><a href="suggestion.php">Suggestions</a></li>
			<li><a href="contact.php">Contact Us</a></li>
		</ul>

	</div>

	<div class="table" ><center>
		<div class="row">

		<?php
		include('connection.php');

		if (isset($_POST['submit']))
		{
			//$drug_name = $_POST['drug_name'];
			//$search_name = "SELECT drug_name, price FROM drug WHERE drug_name ='$drug_name'";
			//$query= mysqli_query($db,$search_name);

			$drug_name = $_POST['drug_name'];
			$search_name = "SELECT drug.drug_name, drug.price, stock.current_stock FROM drug INNER JOIN stock ON drug.drug_id = stock.drug_id AND drug.drug_name ='$drug_name'";
			$query= mysqli_query($db,$search_name);

			
			$result = "SELECT current_stock FROM stock WHERE drug_name ='$drug_name'";
			$query2 = mysqli_query($db,$result);

			if ($result > "0")
			{
				echo "<h2><b>AVAILABLE!!!</b></h2>";
		    }
			else
			{
				echo "<h2><b>OUT OF STOCK!!!</b></h2>";
			}

			if (mysqli_num_rows($query) > 0) 
			{
				while($row = mysqli_fetch_assoc($query))
				{
					echo "
						<table >
							<tr>
								<th>Drug Name</th>
								<td>".$row['drug_name']."</td>
							</tr>

							<tr> 
								<th>Drug Price</th>
								<td>"."Rs.".$row['price']."</td>
							</tr>
							<tr>
								<th>Current Stock</th>
								<td>".$row['current_stock']."</td>
							</tr> ";
				}
			}
			else
			{
			//$message = base64_encode(urlencode("Invalid Drug Name"));
        	//header('Location:searchDrug.php?msg=' . $message);
        	//exit();
        	echo "<script>alert('Invalid Drug Name !')</script>";
			}		
		}

		
	?>
	
	</div>
	</center>

	<div class="button">
        <a href="checkAvailability.php" class="bttn " >Back</a>
    </div>

	</div>

</body>
</html>
	