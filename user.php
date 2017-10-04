<?php
class User
{
	function addUser()
	{
		include_once("authenticate.php");
		$check=new Authenticate();
		$check->username=$this->username;
		$bool=$check->SignUp();

		if($bool)
		{
		    mysql_query("INSERT INTO users (fname,lname,username,emailid,password,birthdate,birthmonth,birthyear,gender) VALUES ('$this->name','$this->lname','$this->username','$this->emailid','$this->password','$this->birthdaydate','$this->birthdaymonth','$this->birthdayyear','$this->gender')");
	      	$_SESSION['user'] = $this->username; //set the username in a session. This serves as a global variable
	      	$_SESSION['firstname'] = $this->name;
	      	Print '<script>alert("Successfully Registered!");</script>';
		    Print '<script>window.location.assign("../Home Page/homeafterlogin.php");</script>';
		}
	}
}
?>