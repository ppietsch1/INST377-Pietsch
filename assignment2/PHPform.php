<html>
<head>
	<title>Paul Pietsch | Assignment 2</title>
	<?php 
		/* Sample form using bootstrap */
		include 'resources/bslinks.php';
	 ?>	
	 
	 <link rel="stylesheet" href="css/main-php.css">
</head>

<body>

<h3> Enter data below! <h3>

<form action="actionScript.php" method="POST">

First Name: <input type="text" name="fname" maxlength="15" required/>
Last Name: <input type="text" name="lname" maxlength="15" required/>
Email: <input type="text" name="email" maxlength="25" required/>
<input type="submit" value="Submit" name="submit" />

</form>

 <a href="displayData.php">CLICK HERE TO SEE RECORDS</a> 

<?php 
	include 'resources/bsfooter.php';
?>	

</html>
