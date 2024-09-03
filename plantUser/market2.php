<?php 
session_start();
if(!isset($_SESSION["loggedin"])){
	header("location:../login.php"); 
}
require_once "../config.php";
require "navbarPlant.php";
// $emailId = $_SESSION['emailId'];

// echo " " . $_SESSION['loggedin'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Market</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/3df97b829c.js" crossorigin="anonymous"></script>


    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        body {
            width: 100vw;
            height: 100%;
            /* background-image: linear-gradient(to right, #8360c3, #2ebf91); */

        }

        .feedopt {
            height: 20%;
        }

        .card {
            width: 40%;
        }

        .filterbtn {
            width: 5%;
        }

        .searchbox {
            width: 255px;
        }

        .dabba {
            border: 2px solid red;
        }

        .sh {
            border: 2px solid red;
        }

        /* 21/08/2023 */
        .sh1 {
            border: 2px solid rgb(97, 97, 97);
            border-radius: 20px;
        }

        .sh2 {
            border: 1px solid rgb(167, 167, 167);
            border-radius: 5px;
        }

        /* setting part  */

        .tab {
            float: left;
            /* border: 1px solid #ccc; */
            /* background-color: #228823; */
            width: 10%;
            /* height: 300px; */
            height: 100vh;
        }

        /* Style the buttons that are used to open the tab content */
        .tab button {
            display: block;
            background-color: inherit;
            color: black;
            padding: 22px 16px;
            width: 100%;
            border: none;
            outline: none;
            text-align: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            /* background-color: #ddd; */
            color: rgb(2, 237, 2);
        }

        /* Create an active/current "tab button" class */
        .tab button.active {
            background-color: #ccc;
            color: rgb(160, 65, 73);
            font-size: 25px;
        }

        /* Style the tab content */
        .tabcontent {
            float: left;
            padding: 0px 12px;
            border: 1px solid #ccc;
            width: 80%;
            border: none;
            border-left: none;
            /* height: 300px; */
            height: 100vh;
            display: none;
        }

        .cardcontainer {
            border: 2px solid rgb(45, 131, 64);
            border-radius: 16px;

        }

        .card2 {
            margin: 10px 15px;
        }
    </style>
</head>

<body>

    <!-- navigation bar  -->
    <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary bg-primary w-100" data-bs-theme="dark">
        <div class="container-fluid ">

            <a class="navbar-brand fw-bolder text-success mx-2" href="#"> Plantify <i class="fa-solid fa-leaf"></i></a>


            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item mx-1">
                        <a class="nav-link " aria-current="page" href="userprofile.php"><i class="fa-solid fa-house"></i> Home</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link " aria-current="page" href="identifyPlant.php"><i class="fa-solid fa-magnifying-glass"></i> Identify Plant</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link " aria-current="page" href="#"><i class="fa-solid fa-bacteria"></i> Identify Disease</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link " href="feeds_my.html"><i class="fa-solid fa-newspaper"></i> Feed</a>
                    </li>
                    <li class="nav-item mx-1">
                        <a class="nav-link active" href="market.php"><i class="fa-solid fa-shop"></i> Market</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="orders.php"><i class="fa-solid fa-dolly"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav> -->

    <!-- category and filter  -->
    <div class="m-3 px-5 py-4 d-flex flex-column">
        <div class="d-flex flex-row justify-content-end mb-4 w-100">
            <form class="d-flex w-75">
                <input class="form-control me-2 w-75" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success " type="submit">Search</button>
            </form>
        </div>
        <div class="d-flex flex-row justify-content-around">
            <div class="w-25 d-flex justify-content-between align-items-center">
                <a href="#" class="btn link-success fw-bold text-capitalize btn-outline-success">My Cart <i class="fa-solid fa-cart-shopping"></i></a>

            </div>
            <div class="w-50 d-flex justify-content-center align-items-center">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-success px-3 " for="btnradio1">Plants</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-success px-3" for="btnradio2">Fertilizers</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off">
                    <label class="btn btn-outline-success px-3 " for="btnradio3">Tools</label>
                    
                </div>
            </div>

            <div class="w-25 d-flex ">
                <div class="d-flex mx-1 justify-content-center align-items-center">
                    <div class="btn-group-vertical filterbtn" role="group" aria-label="Vertical button group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort By:
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Low-to-high</a></li>
                                <li><a class="dropdown-item" href="#">High-to-Low</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="d-flex mx-1 justify-content-center align-items-center">
                    <div class="btn-group-vertical filterbtn" role="group" aria-label="Vertical button group">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-outline-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter By:
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Popularity</a></li>
                                <li><a class="dropdown-item" href="#">Relevance</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- cards  -->
    <div class="mx-5 p-5 d-flex flex-wrap cardcontainer justify-content-around">
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        <div class="card card2" style="width: 15rem; height: 25rem;">
            <img src="images/plant-photo.jpg" class="card-img-top w-100 h-50" alt="...">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h5 class="card-title justify-content-center d-flex">Aloe vera</h5>
                    <h5>₹ 150</h5>
                </div>
                <p class="card-text">Good for skin and medical purpose, contains vitamins, bla bla and bla bla bla.</p>
                <div class="d-flex justify-content-center align-items-center">
                    <a href="#" class="btn link-success fw-bold text-capitalize">Add to cart <i class="fa-solid fa-cart-plus"></i></a>
                </div>
            </div>
        </div>
        
    </div>

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script>
        function openCity(evt, cityName) {
            // Declare all variables
            var i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the link that opened the tab
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
    </script>
</body>

</html>