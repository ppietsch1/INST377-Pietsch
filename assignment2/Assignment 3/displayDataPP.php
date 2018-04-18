<html>
	<head>
		<style>
		body {
			background-color: lightblue;
			color: white;
  			text-align: center;
		}
		</style>
		<title>Table Information</title>
		<?php 
			include 'resources/bslinks.php';
		//	require_once 'liblogin.php';
			$conn = new mysqli(localhost, root, root, assignment2);
			if ($conn->connect_errno) {
				printf("Connect failed: %s\n", $conn->connect_error);
				exit();
			} 
			$query = "select * from userinfo";
			$result = $conn->query($query);
			$finfo = $result->fetch_fields();
			$rows = $result->num_rows;
			function transType($t) {
				switch ($t) {
					case '3':
						return 'Long';
						break;
					 case '253':
					 	return 'Varchar';
					 	break;
					case'13':
						return 'Year';
						break;
					default:
						return 'Error: ' . $t . ' not found.';
						break;
				}
			}
			$queryMov = "select * from movielist";
			$resultMov = $conn->query($queryMov);
			$finfoMov = $resultMov->fetch_fields();
			$rowsMov = $resultMov->num_rows;
			
		?>
		<link rel="stylesheet" href="css/main-php.css">
	</head>
	<body>
		<div class="content">
			<div class="container">
				<div class="row">
					<h1>Table Data</h1>
					<?php if ($result): ?>
						<section class="col-sm-6 col-sm-offset-3">
						<table class="small table table-condensed table-striped", align="center">
							<thead>
								<tr><th>Field Name</th><th></th><th class="text-right">Length</th><th></th><th class="text-right">Data Type</th></tr>
							</thead>
							<tbody>
								<?php foreach ($finfo as $r): ?>
									<tr><td><?=$r->name?></td><td></td><td class="text-right"><?=$r->length?></td><td></td><td class="text-right"><?=transType($r->type)?></td></tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<blockquote><h4>There are <?=$rows?> rows in the Users table.</h4></blockquote>
						<a href="formPP.php" class="btn btn-info pull-right">Add a New User</a>
						</section>
					<?php endif ?>
				</div>
			</div>
		</div>

		<div class="content">
			<div class="container">
				<div class="row">
					<h1>Table Data</h1>
					<?php if ($resultMov): ?>
						<section class="col-sm-6 col-sm-offset-3">
						<table class="small table table-condensed table-striped", align="center">
							<thead>
								<tr><th>Field Name</th><th></th><th class="text-right">Length</th><th></th><th class="text-right">Data Type</th></tr>
							</thead>
							<tbody>
								<?php foreach ($finfoMov as $r): ?>
									<tr><td><?=$r->name?></td><td></td><td class="text-right"><?=$r->length?></td><td></td><td class="text-right"><?=transType($r->type)?></td></tr>
								<?php endforeach ?>
							</tbody>
						</table>
						<blockquote><h4>There are <?=$rowsMov?> rows in the Movielist table.</h4></blockquote>
						<a href="formPPa3.php" class="btn btn-info pull-right">Add a New Movie</a>
						</section>
					<?php endif ?>
				</div>
			</div>
		</div>
		<?php include 'resources/bsfooter.php'; ?>
	</body>
</html>