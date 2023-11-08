<?php
    require_once('../models/userModel.php');

    session_start();
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    
    if ($email == "" || $password == "") {
        echo "Please enter a username or password!";
    } else {
        $user = getUserByEmail($email); // Fetch user data by email
    
        if ($user) {
            $userType = $user['type'];
            if ($userType === 'Admin') {
                // If User is an admin
                $_SESSION['isAdmin'] = true;
                $_SESSION['flag'] = 'true';
                header('location: ../views/admin_view.php');
            } else {
                // If User is not an admin
                $_SESSION['isAdmin'] = false;
                $_SESSION['flag'] = 'true';
                header('location: ../views/home_view.php');
            }
            
        } else {
            echo "Invalid user!";
            header('location: ../views/login.php');
        }
    }
    
    
    
?>