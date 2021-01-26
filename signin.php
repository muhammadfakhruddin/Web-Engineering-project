<!DOCTYPE html>
<html>
<link rel="stylesheet" href="signin.css">

<head>
    <title>Sign In</title>
</head>
<style>

</style>

<body><br><br><br>
    <div class="container">
        <h1><strong>SIGN IN</strong></h1>
        <form action="signinadd.php" method="post">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>
            <p></p>
            <br><br><br>
            <button type="submit" name="submit">Login</button>
            <br><br>
            <a href="signup.php">Don't Have Account??? Click To Register</a>
        </form>
    </div>
</body>

</html>