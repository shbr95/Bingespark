<?php
session_start();
    $movie_id = $_GET['movie_id'];
    
    include("php/db.php");
    include("php/moviedb.php");

    $movie_id = mysqli_real_escape_string($mysqli, $movie_id);
    

    if (isset($_POST['favouritebutton'])) {
      $insertline = "INSERT INTO account_movie_favourite (account_id, movie_id) VALUES ('$_SESSION[accountid]', '$movie_id')";
          $statement = $mysqli->query($insertline);
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            header("Refresh:0");
          }
    }
  
    
  
  
    if (isset($_POST['unfavouritebutton'])) {
      $deleteline = "DELETE FROM account_movie_favourite WHERE account_id = '$_SESSION[accountid]' AND movie_id = '$movie_id'";
          $statement = $mysqli->query($deleteline);
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          }else {
            header("Refresh:0");
          }
    }
  
     if (isset($_POST['ratingbutton'])) {
      $rating = $_POST['rating'];
      $rating = mysqli_real_escape_string($mysqli, $rating);
      $insertline = "INSERT INTO account_movie_rating (account_id, movie_id, rating)  VALUES ('$_SESSION[accountid]', '$movie_id', $rating)";
          $statement = $mysqli->query($insertline);
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            header("Refresh:0");
          }
    }
  
    if (isset($_POST['amendratingbutton'])) {
      $rating = $_POST['amendrating'];
      $rating = mysqli_real_escape_string($mysqli, $rating);
      
      $editline = "UPDATE account_movie_rating
      SET rating = $rating
      WHERE movie_id = '$movie_id'
      and account_id = '$_SESSION[accountid]'";
          $statement = $mysqli->query($editline);
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            header("Refresh:0");
          }
    }
  
  
    if (isset($_POST['postreviewbutton'])) {
      $review = $_POST['reviewtext'];
      $review = mysqli_real_escape_string($mysqli, $review);
      $date = date("Y/m/d");
      
      $insertline = "INSERT INTO account_movie_review (account_id, movie_id, review_date, review_body) 
      VALUES ('$_SESSION[accountid]', '$movie_id', '$date', '$review')";
  
  
     
          $statement = $mysqli->query($insertline);
          if (!$statement) {
              echo "<div> SQL error - ".$mysqli->error."</div>";
              
          } else {
            header("Refresh:0");
          }
    }

//deletes selected movie if button is pressed
    if (isset($_POST['deletereviewbutton'])) {
      $accountid = $_POST['accountid'];
   
      if (($_SESSION['accounttype']) == 1) {
        $deleteline = "DELETE FROM account_movie_review WHERE account_id = '$accountid' AND movie_id = '$movie_id'";
  
     
        $statement = $mysqli->query($deleteline);
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
            
        } else {
          header("Refresh:0");
        
        }

      } else if (($_SESSION['accounttype']) == 2) {
        $deleteline = "DELETE FROM account_movie_review WHERE account_id = '$_SESSION[accountid]' AND movie_id = '$movie_id'";
  
     
        $statement = $mysqli->query($deleteline);
        if (!$statement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
            
        } else {
          
          header("Refresh:0");
        }
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
<div class="container">

<div class="row">
  <div class="col-lg-4 movieposter">
  <?php 
    echo "<img src='$posterimg' class='moviepageimg' >"
    ?>
  </div>
    
    <div class="col-lg-8">
    <?php 
  
        echo "

              <h1>$title ($year) </h1>
              <p>$summary</p>
              <p>Runtime: $runtime minutes</p>
              <p>Box Office revenue: $$revenue million</p>
              <p> Genre(s): ";
              $count = 0;
              foreach($moviegenre as $data) {
                  $count++;
                  $genrename = $data['genre_name'];
                  if($count == sizeof($moviegenre)) {
                   echo "$genrename";
               } else {
                echo "$genrename, ";
               }
                  
              }
              echo "</p>";

              echo "<p> Actor(s): ";
              $count = 0;
              foreach($movieactor as $data) {
                  $count++;
                  $actorname = $data['actor_name'];
                  if($count == sizeof($movieactor)) {
                   echo "$actorname";
               } else {
                echo "$actorname, ";
               }
                  
              }

              echo "<p> Director(s): ";
              $count = 0;
              foreach($moviedirector as $data) {
                  $count++;
                  $directorname = $data['director_name'];
                  if($count == sizeof($moviedirector)) {
                   echo "$directorname";
               } 
                  
              }

              echo "</p>";

              $numberofratings = sizeof($numberofratingsarray);
              if ($numberofratings > 0) {
              echo "<p> Average user rating: ";
           
              $average = $averagerating[0]['AVG(rating)'];

              $average = number_format((float)$average, 2, '.', '');
              
             
            

              echo "$average ($numberofratings ratings)</p>";
              }
              
            


              $numberoffavourites = sizeof($numberoffavouritesarray);

              if ($numberoffavourites > 0) {

              echo "<p> Number of favourites: ";
              
              
            

              echo " $numberoffavourites</p>";
              
         
              }
             
    ?>

    </div>

</div>

<form method="post" action="movie.php?movie_id=<?php echo "$movie_id"; ?>">
<div class="row">
  <div class="col-lg-4">
  
    <?php
     if (isset($_SESSION['accountid'])) {
       $favouritecheck = "SELECT * from account_movie_favourite WHERE account_id = '$_SESSION[accountid]' AND movie_id = '$movie_id'";
       $favouritecheck = $mysqli->query($favouritecheck); 
          if ($favouritecheck->num_rows == 0) {
            echo "<input type='submit' class='btn btn-danger btn-lg w-100' name = 'favouritebutton'  value='Add to favourites'/>";
          } else {
            echo "<input type='submit' class='btn btn-danger btn-lg w-100' name = 'unfavouritebutton'  value='Remove from favourites'/>";
          }  
     }
    ?>
    </div>
    <div class="col-lg-4 ">
    </div>
    <div class="col-lg-4 ">
    </div>


    </div>
  </form>

    
    


  <form method="post" action="movie.php?movie_id=<?php echo "$movie_id"; ?>">
  <div class="row">
  <div class='col-lg-4'>
  <?php
     if (isset($_SESSION['accountid'])) {
      $accountid = $_SESSION['accountid'];
      $duplicate = "SELECT * from account_movie_rating where account_id = $accountid and movie_id = $movieid";
      $duplicatecheck = $mysqli->query($duplicate); 
          if ($duplicatecheck->num_rows == 0) {
            echo " <select class='form-select form-select-lg w-100' aria-label='Rating' name='rating'>
            <option disabled selected value>Rating</option>
            <option value=1 id='rating'>1 - Poor</option>
            <option value=2 id='rating'>2 - Okay</option>
            <option value=3 id='rating'>3 - Good</option>
            <option value=4 id='rating'>4 - Very good</option>
            <option value=5 id='rating'>5 - Excellent</option>
            <input type='submit' class='btn btn-danger btn-lg w-100' name = 'ratingbutton'  value='Rate'/>";
          } else {
            $currentrating = $duplicatecheck->fetch_assoc();
            $currentrating = $currentrating['rating'];
           
            echo " <select class='form-select form-select-lg w-100' aria-label='Rating' name='amendrating'>
            <option disabled selected value>Rating</option>
            <option value=1"; if($currentrating == 1) {echo " selected='selected' ";} echo " id='rating'>1 - Poor</option>
            <option value=2"; if($currentrating == 2) {echo " selected='selected' ";} echo " id='rating'>2 - Okay</option>
            <option value=3"; if($currentrating == 3) {echo " selected='selected' ";} echo " id='rating'>3 - Good</option>
            <option value=4"; if($currentrating == 4) {echo " selected='selected' ";} echo " id='rating'>4 - Very good</option>
            <option value=5"; if($currentrating == 5) {echo " selected='selected' ";} echo " id='rating'>5 - Excellent</option>
            </select>
            <input type='submit' class='btn btn-danger btn-lg w-100' name = 'amendratingbutton'  value='Amend Rating'/>";
          }
        }
            ?>
            
            </form>
</div>

<div class="col-lg-4 ">
    </div>

    <div class="col-lg-4 ">
    </div>

      </div>
     

    
  <div class="row">
  <div class="col-lg-4 ">
  <?php
     if (isset($_SESSION['accounttype']) && ($_SESSION['accounttype'] == 1)) {
       echo "
       <form method='POST' action='secure/editmovie.php?movie_id=$movie_id'>
       <input type='submit' class='btn btn-danger btn-lg w-100' name = 'editbutton'  value='Edit'/>
       </form>";
     }
            ?>
            
          
</div>

<div class="col-lg-4 ">
    </div>

    <div class="col-lg-4 ">
    </div>

      </div>

     







    


      





<?php
if (isset($_SESSION['accountid'])) {
  $accountid = $_SESSION['accountid'];
  $duplicate = "SELECT * from account_movie_review where account_id = $accountid and movie_id = $movie_id";
  $duplicatecheck = $mysqli->query($duplicate); 
      if ($duplicatecheck->num_rows == 0) {
        echo "<form action='movie.php?movie_id=$movie_id' method='POST'>

        <div class='row'>
          <div class='col-lg-12'>
        
             <textarea class='form-control' placeholder='Enter text...' name='reviewtext' rows='4'></textarea>
    
            </div>
  
            
  
           
  
        </div>
  
        
  
  
  
        <div class='row'>
          <div class='col-lg-4 '>
        
          <input type='submit' class='btn btn-danger btn-lg w-100' name = 'postreviewbutton' value='Post review'/>
    
            </div>
  
            
            <div class='col-lg-4 '>
        
            </div>


            <div class='col-lg-4 '>
        
            </div>
            
            
  
        </div>

       
        </form> 

        
  
     ";

      }

}
  ?>



    
<div class="row">
  <div class="col-lg-4 ">
<h2> Reviews </h2>
            
          
</div>

<div class="col-lg-4 ">
    </div>

    <div class="col-lg-4 ">
    </div>

      </div> 


      


      <?php
      
      $readreviews = "SELECT account.account_id, account.account_forename, account_movie_review.review_body, account_movie_review.review_date
      FROM account_movie_review
      INNER JOIN account
      ON account_movie_review.account_id = account.account_id
      where account_movie_review.movie_id = $movie_id";

      $result = $mysqli->query($readreviews);
      $moviereviews = array();
      while($rowdata = $result->fetch_assoc()){
      array_push($moviereviews, $rowdata);


    if(!$result){
      echo $mysqli->error;
      echo "<p>$read</p>";
        exit();
    }
}


foreach($moviereviews as $data) {
  $accountid = $data['account_id'];
  $name = $data['account_forename'];
  $date = $data['review_date'];
  $review = $data['review_body'];

  echo " <form action='movie.php?movie_id=$movie_id' method='POST'>
          <div class='row'>
              <div class='col-lg-4'>
                <h2>$name</h2>
              </div>
              <div class='col-lg-4'>
              <h3>$date</h3>
              </div>";
              if (isset($_SESSION['accounttype']) && $_SESSION["accounttype"] == 1 || isset($_SESSION['accountid']) && $_SESSION["accountid"] == $accountid) {
              echo "
              <form action='movie.php?movie_id=$movie_id' method='POST'>
              <div class='col-lg-4'>
              <input type='submit' class='btn btn-danger btn-lg w-100' name = 'deletereviewbutton' value='Delete review'>
              <input type='hidden' value='$accountid' name='accountid'> 
              </div>
              
          ";
              }
        echo "</div>
        <div class='row'>
              <div class='col-lg-12'>
                <p>$review</p>
              </div>
              </div>
              </form>
              ";
    
  }


?>




  
  </div> 



  

</div>

  

  



   
  







      






</body>
</html>