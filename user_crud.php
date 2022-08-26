<?php
session_start();
require 'config.php';

if(isset($_POST['delete_user']))
{
    $email = mysqli_real_escape_string($conn, $_POST['delete_user']);

    $query = "DELETE FROM `users` WHERE email='$email' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: usertest.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: usertest.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $country = mysqli_real_escape_string($conn, $_POST['country']);
    $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);

    $query = "UPDATE `users` SET username='$username', email='$email', gender='$gender', country='$ccountry', phoneno='$phoneno' WHERE email='$email' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: usertest.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: usertest.php");
        exit(0);
    }

}


if(isset($_POST['save_user']))
{
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $country = mysqli_real_escape_string($conn, $_POST['country']);
  $phoneno = mysqli_real_escape_string($conn, $_POST['phoneno']);

    $query = "INSERT INTO `users` (username,email,gender,country,phoneno) VALUES ('$username','$email','$gender','$country','$phoneno')";

    $query_run = mysqli_query($conn, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: add_user.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: add_user.php");
        exit(0);
    }
}

?>