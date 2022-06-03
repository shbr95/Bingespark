<?php
    session_start();
    $genre = $_GET['genre'];
    urldecode($genre);
    html_entity_decode($genre);

    include("php/db.php");
    include("php/genredb.php");

    $genre = mysqli_real_escape_string($mysqli, $genre);
    

   
    

 
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
    <div class = 'genreheading'>
        <?php
            echo "
            <h1 class ='genrepageheader'>$genre</h1>";
         ?>
    </div>
        <div class="row ">
        <?php
            foreach($genremovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-md '>
                <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>
        </div>
</div>
  </div>




   
  








      







 
</body>
</html>