<?php

session_start();
    
    if(isset($_POST['user']) && isset($_POST['password']))
    {    
      include_once("../authenticate.php");
      $user=new Authenticate();
      $username = mysql_real_escape_string($_POST['user']);
      $password = mysql_real_escape_string($_POST['password']);
      $user->username=$username;
      $user->password=$password;
      $user->LogIn();
      
  }

class Authenticate
{
	function LogIn()
	{
    mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error()); //Connect to server
    // Add password when working on Rohit's computer as "Naiks12345"
    mysql_select_db("wt_project") or die ("Cannot connect to database"); //Connect to database
    $query = mysql_query("Select * from users WHERE username='".$this->username."'"); // Query the users table
    $exists = mysql_num_rows($query); //Checks if username exists
    $table_users = "";
    $table_password = "";
    if($exists > 0) //IF there are no returning rows or no existing username
    {
    	if(isset($_POST['remember']))
      {
        $hour=time()+3600;
        setcookie('remember_me', $_POST['user'], $hour);
        //echo '<script>alert("Hiiii");</script>';
      }
      elseif(!isset($_POST['remember']))
      {
        //echo '<script>alert("Byee");</script>';
        if(isset($_COOKIE['remember_me']))
        {
          $past = time() - 100;
          setcookie('remember_me', 'abc', $past);
          //unset($_COOKIE['remember_me']);
        }
      }
      $row=mysql_fetch_array($query);
       if($this->password == $row['password'])  // Whatever rows you have obtained from the db have the same username as what the user has entered, 
                          //so basically you only need to check the password. If the password if wrong,give an appropriate prompt
        {
          $_SESSION['user'] = $this->username; //set the username in a session. This serves as a global variable
          $_SESSION['firstname'] = $row['fname'];

          // For debugging
          Print '<script>alert("Log In successful!");</script>';

          header("location: Home Page/homeafterlogin.php"); // redirects the user to the authenticated home page
          // header("location:abc.exten"); can be used here as after this no statement will be executed! Otherwise you would have had to use JS safe-side, like that in register.php
        }
        else
        {
          Print '<script>alert("Incorrect Password");</script>'; // Prompts the user
          Print '<script>window.location.assign("Log In Page/login.php");</script>'; // redirects to login.php
        }
    }
    else
    {
        Print '<script>alert("Incorrect username!");</script>'; // Prompts the user
        Print '<script>window.location.assign("Log In Page/login.php");</script>'; // redirects to login.php
    }
  }

  function SignUp()
  {
  	$bool=true;
  	mysql_connect("localhost","root","Naiks12345") or die(mysql_error());
    // Add password when working on Rohit's computer as "Naiks12345"
		mysql_select_db("wt_project") or die("Cannot connect to database");
		$query = mysql_query("Select * from users");
	  while($row = mysql_fetch_array($query))
	  {
	    $table_users = $row['username'];
	    if($this->username == $table_users)
	    {
	      $bool = false;
	      Print '<script>alert("Username has been taken!");</script>';
	      Print '<script>window.location.assign("Sign Up Page/signup.php");</script>';
	    }
	  }
	  return $bool;
	  
  }

  function ForgotPassword()
  {
  	mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
    mysql_select_db("wt_project") or die ("Cannot connect to database"); 
    $query = mysql_query("Select * from users WHERE username='".$this->username."' and emailid='".$this->email."'"); 
    $exists = mysql_num_rows($query); 
    
    if($exists > 0)
    {
        $row=mysql_fetch_array($query);
        //Load PHPMailer dependencies
        require_once 'PHPMailerAutoload.php';
        require_once 'class.phpmailer.php';
        require_once 'class.smtp.php';

        /* CONFIGURATION */
        $crendentials = array(
            'email'     => 'wtcodingwebsite@gmail.com',    //Your GMail adress
            'password'  => 'rjk12345'               //Your GMail password
            );

        /* SPECIFIC TO GMAIL SMTP */
        $smtp = array(

        'host' => 'smtp.gmail.com',
        'port' => 587,
        'username' => $crendentials['email'],
        'password' => $crendentials['password'],
        'secure' => 'tls' //SSL or TLS

        );

        /* TO, SUBJECT, CONTENT */
        $to         = $row['emailid']; //The 'To' field
        $subject    = 'Your Coding Website Password';
        $content    = "Hello, ".$row['fname']."<br>Your password is: <strong>".$row['password']."</strong><br><br>Regards,<br>Coding Website Team.";



        $mailer = new PHPMailer();

        //SMTP Configuration
        $mailer->isSMTP();
        $mailer->SMTPAuth   = true; //We need to authenticate
        $mailer->Host       = $smtp['host'];
        $mailer->Port       = $smtp['port'];
        $mailer->Username   = $smtp['username'];
        $mailer->Password   = $smtp['password'];
        $mailer->SMTPSecure = $smtp['secure']; 

        //Now, send mail :
        //From - To :
        $mailer->From       = $crendentials['email'];
        $mailer->FromName   = 'Coding Website Team'; //Optional
        $mailer->addAddress($to);  // Add a recipient

        //Subject - Body :
        $mailer->Subject        = $subject;
        $mailer->Body           = $content;
        $mailer->isHTML(true); //Mail body contains HTML tags

        //Check if mail is sent :
        if(!$mailer->send()) {
            echo 'Error sending mail : ' . $mailer->ErrorInfo;
        } else {
            echo "<script>alert('Message sent! Check your email!');</script>";
        }
    }  

    else
    {
        echo "<script>alert('User doesn't exist');</script>";
    }
    mysql_close();

  }
}	
?>