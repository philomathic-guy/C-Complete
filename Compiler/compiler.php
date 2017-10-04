<html>
<head>
	<!--<link href="style.css" rel="stylesheet">-->
	<script src="codemirror.js"></script>
	<link rel="stylesheet" href="codemirror.css">
	<script src="clike.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
	</script>
    <script type="text/javascript" src="https://cdn.rawgit.com/carlo/jquery-base64/master/jquery.base64.min.js">
    </script>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,500,700,800' rel='stylesheet' type='text/css'>
    <link href="http://fonts.googleapis.com/css?family=Exo:100,200,400" rel="stylesheet" type="text/css">
	<?php
		session_start();
		if($_SESSION['user']){
		}
		else{
			header("location:../Home Page/home.php");
		}
		    $user = $_SESSION['user']; //assigns user value
		    $firstname = $_SESSION['firstname'];
	?>

</head>
<body>
	<header class="main-header">
        <div class="siteheader">
        <div><a href="../Home Page/homeafterlogin.php">Coding<span>Website</span></a></div>
        </div>
        <div class="welcome">
        <p><?php echo "Hello, ".$firstname;?></p>
        </div>
        <div class="header-div">   
        <ul class="main-nav">
            <li><a href="../Home Page/homeafterlogin.php">Home</a></li>
            <li class="dropdown">
                <a href="#"><?php echo $firstname; ?></a>
                <ul class="drop-nav">
                    <li><a href="../Log In Page/login.php">LogIn</a></li>
                    <li><a href="../Sign Up Page/signup.php">Register</a></li>
                    <li><a href="../Log In Page/logout.php">LogOut</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </header>
	<div class="text-and-button">
	<form method="post" class="code-form">
    
	<?php echo '<strong>TYPE YOUR CODE HERE:</strong><br>'; ?>
	<textarea rows="25" cols="100" name="code" class="code" id="code"> 
<?php  //textarea of output
	if(isset($_POST['submit']))
		echo $_POST['code'];
	else if(isset($_POST['Check']))
		echo $_SESSION['code'];
else
echo '#include<stdio.h>

void main()
{
	int abc=3;
	while(abc)
	{
		printf("%d",abc);
		abc--;
	}
}';

?>
		
	</textarea>
	<br>
	<!--<input type="button" name="run" class="run" value="Run"></input>-->
	<br>
	
	<input id="button" type="submit" value="Submit" name="submit">
	<br>
	<br>
	
	</form>
	</div>

	<?php
		include_once("intermediate.php");
		$comp = new Compiler;
		if(isset($_POST['code']))
			$comp->code = $_POST['code'];
		if(isset($_POST['submit']))
			$comp->compileCode();	
	?>

</body>
<script>
var editor = CodeMirror.fromTextArea(document.getElementById("code"), {
    lineNumbers: true,
    mode: "text/x-csrc",
    matchBrackets: true
});

/*function submit_html()
        {
            editor.save();
            var code = document.getElementById("code").value;
            var data_url = "data:text/html;charset=utf-8;base64," + $.base64.encode(code);
            document.getElementById("result").src = data_url;
        }
*/
</script>
</html>