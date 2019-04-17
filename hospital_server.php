<?php
session_start();

//variable declaration
$husername = "";
$haddress = "";
$hphone = "";
$error = array();
$_SESSION['Success'] = "";

//Connect to Database
$db = mysqli_connect('localhost','root','admin4321','carsafe');

//Register User
if (isset($_POST['reg_user'])) {
    //Receive all inputs from the form
    $husername = mysqli_real_escape_string($db, $_POST['husername']);
    $haddress = mysqli_real_escape_string($db, $_POST['haddress']);
    $hphone = mysqli_real_escape_string($db, $_POST['hphone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($husername)) { array_push($errors, "Hospital username is required"); }
    if (empty($haddress)) { array_push($errors,"Hospital address is required"); }
    if (empty($hphone)) { array_push($error,"Phone Number is required"); }
    if (empty($password_1)) { array_push($errors, "A Password is required"); }


    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        $query = "INSERT INTO hospitals (husername, haddress, hphone, hpassword) 
					  VALUES('$husername', '$haddress', '$hphone', '$password')";
        mysqli_query($db, $query);

        $_SESSION['husername'] = $husername;
        $_SESSION['success'] = "You are now logged in";
        header('location: hospital_index.php');
    }
}

//LOGIN HOSPITAL

if (isset($_POST['login_user'])) {
    $husername = mysqli_real_escape_string($db, $_POST['username']);
    $hpassword = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($husername)) {
        array_push($errors, "Hospital username is required");
    }
    if (empty($hpassword)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $hpassword = md5($hpassword);
        $query = "SELECT * FROM hospitals WHERE husername='$husername' AND hpassword='$hpassword'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['husername'] = $husername;
            $_SESSION['success'] = "You are now logged in";
            header('location: hospital_index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
