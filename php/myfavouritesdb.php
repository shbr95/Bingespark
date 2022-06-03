<?php


    //build array of films that user has favourited
    $read = "SELECT *
    FROM movie
    INNER JOIN account_movie_favourite
    ON movie.movie_id = account_movie_favourite.movie_id
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    WHERE account_id = '$_SESSION[accountid]'" ;
    

     $result = $mysqli->query($read);
     $favouritemovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($favouritemovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    