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



//read in all directors 
$readindirectors = "SELECT * FROM director ORDER BY director_name ASC";

$result = $mysqli->query($readindirectors);
$directors = array();
while($rowdata = $result->fetch_assoc()){
array_push($directors, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}


//read in directors for selected movie
$readmoviedirectors = "SELECT movie.movie_id, director.director_name, director.director_id
FROM movie
INNER JOIN movie_director
ON movie.movie_id = movie_director.movie_id
INNER JOIN director
on movie_director.director_id = director.director_id
WHERE movie.movie_id = $movieid";

$result = $mysqli->query($readmoviedirectors);
$moviedirectors = array();
while($rowdata = $result->fetch_assoc()){
array_push($moviedirectors, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}

    

     



    