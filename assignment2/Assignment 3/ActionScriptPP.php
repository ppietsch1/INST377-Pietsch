<?php 
	/*actionScript | saves data from sampleForm | 3/5/18*/
	//require_once 'liblogin.php';
	$conn = new mysqli(localhost, root, root, assignment2, 3306, '/Applications/MAMP/tmp/mysql/mysql.sock');
	if ($conn->connect_error) die($conn->connect_error);
	//ss validation goes here
	
	//store post data to array
	$data['ID'] = $_POST['ID'];
	$data['fname'] = $_POST['fname'];
	$data['lname'] = $_POST['lname'];
	$data['email'] = $_POST['email'];
	
	//each array key is a field name; use that to set up query
	if ($_POST['ID']) {
		$q = "update `userinfo` set "; 
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . " = '" . $postdata . "', ";
		}
		$q = substr($q,0,-2);
		$q .= " where ID = " . $_POST['ID'];
		$tryit = $conn->query($q);
	} else {
		$q = "insert into `userinfo` (`";
		$qd = ") values ('";
		foreach ($data as $fldName => $postdata) {
			$q .= $fldName . "`, `";
			$qd .= $postdata . "', '";
		}
		$qstr = substr($q,0,-3) . substr($qd,0,-3) . ");";
		echo $qstr . "<br>";
		$result = $conn->query($qstr);
	}
	header('Location: formPP.php');
	$q = "select * from userinfo";
	$result = $conn->query($q);
	if (!$result) die($conn->error);
	$rows = $result->num_rows;
	echo "There are " . $rows . " rows in the Users table. <br>";
	echo "<a href='sampleForm.php'>Add another user... </a><br>";
?>