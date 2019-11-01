 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="select_div">
  <select id="report_select" onchange="getOption()">
  <option value="">Select A Report</option>
  <option value="top_10_group">Top 10 Most Dangerous Groups</option>
  <option value="top_10_year">Top 10 Year Terrorist Groups Most Active</option>
 </select>
 </div>

 <div id="chart_div" style="width: 900px; height: 500px;"></div>
<?php
       if ( isset($_POST['grouplist']) ) {
          $groupid = $_POST['grouplist'];
        //echo "Hello $groupid";
        echo "<p hidden id=\"groupId\">$groupid</p>";
      }
      else
        echo "<p hidden id=\"groupId\"></p>";
?>
<?php include 'get_orgname_from_groupid.php';?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 <script type="text/javascript">
      
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback();

      function getOption() {
        var selObj = document.getElementById("report_select");
        var selValue = selObj.options[selObj.selectedIndex].value;
        if (selValue == "top_10_group")
          ajaxDrawChart("top_10_group");
        else if (selValue == "top_10_year")
          ajaxDrawChart("top_10_year");
      }


      function ajaxDrawChart(chart_type) {
        var groupId = document.getElementById("groupId").innerHTML;

        var jsonData = $.ajax({
            url: "getActivityBarChartData.php?groupId="+groupId,
            dataType: "json",
            async: false
          }).responseText;

        console.log("jsonData = " +jsonData);

        // Create our data table out of JSON data loaded from server.
	var data = new google.visualization.DataTable(jsonData);

	var orgName = document.getElementById("orgName").innerHTML;
	orgName = orgName+" Terrorist Activities";


	// Instantiate and draw our chart, passing in some options.
	if (chart_type == "combobar") {
        	var options = {
          	//title: 'Terrorist Activities',
          	title: orgName,
          	vAxis: {title: 'Attacks / Kills / Allies'},
          	hAxis: {title: 'Year'},
         	seriesType: 'bars'
          	};
        	var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
		chart.draw(data, options);
 	}
	else if (chart_type == "linechart"){
        	var options = {
          	title: orgName,
          	vAxis: {title: 'Attacks / Kills / Allies'},
          	hAxis: {title: 'Year'},
          	};
		var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
		chart.draw(data, options);
	}

      }

    </script>
