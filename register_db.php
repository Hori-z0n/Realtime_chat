<?php
session_start();
include('config.inc.php');
$errors = array();
if(isset($_POST['reg_user'])){
    $username = mysqli_real_escape_string($condb, $_POST['username']);
    $email = mysqli_real_escape_string($condb, $_POST['email']);
    $password_1 = mysqli_real_escape_string($condb, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($condb, $_POST['password_2']);
    if(empty($username)){
        array_push($errors, "Username is required");
    }
    if(empty($email)){
        array_push($errors, "Email is required");
    }
    if(empty($password_1)){
        array_push($errors, "Password is required");
    }
    if($password_1 != $password_2){
        array_push($errors, "The two passwords do not match");
    }
    $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email'";
    $user_check_query = mysqli_query($condb, $user_check_query);
    $result = mysqli_fetch_assoc($query);

    if($result){
        if($result['username'] === $username){
            array_push($errors, "Username already exists");
        }
        if($result['email'] === $email){
            array_push($errors, "email already exists");
        }
    }
    if(count($errors) == 0){
        $password = md5($password_1);
        $sql = "INSERT INTO user(id, username, email, password)VALUES('','$username', '$email', '$password')";
        mysqli_query($condb, $sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: webboard.php');
    }else{
        array_push($errors, "username or email already exists");
        $_SESSION['error'] = "username or email already exists";
        header("location: webboard.php");
    }
}
?>