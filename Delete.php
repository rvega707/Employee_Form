<?php 
	
	$Connection = mysql_connect('localhost', 'root', '');
	$Selected = mysql_select_db('record', $Connection);

	$Delete_Record_Id = $_GET['Delete'];
	$Delete_Query = "DELETE FROM emp_record WHERE id='$Delete_Record_Id'";
	
	$Execute = mysql_query($Delete_Query);

	if($Execute) {
		echo '<script>window.open("View_Form_DataBase.php?Deleted=Recored Deleted Successfully", "_self")</script>';
	}	



 ?>