<?php
session_start();

// Check Login
if(!isset($_SESSION['login']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Main Page - Course Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <h1>Course Registration System</h1>

    <h2>Welcome</h2>

    <p style="text-align:center;font-size:18px;">
        Hello,
        <b><?php echo $_SESSION['username']; ?></b>
    </p>

    <br>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <tr>
            <th>Course</th>
            <th>Status</th>
        </tr>

        <tr>
            <td>Course Registration</td>
            <td>Successfully Logged In</td>
        </tr>
    </table>

    <br>

    <div class="menu">
        <a href="logout.php">Logout</a>
    </div>

</div>

</body>
</html>