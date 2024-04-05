<?php
session_start();
include '../settings/connection.php';
include_once '../view/access_control.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM People WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        echo "User not registered.";
        exit();
    } else {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['passwd'])) {
            // Password match, create session for user id
            $_SESSION['user_id'] = $user['pid'];

            // Set role ID based on user's role fetched from the database
            if ($user['rid'] == 1) {
                $_SESSION['role_id'] = 1; // Super-admin role ID
            } elseif ($user['rid'] == 2) {
                $_SESSION['role_id'] = 2; // Admin role ID
            } elseif ($user['rid'] == 3) {
                $_SESSION['role_id'] = 3; // Standard user role ID
            }

            // Redirecting to home page
            header("Location: ../view/home_view.php");
            exit();
        } else {
            echo "Incorrect username or password.";
            exit();
        }
    }
} else {
    echo "Invalid request.";
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
