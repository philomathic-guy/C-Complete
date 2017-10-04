<!DOCTYPE html>
<html>
<head>
	<link href="docs.css" rel="stylesheet">
</head>
	<body>
<?php
		include_once("view.php");	 
		session_start();
		$_SESSION['name']=$_GET['name'];
	    $docs = new Docs;
	    $docs->type=$_GET['type']; //change according to the type in database
	    $docs->viewDocumentation();
?>
<!--<br><div id="wrapper"><a href="menu.php"><input type="submit" id="button" name="Check" value="BACK"></a></div>-->
</body>
	</html>