<!DOCTYPE html>
<html>
<link rel="stylesheet" href="signup.css">

<head>
    <title>Sign Up</title>
</head>
<style>

</style>

<body><br><br><br>
    <div class="container">
        <h1><strong>SIGN UP</strong></h1>
        <form action="signupadd.php" method="POST">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>
            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="pass" required>
            <p>By creating an account you agree to our Terms & Privacy.</p>
            <br><br>
            <button type="submit">Sign Up</button> 
            <br><br>
                <a href="signin.php">Already Register??? Click To Login</a>
        </form>

    </div>
</body>

</html>