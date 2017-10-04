<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Random Login Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <!--<script src="js/prefixfree.min.js"></script>    - I think it is not of any use as there is no .js file--> 
  </head>

  <body>
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
  <div class="body"></div>
  <div class="header">
  <div>Coding<span>Website</span></div>
  </div>
  <br>
  <div class="login">
  <form action="../authenticate.php" method="post">
    <?php 
      //echo "Hello";
      if(isset($_COOKIE['remember_me'])) 
      {
        echo '<input type="text" placeholder="username" name="user" value="'.$_COOKIE['remember_me'].'"><br>
    <input type="password" placeholder="password" name="password"><br>';
      }
      else
      {
        echo '<input type="text" placeholder="username" name="user"><br>
    <input type="password" placeholder="password" name="password"><br>';
      }
    ?>
	  <input type="checkbox" name="remember"><div id="checkbox">Remember Me!</div><br>
	  <input type="submit" value="Login">
  </form>
  <a id="a" href="../Forgot Password/forgot.php">Forgot Password ?</a>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>  
  </body>
</html>
