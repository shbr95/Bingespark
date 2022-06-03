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

<div class = 'container'>
  <h1>Browse by director</h1>
<div class="row justify-content-md-center">
    
<?php
    foreach(range('A','Z') as $alphabet){
        echo "<div class='col-auto alphabet'>
        <form action='browsedirector.php?directorinitial=$alphabet' method='GET'>
        <input type='hidden' value='$alphabet' name='directorinitial'>
        <button class='btn btn-danger alphabet' name = 'directorinitialbutton' type='submit' role='button'>$alphabet</button>
        </form>
        </div>";
}

?>
              
              </div>

              <?php
            if (isset($_GET['directorinitialbutton'])) {
              $directorinitial = $_GET['directorinitial'];
              include("php/directorinitialdb.php");
             echo "<div class='container'>
              <div class = 'genreheading'>
              
                      <h1>$directorinitial</h1>
                 
              </div>
                  <div class='row'>";
                
                      foreach($directors as $data) {
                          $directorname = $data['director_name'];
                          $directorid = $data['director_id'];
                          
                          echo "<div class='col-sm-8'>
                          <p> 
                          <a class ='link' href='director.php?directorid=$directorid'>$directorname</a> 
                          </p>
                          
                          </div>
                          ";
                      }
                      
              echo "</div>
          </div>";
          }
   ?>
              </div>
            </div>
            </div>
      



        



 
</body>
</html>