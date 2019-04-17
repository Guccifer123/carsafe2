<?php include('hospital_server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<div class="header">
    <h2>Hospital Login</h2>
</div>

<form method="post" action="hospital_index.php">

    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="register.php">User SignUp</a> <a href="police_register.php">Police SignUp</a> <a href="hospital_register.php">Hospital SignUp</a>
    </p>
</form>


</body>
</html>