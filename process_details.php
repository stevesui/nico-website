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
    
    
    echo "<table><tr><th>ID</th><th>Organization</th><th>year</th><th>Country</th><th>Attack Type</th><th>Crime Degr Py</th><th>Kills</th><th>Attacks</th><th>Log of Kills</th><th>Avg Kills</th><th>Frequency</th><th>Q</th><th>T</th><th>Crime Degre Py Diff</th></tr>";
    // output data of each row
    
    while($row = $result->fetch_assoc()) {
      
        echo "<tr><td>" . $row["org_id"]. "</td><td>" . $row["org"]. "</td><td>" . $row["year"]. "</td><td>" . $row["country"]. "</td><td>" . $row["attacktype1"]. "</td><td>" . $row["crim_degr_py"]. "</td><td>".$row["nkill"]. "</td><td>".$row["attack_count"].  "</td><td>". $row["log_nkill"]. "</td><td>" . $row["avg_nkill_per_attack"] . "</td><td>" . $row["frequency"] ."</td><td>" .$row["Q"] . "</td><td>". $row["T"] . "</td><td>" . $row["crim_degr_py_diff"] ."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}


$conn->close();

?> 
