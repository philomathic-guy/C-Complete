<!DOCTYPE html>
<html>
<head>
	<link href="quiz.css" rel="stylesheet">
</head>
</html>

<?php


class Quiz
{
	function takeQuiz()
	{
		mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
		mysql_select_db("wt_project") or die ("Cannot connect to database");
		$query = mysql_query("Select * from quiz WHERE type='".$this->type."'");
		$name=1;
		while($row = mysql_fetch_array($query))
		{
			
			echo //the names according to the column name in the database
				'<fieldset id="field"><p>'.$name.') '.nl2br(htmlspecialchars($row['question'])).'</p> 
				<label><input type="radio" name="' .$name. '" value="o1"> '.nl2br(htmlspecialchars($row["o1"])).' </label><br>
				<label><input type="radio" name="' .$name. '" value="o2"> '.nl2br(htmlspecialchars($row["o2"])).' </label><br>
				<label><input type="radio" name="' .$name. '" value="o3"> '.nl2br(htmlspecialchars($row["o3"])).' </label> <br>
				<label><input type="radio" name="' .$name. '" value="o4"> '.nl2br(htmlspecialchars($row["o4"])).' </label><br></fieldset>';
			
			$name=$name+1;
		}
	}

	function submit()
	{
		if($_SERVER["REQUEST_METHOD"]=="POST")
		{
			mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
			mysql_select_db("wt_project") or die ("Cannot connect to database");
			$query = mysql_query("Select * from quiz WHERE type='".$this->type."'");
			$name=1;
			$marks=0;
			echo '<div id="marks">MARKS : '.$marks.'</div>';
			while($row = mysql_fetch_array($query))
			{
				
				$ans=$row['ans'];
				//echo $row[$ans];
				if(isset($_POST[$name]))
				{
				if($_POST[$name]==$row['ans'])
				{

					echo //the names according to the column name in the database
					'
					<fieldset class="rightans">
					<p>'.$name.') '.nl2br(htmlspecialchars($row['question'])).'</p> 
					<label><ul><li>'.nl2br(htmlspecialchars($row["o1"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o2"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o3"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o4"])).'</li></ul></label><br>
					<label id="ans">ANS: '.$row[$ans].'</fieldset>';
					$marks++;
				}
				else{
					echo //the names according to the column name in the database
					'
					<fieldset class="wrongans">
					<p>'.$name.') '.nl2br(htmlspecialchars($row['question'])).'</p> 
					<label><ul><li>'.nl2br(htmlspecialchars($row["o1"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o2"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o3"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o4"])).'</li></ul></label><br>
					<label id="ans">ANS: '.$row[$ans].'</fieldset>';
				}
				}
				else
				{
					echo //the names according to the column name in the database
					'
					<fieldset class="wrongans">
					<p>'.$name.') '.nl2br(htmlspecialchars($row['question'])).'</p> 
					<label><ul><li>'.nl2br(htmlspecialchars($row["o1"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o2"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o3"])).' </li></label>
					<label><li>'.nl2br(htmlspecialchars($row["o4"])).'</li></ul></label><br>
					<label id="ans">ANS: '.$row[$ans].'</fieldset>';
				}
				$name++;
			}
				
				echo '<script>document.getElementById("marks").innerHTML =  "MARKS:'.$marks.'"; </script>'	;
				echo '<br><div id="wrapper"><button id="button" name="Check"  onclick="options.php">BACK</button></div>';
			}
		}
	}
?>