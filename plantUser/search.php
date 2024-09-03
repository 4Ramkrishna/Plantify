<?php 
session_start();
if(!isset($_SESSION["loggedin"])){
	header("location:../login.php"); 
}
require_once "../config.php";
// $conn = mysqli_connect("localhost", "root", "Prashant@123", "plantify");
require "navbarPlant.php";
$emailId = $_SESSION['emailId'];

if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
    // Get the search query from the form submission
    $search_query = $_POST["search_query"];

    } 
else {
        echo "<p>No results found.</p>";
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Assistant</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3df97b829c.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="feed w-100 h-100 d-flex flex-column mt-3">
        <div class="feedopt d-flex justify-content-center align-items-center flex-column w-100">
            <span class="text-info-emphasis fw-medium">Select View</span>
            <div class="btn-group">
                <a href="feeds_my.php" class="btn btn-primary " aria-current="page">Create Posts</a>
                <a href="feed_all.php" class="btn btn-primary active fw-bolder">All Posts</a>
            </div>
        </div>

        <!-- filter nd search  -->
        <div class="d-flex justify-content-center align-items-center mt-3">

            <div class="d-flex align-items-center justify-content-between">
                <!-- filter button  -->
                <div class="btn-group-vertical filterbtn" role="group" aria-label="Vertical button group">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter By:
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Recent</a></li>
                            <li><a class="dropdown-item" href="#">Popularity</a></li>
                        </ul>
                    </div>
                </div>
                <!-- search btn  -->
                <!-- <form class="d-flex mx-2" role="search">
                    <input class="form-control mx-1 w-50" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                    <!-- hi  -->
                <!-- </form> -->
                <form class="d-flex mx-2" role="search" method="POST" action="search.php">
                    <input class="form-control mx-1 w-75" type="text" name="search_query" placeholder="Enter your search query">
                    <!-- <button  type="submit">Search</button> -->
                    <input class="btn btn-outline-success" type="submit" value="Search">
                </form>
            </div>
        </div>

        <div class="feed w-100 h-100 d-flex flex-column">

            

            <div class="feeds d-flex w-100 my-2 justify-content-center flex-wrap">

            <?php
                $sql = "SELECT * FROM posts WHERE comment LIKE '%$search_query%'";
                $result5 = mysqli_query($conn, $sql);
                if ($result5 ->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result5)) 
                    {
                        $username = $row['emailId'];
                        $userdate = $row['postdate'];
                        $usercomment = $row['comment'];
                        echo '
                        <div class="card w-75 mx-5 my-4 d-flex flex-column justify-content-center">
                            <div class="card-body w-75">
                                <h5 class="card-title text-danger fs-6">By '.$username.' at '.$userdate.'</h5>
                                <p class="card-text m-0 my-2 fs-3">'.$usercomment.'</p>
                            </div>
                        </div>';
                    
                    }
                }
            ?>



        </div>

        </div>
        
    </div>

        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        function showAlert() {
            event.preventDefault();
            alert("Post successfully Posted!");
            // window.location.href = "feed_all.php";
        }
    </script>
</body>
</html>