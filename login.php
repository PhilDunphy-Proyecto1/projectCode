<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario SingIn</title>
    <link rel="stylesheet" href="style.css">
    <script src="validacion.js"></script>
</head>
<body>
    <form class="box" action="login.proc.php" method="post" onsubmit="return sendForm(user.value,pwd.value);">
        <h1>Login</h1>
        <input type="text" id="user" name="user" placeholder="Usuario">
        <input type="password" id="pwd" name="pwd" placeholder="Contraseña">
        <input type="submit" value="Login">
        <?php
            require "connect.php";
            if(isset($_GET['er'])) {
                echo "<span style='color:white'>El nombre de usuario o la contraseña son incorrectos.</span>";
            }
        ?>
    </form>
    
</body>
</html>