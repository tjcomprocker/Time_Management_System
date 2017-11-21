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
              <a class="navbar-brand" href="dashboard_secretary.php">Time Management System</a>
            </div>
            <ul class="nav navbar-nav">
                <li><p class="navbar-text"><?php session_start(); echo $_SESSION['login_user_name']; ?></p></li>
                <li><a href="dashboard_secretary.php">Dashboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
          </div>
        </nav>
        
        
        <div class="container">
            <div class="jumbotron">
                <h1>Add Important Jobs</h1>
                <form action="important_job_add_secretary.php" method="post">
                    
                    <div class="form-group">
                        <label for="Name">Name:</label>
                        <input type="text" name="name" required class="form-control" id="usr">
                    </div>
            
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <input type="textarea" name="description" required class="form-control" id="comment">
                    </div>
                    
                    <div class="checkbox">
                        <label><input type="checkbox" name="forward">On Behalf of the Executive?</label>
                    </div>
                    
                    <button type="submit" class="btn btn-default" name="submit">Add Job</button>
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
                
                $link->query("CREATE TABLE IF NOT EXISTS imp_jobs(id INT PRIMARYKEY AUTO_INCREMENT,,source VARCHAR(150) NOT NULL, destination VARCHAR(150) NOT NULL, name VARCHAR(150) NOT NULL, description VARCHAR(500));");
                
                $name   = $link->real_escape_string($_POST['name']);
                $description = $link->real_escape_string($_POST['description']);
                
                $to = $_SESSION['login_user_email'];
                
                if (isset($_POST['forward']))
                {
                    $to = $_SESSION['secretary_email'];
                }
                
                $from = $_SESSION['login_user_email'];
                
                $query   = "INSERT INTO imp_jobs(source,destination,name,description) VALUES('" . $from . "','" . $to . "','" . $name . "','" . $description . "');";
                
                $result = mysqli_query($link,$query);
                
                if (!$result) 
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>".mysqli_error($link)."</div>";
                    die("");
                }
                
                echo "<div class=\"alert alert-success\"><strong>Success!</strong> Job added.</div>";
                $link->close();
            }
        
            if(isset($_POST['submit']))
            {
                submit();
            } 
			
        ?>
    </body>
</html>