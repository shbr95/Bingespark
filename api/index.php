<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);    

$key = 'password';
$_GET['key'];
header('Content-Type: application/json');

function connect() {
    
    $server = $_SERVER['REMOTE_ADDR'];
        if($server == "127.0.0.1" || $server == "::1") {
            $host = "localhost";
            $user = "root";
            $pw = "root";
            $db = "bingespark";
            $mysqli = new mysqli($host, $user, $pw, $db);
        }else{
            $host = "sbrocklehurst01.webhosting6.eeecs.qub.ac.uk";
            $user = "sbrocklehurst01";
            $pw = "YZCNVtzdwCrLB0NN";
            $db = "sbrocklehurst01";
            $mysqli = new mysqli($host, $user, $pw, $db);  
        }
        return $mysqli;
    }

    $conn = connect();

    $conn->set_charset('utf8mb4');
    mysqli_set_charset($conn, 'utf8mb4');





    //allows API to display all of database
    function displayAll() {
    if (isset($_GET['all']) && $_GET['key'] == 'password') {
        $conn = connect();
        $conn->set_charset('utf8mb4');
        mysqli_set_charset($conn, 'utf8mb4');
    
        $all = "SELECT movie.movie_id, title.title_name, summary.summary, poster.poster_uri, revenue.revenue_millions, runtime.runtime_minutes, year.year
        FROM movie
        INNER JOIN title
        ON movie.title_id = title.title_id
        INNER JOIN summary
        ON movie.summary_id = summary.summary_id
        INNER JOIN poster 
        on movie.poster_id = poster.poster_id
        INNER JOIN revenue 
        on movie.revenue_id = revenue.revenue_id
        INNER JOIN runtime
        on movie.runtime_id = runtime.runtime_id
        INNER JOIN year
        on movie.year_id = year.year_id
        order by movie.movie_id";
    
        $res = $conn->query($all);
        $movie = array();
        
    
        while ($row = $res->fetch_assoc()) {
           
            $movie[] = $row;
            $movie_id = $row['movie_id'];
        
            
    
            //adds directors to multi-dimensional array
            $innerjoin = "SELECT director.director_name from movie
            INNER JOIN movie_director
            ON movie.movie_id = movie_director.movie_id
            INNER JOIN director
            on movie_director.director_id = director.director_id WHERE
            movie.movie_id = $movie_id";
    
            $result = $conn->query($innerjoin);
            $directors = array();
    
            while ($data = $result->fetch_assoc()) {
                $directorname = $data['director_name'];
                array_push($directors, $directorname);  
                
            }
            $movie[]['directors']  = $directors;
    
    
    
            //adds actors to multi-dimensional array
            $innerjoin = "SELECT actor.actor_name from movie
            INNER JOIN movie_actor
            ON movie.movie_id = movie_actor.movie_id
            INNER JOIN actor
            on movie_actor.actor_id = actor.actor_id WHERE
            movie.movie_id = $movie_id";
    
            $result = $conn->query($innerjoin);
            $actors = array();
    
            while ($data = $result->fetch_assoc()) {
                $actorname = $data['actor_name'];
                array_push($actors, $actorname);  
            }
            $movie[]['actors']  = $actors;
        
    
    
        //add genres to multi-dimensional array
        $innerjoin = "SELECT genre.genre_name from movie
        INNER JOIN movie_genre
        ON movie.movie_id = movie_genre.movie_id
        INNER JOIN genre
        on movie_genre.genre_id = genre.genre_id WHERE
        movie.movie_id = $movie_id";
    
        $result = $conn->query($innerjoin);
        $genres = array();
    
        while ($data = $result->fetch_assoc()) {
            $genrename = $data['genre_name'];
            array_push($genres, $genrename);  
        }
            $movie[]['genres']  = $genres;
    }
    
    
        
         echo json_encode($movie, JSON_PRETTY_PRINT);
    
    }
}










    //allows API to Search by title;
    function searchTitle() {
        if (isset($_GET['titlesearch']) && $_GET['key'] == 'password' && !isset($_GET['year'])) {
            $searchString = $_GET['titlesearch'];
            $conn = connect();

            $conn->set_charset('utf8mb4');
            mysqli_set_charset($conn, 'utf8mb4');
        
            $all = "SELECT movie.movie_id, title.title_name, summary.summary, poster.poster_uri, revenue.revenue_millions, runtime.runtime_minutes, year.year
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN summary
            ON movie.summary_id = summary.summary_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN revenue 
            on movie.revenue_id = revenue.revenue_id
            INNER JOIN runtime
            on movie.runtime_id = runtime.runtime_id
            INNER JOIN year
            on movie.year_id = year.year_id WHERE
            title.title_name LIKE '%$searchString%'
            ORDER BY movie.movie_id";
        
            $res = $conn->query($all);
            $movie = array();
            
        
            while ($row = $res->fetch_assoc()) {
               
                $movie[] = $row;
                $movie_id = $row['movie_id'];
            
                
        
                //adds directors to multi-dimensional array
                $innerjoin = "SELECT director.director_name from movie
                INNER JOIN movie_director
                ON movie.movie_id = movie_director.movie_id
                INNER JOIN director
                on movie_director.director_id = director.director_id WHERE
                movie.movie_id = $movie_id";
        
                $result = $conn->query($innerjoin);
                $directors = array();
        
                while ($data = $result->fetch_assoc()) {
                    $directorname = $data['director_name'];
                    array_push($directors, $directorname);  
                    
                }
                $movie[]['directors']  = $directors;
        
        
        
                //adds actors to multi-dimensional array
                $innerjoin = "SELECT actor.actor_name from movie
                INNER JOIN movie_actor
                ON movie.movie_id = movie_actor.movie_id
                INNER JOIN actor
                on movie_actor.actor_id = actor.actor_id WHERE
                movie.movie_id = $movie_id";
        
                $result = $conn->query($innerjoin);
                $actors = array();
        
                while ($data = $result->fetch_assoc()) {
                    $actorname = $data['actor_name'];
                    array_push($actors, $actorname);  
                }
                $movie[]['actors']  = $actors;
            
        
        
            //add genres to multi-dimensional array
            $innerjoin = "SELECT genre.genre_name from movie
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id WHERE
            movie.movie_id = $movie_id";
        
            $result = $conn->query($innerjoin);
            $genres = array();
        
            while ($data = $result->fetch_assoc()) {
                $genrename = $data['genre_name'];
                array_push($genres, $genrename);  
            }
                $movie[]['genres']  = $genres;
        }
        
        
            
             echo json_encode($movie, JSON_PRETTY_PRINT);
            
        
        }
    }


    //allows API to Search by title and year;
    function searchtitleandyear() {
        if (isset($_GET['titlesearch']) && isset($_GET['year']) && $_GET['key'] == 'password') {
            $searchString = $_GET['titlesearch'];
            $searchYear = $_GET['year'];
            $conn = connect();
            $conn->set_charset('utf8mb4');
            mysqli_set_charset($conn, 'utf8mb4');
        
            $results = "SELECT movie.movie_id, title.title_name, summary.summary, poster.poster_uri, revenue.revenue_millions, runtime.runtime_minutes, year.year
            FROM movie
            INNER JOIN title
            ON movie.title_id = title.title_id
            INNER JOIN summary
            ON movie.summary_id = summary.summary_id
            INNER JOIN poster 
            on movie.poster_id = poster.poster_id
            INNER JOIN revenue 
            on movie.revenue_id = revenue.revenue_id
            INNER JOIN runtime
            on movie.runtime_id = runtime.runtime_id
            INNER JOIN year
            on movie.year_id = year.year_id WHERE
            title.title_name LIKE 
            '%$searchString%' 
            AND year.year = $searchYear
            ORDER BY movie.movie_id";
        
            $res = $conn->query($results);
            $movie = array();
            
        
            while ($row = $res->fetch_assoc()) {
               
                $movie[] = $row;
                $movie_id = $row['movie_id'];
            
                
        
                //adds directors to multi-dimensional array
                $innerjoin = "SELECT director.director_name from movie
                INNER JOIN movie_director
                ON movie.movie_id = movie_director.movie_id
                INNER JOIN director
                on movie_director.director_id = director.director_id WHERE
                movie.movie_id = $movie_id";
        
                $result = $conn->query($innerjoin);
                $directors = array();
        
                while ($data = $result->fetch_assoc()) {
                    $directorname = $data['director_name'];
                    array_push($directors, $directorname);  
                    
                }
                $movie[]['directors']  = $directors;
        
        
        
                //adds actors to multi-dimensional array
                $innerjoin = "SELECT actor.actor_name from movie
                INNER JOIN movie_actor
                ON movie.movie_id = movie_actor.movie_id
                INNER JOIN actor
                on movie_actor.actor_id = actor.actor_id WHERE
                movie.movie_id = $movie_id";
        
                $result = $conn->query($innerjoin);
                $actors = array();
        
                while ($data = $result->fetch_assoc()) {
                    $actorname = $data['actor_name'];
                    array_push($actors, $actorname);  
                }
                $movie[]['actors']  = $actors;
            
        
        
            //add genres to multi-dimensional array
            $innerjoin = "SELECT genre.genre_name from movie
            INNER JOIN movie_genre
            ON movie.movie_id = movie_genre.movie_id
            INNER JOIN genre
            on movie_genre.genre_id = genre.genre_id WHERE
            movie.movie_id = $movie_id";
        
            $result = $conn->query($innerjoin);
            $genres = array();
        
            while ($data = $result->fetch_assoc()) {
                $genrename = $data['genre_name'];
                array_push($genres, $genrename);  
            }
                $movie[]['genres']  = $genres;
        }
        
        
            
             echo json_encode($movie, JSON_PRETTY_PRINT);
            
        
        }
    }




    
       
    
    displayAll();

    searchTitle();

    searchtitleandyear();





?>