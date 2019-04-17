<?php
    session_start();

    //variable declaration
    $psusername = "";
    $psaddress = "";
    $psphone = "";

    $error = array();
    $_SESSION['Success'] = "";

    //Connect to Database
    $db = mysqli_connect('localhost','root','admin4321','carsafe');

    //Register User
    if (isset($_POST['reg_user'])) {
    //Receive all inputs from the form
    $psusername = mysqli_real_escape_string($db, $_POST['psusername']);
    $psaddress = mysqli_real_escape_string($db, $_POST['psaddress']);
    $psphone = mysqli_real_escape_string($db, $_POST['psphone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled
    if (empty($psusername)) { array_push($errors, "Username is required"); }
    if (empty($psaddress)) { array_push($errors,"Address is required"); }
    if (empty($psphone)) { array_push($error,"Phone Number is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }


        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        // register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            $query = "INSERT INTO policestations (psusername, psaddress, psphone, pspassword) 
					  VALUES('$psusername', '$psaddress', '$psphone', '$password')";
            mysqli_query($db, $query);

            $_SESSION['psusername'] = $psusername;
            $_SESSION['success'] = "You are now logged in";
            header('location: police_index.php');
        }
    }

    //LOGIN POLICE STATION

if (isset($_POST['login_user'])) {
    $psusername = mysqli_real_escape_string($db, $_POST['username']);
    $pspassword = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($psusername)) {
        array_push($errors, "Username is required");
    }
    if (empty($pspassword)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $pspassword = md5($pspassword);
        $query = "SELECT * FROM policestations WHERE psusername='$psusername' AND pspassword='$pspassword'";
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
            $_SESSION['psusername'] = $psusername;
            $_SESSION['success'] = "You are now logged in";
            header('location: police_index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}
