<?php include('hospital_server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
    <h2>Hospital Register</h2>
</div>

<form method="post" action="hospital_register.php">

    <?php include('errors.php'); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="husername" value="<?php echo $husername; ?>">
    </div>
    <div class="input-group">
        <label>Address</label>
        <input type="haddress" name="haddress" value="<?php echo $haddress; ?>">
    </div>
    <div class="input-group">
        <label>Phone</label>
        <input type="text" name="hphone" value="<?php echo $hphone; ?>">
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
        Already a member? <a href="police_login.php">Police SignIn</a> <a href="login.php">User SignIn</a> <a href="hospital_login.php">Hospital SignIn</a>
    </p>
</form>
</body>
</html>