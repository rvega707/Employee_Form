<?php 
	if(isset($_POST["Submit"])) {
		if(!empty($_POST["Ename"]) && !empty($_POST["SSN"])) {
			$Ename = $_POST["Ename"];
			$SSN = $_POST["SSN"];
			$Dept = $_POST["Dept"];
			$Salary = $_POST["Salary"];
			$HomeAddress = $_POST["HomeAddress"];
			$Connection = mysql_connect("localhost", "root", "");
			$Selected = mysql_select_db("record", $Connection);
			$Query = "INSERT INTO emp_record(enam,ssn,dept,salary,homeaddress) 
					  VALUES('$Ename','$SSN', '$Dept','$Salary','$HomeAddress')";
			$Execute = mysql_query($Query);

			if($Execute) {
				echo "<span class='success'>Record Has been Added</span>";
			}
		} else {
			echo "<span class='FieldInfoHeading'> Please at least add Name and Social Security Number</span>";
		}
	}

 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
	<style type="text/css">
		input[type="text"], textarea {
			border: 1px solid ;
			background-color: rgb(221, 216,212);
			width: 480px;
			padding: .5em;
			font-size: 1.0em;
		}

		input[type="Submit"] {
			color: white;
			font-size: 1.0em;
			font-family: Bitter, Georgia, Times, "Times New Roman", serif;
			width: 200px;
			height: 40px;
			background-color: #5D0580;
			border: 5px solid;
			border-bottom-left-radius: 35px;
			border-bottom-right-radius: 35px;
			border-top-left-radius: 35px;
			border-top-right-radius: 35px;
			border-color: rgb(221, 216, 212);
			font-weight: bold;
			float: left;
		}

		.FieldInfo {
			color: rgb(251, 174, 44);
			font-family: Bitter, Georgia, "Times New Roman", Times, serif;
			font-size: 1em;
		}

		.success {
			color: rgb(158, 27, 214);
			font-family: Bitter,Georgia,"Times New Roman",Times,serif;
			font-size: 1.4em;
			font-weight: bold;	
		}

		.FieldInfoHeading {
			color: rgb(251, 174, 44);
			font-family: Bitter, Georgia,"Times New Roman", Times,serif;
			font-size: 1.3em;
		}
		
		div{
			width: 500px;
			margin-left: 360px;
		}

		fieldset {
			background-image: url("ems1.jpg");
			background-image: repeat-x;
		}

		body {
			background-image: url(3.jpg);
			background-repeat: repeat;
		}

	</style>
</head>
	<body>
	<form action="form2.php" method="post">
		<fieldset>
			<span class="FieldInfo">Employee Name:</span>	<br><input type="text" name="Ename"><br>
			<span class="FieldInfo">Social Security Number:</span><br><input type="text" name="SSN"><br>
			<span class="FieldInfo">Department:</span><br><input type="text" name="Dept"><br>
			<span class="FieldInfo">Salary:</span><br><input type="text" name="Salary"><br>
			<span class="FieldInfo">Home Address:</span><br><textarea name="HomeAddress"></textarea><br>
			<input type="submit" name="Submit" value="submit Your Record"><br>
		</fieldset>
	</form>
</body>
</html>