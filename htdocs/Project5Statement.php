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
		
		div{
		margin:5px;
		overflow:hidden;
		align:middle;
		}

		article.welcome{
		display:table-cell;
		min-width:100px;
		max-width:500px;
		}
		
		a{
		padding-left:20px;
		}
		
		.center{
		font-weight: bold;
		width:200px;
		text-align:left;
		margin:0 auto;
		}
		
		article.login{
		padding:10px;
		padding-right:30px;
		display:table-cell;
		min-width:100px;
		max-width:200px;
		text-align:center;
		}
		
		h4{
		font-weight:bold;
		color:#FF3300;
		}
		
		a{
		text-align:center;
		}
		
		h3{
		text-align: center;
		}
		
		p, ul{
		font-size:12px;
		}
		
		img{
		border-style:solid;
		border-width:2px;
		}
		
		body{
		background-color: #A9D0F5;
		}

		p.issues{
		font-weight: bold;
		color:#FF3300;;
		font-size: 24px;
		text-align:center;
		}
		
		footer{
		font-weight:bold;
		color: #B45F04;
		text-align:center;
		font-size:12px;
		}
		
		#CONNECT_ERROR{
		font-weight: bold;
		color:#B40404;
		text-align:center;
		font-size:44px;
		}
		
		#SPACE{
		padding-top:14px;
		}
		
		#USERNAME{
		color:green;
		font-weight:bold;
		font-size:16px;
		}
		
	</style>
</head>
<body> 
<?php session_start();
	
	//get username / password information from user
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$_SESSION['user'] = $username;
	$_SESSION['pass'] = $password;
	
	if (!($database = mysqli_connect("localhost", "$username", "$password", "project5"))){
			echo '<p id=CONNECT_ERROR>';
			print("Error: Could not connect to database.");
			print("<p class=issues> Please be sure to check the following: </p>");
			print("<div class=center>");
			print("<ul><li>Connection Status</li><li>Username / Password</li><li>Database Privileges</li></ul>");
			print("<a href='http://localhost:8081/Project5.html'> Return to Main Page </a>");
			print("</div>");
			die();
			}
?>
		<h3> -- Suppliers, Parts, Jobs, Shipments Database Client -- </h3>
		<hr />
	<div>
		<article class="login">
		<form method="post" action="Project5.html">
			<h4> Active Client: </h4>
			<?php 
				print("<p id=USERNAME> $username </p>");
			?>
			<input style = "background-color:#000000; color:white;" type ="submit" value="Logout">
		</form>
		<p id="SPACE"></p>
		<img src="http://www.w3resource.com/mysql/mysql-logo.jpg" height="90" width="130"></img>
		</article>
		<article class="welcome">
			<h4 id=USERNAME>Login: Successful</h4>
			<h4>Enter Query Below:</h4>
			<p>Please enter a valid SQL query or update statement. You may also
			just press "Submit Query" to select all Parts from the database.</p>
			<form method="post" action="Project5Result.php">
				<textarea name ="statement" cols="60" rows="10"></textarea>
				<p></p>
				<input style = "background-color:#000000; color:white;" type="submit" value="Submit SQL Command">
				<input style = "background-color:#000000; color:white;" type="reset" value="Reset Window">
		</article>
	</div>
<hr>
<footer> &copy Stark102088 Industries </footer>	
</body>
<html>