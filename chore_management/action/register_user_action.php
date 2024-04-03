<?php
include '../settings/connection.php'; 
include '../settings/core.php';
include_once '../view/access_control.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $familyRole = $_POST['familyRole'];
    $dob = $_POST['dob'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) 
              VALUES (3, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);

    mysqli_stmt_bind_param($stmt, "isssssss", $familyRole, $firstName, $lastName, $gender, $dob, $phoneNumber, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../view/home_view.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($conn);
?>