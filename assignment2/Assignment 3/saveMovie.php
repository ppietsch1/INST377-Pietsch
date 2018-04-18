<?php 
	/*saveAuthor | saves data from sampleForm | 3/5/18*/
	$conn = new mysqli(localhost, root, root, assignment2);
	if ($conn->connect_error) die($conn->connect_error);
	//ss validation goes here
	
	//store post data to array
	$data['addedbyID'] = $_POST['addedbyID'];
	$data['movieID'] = $_POST['movieID'];
	$data['Title'] = $_POST['Title'];
	$data['Director'] = $_POST['Director'];
	$data['releaseYear'] = $_POST['releaseYear'];
	$data['metascore'] = $_POST['metascore'];

	//each array key is a field name; use that to set up query
	if ($_POST['movieID']) {
		$q = "update `movielist` set "; 
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . " = '" . $postdata . "', ";
		}
		$q = substr($q,0,-2);
		$q .= " where movieID = " . $_POST['movieID'];
		$tryit = $conn->query($q);
	} else {
		$q = "insert into `movielist` (`";
		$qd = ") values ('";
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . "`, `";
			$qd .= $postdata . "', '";
		}
		$qstr = substr($q,0,-3) . substr($qd,0,-3) . ");";
		echo $qstr . "<br>";
		$result = $conn->query($qstr);
	}
	header('Location: formPPa3.php');
	$q = "select * from movielist";
	$result = $conn->query($q);
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	echo "There are " . $rows . " rows in the movieList table. <br>";
	echo "<a href='formPPa3.php'>Add another book... </a><br>";
?>