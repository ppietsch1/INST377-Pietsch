<html>
<head>
	<title>Sample PHP Form</title>
	<?php 
		
		include 'resources/bslinks.php';
		$a = "select * from userinfo order by lname, fname";
		
		
		$conn = new mysqli('localhost', 'root', 'root', 'assignment2');
		if ($conn->connect_error) die($conn->connect_error);
		$result = $conn->query($a);
		$row = null; 

		if ($_GET['aid']) {
			$aidq = "select * from userinfo where ID = " . $_GET['aid'];
			$ar = $conn->query($aidq);
			$row = $ar->fetch_assoc();
		}
	 ?>	
	 <link rel="stylesheet" href="css/main-php.css">
	 	<style>
		body {
			background-color: lightblue;
			color: white;
  			text-align: center;
		}
		</style>
</head>
<body>
	<div class="content">
	<div class="container">
		<div class="row">
			<h1>Enter User Data</h1><br>
			<form action="ActionScriptPP.php" method="post" class="form-horizontal">
				<input id="ID" type="hidden" name="ID" value="<?=$row['ID']?>">
				<div class="form-group">
					<label for="fname" class="control-label col-sm-3">User's Name</label>
					<div class="col-sm-3">
						<input type="text" onchange="validText(this.value, this.name)" class="form-control" id="fname" name="fname" placeholder="First Name" value="<?=$row['fname']?>">
						<span class="small text-warning" id="fnameerr"></span>
					</div>
					<div class="col-sm-4">
						<input type="text" onchange="validText(this.value, this.name)" class="form-control" id="lname" name="lname" placeholder="Last Name" maxlength="35" value="<?=$row['lname']?>">
					</div>
				</div>
				<div class="form-group">
					<label for="email" class="control-label col-sm-3">Email</label>
					<div class="col-sm-4">
						<input type="text" onchange="validText(this.value, this.name)" class="form-control" id="email" name="email" placeholder="Email" value="<?=$row['email']?>">
					</div>
				</div>

				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-info pull-right">
					
				</div>
				<div>
				<a href="displayDataPP.php" class="btn btn-warning pull-right">Show Table Details</a>
				</div>
				<div>
					<a href="formPPa3.php" class="btn btn-warning pull-right">Add a Movie</a>
				</div>
			</form>
			<section class="col-sm-6 col-sm-offset-3">
			<h2>Current Users</h2>
			<?php if ($result): ?>
				<table class="small table table-condensed table-striped", align="center", border= "1px solid black">
					<thead><tr><th>ID</t><th>First Name</th><th>Last Name</th><th>Email</th></tr></thead>
					<tbody>
						<?php foreach ($result as $r): ?>
							<tr><td><?=$r['ID']?></td><td><?=$r['fname']?></td><td><?=$r['lname']?></td><td><?=$r['email']?></td></tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php else: ?>
				<p>No records</p>
			<?php endif ?>
			</section>

			</form>
		</div> <!-- row -->
	</div> <!-- container -->
	</div> <!-- content -->


<?php 
	include 'resources/bsfooter.php';
?>	
</body>
</html>