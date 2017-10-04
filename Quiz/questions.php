
<!DOCTYPE html>
<html>
<head>
    <link href="quiz.css" rel="stylesheet">
<style>
.welcome
{
  font-family: 'Raleway', Arial, sans-serif;
  font-size: 25px;
  font-weight: 200;
  right: 300px;
  top: 10px;
  float: right;
  color: #ffffff;
  position:absolute;
}

li:hover{
  background-color: #6EB5C1;
  border: 0;
}

ul {
  list-style: none;
  padding: 0;
  margin: 0; 
}

.siteheader{
  position: absolute;
  top: 22px;
  left: 60px;
}

.siteheader div a{
  float: left;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 35px;
  font-weight: 200;
  text-decoration: none;
}

.siteheader div a span{
  color: #5379fa !important;
}

.main-header{
  min-height: 120px;
}

.header-div {
  margin: auto;
  width: 95%;
  min-height: 40px;
  padding: 1em 2em;
  border: 2px solid #373737;
  border-top: none;
  border-radius: 0 0 5px 5px;
  background: #373737;
}
  .main-header:after {
    content: " ";
    display: table;
    clear: both;
  }

.main-nav,
.drop-nav {
  background: #AFAFAF;
}
.main-nav {
  float: right;
  border-radius: 4px;
  border: solid 1px #AFAFAF;
}
  .main-nav > li {
    float: left;
    border-left: solid 1px #FFFFFF;
  }
  .main-nav li:first-child {
    border-left: none;
  }
  .main-nav a {
    color: #fff;
    display: block;
    padding: 10px 30px;
    text-decoration: none;
  }
.dropdown{
  position: relative;
}
.dropdown:after {
  content: "\25BC";
  font-size: .5em;
  display: block;
  position: absolute;
  top: 38%;
  right: 12%;
}
.drop-nav{
  position: absolute;
  display: none;
  z-index: 10;
}
.drop-nav li {
  border-bottom: 1px solid rgba(255,255,255,.2);
}
.dropdown:hover > .drop-nav{
  display: block;
}

</style>
    <script src="quiz.js"></script>
</head>
	<body>

<header class="main-header">
        <div class="siteheader">
        <div><a href="../Home Page/homeafterlogin.php">Coding<span>Website</span></a></div>
        </div>
        <div class="welcome">
        <p>
          <?php
            if(isset($_SESSION['user']))
               echo "Hello, ".$firstname; 
          ?>
        </p>
        </div>
        <div class="header-div">   
        <ul class="main-nav">
            <li><a href="../Home Page/homeafterlogin.php">Home</a></li>
            <li class="dropdown">
                <a href="#">
                  <?php
                    if(isset($_SESSION['user']))
                      echo $firstname;
                    else echo "User";
                  ?>
                </a>
                <ul class="drop-nav">
                    <li><a href="../Log In Page/login.php">LogIn</a></li>
                    <li><a href="../Sign Up Page/signup.php">Register</a></li>
                    <li><a href="../Log In Page/logout.php">LogOut</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </header>

<form action="" method="post" id="quiz">
<h2 id="quiztitle"><?php echo $_GET['name']?></h2>
<?php
	
	if(isset($_POST['Check']))
	{
		include_once("quiz.php");
		 $quiz1 = new Quiz;
		 $quiz1->type=$_GET['type'];
	     $quiz1->submit();
	}
	
	else{
		include_once("quiz.php");	 
		session_start();
	    $quiz1 = new Quiz;
	    $quiz1->type=$_GET['type']; //change according to the type in database
	    $quiz1->takeQuiz(); 
        echo '<br><br><div id="wrapper"><input id="button" type="submit" name="Check"  value="Submit"></div>
</form>';
	}
?>

<h2 id="score"></h2>
</body>
	</html>