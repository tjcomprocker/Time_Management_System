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
                <li class="active"><a href="dashboard_executive.php">Dashboard</a></li>
                <li><a href="logout.php">Log Out</a></li>
            </ul>
          </div>
        </nav>
        
        <div class="list-group">
          <a href="important_job_add_executive.php" class="list-group-item">Add Important Job</a>
          <a href="show_imp_jobs_ee.php" class="list-group-item">Show Important Jobs</a>
          <a href="appointment_add_executive.php" class="list-group-item">Add Appointment</a>
          <a href="show_appointment_executive.php" class="list-group-item">Show Appointments</a>
          <a href="edit_secretary_email.php" class="list-group-item">Edit Secretary Email</a>
        </div>
    </body>
</html>