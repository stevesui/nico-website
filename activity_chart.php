 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="select_div">
  <select id="chart_select" onchange="getOption()">
  <option value="">Select A Chart</option>
  <option value="combobar">Combo Bar Chart</option>
  <option value="linechart">Line Chart</option>
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
        var selObj = document.getElementById("chart_select");
        var selValue = selObj.options[selObj.selectedIndex].value;
        if (selValue == "combobar")
          ajaxDrawChart("combobar");
        else if (selValue == "linechart")
          ajaxDrawChart("linechart");
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

      /*
      function drawComboChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Year');
        data.addColumn('number', 'Num_Kills');
        data.addColumn('number', 'Num_Attacks');
        data.addColumn('number', 'Num_Allies');
        data.addRows([["2000", 10,20,9]]);
        data.addRows([["2001", 100,10,10]]);
        data.addRows([["2002", 50,10,100]]);

        var options = {
          title: 'Terrorist Activities',
          vAxis: {title: 'Attacks'},
          hAxis: {title: 'Year'},
          seriesType: 'bars'
        };

        var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

      function drawLineChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Year');
        data.addColumn('number', 'Num_Kills');
        data.addColumn('number', 'Num_Attacks');
        data.addColumn('number', 'Num_Allies');
        data.addRows([["2000", 10,20,9]]);
        data.addRows([["2001", 100,10,10]]);
        data.addRows([["2002", 50,10,100]]);


        var options = {
          title: 'Terrorist Activities',
          vAxis: {title: 'Attacks'},
          hAxis: {title: 'Year'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
       */ 
    </script>
