<?php
    session_start();
    include("php/db.php");
    include("php/browsegenredb.php");
    

 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Lora' rel='stylesheet'>
  <link href="styles/styles.css" rel="stylesheet">
</head>
<body>




<?php
    
    include("nav/nav.php"); 
?>




   
  








<div class = 'maincontainer'>

<div class="genre container">
    <div class = 'genreheading'>
        <?php
            $genre = 'Action';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($actionmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>
        </div>
</div>
       

<div class="genre container">
    <div class = 'genreheading'>
        <?php
            $genre = 'Adventure';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($adventuremovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="genre container">
    <div class = 'genreheading'>
        <?php
            $genre = 'Animation';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($animationmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="genre container">
<div class = 'genreheading'>
<?php
            $genre = 'Biography';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($biographymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="genre container">
<div class = 'genreheading'>
        <?php
            $genre = 'Children';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($childrenmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="genre container">
    <div class = 'genreheading'>
    <?php
            $genre = 'Classic';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($classicmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="genre container">
    <div class = 'genreheading'>
    <?php
            $genre = 'Comedy';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($comedymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="genre container">
    <div class = 'genreheading'>
    <?php
            $genre = 'Crime';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($crimemovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="genre container">
<div class = 'genreheading'>
<?php
            $genre = 'Cult';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($cultmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="genre container">
<div class = 'genreheading'>
<?php
            $genre = 'Documentary';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($documentarymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Drama';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row ">
        <?php
            foreach($dramamovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Faith & Spirituality';
            $genreencode = urlencode($genre);
        
            echo " 
            <h1><a class='link' href='genre.php?genre=$genreencode'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($faithspiritualitymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Family';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($familymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>
   


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Fantasy';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($fantasymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'History';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
</div>
        <div class="row">
        <?php
            foreach($historymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Horror';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($horrormovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>

<div class="container">
    <div class = 'genreheading'>
    <?php
            $genre = 'Musical';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
    </div>
        <div class="row">
        <?php
            foreach($musicalmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Mystery';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($mysterymovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Romance';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($romancemovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Sci-Fi';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
        </div>
        <div class="row">
        <?php
            foreach($scifimovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Sport';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($sportmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Thriller';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($thrillermovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'War';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($warmovies as $data) {
                $posterimg = $data['poster_uri'];
                $movieid = $data['movie_id'];
                echo "<div class='col-lg-3'>
                    <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
            }
            ?>      
    </div>
</div>


<div class="container">
<div class = 'genreheading'>
<?php
            $genre = 'Western';
            echo "
            <h1><a class='link' href='genre.php?genre=$genre'>$genre</a></h1>";
         ?>
         </div>
        <div class="row">
        <?php
            foreach($westernmovies as $data) {
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