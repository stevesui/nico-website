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
    
    echo "<table style=\"border-collapse: collapse;color: white;padding: 10px;\">"; 
    echo "<tr style=\"border: 1px solid orange;\"><th style=\"border: 1px solid orange;\">ID</th><th style=\"border: 1px solid orange;\">Organization</th><th style=\"border: 1px solid orange;\">Year</th><th style=\"border: 1px solid orange;\">Kills</th><th style=\"border: 1px solid orange;\">Allies</th><th style=\"border: 1px solid orange;\">Attacks</th></tr>";
    // output data of each row
    
    
    while($row = $result->fetch_assoc()) {
      
        echo "<tr><td style=\"border: 1px solid orange;\">" . $row["org_id"]. "</td><td style=\"border: 1px solid orange;\">" . $row["org"]. "</td><td style=\"border: 1px solid orange;\">" . $row["year"]. "</td><td style=\"border: 1px solid orange;\">" . $row["num_kills"]. "</td><td style=\"border: 1px solid orange;\">" . $row["num_allies"]. "</td><td style=\"border: 1px solid orange;\">" . $row["num_attacks"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();

?> 
