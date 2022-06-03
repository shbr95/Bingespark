<?php
    //SQL Query to select selected user from account table
    $read = "SELECT * from account
    INNER JOIN account_type ON
    account.account_type_id = account_type.account_type_id
    WHERE account.account_id = $accountid;";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
     $result = $mysqli->query($read);
     $user = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($user, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }


       //SQL Query to select all account types
       $read = "SELECT * from account_type";
       $result = $mysqli->query($read);
       if(!$result){
           echo $mysqli->error;
           echo "<p>$read</p>";
            exit();
       }
        $result = $mysqli->query($read);
        $accounttypes = array();
        while($rowdata = $result->fetch_assoc()){
        array_push($accounttypes, $rowdata);
   
   
       if(!$result){
           echo $mysqli->error;
           echo "<p>$read</p>";
            exit();
       }
    }

 }


        
         
     



    