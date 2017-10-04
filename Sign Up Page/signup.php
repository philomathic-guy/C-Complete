<html>
<head>
<link href="style.css" rel="stylesheet">



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
  
<div id="description"></div>
<!--container start-->
<div id="container">
  <div id="container_body">
    <div>
      <h2 class="form_title">User Registration</h2>
      </div>
    <!--Form  start-->
    <div id="form_name">
      <div class="firstnameorlastname">
       <form name="form" method="post" action="">
<!--action="../Home Page/homeafterlogin.php"   -  removed from the line above temporarily-->       
       <div id="errorBox"></div>
        <input type="text" name="FirstName" value="" placeholder="First Name"  class="input_name" required>
        <input type="text" name="LastName" value="" placeholder="Last Name" class="input_name" required>
        
      </div>
        <div id="Username">
        <input type="text" name="Username" value=""  placeholder="Username" class="Username" required>
      </div>
      <div id="email_form">
        <input type="email" name="Emailid" value=""  placeholder="Your Email" class="input_email" required>
      </div>
     
      <div id="password_form">
        <input type="password" name="Password" value=""  placeholder="New Password" class="input_password" required>
      </div>
      <div id="Re_password_form">
        <input type="password" name="confirmPassword" value=""  placeholder="Confirm Password" class="input_Re_password" required>
      </div>
      <!--birthday details start-->
      <div>
        <h3 class="birthday_title">Birthday</h3>
      </div>
      <div>
        <select name="birthday_month" required><!-- The name attribute is used to reference elements in a JavaScript, or to reference form data after a form is submitted.-->
          <option value="" selected >Month</option><!-- 'selected' when present, it specifies that an option should be pre-selected when the page loads.-->
          <option value="1">Jan</option>
          <option value="2">Feb</option>
          <option value="3">Mar</option>
          <option value="4">Apr</option>
          <option value="5">May</option>
          <option value="6">Jun</option>
          <option value="7">Jul</option>
          <option value="8">Aug</option>
          <option value="9">Sep</option>
          <option value="10">Oct</option>
          <option value="11">Nov</option>
          <option value="12">Dec</option>
        </select>
        &nbsp;&nbsp;<!-- The browser will always truncate spaces and so to add real spaces nbsp i.e non breaking space is used-->
        <select name="birthday_day" required>
          <option value="" selected>Day</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
        </select>
        &nbsp;&nbsp;
        <select name="birthday_year" required>
          <option value="" selected>Year</option>
          <option value="2013">2013</option>
          <option value="2012">2012</option>
          <option value="2011">2011</option>
          <option value="2010">2010</option>
          <option value="2009">2009</option>
          <option value="2008">2008</option>
          <option value="2007">2007</option>
          <option value="2006">2006</option>
          <option value="2005">2005</option>
          <option value="2004">2004</option>
          <option value="2003">2003</option>
          <option value="2002">2002</option>
          <option value="2001">2001</option>
          <option value="2000">2000</option>
          <option value="1999">1999</option>
          <option value="1998">1998</option>
          <option value="1997">1997</option>
          <option value="1996">1996</option>
          <option value="1995">1995</option>
          <option value="1994">1994</option>
          <option value="1993">1993</option>
          <option value="1992">1992</option>
          <option value="1991">1991</option>
          <option value="1990">1990</option>
        </select>
      </div>
      <!--birthday details ends-->
      <div id="radio_button">
        <input type="radio" name="Gender" value="Female">
        <label >Female</label>
        &nbsp;&nbsp;&nbsp;
        <input type="radio" name="Gender" value="Male">
        <label >Male</label>
      </div>
       <div>
        <button id="sign_user">Sign Up </button>
      </div>
     </form>
    </div>
    <!--form ends--> 
  </div>
</div>
<!--container ends-->
</body>
</html>
<?php

  echo '<script>return Submit()</script>';
//if($bool)
//{
  if($_SERVER["REQUEST_METHOD"]=="POST")
  {
    $bool=true;
    $fname=mysql_real_escape_string($_POST['FirstName']);
    $lname=mysql_real_escape_string($_POST['LastName']);
    $username=mysql_real_escape_string($_POST['Username']);
    $emailid=mysql_real_escape_string($_POST['Emailid']);
    $password=mysql_real_escape_string($_POST['Password']);
    $confirmpassword=mysql_real_escape_string($_POST['confirmPassword']);
    $birthdaymonth=mysql_real_escape_string($_POST['birthday_month']);
    $birthdaydate=mysql_real_escape_string($_POST['birthday_day']);
    $birthdayyear=mysql_real_escape_string($_POST['birthday_year']);
    $gender=mysql_real_escape_string($_POST['Gender']);
    if($password!=$confirmpassword)
    {
      $bool=false;
      echo '<script>document.getElementById("errorBox").innerHTML="Passwords do not match";</script>';
    }
    
    mysql_connect("localhost","root","Naiks12345") or die(mysql_error());
    // Add password when working on Rohit's computer as "Naiks12345"
    mysql_select_db("wt_project") or die("Cannot connect to database");
    $query = mysql_query("Select * from users");
    while($row = mysql_fetch_array($query))
    {
      $table_users = $row['username'];
      if($username == $table_users)
      {
        $bool = false;
        Print '<script>alert("Username has been taken!");</script>';
        Print '<script>window.location.assign("signup.php");</script>';
      }
    }
    if($bool)
    {
      mysql_query("INSERT INTO users (fname,lname,username,emailid,password,birthdate,birthmonth,birthyear,gender) VALUES ('$fname','$lname','$username','$emailid','$password','birthdaydate','$birthdaymonth','$birthdayyear','gender')");
      session_start();
      $_SESSION['user'] = $username; //set the username in a session. This serves as a global variable
      $_SESSION['firstname'] = $fname;
      Print '<script>alert("Successfully Registered!");</script>';
      Print '<script>window.location.assign("WT Project/Home Page/homeafterlogin.php");</script>';
    }
  }
//}
?>
