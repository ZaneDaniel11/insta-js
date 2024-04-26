<?php
session_start();
include('Connection.php');

if (isset($_POST['submitbutton'])) {
    $username = mysqli_real_escape_string($conn, $_POST['user_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE username='$username' AND password = '$password' LIMIT 1";

    $login_query_run = mysqli_query($conn, $login_query);



    if (mysqli_num_rows($login_query_run) > 0) {
        $userdata = mysqli_fetch_array($login_query_run);

        $user_id = $userdata['user_id'];
        $username = $userdata['full_name'];

        $_SESSION['auth_user_id'] = $user_id;
        $_SESSION['authuser_name'] = $username;

        $_SESSION['status'] = "Login Successfully";
        header('location:../index.php');
        exit();
    } else {
        $_SESSION['status'] = "Invalid Email Or Password";

        exit();
    }
}
?>