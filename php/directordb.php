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
	from director
    INNER JOIN movie_director
    ON movie_director.director_id = director.director_id
    INNER JOIN movie
    on movie.movie_id = movie_director.movie_id
    INNER JOIN poster
    on poster.poster_id = movie.poster_id
    where director.director_id = $directorid;";
    

     $result = $mysqli->query($read);
     $directormovies = array();
     while($rowdata = $result->fetch_assoc()){
     array_push($directormovies, $rowdata);


    if(!$result){
        echo $mysqli->error;
        echo "<p>$read</p>";
         exit();
    }

 }


        
         
     



    