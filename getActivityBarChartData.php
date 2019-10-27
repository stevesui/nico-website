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

if ( isset($_GET['groupId']) ) {
    $groupid = $_GET['groupId'];
    //echo "$groupid";
    $sql = $sql . " where org_id = " .$groupid;
}

$result = $conn->query($sql);


  
// Declare two dimensional associative 
// array and initilize it 

$top_array = array();
$cols_array= array();
$rows_array = array();

array_push($cols_array, array("id"=>"","label"=>"Year","pattern"=>"","type"=>"string"));
array_push($cols_array,array("id"=>"","label"=>"Num_Kills","pattern"=>"","type"=>"number"));
array_push($cols_array,array("id"=>"","label"=>"Num_Attacks","pattern"=>"","type"=>"number"));
array_push($cols_array,array("id"=>"","label"=>"Num_Allies","pattern"=>"","type"=>"number"));



//array_push($top_array, array("cols"=>$cols_array));
$top_array["cols"]=$cols_array;

// $year_array = array("2000","2005","2008");
// $kills_array = array(30,100,80);
// $attack_array = array(3,6,10);
// $allies_array = array(300,90,8);


if ($result->num_rows > 0) {


    //echo "<table><tr><th>ID</th><th>Organization</th><th>year</th><th>Kills</th><th>Allies</th><th>Attacks</th></tr>";
    // output data of each row


    while($row = $result->fetch_assoc()) {

        //echo "<tr><td>" . $row["org_id"]. "</td><td>" . $row["org"]. "</td><td>" . $row["year"]. "</td><td>" . $row["num_kills"]. "</td><td>" . $row["num_allies"]. "</td><td>" . $row["num_attacks"]. "</td></tr>";

        $arr = array ( 
            "c"=>array(
              array( 
                "v"=>$row["year"], 
                "f"=>null
              ),
              array( 
                "v"=>$row["num_kills"], 
                "f"=>null
              ),
              array( 
                "v"=>$row["num_attacks"], 
                "f"=>null
              ),
              array( 
                "v"=>$row["num_allies"], 
                 "f"=>null
              )
          )
        );  
        array_push($rows_array, $arr);

    }
    //echo "</table>";
} else {
    //echo "0 results";
}



/*
for ($i=0;$i<3 ;$i++)
{
  
  $arr = array ( 
    "c"=>array(
      array( 
        "v"=>$year_array[$i], 
        "f"=>null
      ),
    array( 
        "v"=>$kills_array[$i], 
        "f"=>null
      ),
    array( 
        "v"=>$attack_array[$i], 
        "f"=>null
      ),
    array( 
        "v"=>$allies_array[$i], 
        "f"=>null
      )
    )
  ); 
  
 array_push($rows_array, $arr);
}
*/

 //array_push($top_array, array("rows"=>$rows_array));
$top_array["rows"]=$rows_array;


  
// Function to convert array into JSON 
echo json_encode($top_array, JSON_PRETTY_PRINT); 
  


?>
