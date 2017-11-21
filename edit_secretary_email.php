<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <head>
        <title>Dashboard</title>
    </head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <body>
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <div class="navbar-header">
              <a class="navbar-brand" href="dashboard_executive.php">Time Management System</a>
            </div>
            <ul class="nav navbar-nav">
                <li><p class="navbar-text"><?php session_start(); echo $_SESSION['login_user_name']; ?></p></li>
                <li><a href="dashboard_executive.php">Dashboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
          </div>
        </nav>
        
        <div class="container">
            <div class="jumbotron">
                <h1>Edit Secretary Email</h1>
                <form action="edit_secretary_email.php" method="post">
                    
                    <div class="form-group">
                        <label for="Name">Email:</label>
                        <input type="email" name="email" required class="form-control" id="usr">
                    </div>
                    
                    <button type="submit" class="btn btn-default" name="submit">Add Email</button>
                </form>
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
                
                //$link->query("CREATE TABLE IF NOT EXISTS imp_jobs(id INT AUTO_INCREMENT PRIMARY KEY, source VARCHAR(150) NOT NULL,destination  VARCHAR(150) NOT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(500));");
                
                $email   = $link->real_escape_string($_POST['email']);
               
                $query   = "SELECT * FROM users WHERE email = '" . $email . "';";
                
                $result = mysqli_query($link,$query);
                
                $num_rows = mysqli_num_rows($result);
                if ($num_rows != 1) 
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Secretary Does not Exist. ".mysqli_error($link)."</div>";
                    die("");
                }
                else
                {
                    $query   = "UPDATE users SET sec_email = '" . $email . "' WHERE email = \"" . $_SESSION["login_user_email"] . "\";";
                    $result = mysqli_query($link,$query);
                    
                    if (!$result) 
                    {
                        echo "<div class=\"alert alert-danger\"><strong>Error!</strong>".mysqli_error($link)."</div>";
                        die("");
                    }

                }
                
                echo "<div class=\"alert alert-success\"><strong>Success!</strong> Secretary Email Added.</div>";
                $link->close();
            }
        
            if(isset($_POST['submit']))
            {
                submit();
            } 
			
        ?>
    </body>
</html>