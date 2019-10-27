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

$sql = "SELECT distinct(org)  FROM terrordb.activity";
                
if ( isset($_POST['grouplist']) ) {
    $groupid = $_POST['grouplist'];
    //echo "$groupid";
    $sql = $sql . " where org_id = " .$groupid;
}

$result = $conn->query($sql);
//var_dump($result);

if ($result->num_rows > 0) {
	$row = $result->fetch_assoc(); 

    echo "<p hidden id=\"orgName\">".$row["org"]."</p>"; 
} 
else {
    echo "<p hidden id=\"orgName\"></p>"; 
}


$conn->close();

?> 
