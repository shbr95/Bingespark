
<?php


?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        
        <div class="container-fluid">
            <a class="navbar-brand" href="landing.php"><img class = 'bingesparklogo' src="img/bingespark.png"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarText">
                
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">

            <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Filter
          </a>
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="browsegenre.php">Genre</a></li>
            <li><a class="dropdown-item" href="browsedirector.php">Director</a></li>
            <li><a class="dropdown-item" href="browseactor.php">Actor</a></li>
            <li><a class="dropdown-item" href="browseruntime.php">Runtime</a></li>
            <li><a class="dropdown-item" href="browserevenue.php">Revenue</a></li>
            <li><a class="dropdown-item" href="browsemostfavourited.php">Favourites</a></li>
            <li><a class="dropdown-item" href="browsehighestrated.php">Ranking</a></li>
          </ul>
        </li>
      </ul>     
            
       
        
                
            
                
                <?php


if (isset($_SESSION['accountid'])) {
  echo " <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDarkDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Account
              </a>
              <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDarkDropdownMenuLink'>
                <li><a class='dropdown-item' href='myfavourites.php'>My favourites</a></li>
                <li><a class='dropdown-item' href='myreviews.php'>My reviews</a></li>
                <li><a class='dropdown-item' href='myratings.php'>My ratings</a></li>
                <li><a class='dropdown-item' href='secure/myaccount.php?accountid=$_SESSION[accountid]'>My account</a></li>

            </li>
            </ul> ";
}




            if (isset($_SESSION['accounttype']) && $_SESSION["accounttype"] == 1) {
              echo " <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDarkDropdownMenuLink' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                Admin
              </a>
              <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDarkDropdownMenuLink'>
                <li><a class='dropdown-item' href='secure/insertmovie.php'>Insert movie</a></li>
                <li><a class='dropdown-item' href='secure/editgenre.php'>Insert/remove genre</a></li>
                <li><a class='dropdown-item' href='secure/editdirector.php'>Insert/remove director</a></li>
                <li><a class='dropdown-item' href='secure/editactor.php'>Insert/remove actor</a></li>
                <li><a class='dropdown-item' href='secure/manageusers.php'>Manage users</a></li>

            </li>
            </ul>     
                  
                  ";
                }

                

                 if (isset($_SESSION['accountid'])) {
                    echo "
                    
                        <li class='nav-item'>
                            <a class='nav-link' href='secure/logout.php'>Logout</a>
                        </li>
                        
                        ";
                }

                if (!isset($_SESSION['accountid'])) {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='secure/login.php'>Login</a>
                        </li>";
                }


               


           
                ?>
     
          








     

                </ul>

             

              
   
                

                                 
   
    
                
                
                
            <form class="d-flex" action="search.php" method="GET">
                <input class="form-control me-2" input name="search" type="search" placeholder="Search" aria-label="Search" name='search'>
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
      
            </div>
        </div>
        </nav>

       
   
        