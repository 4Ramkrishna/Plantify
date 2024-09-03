<?php 
session_start();
if(!isset($_SESSION["loggedin"])){
	header("location:../login.php"); 
}
require_once "../config.php";
// $conn = mysqli_connect("localhost", "root", "Prashant@123", "plantify");
require "navbarPlant.php";
$emailId = $_SESSION['emailId'];

// echo " " . $_SESSION['loggedin'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Feeds</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3df97b829c.js" crossorigin="anonymous"></script>
</head>

<body>

    


    <!-- main content -->
    <div class="feed w-100 h-100 d-flex flex-column mt-3">

        <!-- choose which feed to view  -->
        <div class="feedopt d-flex justify-content-center align-items-center flex-column w-100">
            <span class="text-info-emphasis fw-medium">Select View</span>
            <div class="btn-group">
                <a href="feeds_my.php" class="btn btn-success " aria-current="page">Create Posts</a>
                <a href="feed_all.php" class="btn btn-success active fw-bolder">All Posts</a>
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

        <!-- <div class="d-flex mx-5 my-3 w-100">
            <form action = "" method = "post" class="d-flex flex-column w-100" >
                <h3 id = "title" class="fw-bold fs-3">Create a new Post :</h3>
                <input type="hidden" name="reply_id" id="reply_id">
                <div class="d-flex justify-content-around w-100">
                    <input type="text" name="name" placeholder="Your name" class="px-2 py-1">
                    <textarea name="comment" placeholder="Your comment" class="w-50 border-1 px-2 py-1"></textarea>
                    <button class = "btn btn-success" type="submit" name="submit">Submit</button>
                </div>
            </form>
        </div> -->
        <!-- view feed  -->
        <div class="feeds d-flex w-100 my-2 justify-content-center flex-wrap w-75">

            <?php
                $sql1 = "SELECT * FROM posts WHERE replyId = 0";
                // $sql9 = "Select count(*) as C from tb_data where reply_id=$row[id]";
                
                $result2 = mysqli_query($conn, $sql1);
                if ($result2 ->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($result2)) 
                    {
                        $sql9 = "Select count(*) as C from posts where replyId=$row[postId]";
                        $result4 = mysqli_query($conn, $sql9);
                        $row2 = mysqli_fetch_assoc($result4);
                        echo '<div class="card m-3 mx-4 w-25">
                                <div class="card-body">
                                    <h6 class="card-title text-success">From: ' . $row['emailId'] . '</h6>
                                    <h5 class="card-title">' . $row['comment'] . '</h5>
                                    <p>' . $row['postdate'] . '</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="open.php?id=' . $row['postId'] . '" class="btn btn-success">View Full Post.</a>
                                        <!-- <span class="card-text"><i class="fa-regular fa-thumbs-up"></i> 3</span> -->
                                        <span class="card-text"><i class="fa-regular fa-comment"></i> '.$row2['C'].' </span>
                                    </div>
                                </div>
                            </div>';  
                    }
                }
            ?>
        </div>


        <!-- <span class="card-text"><i class="fa-regular fa-thumbs-up"></i> 3</span> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
      function reply(id, name){
        title = document.getElementById('title');
        title.innerHTML = "Reply to " + name;
        document.getElementById('reply_id').value = id;
      }
    </script>
</body>

</html>