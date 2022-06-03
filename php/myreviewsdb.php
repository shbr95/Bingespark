<?php


    //build array of films that user has reviewed
    $read = "SELECT *
    FROM movie
    INNER JOIN account_movie_review
    ON movie.movie_id = account_movie_review.movie_id
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    WHERE account_id = '$_SESSION[accountid]'" ;
    

     $result = $mysqli->query($read);
     $reviewedmovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($reviewedmovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    