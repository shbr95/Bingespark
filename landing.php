<?php
   session_start();
   include("php/db.php");
     //build array of films from selected genre
     $read = "SELECT *
     FROM movie
     INNER JOIN title
     ON movie.title_id = title.title_id
     INNER JOIN poster 
     on movie.poster_id = poster.poster_id
     ORDER BY rand()
     LIMIT 8";
 
      $result = $mysqli->query($read);
      $all = array();
      while($rowdata = $result->fetch_assoc()){
      array_push($all, $rowdata);
 
 
     if(!$result){
         echo $mysqli->error;
         echo "<p>$read</p>";
          exit();
     }
 
  }
    

 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="styles/styles.css" rel="stylesheet">
</head>
<body>


<?php
    include("nav/nav.php"); 
?>

<div class="maincontainer">


<div class="genre container">
    <h1>Featured films</h1>
  
        <div class="row">
        <?php
            foreach($all as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>
        </div>
</div>
  </div>













      







 
</body>
</html>