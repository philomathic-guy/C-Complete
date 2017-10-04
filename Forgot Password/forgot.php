<!DOCTYPE HTML>
<html>
<head>
<link href="style.css" rel="stylesheet">
</head>
<body>
  <!--<div id="a">
      <div>
      <h1 class="form_title">Forgot Your Password ?</h1>
      </div>-->

      <div class="body"></div> 
      <header class="main-header">
        <div class="siteheader">
        <div><a href="../Home Page/home.php">Coding<span>Website</span></a></div>
        </div>
        <div class="header-div">
        <ul class="main-nav">
            <li><a href="../Home Page/home.php">Home</a></li>
            <li class="dropdown">
                <a href="#">User</a>
                <ul class="drop-nav">
                    <li><a href="../Log In Page/login.php">LogIn</a></li>
                    <li><a href="../Sign Up Page/signup.php">Register</a></li>
                </ul>
            </li>
        </ul>
        </div>
    </header>
    <p class="forgotstatement">Forgot your Password ?</p><br>
      <div class="body"></div>
  <div class="header">
  <div>Coding<span>Website</span></div>
  </div>
  <br>
  <div class="forgot">
  <form action="checkforgot.php" method="post">
    <input type="text" placeholder="Enter you Username" name="user"><br>
    <input type="text" placeholder="Enter your Email" name="email"><br>
    <input type="submit" value="Submit">
  </form>
</body>
</html>

  