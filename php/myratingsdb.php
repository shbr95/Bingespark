<?php


    //build array of films that user has rated
    $read = "SELECT *
    FROM movie
    INNER JOIN account_movie_rating
    ON movie.movie_id = account_movie_rating.movie_id
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    WHERE account_id = '$_SESSION[accountid]'" ;
    

     $result = $mysqli->query($read);
     $ratedmovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($ratedmovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    