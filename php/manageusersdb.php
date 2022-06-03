<?php
    //SQL Query to select all users from account table
    $read = "SELECT * from account
    INNER JOIN account_type ON
    account.account_type_id = account_type.account_type_id;";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
   

    

     $result = $mysqli->query($read);
     $users = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($users, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    