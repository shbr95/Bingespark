<?php

   
  

    //build array of actor names by chosen initial
      $read = "SELECT * FROM actor
      WHERE actor_name LIKE '$actorinitial%'";

    

     $result = $mysqli->query($read);
     $actors = array();
    
    
     while($rowdata = $result->fetch_assoc()){
     array_push($actors, $rowdata);
     


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    