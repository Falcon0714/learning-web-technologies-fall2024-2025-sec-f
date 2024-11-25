<?php
    session_start();
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 0);
    if(isset($_POST["submit"])){
        $username = trim($_POST["username"]);
        $email = trim($_POST["email"]);
        $id = trim($_POST["id"]);
        $dept = trim($_POST["dept"]);
        $dob = trim($_POST["dob"]);
        $gender = trim($_POST["gender"]);
        $password = trim($_POST["password"]);
        $bg = trim($_POST["bg"]);
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($username) || empty($email) || empty($password) || empty($confirm_password) || empty($id) || empty($dept)|| empty($dob) || empty($gender)|| empty($bg)){
            echo "<h3>Input fields can not be empty</h3>";
    }
    else if( $password !== $confirm_password){
        echo "<h3>Password and Confirm password does not match</h3>";
    }
    else{
        $a_array = ['username' => $username, 'password' => $password, 'email'=>$email, 'id'=>$id, 'dept'=>$dept,'dob'=>$dob,'gender'=>$gender,'bg'=>$bg];
        $_SESSION =$a_array;
        header("location:login.html");
    }

    }
    else{
        header("location:reg.html");
    }

?>