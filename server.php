<?php
session_start();
include('config9.php');

// initialize our variables

$firstName = '';
$lastName = '';
$userName = '';
$email = '';
$errors = array();

// connect to the database

$db = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) ;

// register our user!

if(isset($_POST['reg_user'])) {
// we are going to receive input values from our register form
$firstName = mysqli_real_escape_string($db, $_POST['firstName']);
$lastName = mysqli_real_escape_string($db, $_POST['lastName']);
$userName = mysqli_real_escape_string($db, $_POST['userName']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

// form validation - we want to make sure that the form is filled out
// adding an array push

if(empty($firstName)) {
    array_push($errors, 'First Name is required');
    } // end if firstName

if(empty($lastName)) {
    array_push($errors, 'Last Name is required');
    } // end if lastName

if(empty($userName)) {
    array_push($errors, 'User Name is required');
    } // end if userName

if(empty($email)) {
    array_push($errors, 'Email is required');
    } // end if email

if(empty($password_1)) {
    array_push($errors, 'Password is required');
    } // end if empty password

// Think logically - why do we have 2 passwords - they both have to be equal

if($password_1 != $password_2) {
    array_push($errors, 'The two passwords do not match');
    }  // end if password not match
  
// we need to make sure userName or email do not exist

$user_check_query = "SELECT * FROM Users WHERE userName = '$userName' OR Email ='$email' LIMIT 1 ";
$result = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($result);


// if username or email exists, nope

if($user)  {
if($user['userName'] == $userName) {
    array_push($errors, 'User name already exists!');
} 

if($user['email'] == $email) {
    array_push($errors, 'Email already exists!');
}
}  // close if userName and Email check

// if there are zero errors, we can submit and save to DB

if(count($errors) == 0) {

    $password = md5($password_1);  // encyrpts password before saving to the database

    $query = "INSERT INTO Users (firstName, lastName, userName, email, password)
    VALUES ('$firstName', '$lastName', '$userName', '$email', '$password')";

    mysqli_query($db, $query);

    $_SESSION['userName'] = $userName;
    $_SESSION['success'] = '<em>Thank you for registering, ' .$_SESSION['userName'].'. You are now logged in.</em>';

    header('Location:index.php');

} // end if count(errors)

}  // end if isset


if(isset($_POST['login_user'])) {
    $userName = mysqli_real_escape_string($db, $_POST['userName']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(empty($userName)) {
        array_push($errors, 'User Name is required');
        } // end if userName

    if(empty($password)) {
            array_push($errors, 'Password is required');
            } // end if password

    if(count($errors) == 0) {
        $password = md5($password);  // encyrpts password sending

        $query = "SELECT * FROM Users WHERE userName = '$userName' AND password = '$password' ";

        $result = mysqli_query($db, $query);

    if(mysqli_num_rows($result) == 1) {
        $_SESSION['userName'] = $userName;
        $_SESSION['success'] = 'You have successfully logged in!';

        header('Location:index.php');

        }  else {  //end session if
                array_push($errors, "Wrong username/password combination.");
        } // end else   
    } // end error count

} // end login user if isset



