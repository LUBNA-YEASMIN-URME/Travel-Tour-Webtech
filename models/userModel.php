<?php

    require_once('db.php');

    function login($email, $password){
        $con = getConnection();
        $sql = "select * from users where email='{$email}' and password='{$password}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if(count($user) > 0){
            return true;
        }else{
            return false;
        }
    }

function signup($name, $contact, $email, $password, $nid, $age)
{
    $con = getConnection();
    $name = mysqli_real_escape_string($con, $name);
    $contact = mysqli_real_escape_string($con, $contact);
    $email = mysqli_real_escape_string($con, $email);
    $password = mysqli_real_escape_string($con, $password);
    $nid = mysqli_real_escape_string($con, $nid);
    $age = mysqli_real_escape_string($con, $age);
    $type = "User";

    $sql = "INSERT INTO users (name, contact, email, password, nid, age,type) VALUES ('{$name}', '{$contact}', '{$email}', '{$password}', '{$nid}', '{$age}','{$type}')";
    $result = mysqli_query($con, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}

    function getUser($id){
            $con = getConnection();
            $id = mysqli_real_escape_string($con, $id);
            $sql = "SELECT * FROM users WHERE id = {$id}";
            $result = mysqli_query($con, $sql);
            $user = mysqli_fetch_assoc($result);
            return $user;
    }

    function getUserByEmail($email) {
        $con = getConnection();
        $email = mysqli_real_escape_string($con, $email);
        $sql = "SELECT * FROM users WHERE email = '{$email}'";
        $result = mysqli_query($con, $sql);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    


    function getUserTypeByEmail($email) {
        $con = getConnection();
        $email = mysqli_real_escape_string($con, $email);
        $sql = "SELECT type FROM users WHERE email = '{$email}'";
        $result = mysqli_query($con, $sql);
        $userType = mysqli_fetch_assoc($result);
        return $userType['type'];
    }

    function adduser(){

    }

    function deleteUser(){
        $con = getConnection();
    $id = mysqli_real_escape_string($con, $id);
    
    $sql = "DELETE FROM users WHERE id = {$id}";
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        return true;
    } else {
        return false;
    }
    }

    function updateUser(){
        $con = getConnection();
        $id = mysqli_real_escape_string($con, $id);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);
        $email = mysqli_real_escape_string($con, $email);
    
        $sql = "UPDATE users SET username='{$username}', password='{$password}', email='{$email}' WHERE id={$id}";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    function forgotPassword($email, $newPassword)
{
    $con = getConnection();
    $email = mysqli_real_escape_string($con, $email);
    $newPassword = mysqli_real_escape_string($con, $newPassword);

    // Check user is exists or not
    $sql = "SELECT * FROM users WHERE email='{$email}'";
    $result = mysqli_query($con, $sql);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        // Update the user's password with the new password
        $userId = $user['id'];
        $sql = "UPDATE users SET password='{$newPassword}' WHERE id={$userId}";
        $updateResult = mysqli_query($con, $sql);

        if ($updateResult) {
            return true; //reset successful
        }
    }

    return false; // reset failed
}


?>