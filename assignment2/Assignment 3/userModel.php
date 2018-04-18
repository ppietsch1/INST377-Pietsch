<?php 
// authormodel.php
// RFollman 4/4/18
function userName($aid, $conn) {
	$aidq = "select * from userinfo where ID = " . $aid;
	if ($conn->connect_error) {echo 'no connection'; die();}
	$ar = $conn->query($aidq);
	$row = $ar->fetch_assoc();
	return $row['fname'] . " " . $row['lname'];
}
function movieCount($aid, $conn) {
	$bctq = "select * from movielist where addedbyID = " . $aid;
	$bctr = $conn->query($bctq);
	return $bctr->num_rows;
}
function dropdown($fld, $data, $oneval) {
	echo '<select class="form-control" id="' . $fld . '" name="' . $fld . '" required="required">';
	echo '<option value="" selected="selected">Please make a choice</option>';
	foreach ($data as $r) {
		if ($r[$fld] == $oneval) {
			echo '<option value="' . $r[$fld] . '" selected="selected">' . $r[$fld] . '</option>';
		} else {
			echo '<option value="' . $r[$fld] . '">' . $r[$fld] . '</option>';
		}
	}
	echo '<option value="99">Add a new genre</option>';
	echo '</select>';
}
?>