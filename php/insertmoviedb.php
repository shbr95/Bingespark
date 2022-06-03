<?php

//read in genres for all movies
$readgenre = "SELECT movie.movie_id, genre.genre_name, genre.genre_id
FROM movie
INNER JOIN movie_genre
ON movie.movie_id = movie_genre.movie_id
INNER JOIN genre
on movie_genre.genre_id = genre.genre_id";

$result = $mysqli->query($readgenre);
$moviegenre = array();
while($rowdata = $result->fetch_assoc()){
array_push($moviegenre, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}


//read all actors
$readactor = "SELECT movie.movie_id, actor.actor_name
FROM movie
INNER JOIN movie_actor
ON movie.movie_id = movie_actor.movie_id
INNER JOIN actor
on movie_actor.actor_id = actor.actor_id";

$result = $mysqli->query($readactor);
$movieactor = array();
while($rowdata = $result->fetch_assoc()){
array_push($movieactor, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}

//read in all directors
$readdirector = "SELECT movie.movie_id, director.director_name
FROM movie
INNER JOIN movie_director
ON movie.movie_id = movie_director.movie_id
INNER JOIN director
on movie_director.director_id = director.director_id";

$result = $mysqli->query($readdirector);
$moviedirector = array();
while($rowdata = $result->fetch_assoc()){
array_push($moviedirector, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}

    

     



    