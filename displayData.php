 <?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "assignment2";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT ID, fname, lname, email FROM userinfo";
$result = $conn->query($sql);

echo "<table align = 'center' border='1'>
<tr>
<th>ID No. (Int) </th>
<th>First Name (String) </th>
<th>Last Name (String)</th>
<th>Email (String)</th>
</tr>";

if ($result->num_rows > 0) {
    // output data of each row
	while($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td>" . $row['ID'] . "</td>";
		echo "<td>" . $row['fname'] . "</td>";
		echo "<td>" . $row['lname'] . "</td>";
		echo "<td>" . $row['email'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
} 
else {
	echo "0 results";
}

echo "Total entries: $result->num_rows";

$conn->close();
?> 