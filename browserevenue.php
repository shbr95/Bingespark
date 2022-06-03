<?php
    session_start();
    include("php/db.php");
    

    

 
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

<div class="container">
    <h1>Browse by revenue</h1>






            <form method="get" action="browserevenue.php" name="php">

		



          <div class="row">
    <div class="col-sm">
        <select class="form-select" aria-label="Minimum runtime" name="minrevenue">
          <option disabled selected value>Minimum Revenue</option>
            <?php
              for ($loop = 0; $loop <= 100; $loop++) {
                echo "<option value=$loop id='minruntime'>$$loop million</option>";
              }
            ?>
        </select>
    </div>




    <div class="col-sm">
        <select class="form-select" aria-label="Minimum runtime" name="maxrevenue">
           <option disabled selected value>Maximum Revenue</option>
            <?php
              for ($loop = 0; $loop <= 100; $loop++) {
                echo "<option value=$loop id='maxruntime'>$$loop million</option>";
              }
            ?>
        </select>
    </div>
 


        <div class="col-sm">
                <input type="submit" class="btn btn-danger search" name = 'searchbutton' value='Search'/>
            </div>



</div>

			</form>		

 
      <?php 
     

      if (isset($_GET['searchbutton'])) {
        $minrevenue = $_GET['minrevenue'];
        $maxrevenue = $_GET['maxrevenue'];
        if ($minrevenue > $maxrevenue) {
          echo "
          <div class='row'>
          <div class='col-sm'>
          <p>Minimum revenue cannot be greater than maximum revenue!</p>
          </div>
          </div>";
        } else { 
          include("php/browserrevenuedb.php");
          echo "<div class='row'>";
          foreach($revenuemovies as $data) {
            $posterimg = $data['poster_uri'];
            $movieid = $data['movie_id'];
            echo "<div class='col-lg-3'>
                <a href='movie.php?movie_id=$movieid'><img class='posterimg' src='$posterimg'> </a>
                    </div>";
          }
        }
      }
    
      ?>
              </div>
</div>
  
      



          


      







  
</body>
</html>