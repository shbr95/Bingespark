<?php
    //SQL Query to select all title_name from title table
    $read = "SELECT title_name from title";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
   
    //build 2D of film titles from mysqli query using PHP
    $titles=array();
    while($rowdata = $result->fetch_assoc()){
    array_push($titles, $rowdata);
    }

    //build array of films from selected genre
    $read = "SELECT *
    FROM movie
    INNER JOIN title
    ON movie.title_id = title.title_id
    INNER JOIN poster 
    on movie.poster_id = poster.poster_id
    INNER JOIN movie_genre
    ON movie.movie_id = movie_genre.movie_id
    INNER JOIN genre
    on movie_genre.genre_id = genre.genre_id
    WHERE genre_name = '$genre'";

     $result = $mysqli->query($read);
     $genremovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($genremovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    