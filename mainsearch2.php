
<?php

$servername = "localhost";
$username = "brian";
$password = "1305Vintage";
$dbname = "terrordb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$sql = "SELECT id, org FROM `terrordb`.`groups`";
$result = $conn->query($sql);
//var_dump($result);

if ($result->num_rows > 0) {
    
    
   
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) {
        echo "<option value = ". $row["id"].">" . $row["org"]. "</option>"; 
    }
} else {
    echo "0 results";
}


$conn->close();

?> 
        
