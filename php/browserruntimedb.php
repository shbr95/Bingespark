<?php

 
    //build array of films between chose runtimes
    $read = "SELECT *
    FROM movie
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    INNER JOIN runtime
    on runtime.runtime_id = movie.runtime_id
    WHERE runtime.runtime_minutes BETWEEN $minruntime AND $maxruntime";
   
     $result = $mysqli->query($read);
     $runtimemovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($runtimemovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }







        
         
     



    