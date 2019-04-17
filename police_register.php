<?php include('police_server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Police Register</h2>
</div>

<form method="post" action="police_register.php">

    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="psusername" value="<?php echo $psusername; ?>">
    </div>
    <div class="input-group">
        <label>Address</label>
        <input type="psaddress" name="psaddress" value="<?php echo $psaddress; ?>">
    </div>
    <div class="input-group">
        <label>Phone</label>
        <input type="text" name="psphone" value="<?php echo $psphone; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password_1">
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="police_login.php">Police SignIn</a> <a href="login.php">User SignIn</a> <a href="hospital_register.php">Hospital SignIn</a>
    </p>
</form>
</body>
</html>