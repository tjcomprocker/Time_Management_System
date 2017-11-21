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
        
        <div class="list-group">
          <a href="important_job_add_secretary.php" class="list-group-item">Add Important Job</a>
          <a href="show_imp_jobs_se.php" class="list-group-item">Show Important Jobs of Executive</a>
          <a href="show_imp_jobs_ss.php" class="list-group-item">Show My Important Jobs</a>
          <a href="appointment_add_secretary.php" class="list-group-item">Add Appointment</a>
          <a href="show_appointment_secretary.php" class="list-group-item">Show Appointments</a>
        </div>
    </body>
</html>