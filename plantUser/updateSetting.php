<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("location:../login.php");
}
require_once "../config.php";
require "navbarPlant.php";
$emailId = $_SESSION['emailId'];
$action = $_GET['action'];

if ($action=="changePassword" & ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $currentPassword = $_POST["currentPassword"];
    $newPassword = $_POST["newPassword"];
    $confirmNewPassword = $_POST["confirmNewPassword"];
    $oldPassword = "SELECT password FROM users WHERE emailId='$emailId'";
    $result = mysqli_query($conn, $oldPassword);
    if ($result && $result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
        if($password == $currentPassword){
            if ($newPassword == $confirmNewPassword) {
                $query1 = "UPDATE users SET password='$newPassword' WHERE emailId='$emailId'";
                $result1 = mysqli_query($conn, $query1);
        
                if ($result1) {
                    // Password updated successfully
                    echo "<script>alert('Password updated successfully.')
                    window.location.href='settings.php';</script>";
                } else {
                    // Error updating password
                    echo "<script>alert('Error updating password.')
                    window.location.href='settings.php';</script>";
                }
            } 
            else {
                echo "<script>alert('New password and confirm password do not match.')
                window.location.href='settings.php';</script>";
            }
        }
        else{
            echo "<script>alert('Incorrect Current Password')
            window.location.href='settings.php';</script>";
        }
    }
}
if ($action=="changeProfile" & ($_SERVER["REQUEST_METHOD"] == "POST")) {
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $address = $_POST["address"];
    $query1 = "UPDATE users SET firstName='$firstName' WHERE emailId='$emailId'";
    $result1 = mysqli_query($conn, $query1);
    $query2 = "UPDATE users SET lastName='$lastName' WHERE emailId='$emailId'";
    $result2 = mysqli_query($conn, $query2);
    $query3 = "UPDATE users SET address='$address' WHERE emailId='$emailId'";
    $result3 = mysqli_query($conn, $query3);
    if ($result3) {
        // Password updated successfully
        echo "<script> alert('updated successfully.')
        window.location.href='settings.php';</script>";
    } else {
        // Error updating password
        echo "<script>alert('Error updating.');</script>";
    }
}
?>

