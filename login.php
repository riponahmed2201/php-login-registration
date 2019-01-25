<?php
session_start();
$db = mysqli_connect('localhost','root','','omar');

if (isset($_POST['login_btn'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password =  md5($password);
    $sql = "SELECT * FROM users WHERE username = '$username'AND password = '$password'";
    $result = mysqli_query($db,$sql);

    if (mysqli_num_rows($result) == 1){
        $_SESSION['message'] = "You are now logged in";
        $_SESSION['username'] = $username;
        header('location:home.php');
    }
    else{
        $_SESSION['message'] = 'Username and Password incorrect!! Please valid username and password';
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

<form action="login.php" method="POST">

    <table>
        <tr>
            <td>Username:</td>
            <td><input type="text" name="username" class="textInput"></td>
        </tr>

        <tr>
            <td>Password:</td>
            <td> <input type="password" name="password" class="textInput"></td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="login_btn" value="Login"></td>
        </tr>
    </table>

</form>
</body>
</html>

