<?php
 
    //build array of most favourited films
    $read = "SELECT account_movie_favourite.movie_id, title.title_name, poster.poster_uri, COUNT(account_movie_favourite.movie_id)
    FROM account_movie_favourite
    INNER JOIN movie
    ON movie.movie_id = account_movie_favourite.movie_id
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    ON movie.poster_id = poster.poster_id
    GROUP BY account_movie_favourite.movie_id
    ORDER BY 4 DESC
    LIMIT 100";

     $result = $mysqli->query($read);
     $mostfavouritedmovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($mostfavouritedmovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }

