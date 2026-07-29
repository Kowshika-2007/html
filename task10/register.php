<?php
session_start();

$name = $email = $phone = $age = $course = "";
$password = $confirm = "";

$nameErr = $emailErr = $phoneErr = "";
$ageErr = $courseErr = $passwordErr = "";

if(isset($_POST['register']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $age = trim($_POST['age']);
    $course = $_POST['course'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    $valid = true;

    // Required Field Validation
    if(empty($name) || empty($email) || empty($phone) || empty($age) || empty($course) || empty($password) || empty($confirm))
    {
        $valid = false;
    }

    // Regular Validation - Name
    if(!preg_match("/^[A-Za-z ]+$/",$name))
    {
        $nameErr = "Only alphabets allowed";
        $valid = false;
    }

    // Regular Validation - Email
    if(!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $emailErr = "Invalid Email";
        $valid = false;
    }

    // Regular Validation - Phone
    if(!preg_match("/^[0-9]{10}$/",$phone))
    {
        $phoneErr = "Phone must contain 10 digits";
        $valid = false;
    }

    // Range Validation
    if($age < 18 || $age > 35)
    {
        $ageErr = "Age must be between 18 and 35";
        $valid = false;
    }

    // Compare Validation
    if($password != $confirm)
    {
        $passwordErr = "Password does not match";
        $valid = false;
    }

    if(empty($course))
    {
        $courseErr = "Select Course";
        $valid = false;
    }

    if($valid)
    {
        $_SESSION['username'] = $name;
        $_SESSION['password'] = $password;

        echo "<script>
        alert('Registration Successful');
        window.location='login.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>Course Registration Form</h2>

<form method="post">

<label>Student Name</label>
<input type="text" name="name" value="<?php echo $name; ?>">
<span class="error"><?php echo $nameErr; ?></span>

<label>Email</label>
<input type="text" name="email" value="<?php echo $email; ?>">
<span class="error"><?php echo $emailErr; ?></span>

<label>Phone Number</label>
<input type="text" name="phone" value="<?php echo $phone; ?>">
<span class="error"><?php echo $phoneErr; ?></span>

<label>Age</label>
<input type="number" name="age" value="<?php echo $age; ?>">
<span class="error"><?php echo $ageErr; ?></span>

<label>Select Course</label>
<select name="course">
    <option value="">--Select Course--</option>
    <option <?php if($course=="Python") echo "selected"; ?>>Python</option>
    <option <?php if($course=="Java") echo "selected"; ?>>Java</option>
    <option <?php if($course=="PHP") echo "selected"; ?>>PHP</option>
    <option <?php if($course=="Web Development") echo "selected"; ?>>Web Development</option>
</select>

<span class="error"><?php echo $courseErr; ?></span>

<label>Password</label>
<input type="password" name="password">

<label>Confirm Password</label>
<input type="password" name="confirm">
<span class="error"><?php echo $passwordErr; ?></span>

<input type="submit" name="register" value="Register">

</form>

<br>

<div style="text-align:center;">
<a href="home.php" style="color:blue;">Home</a> |
<a href="login.php" style="color:blue;">Login</a>
</div>

</div>

</body>
</html>