<html>
<head>
	<link href="https://fonts.googleapis.com/css?family=Major+Mono+Display|Share+Tech+Mono&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Cairo|IBM+Plex+Mono|Rubik|Varela&display=swap" rel="stylesheet">

	<title>Data Search Page</title>
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
			        "m m m m m f f f f f f f f f f"
			        
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
				overflow: hidden;
				
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
			    overflow:auto;
			    /*border: 2px solid red;*/
			}

			select {
				background: #ddc7c7;
				/*border: 1px solid yellow;*/
				border-radius: 5px;
				width: 100%;
				padding: 15px;
				
				color: #3F3F3F;
				font-family: var(--content-font);
    			font-size: 15px;
    			-webkit-appearance: none;
				-moz-appearance: none;
				-ms-appearance: none;
	 			-o-appearance: none;
				appearance: none;
			}


			.instructions {
				display: inline-block;
				position: relative;
				/*border: 1px solid white;*/
				left: 20px;
				top:20px;
				width:90%;
			}

			.instructions h3 {
				font-family: var(--content-font);
				font-size:20px;
				color:white;
			}
		
			.select-wrapper {
				/*display:inline-block;
				border:1px solid yellow;
				position:absolute;
				float: right;*/
				position: relative;
				left: 20px;
				top: 35px;
				width:90%;

				/*border: 1px solid yellow;*/


				

			}


			/*.select-wrapper:after {
				font-family: var(--content-font);
  				content: ' \2193';
  				font-size: 28px;
  				position: absolute;
  				top: 10px;
  				right: 20px;
  				color: #434B67;
  				pointer-events: none;
			}*/

			.select-wrapper:after{
				content: ' \2193';
				position:relative;
				font-size:28px;
				top:-45px;
				left:-20px;
				float: right;
				color: #434B67;
			}



/*input {
	display: block;
	width: 110px;
	font-family: 'Share Tech Mono', monospace;
    font-size: 18px;
    letter-spacing: 4px;
    background-color: #111;
    border: 2px;
    border-style: solid;
    border-color: #ddc7c7;
    font-size: 22px;
    color:#ddc7c7;
    
    display: inline-block;
    text-align: center;
    cursor: pointer;
    -webkit-transition: color 1s;
    -moz-transition:    color 1s;
    -ms-transition:     color 1s;
    -o-transition:      color 1s;
    transition:         color 1s;
}*/
			
			

		
	


			.footer {
			    grid-area: f;
			  
			    overflow: hidden;
			    /*border: 2px solid red;*/
			}

			.footer #wrapper{
				
				position: relative;
				top:25%;
				right:5%;
				/*border: 1px solid red;*/
				
			
				padding-left: 20px;
				padding-right: 20px;

				float: right;
				
				background-color: #111;
				
			}

			.footer #wrapper #submit-button{
				font-family: var(--content-font);
				font-size: 20px;
				letter-spacing: 2px;
				color:#fbfbf8;
				background-color: #111;
				cursor: pointer;
			}



			.footer #wrapper #submit-button:hover {
				-webkit-transform: scale(1.2);
				/*color: #d3052e;*/
			}

			.footer .about{
				font-family: var(--content-font);
				font-size: 20px;
				letter-spacing: 2px;
				color:#fbfbf8;
			}

			/*#wrapper {
	margin: 0;
	position: absolute;
	top:450%;
	left:50%;
	margin-right:-50%;
	transform: translate(-50%,-50%);
	
}*/



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
			<h1>Data Search<h1>
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
			<div class = "instructions">
				<h3>Select one of the following groups in the drop-down menu:</h3>
			</div>
			<form action = "data_display.php" id = "submission-form", method="post">
                <div class = "select-wrapper">
                    <select name = "grouplist">
                        <?php include "mainsearch2.php";?>
                    </select>
                </div>

                <!--
                <div id="wrapper">
                    <input type = "submit">
                </div>-->

            
		</div>
		<div class = "footer">
			<div id = "wrapper">
				<!--<button class = "btn about">-->

					<input id = "submit-button" type = "submit" value = "Submit &#8594"> 
						
				<!--</button>-->
			</div>
		</div>
		</form> 
	</div>


</body>
</html>
