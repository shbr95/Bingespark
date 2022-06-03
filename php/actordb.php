<?php
    //SQL Query to select all title_name from title table
    $read = "SELECT title_name from title";
    $result = $mysqli->query($read);
    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }
   

    //build array of films by chosen director
    $read = "SELECT * 
	from actor
    INNER JOIN movie_actor
    ON movie_actor.actor_id = actor.actor_id
    INNER JOIN movie
    on movie.movie_id = movie_actor.movie_id
    INNER JOIN poster
    on poster.poster_id = movie.poster_id
    where actor.actor_id = $actorid;";
    

     $result = $mysqli->query($read);
     $actormovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($actormovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    