<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3/org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Decisions With Globals</title>
	<meta http-equ="content-type" content="text/html' charset=iso-8859-1"/>
</head>
<body style = "font-family: arial, sans-serif; background-color: green">
	<?php
		$grade1 = $_POST["grade1"];
		$grade2 = $_POST["grade2"];
		$average = ($grade1 + $grade2)/2;
		if ($average > 89){
			print("Average = $average You got an A");
		} elseif ($average > 79){
			print("Average = $average You got a B");
		} elseif ($average > 69){
			print("Average = $average You got a C");
		} elseif ($average > 59){
			print("Average = $average You got a D");
		} elseif ($average >= 0){
			print("Average = $average You got an F");
		}
		$max=$grade1;
		if($grade1 < $grade2){
			$max = $grade2;
		}
		print ("<br /> Your maximum score was $max");
		?>
</body>
</html>
