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
                <li class="active"><a href="dashboard_secretary.php">Dashboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
          </div>
        </nav>
        <div class="container">
            <div class="jumbotron">
                <h1>Executive's Important Jobs</h1>
            </div>
        </div>
        <?php
        
          session_start();
          
          if (isset($_SESSION['executive_flag']))
          {
            if ($_SESSION['executive_flag'] == 1)
            {
              header("Location: dashboard_executive.php");
              die("");
            }
          }
          
          $link = mysqli_connect("localhost", "root", "", "TMS_DB");
          
          
          if($link === false)
          {
              echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Could not connect. ".mysqli_error($link)."</div>";
              die("");
          }
          
          if ($result = mysqli_query($link,"SHOW TABLES LIKE imp_jobs"))
          {
            if($result->num_rows != 1)
            {
              echo "<div class=\"alert alert-danger\">No Jobs to Show. ".mysqli_error($link)."</div>";
              die("");
            }
          }
  
          $result = mysqli_query($link,"SELECT * FROM imp_jobs where destination = \"".$_SESSION['executive_email']."\";");
          
          $num_rows = mysqli_num_rows($result);
          if ($num_rows == 0) 
          {
            echo "<div class=\"alert alert-danger\">No Jobs to Show. ".mysqli_error($link)."</div>";
            die("");
          }
          
          echo "<ul class=\"list-group\">";
          while($row = mysqli_fetch_array($result))
          {
            $id = $row['id'];
            echo "<li class=\"list-group-item\"><strong>" . $row['name'] . "</strong><br>". $row['description'] ."<br>";
            echo "<a href=\"delete_imp_jobs.php?id=" . $row['id'] . "\" class=\"btn btn-info\" role=\"button\">Delete</a></li>";
          }
          echo"</div>";
        ?>
        
    </body>
</html>