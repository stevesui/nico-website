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

$sql = "SELECT org_id, org, year,country, attacktype1, crim_degr_py, nkill, attack_count, log_nkill, avg_nkill_per_attack, frequency, Q, T,crim_degr_py_diff FROM terrordb.activity_ext";
                
if ( isset($_POST['grouplist']) ) {
    $groupid = $_POST['grouplist'];
    //echo "$groupid";
    $sql = $sql . " where org_id = " .$groupid;
}

$result = $conn->query($sql);
//var_dump($result);

if ($result->num_rows > 0) {
    
    
	echo "<table style=\"border-collapse: collapse;color: white;padding: 5px;\">";
	echo "<tr style=\"border: 1px solid orange;\"><th style=\"border: 1px solid orange;\">ID</th><th style=\"border: 1px solid orange;\">Organization</th><th style=\"border: 1px solid orange;\">year</th><th style=\"border: 1px solid orange;\">Country</th><th style=\"border: 1px solid orange;\">Attack Type</th><th style=\"border: 1px solid orange;\">Crime Degr Py</th><th style=\"border: 1px solid orange;\">Kills</th><th style=\"border: 1px solid orange;\">Attacks</th><th style=\"border: 1px solid orange;\">Log of Kills</th><th style=\"border: 1px solid orange;\">Avg Kills</th><th style=\"border: 1px solid orange;\">Frequency</th><th style=\"border: 1px solid orange;\">Q</th><th style=\"border: 1px solid orange;\">T</th><th style=\"border: 1px solid orange;\">Crime Degre Py Diff</th></tr>";
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
      
        echo "<tr style=\"border: 1px solid orange;\"><td style=\"border: 1px solid orange;\">" . $row["org_id"]. "</td><td style=\"border: 1px solid orange;\">" . $row["org"]. "</td><td style=\"border: 1px solid orange;\">" . $row["year"]. "</td><td style=\"border: 1px solid orange;\">" . $row["country"]. "</td><td style=\"border: 1px solid orange;\">" . $row["attacktype1"]. "</td><td style=\"border: 1px solid orange;\">" . $row["crim_degr_py"]. "</td><td style=\"border: 1px solid orange;\">".$row["nkill"]. "</td><td style=\"border: 1px solid orange;\">".$row["attack_count"].  "</td><td style=\"border: 1px solid orange;\">". $row["log_nkill"]. "</td><td style=\"border: 1px solid orange;\">" . $row["avg_nkill_per_attack"] . "</td><td style=\"border: 1px solid orange;\">" . $row["frequency"] ."</td><td style=\"border: 1px solid orange;\">" .$row["Q"] . "</td><td style=\"border: 1px solid orange;\">". $row["T"] . "</td><td style=\"border: 1px solid orange;\">" . $row["crim_degr_py_diff"] ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();

?> 
