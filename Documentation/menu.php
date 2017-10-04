<!DOCTYPE html>
<html>
<head>

<?php
  session_start();
  if(isset($_SESSION['user']))
  {
    if($_SESSION['user']){ // checks if the user is logged in  
    }
    else{
        header("location: ../Home Page/home.php"); // redirects if user is not logged in
    }
    $user = $_SESSION['user']; //assigns user value
    $firstname = $_SESSION['firstname'];
    //echo "Session is set";
  }
  //echo "Session is not set";
?>
<style>

/* Header CSS starts*/
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
/* Header CSS ends*/

.titles
{
//color:#0040FF;
color:green;
font-family:Comic Sans MS,sans-serif;
}
h1
{
font-family:Comic Sans MS,sans-serif;
//color:#606060;
color:#FFF;
font-size: 200%;
}
#align
{
  text-align: center;
}

#main
{
  width: 960px;
  margin: 30px auto 0 auto;
  -moz-border-radius: 8px;
  -webkit-border-radius: 8px;
  padding: 30px;
  border: 1px solid #adaa9f;
  -moz-box-shadow: 0 2px 2px #9c9c9c;
  -webkit-box-shadow: 0 2px 2px #9c9c9c;
}.features-table thead td
{
  font: bold 1.3em 'trebuchet MS', 'Lucida Sans', Arial;  
  -moz-border-radius-topright: 10px;
  -moz-border-radius-topleft: 10px; 
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-top: 1px solid #eaeaea; 
}


.features-table td
{
  height: 50px;
  line-height: 50px;
  padding: 0 20px;
  border-bottom: 1px solid #cdcdcd;
  box-shadow: 0= 1px 0 white;
  -moz-box-shadow: 0 1px 0 white;
  -webkit-box-shadow: 0 1px 0 white;
  white-space: nowrap;
  //text-align: center;
 // font-weight: bold;

}

.features-table td:nth-child(2)
{
  background: #efefef;
  background: rgba(144,144,144,0.15);
  

  border-right: 1px solid white;
}


.features-table td:nth-child(1)
{
  background: #e7f3d4;  
  //background: rgba(184,243,85,0.3);
  
  background: #E8EAF6;

}

/*Header*/
.features-table thead td
{
  font: bold 1.3em 'trebuchet MS', 'Lucida Sans', Arial;  
  -moz-border-radius-topright: 10px;
  -moz-border-radius-topleft: 10px; 
  border-top-right-radius: 10px;
  border-top-left-radius: 10px;
  border-top: 1px solid #eaeaea;
  border: 2px solid #004040;
}

#middle
{
text-align:center;
}

 th
 { 
    color:black;
    border: 1px solid #004040;
    border-collapse: collapse;
    padding: 10px;
}
.features-table
{
  width: 100%;
  margin: 0 auto;
  border-collapse: separate;
  border-spacing: 1;
  text-shadow: 0 1px 0 #fff;
  color: #2a2a2a;
  background: #fafafa;  
  background-image: -moz-linear-gradient(top, #fff, #eaeaea, #fff); /* Firefox 3.6 */
  background-image: -webkit-gradient(linear,center bottom,center top,from(#fff),color-stop(0.5, #eaeaea),to(#fff)); 
}
 /*td { 
    color:gray;
    border: 1px solid #004040;
    border-collapse: collapse;
    padding: 25px;
}*/
body  {
  background-image: url("../images.jpg");
     // background-repeat: no-repeat;
background-size : 100% auto
}
</style>



  <link href="http://fonts.googleapis.com/css?family=Exo:100,200,400" rel="stylesheet" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,500,700,800' rel='stylesheet' type='text/css'>

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

<div id="main">
<table id="t01" align="center" class="features-table">
<caption><h1>DOCUMENTATION</h1></caption>
  <thead>
    <tr>
    <td id="align">SERIAL NO.</td>
    <td id="align">TOPICS</td>  
    </tr>  
    </thead>  
    
  <tr>
    <td id="middle">1</td>
    <td><a class="titles" href="docs.php?type=dai&name=DECLARATIONS AND INITIALISATION">DECLARATIONS AND INITIALISATION</a></td>		
    </tr>
  <tr>
    <td id="middle">2</td>
    <td><a class="titles" href="docs.php?type=arr&name=ARRAYS">ARRAYS</a></td>		
    </tr>
<tr>
    <td id="middle">3</td>
    <td><a class="titles" href="docs.php?type=str&name=STRINGS">STRINGS</a></td>		
    </tr>   
<tr>
    <td id="middle">4</td>
    <td><a class="titles" href="docs.php?type=fun&name=FUNCTIONS">FUNCTIONS</a></td>		
    </tr>

</table>
</body>
</html>
