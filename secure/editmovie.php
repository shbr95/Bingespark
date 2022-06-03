<?php
session_start();
include("../php/db.php"); 
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    $movie_id = $_GET['movie_id'];
    include("../php/db.php");
    include("../php/insertmoviedb.php");
    include("../php/editmoviedb.php");

    

    if(isset($_POST['confirmeditbutton']))  {
      $movie_id = $_POST["movie_id"];
      $movie_id = mysqli_real_escape_string($mysqli, $movie_id);
   
      $update_year = $_POST["yearfield"];
      $update_year = mysqli_real_escape_string($mysqli, $update_year);
      
      $update_title= $_POST["titlefield"];
      $update_title = mysqli_real_escape_string($mysqli, $update_title);
  
      $update_runtime = $_POST["runtimefield"];
      $update_runtime = mysqli_real_escape_string($mysqli, $update_runtime);
  
      $update_revenue = $_POST["revenuefield"];
      $update_revenue = mysqli_real_escape_string($mysqli, $update_revenue);
  
      $update_poster = $_POST["posterfield"];
      $update_poster = mysqli_real_escape_string($mysqli, $update_poster);
  
      $update_summary = $_POST["summaryfield"];
      $update_summary = mysqli_real_escape_string($mysqli, $update_summary);
      
      //update movie name
      $updateSQL = "UPDATE title 
      INNER JOIN movie 
      ON title.title_id = movie.title_id
      set title.title_name = '$update_title' WHERE movie.movie_id = $movie_id";
      

      
      $result = $mysqli->query($updateSQL);
  
  
      //update year
      $duplicate = "SELECT * FROM year where year = $update_year";
      $check = $mysqli->query($duplicate); 
      if ($check->num_rows == 0) {
          $updateSQL = "UPDATE year 
          INNER JOIN movie 
          ON year.year_id = movie.year_id
          set year.year = '$update_year' WHERE movie.movie_id = $movie_id";
        
          $result = $mysqli->query($updateSQL);
      } else {
          $firstrow = mysqli_fetch_assoc($check);
          $yearid = $firstrow['year_id'];
          $updateSQL = "UPDATE movie
          INNER JOIN year 
          ON year.year_id = movie.year_id
          set movie.year_id = '$yearid' WHERE movie.movie_id = $movie_id";
      
          $result = $mysqli->query($updateSQL);
      }
  
  
  
      //update runtime
      $duplicate = "SELECT * FROM runtime where runtime_minutes = $update_runtime";
      $check = $mysqli->query($duplicate); 
      if ($check->num_rows == 0) {
          $updateSQL = "UPDATE runtime 
          INNER JOIN movie 
          ON runtime.runtime_id = movie.runtime_id
          set runtime.runtime_minutes = '$update_runtime' WHERE movie.movie_id = $movie_id";
          
          $result = $mysqli->query($updateSQL);
      } else {
          $firstrow = mysqli_fetch_assoc($check);
          $runtimeid = $firstrow['runtime_id'];
          $updateSQL = "UPDATE movie
          INNER JOIN runtime 
          ON runtime.runtime_id = movie.runtime_id
          set movie.runtime_id = '$runtimeid' WHERE movie.movie_id = $movie_id";
      
          $result = $mysqli->query($updateSQL);
      }
  
  
          //update revenue
          $duplicate = "SELECT * FROM revenue where revenue_millions = '$update_revenue'";
          $check = $mysqli->query($duplicate); 
          if ($check->num_rows == 0) {
              $updateSQL = "UPDATE revenue 
              INNER JOIN movie 
              ON revenue.revenue_id = movie.revenue_id
              set revenue.revenue_millions = '$update_revenue' WHERE movie.movie_id = $movie_id";
             
              $result = $mysqli->query($updateSQL);
          } else {
              $firstrow = mysqli_fetch_assoc($check);
              $revenueid = $firstrow['revenue_id'];
              $updateSQL = "UPDATE movie
              INNER JOIN revenue 
              ON revenue.revenue_id = movie.revenue_id
              set movie.revenue_id = '$revenueid' WHERE movie.movie_id = $movie_id";
            
              $result = $mysqli->query($updateSQL);
          }
  
  
            //update poster
            $duplicate = "SELECT * FROM poster where poster_uri = '$update_poster'";
  
            
          
            $check = $mysqli->query($duplicate); 
            if ($check->num_rows == 0) {
                $updateSQL = "UPDATE poster 
                INNER JOIN movie 
                ON poster.poster_id = movie.poster_id
                set poster.poster_uri = '$update_poster' WHERE movie.movie_id = $movie_id";
              
                $result = $mysqli->query($updateSQL);
            } else {
                $firstrow = mysqli_fetch_assoc($check);
                $posterid = $firstrow['poster_id'];
                $updateSQL = "UPDATE movie
                INNER JOIN poster 
                ON poster.poster_id = movie.poster_id
                set movie.poster_id = '$posterid' WHERE movie.movie_id = $movie_id";
           
                $result = $mysqli->query($updateSQL);
            }
      
  
  
            //update summary
          $duplicate = "SELECT * FROM summary where summary = '$update_summary'";
          $check = $mysqli->query($duplicate); 
          if ($check->num_rows == 0) {
              $updateSQL = "UPDATE summary 
              INNER JOIN movie 
              ON summary.summary_id = movie.summary_id
              set summary.summary = '$update_summary' WHERE movie.movie_id = $movie_id";
            
              $result = $mysqli->query($updateSQL);
          } else {
              $firstrow = mysqli_fetch_assoc($check);
              $summaryid = $firstrow['summary_id'];
              $updateSQL = "UPDATE movie
              INNER JOIN summary
              ON summary.summary_id = movie.summary_id
              set movie.summary_id = '$summaryid' WHERE movie.movie_id = $movie_id";
           
              $result = $mysqli->query($updateSQL);
          }
  
  
      
     
  
      
      if(!$result){
          echo $mysqli->error;
      }else{
        header("Refresh:0");
      }
      
   }  

   
    

 
?>

<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link href="../styles/styles.css" rel="stylesheet">
</head>
<body>




  


<div class="maincontainer">
<div class="container">
      <h2>Edit Movie</h2>
      <?php
        
      echo "<form action='editmovie.php?movie_id=$movie_id' method='POST'>


      <div class='row align-items-start'>
      <div class='col-md-6'> Title
              <input type='text' class='form-control' placeholder='Title' name='titlefield' value='$title'>
              <input type='hidden' value='$movie_id' name='movie_id'> 
           </div>
          </div>

          <div class='row align-items-start'>
          <div class='col-md-6'> Year
                  <input type='text' class='form-control' placeholder='Year' name='yearfield' value='$year'>
                  <input type='hidden' value='$movie_id' name='movie_id'> 
               </div>
              </div>

          
        <div class='row align-items-start'>
      <div class='mb-3'>
           <label for='exampleFormControlTextarea1' class='form-label'>Summary</label>
           <textarea class='form-control' placeholder='Summary' name='summaryfield' rows='9'>$summary</textarea>
           <input type='hidden' value='$movie_id' name='movieid'> 
        </div>
    </div>
    
    <div class='row align-items-start'>
       <div class='col-md-6'> Runtime
               <input type='text' class='form-control' placeholder='Runtime' name='runtimefield' value='$runtime'>
               <input type='hidden' value='$movie_id' name='movieid'> 
            </div>
           </div>";


      echo "<div class='row align-items-start'>
      <div class='col-md-6'> Revenue
              <input type='text' class='form-control' placeholder='Revenue' name='revenuefield' value='$revenue'>
              <input type='hidden' value='$movie_id' name='movieid'> 
           </div>
          </div>";


          echo "<div class='row align-items-start'>
          <div class='col-md-12'> Poster URI
                  <input type='text' class='form-control' placeholder='Poster' name='posterfield' value='$posterimg'>
                  <input type='hidden' value='$movie_id' name='movieid'> 
               </div>
              </div>";
        ?>
        
         
      
           
        <div class="row align-items-start">
       <div class="col-sm-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'confirmeditbutton' value='Update'/>
            </div>
        </div>
            


       
          
      



        
         </form>


         <div class="row align-items-start">
          <div class="col-sm-6">
          <a href="editmoviegenre.php?movie_id=<?php echo "$movieid"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Edit movie genres</a>
            </div>
         </div>


         <div class="row align-items-start">
          <div class="col-sm-6">
          <a href="editmovieactor.php?movie_id=<?php echo "$movieid"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Edit movie actors</a>
            </div>
         </div>

         <div class="row align-items-start">
          <div class="col-sm-6">
          <a href="editmoviedirector.php?movie_id=<?php echo "$movieid"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Edit movie directors</a>
            </div>
         </div>


         <div class="row align-items-start">
          <div class="col-sm-6">
          <a href="deletemovie.php?movie_id=<?php echo "$movieid"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Delete movie</a>
            </div>
         </div>


<div class='row'>
   <div class='col-sm-6'>
   
   
   <a href="../movie.php?movie_id=<?php echo"$movie_id"; ?>" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>   
      
      </div>
      </div>    


</div>

</div>
         
            






</body>
</html>