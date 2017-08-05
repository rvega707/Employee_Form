<!DOCTYPE html>
<html>
<head>
	<title>View From DataBase</title>
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

		.success, caption {
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

		fieldset {
			background-image: url("ems1.jpg");
			background-image: repeat-x;
		}

		div {
			width: 500px;
			margin-left: 360px; 
		}

		.EditButton {
			background-color: green;
			border: 5px solid;
			border-color: rgb(221, 216, 212);
			color: #ffffff;
			text-align: center;
			font-size: 1.1em;
		}

		.DeleteButton {
			background-color: red;
			border: 5px solid;
			border-color: rgb(221, 216,212);
			color: #ffffff;
			text-align: center;
			font-size: 1.1em;
		}

		.EditButton:hover {
			background-color: #35ee31;
		}
		.DeleteButton:hover {
			background-color: #f00000;
		}

		th {
			
			color: black;
			background-color: #FAF9FA;
			font-size: 1.2em;
		}

		td {
			border: 1px solid;
			overflow: hidden;
			width: 70px;
			text-align: center;
			color: black;
			font-family: Bitter,Georgia, Times, "Times New Roman", serif;
			font-size: 1.0em;
			padding: 3px;
		}

		tr:hover {
			background-color: #eeeaee;
		}

		body {
			background-image: url(3.jpg);
			background-repeat: repeat;
		}
	</style>
</head>
<body>

<div>
	<form action="View_Form_DataBase.php" method="GET">
		<fieldset>
			<input type="text" name="Search" value="" placeholder="Search by Employee Name Or Social Security Number">
			<input type="Submit" name="SearchButton" value="Search">
		</fieldset>
	</form>
</div>

<?php 
	$Connection = mysql_connect('localhost', 'root', '');
	$Selected = mysql_select_db('record', $Connection);
	if(isset($_GET["SearchButton"])) {
		$Search = $_GET["Search"];
		$SearchQuery = "SELECT * FROM emp_record WHERE enam='$Search' OR ssn='$Search' ";
		$Execute = mysql_query($SearchQuery);
		while ($DataRows = mysql_fetch_array($Execute)) {
			$Id = $DataRows["id"];
			$Ename = $DataRows["enam"];
			$SSN = $DataRows["ssn"];
			$Dept = $DataRows["dept"];
			$Salary = $DataRows["salary"];
			$HomeAddress = $DataRows["homeaddress"];
	
 ?>

 <table align="center" border="5" width="1000">
	 <caption>Search Result</caption>
	 <tr>
	 	<th align="center">ID</th>
	 	<th align="center">Employee Name </th>
	 	<th align="center">Social Security Number</th>
	 	<th align="center">Department</th>
	 	<th align="center">Salary</th>
	 	<th align="center">Home Address</th>
	 	<th align="center">New</th>
	 </tr>

	 <tr>
	 	<td align="center"><?php echo $Id; ?></td>
	 	<td align="center"><?php echo $Ename; ?></td>
	 	<td align="center"><?php echo $SSN; ?></td>
	 	<td align="center"><?php echo $Dept; ?></td>
	 	<td align="center"><?php echo $Salary; ?></td>
	 	<td align="center"><?php echo $HomeAddress; ?></td>
	 	<td align="center"><a href="View_Form_DataBase.php">Search Again</a></td>
	 </tr>
 </table>
<?php 
	}
}
	

 ?>
	<h2 class="success"><?php echo @$_GET["Deleted"]; ?></h2>
	<h2 class="success"><?php echo @$_GET["Updated"]; ?></h2>
	<table width="1000" align="center" border="5">
		<caption>View From DataBase</caption>
		<tr>
			<th align="center">ID</th>
			<th align="center">Employee Name</th>
			<th align="center">SSN</th>
			<th align="center">Department</th>
			<th align="center">Salary</th>
			<th align="center">Home Address</th>
			<th align="center">Delete</th>
			<th align="center">Update</th>
		</tr>
		<?php
			$Connection = mysql_connect('localhost', 'root', '');
			$Selected = mysql_select_db('record', $Connection);
			$ViewQuery = "SELECT * FROM emp_record";
			$Execute = mysql_query($ViewQuery);
			while($DataRows = mysql_fetch_array($Execute)) {
				$Id = $DataRows["id"];
				$Ename = $DataRows["enam"];
				$SSN = $DataRows["ssn"];
				$Dept = $DataRows["dept"];
				$Salary = $DataRows["salary"];
				$HomeAddress = $DataRows["homeaddress"];
			

		 ?>

		 <tr>
		 	<td style="color: #5e5eff;" align="center"><?php echo $Id; ?></td>
		 	<td style="color: #5e5eff;" align="center"><?php echo $Ename; ?></td>
		 	<td style="color: #5e5eff;" align="center"><?php echo $SSN; ?></td>
		 	<td style="color: #5e5eff;" align="center"><?php echo $Dept; ?></td>
		 	<td style="color: #5e5eff;" align="center"><?php echo $Salary; ?></td>
		 	<td style="color: #5e5eff;" align="center"><?php echo $HomeAddress; ?></td>
		 	<td style="color: #5e5eff;" class="DeleteButton" align="center"><a style="color: blue;" href="Delete.php?Delete=<?php echo $Id;?>">Delete</a></td>
		 	<td class="EditButton" align="center"><a style="color: white; " href="Update.php?Update=<?php echo $Id;?>">Update</a></td>
		 </tr>
		 <?php } ?>
	</table>
</body>
</html>