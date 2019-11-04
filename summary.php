 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<div id="select_div">
  <select id="report_select" onchange="getOption()">
  <option value="">Select A Report</option>
  <option value="top_10_group">Top 10 Most Dangerous Groups</option>
  <option value="top_10_year">Top 10 Year Terrorist Groups Most Active</option>
 </select>
 </div>

<br><br>

 <div id="report_div" style="width: 900px; height: 500px;"></div>

 <script type="text/javascript">

      function getOption() {
        var selObj = document.getElementById("report_select");
        var selValue = selObj.options[selObj.selectedIndex].value;
        if (selValue == "top_10_group")
          ajaxCall("org");
        else if (selValue == "top_10_year")
          ajaxCall("year");
      }


      function ajaxCall(type) {

        var jsonData = $.ajax({
            url: "summary_sql.php?group_by="+type,
            dataType: "json",
            async: false
          }).responseText;

        console.log("jsonData = " +jsonData);

	var text = "<table style=\"border-collapse: collapse;color: white;padding: 5px;\">"; 
	if (type =="org")
		text = text +"<tr style=\"border: 1px solid orange;\"><th style=\"border: 1px solid orange;\">Total Kills</th style=\"border: 1px solid orange;\"><th>Terrorist Group</th></tr>";
        else
		text = text +"<tr style=\"border: 1px solid orange;\"><th style=\"border: 1px solid orange;\">Total Kills</th><th style=\"border: 1px solid orange;\">Year</th></tr>";
	var summary_list = JSON.parse(jsonData);
	console.log("summary_list "+summary_list);
	for (var i  in summary_list) { 
		console.log("i : "+summary_list[i]);
		console.log("type of "+typeof summary_list[i]);
		var row = summary_list[i];
		text = text + "<tr style=\"border: 1px solid orange;\"><td style=\"border: 1px solid orange;\">"+row[0]+"</td><td style=\"border: 1px solid orange;\">"+row[1]+"</td></tr>";
	}

	text = text +"</table>";

	console.log("after looping the json object : "+text);
	document.getElementById("report_div").innerHTML = text;
      }

    </script>
