<?php
class Docs
{
	function viewDocumentation()
	{
		mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
		mysql_select_db("wt_project") or die ("Cannot connect to database");
		$query = mysql_query("Select * from docs WHERE type='".$this->type."'");
		$null="NULL";
		echo '<h1> '.$_SESSION['name'].' </h1><br><br> ';
		while($row = mysql_fetch_array($query))
		{	
			echo '<fieldset id="field">';
			echo '<fieldset id="description"><h2> ' .nl2br($row['topic']). '</h2><p>' .nl2br(htmlspecialchars($row['description'])). '</p></fieldset>';
			if($row['syntax']!=$null )
				{
					echo '<fieldset id="syntax"><h3> SYNTAX: </h3><p> '.nl2br(htmlspecialchars($row['syntax'])).'</p></fieldset>';
				}
			if($row['example']!=$null)
			{
				$_SESSION['code']=$row['example'];
				echo '<fieldset id="example"><h3> EXAMPLE:</h3><p> '.nl2br(htmlspecialchars($row['example'])).'</p>';
				if(isset($_SESSION['user']))
					{
						echo '<form action="../Compiler/compiler.php" method="post"><input class="button" type="submit" name="Check"  value="TRY IT YOURSELF"></form></fieldset>';
					}
				else
				{
					echo '<form action="../Log In Page/login.php" ><input class="button" type="submit" name="Check"  value="LOG IN TO COMPILE IT YOURSELF"></form></fieldset>';

				}	
				
			}
			echo '</fieldset>';
		}
	}
}
?>