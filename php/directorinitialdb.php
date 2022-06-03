<?php
    //SQL Query to select all title_name from title table
    $read = "SELECT title_name from title";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
   
  

    //build array of director names by chosen initial
      $read = "SELECT * FROM director 
      WHERE director.director_name LIKE '$directorinitial%'";

    

     $result = $mysqli->query($read);
     $directors = array();
    
    
     while($rowdata = $result->fetch_assoc()){
     array_push($directors, $rowdata);
     


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    