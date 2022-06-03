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



//read in all genres 
$readingenres = "SELECT * FROM genre";

$result = $mysqli->query($readingenres);
$genres = array();
while($rowdata = $result->fetch_assoc()){
array_push($genres, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}


//read in genres for selected movie
$readgenre = "SELECT movie.movie_id, genre.genre_name, genre.genre_id
FROM movie
INNER JOIN movie_genre
ON movie.movie_id = movie_genre.movie_id
INNER JOIN genre
on movie_genre.genre_id = genre.genre_id
WHERE movie.movie_id = $movie_id";

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

    

     



    