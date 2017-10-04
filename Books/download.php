<?php

        $id=$_GET['name'];
        mysql_connect("localhost", "root", "Naiks12345") or die (mysql_error());
        mysql_select_db("wt_project") or die ("Cannot connect to database");
        $query = mysql_query("Select * from books where bookname='$id'");
        echo $_GET['name'];
        $row = mysql_fetch_array($query);
        $no=$row['downloadno'];
        $no++;
        mysql_query("UPDATE books set downloadno='$no' where bookname='$id'");
        $file=$row['downloadlink'];
        echo $file;
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
		readfile($file);
        	
?>