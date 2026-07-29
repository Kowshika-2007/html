<?php
session_start();

$userErr = "";
$passErr = "";
$loginErr = "";

if(isset($_POST['login']))
{
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $valid = true;

    // Required Field Validation
    if(empty($username))
    {
        $userErr = "Enter Username";
        $valid = false;
    }

    if(empty($password))
    {
        $passErr = "Enter Password";
        $valid = false;
    }

    if($valid)
    {
        // Check with registered session values
        if(isset($_SESSION['username']) && isset($_SESSION['password']))
        {
            if($username == $_SESSION['username'] && $password == $_SESSION['password'])
            {
                $_SESSION['login'] = true;
                header("Location: main.php");
                exit();
            }
            else
            {
                $loginErr = "Invalid Username or Password";
            }
        }
        else
        {
            $loginErr = "Please Register First";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Course Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Student Login</h2>

<form method="post">

<label>Username</label>
<input type="text" name="username">
<span class="error"><?php echo $userErr; ?></span>

<label>Password</label>
<input type="password" name="password">
<span class="error"><?php echo $passErr; ?></span>

<br><br>

<input type="submit" name="login" value="Login">

<p class="error" style="text-align:center;">
<?php echo $loginErr; ?>
</p>

</form>

<br>

<div style="text-align:center;">
<a href="home.php" style="color:blue;">Home</a> |
<a href="register.php" style="color:blue;">Register</a>
</div>

</div>

</body>
</html>