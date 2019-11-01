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

$sql = "";
if ( isset($_GET['group_by']) ) {
	if ($_GET['group_by'] =="org")
             $sql = "select sum(num_kills) as total_kills, org as aggregator from terrordb.activity group by aggregator order by total_kills desc limit 10;";
	else if ($_GET['group_by']=="year") 
             $sql = "select sum(num_kills) as total_kills, year as aggregator from terrordb.activity group by aggregator order by total_kills desc limit 10;";
 }

$result = $conn->query($sql);
//var_dump($result);

$summary_list = array();
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
	//	echo " number of kill ".$row["total_kills"]. " Group ".$row["aggregator"] . "<br>";
		$rowArray = array($row["total_kills"],$row["aggregator"]);
		array_push($summary_list,$rowArray);
        } 
}
	//foreach ($summary_list as &$i)
//	echo " number of kill ".$i[0]. " Group ".$i[1] . "<br>";
	echo json_encode($summary_list);

$conn->close();

?> 
