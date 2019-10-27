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

$sql = "SELECT org_id, org, year,num_kills, num_allies, num_attacks FROM terrordb.activity";
                
if ( isset($_POST['grouplist']) ) {
    $groupid = $_POST['grouplist'];
    //echo "$groupid";
    $sql = $sql . " where org_id = " .$groupid;
}

$result = $conn->query($sql);
//var_dump($result);

if ($result->num_rows > 0) {
    
    
    echo "<table><tr><th>ID</th><th>Organization</th><th>year</th><th>Kills</th><th>Allies</th><th>Attacks</th></tr>";
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) {
      
        echo "<tr><td>" . $row["org_id"]. "</td><td>" . $row["org"]. "</td><td>" . $row["year"]. "</td><td>" . $row["num_kills"]. "</td><td>" . $row["num_allies"]. "</td><td>" . $row["num_attacks"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();

?> 
