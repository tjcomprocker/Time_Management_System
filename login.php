<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <head>
        <title>Login</title>
    </head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <body>

        <div class="container">
            <div class="jumbotron">
                <h1>Login</h1>
                <form action="login.php" method="post">
                    
                    <div class="form-group">
                        <label for="email">Email(Username):</label>
                        <input type="email" name="email" required class="form-control" id="email">
                    </div>
            
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" required class="form-control" id="pwd">
                    </div>
                    
                    <button type="submit" class="btn btn-default" name="submit">Login</button>
                </form>
                Not Registered?<br><a href="register_executive.php">Register as Executive Here</a></br>
                <a href="register_secretary.php">Register as Secretary Here</a>
            </div>
        </div>
        
        
        
        <?php
        
            session_start();

            function submit()
            {
                
                $link = mysqli_connect("localhost", "root", "", "TMS_DB");
            
                if($link === false)
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Could not connect. ".mysqli_error($link)."</div>";
                    die("");
                }
                
                $link->query("CREATE TABLE IF NOT EXISTS users(email VARCHAR(150) NOT NULL PRIMARY KEY, name VARCHAR(100) NOT NULL, password VARCHAR(1024) NOT NULL, executive BOOLEAN NOT NULL DEFAULT 0, sec_email VARCHAR(150), start_hour SMALLINT, end_hour SMALLINT);");
                
                $email   = $link->real_escape_string($_POST['email']);
                $password = $link->real_escape_string($_POST['password']);
                
                
                $query   = "SELECT * FROM users where password=\"".$password."\" AND email=\"".$email."\";";
                
                
                $result = mysqli_query($link,$query);
                
                if (!$result) 
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>".mysqli_error($link)."</div>";
                    die("");
                }
                $num_rows = mysqli_num_rows($result);
                if ($num_rows == 1) 
                {
                    $row = mysqli_fetch_array($result);
                    
                    $_SESSION['login_user_name'] = $row['name'];
                    $_SESSION['login_user_email'] = $row['email'];
                    $_SESSION['executive_flag'] = $row['executive'];
                    
                    if ($_SESSION['executive_flag'] == 1)
                    {
                        $_SESSION['secretary_email'] = $row['sec_email'];
                    }
                    
                    if ($_SESSION['executive_flag'] == 0)
                    {
                        $_SESSION['executive_email'] = $row['sec_email'];
                        header("Location: dashboard_secretary.php");
                        exit();
                    }
                    else
                    {
                        header("Location: dashboard_executive.php");
                        exit();
                    }
                    
                } 
                else
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Username or Password does not match.</div>";
                    die("");
                }
                $link->close();
            }
            
            
            
            if(isset($_SESSION['login_user_name']))
            {
                
                if ($_SESSION['executive_flag'] == 0)
                {
                    header("Location: dashboard_secretary.php");
                    exit();
                }
                else
                {
                    header("Location: dashboard_executive.php");
                    exit();
                }
            }
        
            if(isset($_POST['submit']))
            {
                submit();
            } 
			
        ?>
    </body>
</html>