<?php

$moviedetails = "SELECT *
FROM movie
INNER JOIN title
ON movie.title_id = title.title_id
INNER JOIN summary
ON movie.summary_id = summary.summary_id
INNER JOIN poster 
on movie.poster_id = poster.poster_id
INNER JOIN revenue 
on movie.revenue_id = revenue.revenue_id
INNER JOIN runtime
on movie.runtime_id = runtime.runtime_id
INNER JOIN year
on movie.year_id = year.year_id
WHERE movie.movie_id= $movie_id";

$result = $mysqli->query($moviedetails);
$movie = array();
while($rowdata = $result->fetch_assoc()){
array_push($movie, $rowdata);
}

$title = $movie[0]['title_name'];
$summary = $movie[0]['summary'];
$posterimg = $movie[0]['poster_uri'];
$revenue = $movie[0]['revenue_millions'];
$runtime = $movie[0]['runtime_minutes'];
$year= $movie[0]['year'];
$movieid = $movie[0]['movie_id'];



//read in all actors
$readinactors = "SELECT * FROM actor";

$result = $mysqli->query($readinactors);
$actors = array();
while($rowdata = $result->fetch_assoc()){
array_push($actors, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}


//read in actors for selected movie
$readmovieactor = "SELECT movie.movie_id, actor.actor_name, actor.actor_id
FROM movie
INNER JOIN movie_actor
ON movie.movie_id = movie_actor.movie_id
INNER JOIN actor
on movie_actor.actor_id = actor.actor_id
WHERE movie.movie_id = $movie_id";

$result = $mysqli->query($readmovieactor);
$movieactor = array();
while($rowdata = $result->fetch_assoc()){
array_push($movieactor, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}

    

     



    