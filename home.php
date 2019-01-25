<?php
session_start();
?>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title> Register, Login and Logout User php mysql</title>

</head>
<body>

<div class="header">
    <h1> Register, Login and Logout User php mysql </h1>
</div>
<div>
    <?php
    if (isset($_SESSION['message'])){
        echo "<div id='error_msg'>".$_SESSION['message']."</div>";
        unset($_SESSION['message']);
    }
    ?>
</div>
    <div class="home">
    <div>
        <h1>Home</h1>

    </div>

    <div><a href="logout.php">Logout</a></div>

</div>
</body>
</html>
