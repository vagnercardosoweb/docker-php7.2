<?php
$servername = "mysql";
$username = "root";
$password = "root";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, email, website, comment, gender, reg_date FROM MyForm";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]." " . $row["email"]." " . $row["website"]." " . $row["comment"]." " . $row["gender"]. " " . $row["reg_date"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>