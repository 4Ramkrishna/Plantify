<?php 
session_start();
if(!isset($_SESSION["loggedin"])){
	header("location:../login.php"); 
}
require_once "../config.php";
require "navbarSeller.php";
//$action = isset($_GET['action']) ? $_GET['action'] : '';

// if(!isset($_SESSION["loggedin"])){
// 	header("location:../login.php"); 
// }
// if ($action=="changePassword" && ($_SERVER["REQUEST_METHOD"] == "POST")) {
//     echo 'hello';
//     $currentPassword = $_POST['currentPassword'];
//     $newPassword = $_POST["newPassword"];
//     $confirmNewPassword = $_POST["confirmNewPassword"];
//     if ($newPassword == $confirmNewPassword) {
//         // Hash the new password before storing it in the database
//         // $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);

//         // Update the password in the database
//         $query1 = "UPDATE users SET password='$newPassword' WHERE emailId='{$_SESSION['emailId']}'";
//         $result1 = mysqli_query($conn, $query1);

//         if ($result1) {
//             // Password updated successfully
//             echo "Password updated successfully.";
//         } else {
//             // Error updating password
//             echo "Error updating password.";
//         }
//     } else {
//         // New password and confirm password do not match
//         echo "New password and confirm password do not match.";
//     }
//     // }
// }
    // header("location:settings.php");

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
                        <a class="nav-link " aria-current="page" href="dashboard.php"><i class="fa-solid fa-house"></i> Home</a>
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
                        <a class="nav-link " href="market.php"><i class="fa-solid fa-shop"></i> Market</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="orders.php"><i class="fa-solid fa-dolly"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav> -->

    <div class="h-100 ">


        <div class="tab h-75 d-flex flex-column justify-content-center">
            <button class="tablinks d-flex justify-content-center fw-bold " onclick="openCity(event, 'Profile')">Profile</button>
            <button class="tablinks d-flex justify-content-center fw-bold " onclick="openCity(event, 'Privacy')">Privacy</button>
            <button class="tablinks d-flex justify-content-center fw-bold " onclick="openCity(event, 'About')">About Us</button>
            <button class="tablinks d-flex justify-content-center fw-bold " onclick="openCity(event, 'Contact')">Contact</button>
        </div>

        <div id="Profile" class="tabcontent p-3 px-5">
            <h3 class="fw-5 fs-2 my-3">Profile</h3>
            <div class="p-3">
                <form method="post" action="updateSetting.php?action=changeProfile">
                <div class="d-flex m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">First Name:</label>
                    <input type="text" name="firstName" id="firstName" placeholder="First Name" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">Last Name:</label>
                    <input type="text" name="lastName" id="lastName" placeholder="Last Name" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">E-mail:</label>
                    <input type="email" name="" id="" placeholder="email" class="w-50  px-2 rounded-3 border-1">
                </div>
                <!-- <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">Phone No.:</label>
                    <input type="number" name="" id="" placeholder="1234567890" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">Alternate Phone No.:</label>
                    <input type="number" name="" id="" placeholder="9876543210" class="w-50  px-2 rounded-3 border-1">
                </div> -->
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="" class="fw-bold mx-4 w-50">Address:</label>
                    <input type="text" name="address" id="address" placeholder="Address" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="updateSetting.php?action=changeProfile" >
                    <button type="submit" id="saveButton" class="btn btn-success  mx-2">Save</button></a>
                </div>
            </div>
            </form>
        </div>

        <div id="Privacy" class="tabcontent p-3 px-5">
            <h3 class="fw-5 fs-2 my-3 ">Privacy</h3>
            <form method="post" action="updateSetting.php?action=changePassword" enctype="multipart/form-data">
            <div class="p-3">
                <h5 class="fw-5 fs-2 my-3 ">Change Password:</h5>
                <div class="d-flex m-3 my-4 justify-content-evenly">
                    <label for="currentPassword" class="fw-bold mx-4 w-50">Current Password</label>
                    <input type="text" name="currentPassword" id="currentPassword" placeholder="********" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="newPassword" class="fw-bold mx-4 w-50">New Password</label>
                    <input type="text" name="newPassword" id="newPassword" placeholder="********" class="w-50  px-2 rounded-3 border-1">
                </div>
                <div class="d-flex  m-3 my-4 justify-content-evenly">
                    <label for="confirmNewPassword" class="fw-bold mx-4 w-50">Confirm New Password:</label>
                    <input type="text" name="confirmNewPassword" id="confirmNewPassword" placeholder="********" class="w-50  px-2 rounded-3 border-1">
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <a href="updateSetting.php?action=changePassword" >
                <button type="submit" id="saveButton" class="btn btn-success  mx-2">Save</button></a>
            </div>
            <form>
        </div>

        

        <div id="About" class="tabcontent p-3 px-5">
            <h3 class="fw-5 fs-2 my-3 ">About Us</h3>
            <div class="w-100 mx-5 my-2 p-4 d-flex flex-column">
                <div>Welcome to Plantify, where your love for plants meets cutting-edge technology and a thriving community. We're not just a website; we're your botanical sanctuary, your plant guru, and your green-thumb partner in the digital age.</div>
                <br>
                <h3>Our Story</h3>
                <div>
                Our journey began with a shared passion for plants and a desire to connect plant enthusiasts from all corners of the world. At Plantify, we believe in the power of greenery to enrich lives, soothe the soul, and bring people together.
                </div>
            </div>
            <div class="w-100 mx-5 my-2 p-4 d-flex flex-column">
                <h3>Our Mission</h3>
                <div>
                Our mission is to empower plant lovers like you to embark on a greener, more connected, and informed plant journey. We've designed a one-stop platform that not only makes it easy to cultivate and care for your plants but also enables you to connect with a vibrant community of fellow plant enthusiasts.
                </div>
            </div>
            <div class="w-100 mx-5 my-2 p-4 d-flex flex-column">
                <h3>What Sets Us Apart</h3>
                <div>
                <h5>Plant Identification:</h5> Can't put a name to your new leafy friend? Use our image recognition tool to identify plants instantly.

<br><h5>Disease Diagnosis:</h5> Worried about those strange spots on your plant's leaves? Our disease identification tool helps you diagnose plant issues and provides solutions to keep your green friends healthy.

<br><h5>Plant Marketplace:</h5> Looking to expand your indoor or outdoor garden? Shop for a wide variety of plants from trusted sellers right here on our website.

<br><h5>Community Forum:</h5> Share your success stories, seek advice, or simply indulge in plant-related conversations in our thriving community forum.

<br><h5>Interactive Sharing:</h5> Connect with like-minded plant enthusiasts, share your plant journey, and exchange thoughts and ideas with fellow green thumbs.

<br><h5>Seller's Paradise:</h5> If you're a plant seller, this is your platform to showcase your green treasures to a vast audience of plant lovers.
                </div>
            </div>
            <div class="w-100 mx-5 my-2 p-4 d-flex flex-column">
                <h3>Join Us in the Green Revolution</h3>
                <div>
                At Plantify, we believe in the power of plants to transform lives and spaces. Join us in creating a greener, more connected world where everyone can embrace the joys of plant parenthood. Whether you're a seasoned plant enthusiast or just dipping your toes into the world of horticulture, we welcome you with open arms.

Let's grow, learn, and flourish together. Discover the beauty and wonder of the plant kingdom at Plantify.
                </div>
            </div>
        </div>

        <div id="Contact" class="tabcontent p-3 px-5">
            <h3 class="fw-5 fs-2 my-3 ">Contact us</h3>
            <div class="w-100 mx-5 my-2 p-4 d-flex flex-column">

                <div>
                <h5><svg xmlns="http://www.w3.org/2000/svg" width="16" height="26" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
  <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
</svg> support.plantify@gmail.com</h5>
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
        // const saveButton = document.querySelectorAll("#saveButton");
        //         saveButton.addEventListener("click", () => {
        //         const currentPassword = form.querySelector("#currentPassword").value;
        //         const newPassword = form.querySelector("#newPassword").value;
        //         const confirmNewPassword = form.querySelector("#confirmNewPassword").value;
        //         const formData = new FormData();
        //         formData.append("currentPassword", currentPassword);
        //         formData.append("newPassword", newPassword);
        //         formData.append("confirmNewPassword", confirmNewPassword);
        //         // fetch("updateSetting.php", {
        //         //     method: 'POST',
        //         //     body: formData
        //         // });
        //     });
    </script>
</body>

</html>