<?php
session_start();
$db = mysqli_connect('localhost','root','','omar');

if (isset($_POST['register_btn'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 =$_POST['password2'];

    if ($password == $password2){
        $password = md5($password);
        $sql = "INSERT INTO users(username, email, password) VALUES('$username','$email', '$password')";
        mysqli_query($db,$sql);
        $_SESSION['message'] = "You are now logged in ";
        $_SESSION['username'] = $username;
        header('location:home.php');
    }
}
?>

<html>
<head>
    <title> Register, Login and Logout User php mysql</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="header">
    <h1> Register, Login and Logout User php mysql </h1>
</div>
<?php
if (isset($_SESSION['message'])){
    echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    unset($_SESSION['message']);
}
?>

<form action="register.php" method="POST">

    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td> <input type="email" name="email" class="textInput"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td> <input type="password" name="password" class="textInput"></td>
        </tr>
        <tr>
            <td>Password Again:</td>
            <td> <input type="password" name="password2" class="textInput"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="register_btn" value="Register"></td>
        </tr>
    </table>

</form>
</body>
</html>
