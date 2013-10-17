<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3/org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Database Client Service</title>
		<meta http-equi="content-type" content="text/html' charset=iso-8859-1"/>
		<style type="text/css">
		
		*{
		font-family: arial, sans-serif;
		}
	
		article.results{
		display:table-cell;
		min-width:100px;
		max-width:500px;
		}
		
		article.login{
		padding:10px;
		padding-right:30px;
		display:table-cell;
		min-width:100px;
		max-width:200px;
		text-align:center;
		}
		
		div.error{
		text-align:center;
		}
		
		h5{
		font-weight:bold;
		color:green;
		}

		h4{
		font-weight:bold;
		color:#FF3300;
		}
		
		h3{
		font-weight:bold;
		text-align: center;
		}
		
		body{
		background-color: #A9D0F5;
		}
		
		form{
		text-align:center;
		margin:2px;
		}
		
		p{
		font-weight:bold;
		font-size:12px;
		}
		
		img{
		border-style:solid;
		border-width:2px;
		}
		
		table, td{
		border-style:solid;
		border-width:1px;
		}
		
		footer{
		font-weight:bold;
		color: #B45F04;
		text-align:center;
		font-size:12px;
		}
		
		#HEADER{
		font-weight:bold;
		background-color:#000000;
		color: #FFFFFF;
		}
		
		#DATA{
		background-color:#FFFFFF;
		border-color:#000000;
		font-size:14px;
		}
		
		#USERNAME{
		color:green;
		font-weight:bold;
		font-size:16px;
		}
		
		#SPACE{
		padding-top:14px;
		}
		
		</style>
	</head>
<body style = "font-family: arial, sans-serif" style = "background-color: #4A766E">
	<header>
		<h3>-- Suppliers, Parts, Jobs, Shipments Database Client --</h3>
		<hr />
	</header>
	<?php session_start();
		extract($_POST); //get the username & password to connect to the database.
		//build select query
		$query = "$statement";	
		$user = $_SESSION['user'];
		$pass = $_SESSION['pass'];
		
		//connect to MySQL
		if (!($database = mysqli_connect("localhost", "$user", "$pass", "project5")))
			die("Could not connect to database");
		//query database
		
		if ( !($result = mysqli_query($database, $query))){ //If an invalid query / statement is issued...
			print("<div class='error'>");
			print("<br/><br/>");
			print("<h4> A SQLException occured while interacting with the Suppliers, Parts, Jobs, Shipments database. </h4>");
			print("<h4> The error message was: </h4>");
			print(mysqli_error($database)); //Get the error message from the database.
			if($query == "")
				print("Query was empty");
			print("<br/><br/>");
			print("<h4>Please try again later.</h4>");
			print("<p>Press the back button on your web browser to return to the SQL Command Page. </p>");
			print("</div>");
			die(); //Terminate the program.
		} //if end
	?>
	<div>
		<article class="login">
			<form method="post" action="Project5.html">
				<h4> Active Client: </h4>
				<?php 
				print("<p id=USERNAME> $user </p>");
				?>	
				<input style = "background-color:#000000; color:white;" type ="submit" value="Logout">
			</form>
			<p id="SPACE"></p>
			<img src="http://www.w3resource.com/mysql/mysql-logo.jpg" height="90" width="130"></img>
		</article>
		<?php
		if ((substr($query, 0, 6)) == 'select'){ //if select command is issued
			print("<article class='results'>");
			print("<h4>Query Results:</h4>");
			print("<table  border = '1' cellpadding = '3' cellspacing = '3' style>");
			
			$metadata = mysqli_fetch_fields($result);
			print("<tr id='HEADER'>");
			for ($i=0; $i<count($metadata); $i++){
				print("<td>");
				printf("%s", $metadata[$i]->name);
				print("</td>");
			} //for end
			print("</tr>");
			//fetch each record in result set
			for ($counter = 0; $row = mysqli_fetch_row($result); $counter++){
			//build table to display results
				print("<tr id='DATA'>");
				foreach($row as $key => $value)
					print("<td>$value</td>");
				print("</tr>");
			} //for end
			print("</table>");
			mysqli_close($database);
			}
		?>
		<!-- handles Delete, Insert, and Update commands (lets the client know what was executed & # of rows affected.) -->
		<?php 
			if ((substr($query, 0, 6)) != 'select'){
				$command = strtoupper(substr($query, 0, 6));
				print("<article class='results'>");
				print("<h4> $command executed successfully. </h4>");
				print("<h5> $result row(s) affected. </h5>");
				}
		?> 
			<p id="SPACE"></p>
			<p>Press the back button on your web browser to return to the SQL Command Page.</p>
		</article>
	</div>
	<hr/>
	<footer> &copy Stark102088 Industries </footer>
</body>
</html>