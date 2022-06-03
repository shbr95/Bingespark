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


if(!$result){
  echo $mysqli->error;
  echo "<p>$read</p>";
    exit();
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


//read in actors for selected movie
$readactor = "SELECT movie.movie_id, actor.actor_name
FROM movie
INNER JOIN movie_actor
ON movie.movie_id = movie_actor.movie_id
INNER JOIN actor
on movie_actor.actor_id = actor.actor_id
WHERE movie.movie_id = $movie_id";

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

//read in directors for selected movie
$readdirector = "SELECT movie.movie_id, director.director_name
FROM movie
INNER JOIN movie_director
ON movie.movie_id = movie_director.movie_id
INNER JOIN director
on movie_director.director_id = director.director_id
WHERE movie.movie_id = $movie_id";

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


  //build array average rating for selected film
  $read = "SELECT account_movie_rating.movie_id, title.title_name, poster.poster_uri, AVG(rating)
  FROM account_movie_rating
  INNER JOIN movie
  ON movie.movie_id = account_movie_rating.movie_id
  INNER JOIN title
  ON movie.title_id = title.title_id
  INNER JOIN poster 
  ON movie.poster_id = poster.poster_id where movie.movie_id = $movie_id
  GROUP BY movie_id
  ORDER BY 2 DESC";

   $result = $mysqli->query($read);
   $averagerating = array();
   while($rowdata = $result->fetch_assoc()){
   array_push($averagerating, $rowdata);


  if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
       exit();
  }
}

//To count number of rows to show amount of ratings for selected film
$read = "SELECT account_movie_rating.movie_id, title.title_name, poster.poster_uri
  FROM account_movie_rating
  INNER JOIN movie
  ON movie.movie_id = account_movie_rating.movie_id
  INNER JOIN title
  ON movie.title_id = title.title_id
  INNER JOIN poster 
  ON movie.poster_id = poster.poster_id where movie.movie_id = $movie_id";

$result = $mysqli->query($read);
$numberofratingsarray = array();
while($rowdata = $result->fetch_assoc()){
array_push($numberofratingsarray, $rowdata);


if(!$result){
   echo $mysqli->error;
   echo "<p>$read</p>";
    exit();
  }
}


//To count number of rows to show amount of favourites for selected film
$read = "SELECT account_movie_favourite.movie_id, title.title_name, poster.poster_uri
FROM account_movie_favourite
INNER JOIN movie
ON movie.movie_id = account_movie_favourite.movie_id
INNER JOIN title
ON movie.title_id = title.title_id
INNER JOIN poster 
ON movie.poster_id = poster.poster_id where movie.movie_id = $movie_id";

$result = $mysqli->query($read);
$numberoffavouritesarray = array();
while($rowdata = $result->fetch_assoc()){
array_push($numberoffavouritesarray, $rowdata);


if(!$result){
   echo $mysqli->error;
   echo "<p>$read</p>";
    exit();
  }
}






    