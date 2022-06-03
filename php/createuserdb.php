<?php
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


        
         
     



    