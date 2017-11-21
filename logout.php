<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        Login
    </head>

    <body>
        <?php
            session_start();
            session_destroy();
            header("Location: login.php");
            exit();
        ?>
    </body>
    
</html>