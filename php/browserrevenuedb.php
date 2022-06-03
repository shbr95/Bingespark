<?php

 
    //build array of films between chosen revenue
    $read = "SELECT *
    FROM movie
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    INNER JOIN revenue
    on revenue.revenue_id = movie.revenue_id
    WHERE revenue.revenue_millions BETWEEN $minrevenue AND $maxrevenue";
   
     $result = $mysqli->query($read);
     $revenuemovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($revenuemovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }







        
         
     



    