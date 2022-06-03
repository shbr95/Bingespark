<?php
 
    //build array of highest rated films
    $read = "SELECT account_movie_rating.movie_id, title.title_name, poster.poster_uri, AVG(rating) 
    FROM account_movie_rating 
    INNER JOIN movie 
    ON movie.movie_id = account_movie_rating.movie_id 
    INNER JOIN title 
    ON movie.title_id = title.title_id 
    INNER JOIN poster 
    ON movie.poster_id = poster.poster_id 
    GROUP BY movie_id 
    ORDER BY `AVG(rating)` 
    DESC LIMIT 100";

     $result = $mysqli->query($read);
     $highestratedmovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($highestratedmovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }

