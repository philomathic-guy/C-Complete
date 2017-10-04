<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {

        mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
        mysql_select_db("wt_project") or die ("Cannot connect to database");
        $query = mysql_query("Select * from books");
        while ($row = mysql_fetch_array($query) ) {
        $bool= isset($_POST[$row['bookname']]);
        //echo "hiiii$bool";
        if(isset($_POST[$row['identifybook']]))
        {
           //echo $row['avgrate'];
            $avg1=(float)$row['avgrate'];
            $avg2=(float)$_POST[$row['identifybook']];
            $id=$row['identifybook'];
            $avg=$avg1+$avg2;
            $avg=$avg/2;
            mysql_query("UPDATE books set avgrate='$avg' where identifybook='$id'");
        }
                }
    }
?>
<!DOCTYPE html>
<html>
<head>
<link href="style.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Exo:100,200,400" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<?php
    session_start();
    if($_SESSION['user']){ // checks if the user is logged in  
    }
    else{
        header("location: home.php"); // redirects if user is not logged in
    }
    
    // Uncomment the above when you want to actually allow the user to acces homeafterlogin.php only on signing in. During development,
    // you can keep it commented if you are not operating on the server
    
    $user = $_SESSION['user']; //assigns user value
    $firstname = $_SESSION['firstname'];

    class Book
    {
        
        function downloadBook()
        {
            //echo "HIHIHI";
            mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
            mysql_select_db("wt_project") or die ("Cannot connect to database");
            $query = mysql_query("Select * from books");
            $name=1;
            while($row=mysql_fetch_array($query))
            {
                
//                Print '<script>window.location.assign("'.$row['downloadlink'].'");</script>';
               echo' <fieldset id="books">
                <div id="image"><a href="'.$row['downloadlink'].'" download><img id="pos" border="0" src='.$row['imagelink'].' height="325px";
  width="90%" ><br><br></a></div>
                <div id="info">
                <h2 id="bookname"><b>'.$row['bookname'].'</b></h2>
                <h3><b>AUTHOR NAME: </b>'.$row['authorname'].'</h3>
                <h3><b>DOWNLOADS: </b>'.$row['downloadno'].'</h3>
                <h3><b>RATE THE BOOK: </b></h3>
                <form action="books.php" method="post">
                <div class="cont">
                  <div class="stars">
                      <input class="star star-5" id="star-5-'.$name.'" type="radio" name="'.$row['identifybook'].'" value="5"/>
                      <label class="star star-5" for="star-5-'.$name.'"></label>
                      <input class="star star-4" id="star-4-'.$name.'" type="radio" name="'.$row['identifybook'].'" value="4"/>
                      <label class="star star-4" for="star-4-'.$name.'"></label>
                      <input class="star star-3" id="star-3-'.$name.'" type="radio" name="'.$row['identifybook'].'" value="3"/>
                      <label class="star star-3" for="star-3-'.$name.'"></label>
                      <input class="star star-2" id="star-2-'.$name.'" type="radio" name="'.$row['identifybook'].'" value="2"/>
                      <label class="star star-2" for="star-2-'.$name.'"></label>
                      <input class="star star-1" id="star-1-'.$name.'" type="radio" name="'.$row['identifybook'].'" value="1"/>
                      <label class="star star-1" for="star-1-'.$name.'"></label>
                        
                  </div>
                </div>
                 <input class="button" type="submit" name="Check"  value="RATE">
                </form>
                <h3><b>AVERAGE RATINGS: </b>'.$row['avgrate'].'</h3>
                <a href="download.php?name='.$row['bookname'].'"><img id="img" src="../download.png"></a>
                </fieldset>';
                $name++;
                //echo '"star-5'.$name.'"';
            }
        }
    }
?>


</head>
<body bgcolor="black">

<header class="main-header">
        <div class="siteheader">
        <div><a href="../Home Page/homeafterlogin.php">Coding<span>Website</span></a></div>
        </div>
        <div class="welcome">
        <p><?php echo "Hello, ".$firstname; ?></p>
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
<div id="center">
<?php

    $b = new Book;
    //echo "BYE";
    //echo '<p>'.$b->bookname.'</p>';
    $b->downloadBook();
         
?>
</div>
</body>
</html>
