<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
    <head>
        <title>Register</title>
    </head>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <a class="navbar-brand" href="login.php">Time Management System</a>
                </div>
            </div>
        </nav>
        
        <div class="container">
            <div class="jumbotron">
                <h1>Register</h1>
                <form action="register_executive.php" method="post">
        
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" name="name" required>
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email(Username):</label>
                        <input type="email" name="email" required>
                    </div>
            
                    <div class="form-group">
                        <label for="email">Password:</label>
                        <input type="password" name="password" required>
                    </div>
                    
            
                    <div class="form-group">
                        <label for="email">Repeat Password:</label>
                        <input type="password" name="password2" required>
                    </div>
            
                    <div class="form-group">
                        <label for="secretary_email_id">Secretary Email ID:</label>
                        <input type="email" name="secretary_email">
                    </div>
                    
                    <div class="form-group">
                        <label for="ususal_hours">Usual Working Hours:</label>
                        <select name="start_hour" class="form-control" placeholder="start_hour" required>
                            <option value="0">12 AM</option>
                            <option value="1">1 AM</option>
                            <option value="2">2 AM</option>
                            <option value="3">3 AM</option>
                            <option value="4">4 AM</option>
                            <option value="5">5 AM</option>
                            <option value="6">6 AM</option>
                            <option value="7">7 AM</option>
                            <option value="8">8 AM</option>
                            <option value="9">9 AM</option>
                            <option value="10">10 AM</option>
                            <option value="11">11 AM</option>
                            <option value="12">12 PM</option>
                            <option value="13">1 PM</option>
                            <option value="14">2 PM</option>
                            <option value="15">3 PM</option>
                            <option value="16">4 PM</option>
                            <option value="17">5 PM</option>
                            <option value="18">6 PM</option>
                            <option value="19">7 PM</option>
                            <option value="20">8 PM</option>
                            <option value="21">9 PM</option>
                            <option value="22">10 PM</option>
                            <option value="23">11 PM</option>
                        </select>
                        <select name="end_hour" class="form-control" placeholder="end_hour" required>
                            <option value="0">12 AM</option>
                            <option value="1">1 AM</option>
                            <option value="2">2 AM</option>
                            <option value="3">3 AM</option>
                            <option value="4">4 AM</option>
                            <option value="5">5 AM</option>
                            <option value="6">6 AM</option>
                            <option value="7">7 AM</option>
                            <option value="8">8 AM</option>
                            <option value="9">9 AM</option>
                            <option value="10">10 AM</option>
                            <option value="11">11 AM</option>
                            <option value="12">12 PM</option>
                            <option value="13">1 PM</option>
                            <option value="14">2 PM</option>
                            <option value="15">3 PM</option>
                            <option value="16">4 PM</option>
                            <option value="17">5 PM</option>
                            <option value="18">6 PM</option>
                            <option value="19">7 PM</option>
                            <option value="20">8 PM</option>
                            <option value="21">9 PM</option>
                            <option value="22">10 PM</option>
                            <option value="23">11 PM</option>
                        </select>
                    </div>
            
                    <button type="submit" class="btn btn-default" name="submit">Register</button>
                </form>
            <div>
        </div>

        <?php

            function submit()
            {
                $link = mysqli_connect("localhost", "root", "", "TMS_DB");
            		
                if($link === false)
                {
                    echo "<div class=\"alert alert-danger\"><strong></strong>Could not connect. ".mysqli_error($link)."</div>";
                    die("");
                }
            
                $link->query("CREATE TABLE IF NOT EXISTS users(email VARCHAR(150) NOT NULL PRIMARY KEY, name VARCHAR(100) NOT NULL, password VARCHAR(1024) NOT NULL, executive BOOLEAN NOT NULL DEFAULT 0, sec_email VARCHAR(150), start_hour SMALLINT, end_hour SMALLINT);");
                
                $email   = $link->real_escape_string($_POST['email']);
                $name    = $link->real_escape_string($_POST['name']);
                $password = $link->real_escape_string($_POST['password']);
                $password2 = $link->real_escape_string($_POST['password2']);
                $executive_flag = 1;
                $secretary_email = $link->real_escape_string($_POST['secretary_email']);
                $start_hour = $link->real_escape_string($_POST['start_hour']);
                $end_hour = $link->real_escape_string($_POST['end_hour']);
                
                if ($secretary_email != "")
                {
                    $query   = "SELECT * from users WHERE email = \"" .$secretary_email . "\";";
                    
                    $result = mysqli_query($link,$query);
                
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows != 1) 
                    {
                        echo "<div class=\"alert alert-danger\"><strong>Error!</strong>The secretary ID entered does not exist.</div>";
                        die("");
                    }
                }
                
                
                if ($password != $password2)
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Both Passwords do not Match.</div>";
                    die("");
                    
                }
                else if (start_hour < end_hour)
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Please Enter Appropriate Hours.</div>";
                    die("");
                }
                else
                {
                    
                    $query   = "INSERT into users VALUES('" . $email . "','" . $name . "','" . $password . "','" . $executive_flag . "','" . $secretary_email . "','" . $start_hour . "','" . $end_hour. "');";
                    $success = $link->query($query);
                
                    if (!$success)
                    {
                        echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Couldn't enter data: ".$link->error."</div>";
                        die("");
                    }
                }
                $link->close();
            }
            
            if(isset($_POST['submit']))
            {
                submit();
            } 
			
        ?>
    </body>
</html>