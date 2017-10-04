<?php
	class Compiler
	{
		function compileCode()
		{
			$pgm=$this->code;
			//echo '<textarea>'.$pgm.'</textarea>';
			$tempc=fopen("C://xampp//htdocs//WT Project//Compiler//temp.c","w+") or die("Unable to open file!");
			fwrite($tempc, $pgm);

			$command1="gcc temp.c -o temp";
			$command2="temp";
			//$arr1=array();
			$arr2=array();

			shell_exec($command1);
			$op=shell_exec($command2);
			
			//echo $op;
			$_SESSION['output']=$op;

			$this->displayResult();
		}

		function displayResult()
		{
			$output=$_SESSION['output'];
			echo '<strong id="out">OUTPUT:</strong><br><br>';
			echo '<textarea  id="output" rows="10" cols="50">'.$output.'</textarea>';
			fclose($pgm);
			unlink('C://xampp//htdocs//WT Project//Compiler//temp.exe');
		}
	}
?>