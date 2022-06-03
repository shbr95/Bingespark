<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
  header("Location: login.php");
}
    include("../php/db.php"); 
    
    $movie_id = $_GET["movie_id"];
    $movie_id = mysqli_real_escape_string($mysqli, $movie_id);



  //delete movie

    $deletestatement = "DELETE FROM movie_director WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM movie_genre WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM movie_actor WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM movie WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_review 
    WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_favourite 
    WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 

    $deletestatement = "DELETE FROM account_movie_rating
    WHERE movie_id = '$movie_id'";
    $delete = $mysqli->query($deletestatement); 
    
   
    
    if(!$deletestatement){
        echo $mysqli->error;
    }else{
        echo "<p>Update successful <a href='../landing.php'>back to homepage</a></p>";
    }
?>