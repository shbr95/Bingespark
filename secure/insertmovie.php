<?php
session_start();
if($_SESSION["accounttype"] != 1)  {
   header("Location: login.php");
}
    include("../php/db.php");
    include("../php/insertmoviedb.php");
    

    

   if (isset($_POST['submitbutton'])) {

      $title= $_POST["titlefield"];
      $title = mysqli_real_escape_string($mysqli, $title);
   
      $summary = $_POST["summaryfield"];
      $summary = mysqli_real_escape_string($mysqli, $summary);

      $year = $_POST["yearfield"];
      $year = mysqli_real_escape_string($mysqli, $year);

      $runtime = $_POST["runtimefield"];
      $runtime = mysqli_real_escape_string($mysqli, $runtime);

      $revenue = $_POST["revenuefield"];
      $revenue = mysqli_real_escape_string($mysqli, $revenue);

      $poster = $_POST["posterfield"];
      $poster = mysqli_real_escape_string($mysqli, $poster);

  


      //insert title and check for duplicate
      $checkDuplicateTitle = "SELECT title.title_id, title.title_name 
      FROM title 
      WHERE title_name = '$title'";
      
      $insertstatement = "INSERT INTO title (title_id, title_name) VALUES (NULL, '$title')";


      $duplicateQuery = $mysqli->query($checkDuplicateTitle);
      
      if ($duplicateQuery->num_rows==0) {
         $insert = $mysqli->query($insertstatement);
         $titleinsertid = $mysqli->insert_id;
         if (!$insertstatement) {
            echo "<div> SQL error - ".$mysqli->error."</div>";
        }
      } else {
         echo "<h1> duplicate title </h1>";
         while($row = mysqli_fetch_array($duplicateQuery)) {
            $titleinsertid = $row['title_id'];
        }
      }

         //insert summary and check for duplicate
         $checkDuplicateSummary = "SELECT summary.summary_id, summary.summary 
         FROM summary
         WHERE summary = '$summary'";
         
         $insertstatement = "INSERT INTO summary (summary_id, summary) VALUES (NULL, '$summary')";
   
   
         $duplicateQuery = $mysqli->query($checkDuplicateSummary);
         
         if ($duplicateQuery->num_rows==0) {
            $insert = $mysqli->query($insertstatement);
            $summaryinsertid = $mysqli->insert_id;
            if (!$insertstatement) {
               echo "<div> SQL error - ".$mysqli->error."</div>";
           }
         } else {
            echo "<h1> duplicate summary </h1>";
            while($row = mysqli_fetch_array($duplicateQuery)) {
               $summaryinsertid = $row['summary_id'];
           }
         }


          //insert year and check for duplicate
          $checkDuplicateYear = "SELECT year.year_id, year.year
          FROM year
          WHERE year = '$year'";
          
          $insertstatement = "INSERT INTO year (year_id, year) VALUES (NULL, '$year')";
    
          $duplicateQuery = $mysqli->query($checkDuplicateYear);
          
          if ($duplicateQuery->num_rows==0) {
             $insert = $mysqli->query($insertstatement);
             $yearinsertid = $mysqli->insert_id;
             if (!$insertstatement) {
                echo "<div> SQL error - ".$mysqli->error."</div>";
            }
          } else {
             echo "<h1> duplicate year </h1>";
             while($row = mysqli_fetch_array($duplicateQuery)) {
                $yearinsertid = $row['year_id'];
            }
          }


          //insert runtime and check for duplicate
          $checkDuplicateRuntime = "SELECT runtime.runtime_id, runtime.runtime_minutes
          FROM runtime
          WHERE runtime_minutes = '$runtime'";
          
          $insertstatement = "INSERT INTO runtime (runtime_id, runtime_minutes) VALUES (NULL, '$runtime')";
    
          $duplicateQuery = $mysqli->query($checkDuplicateRuntime);
          
          if ($duplicateQuery->num_rows==0) {
             $insert = $mysqli->query($insertstatement);
             $runtimeinsertid = $mysqli->insert_id;
             if (!$insertstatement) {
                echo "<div> SQL error - ".$mysqli->error."</div>";
            }
          } else {
             echo "<h1> duplicate Runtime </h1>";
             while($row = mysqli_fetch_array($duplicateQuery)) {
                $runtimeinsertid = $row['runtime_id'];
            }
          }


             //insert revenue and check for duplicate
             $checkDuplicateRevenue = "SELECT revenue.revenue_id, revenue.revenue_millions
             FROM revenue
             WHERE revenue_millions = '$revenue'";
             
             $insertstatement = "INSERT INTO revenue (revenue_id, revenue_millions) VALUES (NULL, '$revenue')";
       
             $duplicateQuery = $mysqli->query($checkDuplicateRevenue);
             
             if ($duplicateQuery->num_rows==0) {
                $insert = $mysqli->query($insertstatement);
                $revenueinsertid = $mysqli->insert_id;
                if (!$insertstatement) {
                   echo "<div> SQL error - ".$mysqli->error."</div>";
               }
             } else {
                echo "<h1> duplicate revenue </h1>";
                while($row = mysqli_fetch_array($duplicateQuery)) {
                   $revenueinsertid = $row['revenue_id'];
               }
             }

             //insert poster and check for duplicate
             $checkDuplicatePoster = "SELECT poster.poster_id, poster.poster_uri
             FROM poster
             WHERE poster_uri = '$poster'";
             
             $insertstatement = "INSERT INTO poster (poster_id, poster_uri) VALUES (NULL, '$poster')";
       
             $duplicateQuery = $mysqli->query($checkDuplicatePoster);
             
             if ($duplicateQuery->num_rows==0) {
                $insert = $mysqli->query($insertstatement);
                $posterinsertid = $mysqli->insert_id;
                if (!$insertstatement) {
                   echo "<div> SQL error - ".$mysqli->error."</div>";
               }
             } else {
                echo "<h1> duplicate poster </h1>";
                while($row = mysqli_fetch_array($duplicateQuery)) {
                   $posterinsertid = $row['poster_id'];
               }
             }


                 //insert movie and check for duplicate
                 $checkDuplicateMovie = "SELECT * FROM movie WHERE (title_id = '$titleinsertid' AND year_id = '$yearinsertid')";
                 
                 $insertstatement = "INSERT INTO movie (movie_id, title_id, year_id, runtime_id, revenue_id, poster_id, summary_id) VALUES (NULL, $titleinsertid, $yearinsertid, $runtimeinsertid, $revenueinsertid, $posterinsertid, $summaryinsertid)";
           
                 $duplicateQuery = $mysqli->query($checkDuplicateMovie);
                 
                 if ($duplicateQuery->num_rows==0) {
                    $insert = $mysqli->query($insertstatement);
                    $movieinsertid = $mysqli->insert_id;
                    if (!$insertstatement) {
                       echo "<div> SQL error - ".$mysqli->error."</div>";
                   }
                 } else {
                    echo "<h1> duplicate movie </h1>";
                    while($row = mysqli_fetch_array($duplicateQuery)) {
                       $movieinsertid = $row['movie_id'];
                   }

                  
                 }
                 

                 if (isset($_POST['titlefield']) && isset($_POST['summaryfield']) && isset($_POST['yearfield']) && isset($_POST['runtimefield']) && isset($_POST['revenuefield']) && isset($_POST['posterfield'])){
                  header("Location: editmovie.php?movie_id=$movieinsertid");
                 } else {
                  header("Location: insertmovie.php");
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
      <h2>Insert</h2>
      <?php
        
      echo "<form action='insertmovie.php' method='POST'>


      <div class='row align-items-start'>
      <div class='col-md-6'> Title
              <input type='text' class='form-control' placeholder='Title' name='titlefield'>
           </div>
          </div>

          <div class='row align-items-start'>
          <div class='col-md-6'> Year
                  <input type='text' class='form-control' placeholder='Year' name='yearfield'>

               </div>
              </div>

          
        <div class='row align-items-start'>
      <div class='mb-3'>
           <label for='exampleFormControlTextarea1' class='form-label'>Summary</label>
           <textarea class='form-control' placeholder='Summary' name='summaryfield' rows='9'></textarea>
        </div>
    </div>
    
    <div class='row align-items-start'>
       <div class='col-md-6'> Runtime
               <input type='text' class='form-control' placeholder='Runtime' name='runtimefield'>
            </div>
           </div>";


      echo "<div class='row align-items-start'>
      <div class='col-md-6'> Revenue
              <input type='text' class='form-control' placeholder='Revenue' name='revenuefield'>

           </div>
          </div>";


          echo "<div class='row align-items-start'>
          <div class='col-md-12'> Poster URI
                  <input type='text' class='form-control' placeholder='Poster' name='posterfield'>

               </div>
              </div>";
        ?>
        
         
      
           
        <div class="row align-items-start">
       <div class="col-sm-6">
                <input type="submit" class="btn btn-danger btn-lg w-100 signup" name = 'submitbutton' value='Insert'/>
            </div>
        </div>
            


       
          
      



        
         </form>


         <div class='row'>
   <div class='col-sm-6'>
   
   
   <a href="../landing.php" button type="buttoncustom" class="btn btn-danger btn-lg w-100 signup">Back</a>   
      
      </div>
      </div>  




</body>
</html>