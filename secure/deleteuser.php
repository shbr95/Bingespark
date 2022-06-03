<?php
    include("../php/db.php"); 
    session_start();
    if($_SESSION["accounttype"] != 1)  {
      header("Location: login.php");
    }
    
    $accountid = $_POST["accountid"];



  //delete user

    $deletestatement = "DELETE FROM account WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_favourite WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_rating WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_review WHERE account_id = '$accountid'";
    $delete = $mysqli->query($deletestatement); 
    
   
    
    if(!$deletestatement){
        echo $mysqli->error;
    }else{
        echo "<p>Account deleted <a href='manageusers.php'>back to users</a></p>";
    }
?>