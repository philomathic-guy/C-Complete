<?php
    //Print '<script>alert("Entered checkforgot!");</script>';
    session_start();
    $username = mysql_real_escape_string($_POST['user']);
    $emailid = mysql_real_escape_string($_POST['email']);
    //echo $username;
    $bool = true;
    mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
    mysql_select_db("wt_project") or die ("Cannot connect to database"); 
    $query = mysql_query("Select * from users WHERE username='$username' and emailid='$emailid'"); 
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
        echo "<script>alert('User does not exist');</script>";
    }
    mysql_close();
?>
