<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Major+Mono+Display|Share+Tech+Mono&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Cairo|IBM+Plex+Mono|Rubik|Varela&display=swap" rel="stylesheet">

	<title>Data Display</title>
		<style>

			:root {
				--primary-color: white;
				--content-font: 'IBM Plex Mono', monospace;
			}

			body {
				background: #222;
				width:100%;
				height:100%;
				margin:0;
			}

			.container {
			    height:100%;
			    padding: 0;
			    margin: 0;
			    display: grid;
			    grid-gap: 0.1em;
			    grid-template-columns: repeat(15, 1fr);
			    grid-template-rows: 40px 50px 40px;
			    grid-template-areas: 
			        "l l l l l h h h h h h h h h h"
			        "l l l l l h h h h h h h h h h"
			        "l l l l l c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        "m m m m m c c c c c c c c c c"
			        
			}

			.container > div{
				background: #111;
			}

			.logo{
			    grid-area: l;
			    color: #fbfbf8;
			    display:inline-block;
			    padding-left: 20px;
			    padding-top:10px;
			    
				
			    /*border: 2px solid red;*/
			}

			.logo h1{
				font-family: 'Varela', sans-serif;
				font-size:27px;
				position: relative;
				letter-spacing: 2px;
			}

			.logo .logo-link {
				text-decoration: none;
				color: var(--primary-color);
			}

			.vl{
				margin: auto;
				position:relative;
				float: right;
				top:15%;
				width:10%;
				height:60%;
				border-left: 7px solid #fbfbf8;
			}

			.header {
			    grid-area: h;
			    /*border: 2px solid red;*/
				padding-left: 20px;
				padding-right: 20px;
				font-size: 17px;
				
			}

			.header h1{
				font-family: var(--content-font);
				color: #fbfbf8;
				letter-spacing: 4px;
			}


			.menu {
			    grid-area: m;
			    /*border: 2px solid red;*/
			}

			.nav {
				/*border: 1px solid var(--primary-color);*/
				/*display: block;*/
				margin: 0 auto;
				position: relative;
				display:block;
				width:100%;
				height: 50%;
				top:25%;
			}

			.nav ul{
				list-style: none;
				display: block;
				top: 40%;
			}

			.nav .menu-link {
				line-height:50px;
				letter-spacing: 5px;
				margin-left: -15px;
			}

			.menu-link {
  				position: relative;
  				display: inline-block;
  				font-family: var(--content-font);
  				font-size: 24px;
  				font-weight: 400;
  				text-align: center;
			}

			.menu-link,
			.menu-link:hover {
				color: var(--primary-color);
				text-decoration: none;
			}

			.menu-link::after {
  				content: "";
  				position: absolute;
			}

			.nav .menu-link::after {
  				top: 65%;
  				height: 6px;
				width: 0%;
 				left: 5%;
				background-color: rgba(255, 255, 255, 0.6);
   				transition: width 0.5s ;
			}

			.menu-link:hover::after {
				width: 95%;
				/*transition: width 0.5s ;*/
			}

			.content {
			    grid-area: c;
			    /*border: 2px solid red;*/
			}

			h3 {
				color: #fbfbf8;
				font-family: var(--content-font);
				/*border: 1px solid white;*/
				width: 13%;
				margin-left: 20px;
				text-decoration: underline;
			}

			table {
				color: #fbfbf8;
				font-family: var(--content-font);
				border-spacing: 55px 10px;
			}

			.tab {
				overflow: hidden;
				/*border: 1px solid #ccc;*/
				background-color: #111;

			}

			.tab button {
				background-color: inherit;
				float: left;
				font-family: var(--content-font);
				border:none;
				outline: none;
				outline:none;
				cursor: pointer;
				padding: 14px 16px;
				transition: 1s;
				width: 33%;
			}

			/* Change background color of buttons on hover */
			.tab button:hover{
				background-color: #ccc;
			}

			/* Create an active/current tablink class; stays that color when clicked */
			.tab button.active {
				background-color: #ccc;
			}

			.tabcontent {
				animation: fadeEffect 0.5s;
				display: none;
				/*font-style: var(--content-font);*/
				/*padding: 6px 12px;
				border: 1px solid #ccc;
				border-top:none;*/
			}

			



			@-webkit-keyframes fadeEffect {
 				from {opacity: 0;}
 				to {opacity: 1;}
			}



		</style>
</head>
<body>
	<div class = "container">
		<div class = "logo">
			<div class = "vl"></div>
				<h1> 
					<a class = "logo-link" href = 'home_page.html'> northwestern <br> NICO </a>
				</h1>
		</div>
		<div class = "header">
                        <?php include 'update_data.php';?>
		<!--	<h1>Name of Group<h1>   -->
		</div>
		<div class = "menu">
			<div class = "nav">
				<ul>
					<li>
						<a class = "menu-link" href='trial.html'>About</a>
					</li>
					<li>
						<a class = "menu-link" href='data_page.php'>Data</a>
	                </li>
	                <li>
	                    <a class = "menu-link" href='data_analysis.html'>Analysis</a>
	                </li>
	                <li>
	                    <a class = "menu-link" href='contact.html'>Contact</a>
	                </li>
				</ul>
			</div>
		</div>
		<div class = "content">
		<div class = "tab">
            	<button class="tablinks" onclick = "openTab(event, 'Activity')" id="defaultOpen">Activity</button>
            	<button class = "tablinks" onclick = "openTab(event, 'Details')">Details</button>
            	<button class = "tablinks" onclick = "openTab(event, 'Graphs')">Graphs</button>
        	</div>

        	<div id = "Activity" class = "tabcontent">
            	<h3>Activity</h3>
		  <table>
			<?php include 'process_mainsearch.php';?>
		 </table>
        	</div>

        	<div id="Details" class="tabcontent">
            	<h3> Details </h3>
        	</div>

        	<div id="Graphs" class="tabcontent">
		<h3>Graphs</h3>
                  <!-- <table> -->
                        <?php include 'activity_chart.php';?>
                  <!-- </table> -->
        	</div>

		<script src = "process_mainsearch.js"></script>

		</div>
		
	</div>


</body>
</html>
