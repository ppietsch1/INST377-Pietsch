<?php 
	include 'resources/bslinks.php';
	$a = "select ID, fname, lname from userinfo order by lname, fname";
	$b = "select * from movielist order by title";
	$g = "select metascore from movielist order by metascore";
	$row = null;
	$conn = new mysqli(localhost, root, root, assignment2);
	if ($conn->connect_error) die($conn->connect_error);
	$user = $conn->query($a);
	$movies = $conn->query($b);
	$metascore = $conn->query($g);
	if ($_GET['bid']) {
		$bidq = "select * from movielist where movieID = " . $_GET['bid'];
		$ar = $conn->query($bidq);
		$row = $ar->fetch_assoc();
	}
	include 'userModel.php';
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Movies</title>
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
			<h1>Add Movies</h1>
			<h3>This form allows users from the 'users' table to add to and edit a list of their favorite movies. Users can select their name from the dropdown window of all their names. If their name is not listed, they can add it to the database <a href="formPP.php" class="btn btn-warning pull-right">here</a>
			</h3>
			<form action="saveMovie.php" method="post" class="form-horizontal">
				<input type="hidden" name="movieID" value="<?=$row['movieID']?>" id="movieID">
				<div class="form-group">
					<label for="Title" class="control-label col-sm-3">Movie Title</label>
					<div class="col-sm-4">
						<input type="text" onchange="validText(this.value, this.name)" name="Title" placeholder="Movie Title" value="<?=$row['Title']?>" class="form-control" id="Title" required="required">
						<span class="small text-warning" id="title"></span>
					</div>
				</div>
				<div class="form-group">
					<label for="addedbyID" class="control-label col-sm-3">User</label>
					<div class="col-sm-4">
						<select name="addedbyID" id="addedbyID" class="form-control" required="required">
							<option value="" selected="selected">Please make a choice</option>
							<?php foreach ($user as $r): ?>
								<?php if ($r['addedbyID'] == $row['addedbyID']): ?>
									<option value="<?=$r['ID']?>"><?=$r['lname'] . ", " . $r['fname']?></option>
								<?php else: ?>
									<option value="<?=$r['ID']?>"><?=$r['l_name'] . ", " . $r['f_name']?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label for="Director" class="control-label col-sm-3">Director</label>
					<div class="col-sm-4">
						<input type="text" name="Director" class="form-control" id="Director" value="<?=$row['Director']?>" placeholder="First & Last Name" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="releaseYear" class="control-label col-sm-3">Release Year</label>
					<div class="col-sm-3">
						<input type="Year" name="releaseYear" required="required" class="form-control" id="releaseYear" value="<?=$row['pub_date']?>" placeholder="Year" required="required">
					</div>
				</div>
				<div class="form-group">
					<label for="metascore" class="control-label col-sm-3">Metascore</label>
					<div class="col-sm-4">
						<input type="number" name="metascore" class="form-control hidden" id="metascore" value="<?=$row['metascore']?>" max = "100" placeholder="Metascore" required="required">
					</div>
				</div>
				<div class="form-group">
					<input type="submit" value="Submit" class="btn btn-info pull-right">
				</div>
				<div>
					<a href="displayDataPP.php" class="btn btn-warning pull-right">Show Table Details</a>
				</div>
				<div class="col-sm-5">
						<a href="formPP.php" class="btn btn-warning">Add New User</a>
				</div>
			</form>
			<section class="col-sm-6 col-sm-offset-3">
			<h2>Current Movies</h2>
			
			<?php if ($movies): ?>
				<table class="small table table-condensed table-striped", align="center", border= "1px solid black">
					<thead><tr><th>Title</th><th>Director</th><th>Release Year</th><th>Metascore</th><th>Added By</th></tr></thead>
					<tbody>
						<?php foreach ($movies as $r): ?>
							<tr>
								<td><a href="formPPa3.php?bid=<?=$r['movieID']?>"><?=$r['Title']?></a></td>
								<td><?=$r['Director']?></td>
								<td><?=$r['releaseYear']?></td>
								<td><?=$r['metascore']?></td>
								<td><?=userName($r['addedbyID'], $conn)?></td>
								
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			<?php else: ?>
				<p>No records</p>
			<?php endif ?>
			</section>			
		</div>	
	</div>
</div>
<?php 
	include 'resources/bsfooter.php';
?>
</body>
</html>