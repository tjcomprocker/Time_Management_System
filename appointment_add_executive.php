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
                <h1>Add Appointments</h1>
                <form action="appointment_add_executive.php" method="post">
                    
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" name="date" class="form-control" id="usr" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="start_time">Start Time:</label>
                        <select name="start_time" class="form-control" required>
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
                    
                    <div class="form-group">
                        <label for="end_time">End Time:</label>
                        <select name="end_time" class="form-control" required>
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
                    
                    <div class="form-group">
                        <label for="project_name">Project Name:</label>
                        <input type="text" name="project_name" required class="form-control" id="usr">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Person 1 Name and Email ID:</label>
                        <input type="text" name="p1_name" class="form-control" id="usr" placeholder="Name" required>
                        <input type="email" name="p1_email" class="form-control" id="usr" placeholder="Email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Person 2 Name and Email ID:</label>
                        <input type="text" name="p2_name" class="form-control" placeholder="Name" id="usr">
                        <input type="email" name="p2_email" class="form-control" placeholder="Email" id="usr">
                    </div>
                    
                    <div class="form-group">
                        <label for="description">Person 3 Name and Email ID:</label>
                        <input type="text" name="p3_name" class="form-control" placeholder="Name" id="usr">
                        <input type="email" name="p3_email" class="form-control" placeholder="Email" id="usr">
                    </div>
                    
                    <button type="submit" class="btn btn-default" name="submit">Add Appointment</button>
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
                
                $link->query("CREATE TABLE IF NOT EXISTS appointments(id INT AUTO_INCREMENT PRIMARY KEY,destination VARCHAR(100) NOT NULL,date DATE NOT NULL ,start_time SMALLINT NOT NULL, end_time SMALLINT NOT NULL, project_name VARCHAR(150) NOT NULL, p1_name VARCHAR(100) NOT NULL, p1_email VARCHAR(100) NOT NULL, p2_name VARCHAR(100), p2_email VARCHAR(100), p3_name VARCHAR(100), p3_email VARCHAR(100));");
                
                $link->query("CREATE TABLE IF NOT EXISTS meetings(destination VARCHAR(100) NOT NULL,date DATE NOT NULL ,start_time SMALLINT NOT NULL, end_time SMALLINT NOT NULL, project_name VARCHAR(150) NOT NULL, id SMALLINT NOT NULL);");
                
                $start_time   = $link->real_escape_string($_POST['start_time']);
                $end_time   = $link->real_escape_string($_POST['end_time']);
                $date   = $link->real_escape_string($_POST['date']);
                $description = $link->real_escape_string($_POST['description']);
                $project_name = $link->real_escape_string($_POST['project_name']);
                $p1_name = $link->real_escape_string($_POST['p1_name']);
                $p1_email = $link->real_escape_string($_POST['p1_email']);
                $p2_name = $link->real_escape_string($_POST['p2_name']);
                $p2_email = $link->real_escape_string($_POST['p2_email']);
                $p3_name = $link->real_escape_string($_POST['p3_name']);
                $p3_email = $link->real_escape_string($_POST['p3_email']);
                $destination = $_SESSION['login_user_email'];
                
                $flag_1 = 0;
                $flag_2 = 0;
                $flag_3 = 0;
                
                $busy_1 = array();
                $busy_2 = array();
                $busy_3 = array();
                
                $duration = array();
                
                $predict = 0;
                
                $today = date("Y-m-d");
                
                if ($start_time < $end_time && $date >= $today)
                {
                    $query   = "INSERT INTO appointments(destination, date, start_time, end_time, project_name, p1_name, p1_email, p2_name, p2_email, p3_name, p3_email) VALUES('" . $destination . "','" . $date . "','" . $start_time."','". $end_time . "','" . $project_name . "','" . $p1_name . "','" . $p1_email . "','" . $p2_name . "','" . $p2_email . "','" . $p3_name . "','" . $p3_email . "');";
                    
                    $result = mysqli_query($link,$query);

                    if (!$result) 
                    {
                        echo "<div class=\"alert alert-danger\"><strong>Error!</strong>".mysqli_error($link)."</div>";
                        die("");
                    }
                }
                else
                {
                    echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Please Check your time and date.</div>";
                    die("");
                }
                
                $temp_1 = $start_time;
                $temp_2 = $end_time;
                
                $i = 0;
                
                for($i=$temp_1 ; $i<$temp2 ; $i++)
                {
                    array_push($duration,$i);
                }
                
                
                $query   = "SELECT MAX(id) FROM appointments;";
    
                $result = mysqli_query($link,$query);
                
                $row = mysqli_fetch_array($result);
                    
                $id = $row['MAX(id)'];
                
                $query   = "SELECT * FROM users where email=\"".$p1_email."\";";

                $result = mysqli_query($link,$query);
                
                $num_rows = mysqli_num_rows($result);
                if ($num_rows == 1) 
                {
                    $query   = "SELECT * FROM meetings where destination=\"".$p1_email."\" AND date =\"".$date."\";";
    
                    $result = mysqli_query($link,$query);
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        $temp_1 = $row['start_time'];
                        $temp_2 = $row['end_time'];
                        
                        $i = 0;
                        
                        for($i=$temp_1 ; $i<$temp2 ; $i++)
                        {
                            array_push($busy_1,$i);
                        }
                    }
                    
                    $tj = array_intersect($busy_1,$duration);
                    
                    if (!empty($tj))
                    {
                        echo "<div class=\"alert alert-danger\"><strong>Executives not Free!</strong>Please Contact your secretary.</div>";
                        die("");
                    }
                    
                    //$query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p1_email."\"," . $date . "," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";
    
                    //$result = mysqli_query($link,$query);
                    
                    $flag_1 = 1;
                }
                
                
                if ($p2_email != "")
                {
                    $query   = "SELECT * FROM users where email=\"".$p2_email."\";";
    
                    $result = mysqli_query($link,$query);
                    
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows == 1) 
                    {
                        $query   = "SELECT * FROM meetings where destination=\"".$p2_email."\" AND date =\"".$date."\";";
        
                        $result = mysqli_query($link,$query);
                        
                        while($row = mysqli_fetch_array($result))
                        {
                            $temp_1 = $row['start_time'];
                            $temp_2 = $row['end_time'];
                            
                            $i = 0;
                            
                            for($i=$temp_1 ; $i<$temp2 ; $i++)
                            {
                                array_push($busy_2,$i);
                            }
                        }
                        
                        $tj = array_intersect($busy_2,$duration);
                        
                        if (!empty($tj))
                        {
                            echo "<div class=\"alert alert-danger\"><strong>Executives not Free!</strong>Please Contact your secretary.</div>";
                            die("");
                        }
                        
                        //$query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p1_email."\"," . $date . "," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";
        
                        //$result = mysqli_query($link,$query);
                        
                        $flag_2 = 1;
                    }
                }
                
                if ($p3_email != "")
                {
                    $query   = "SELECT * FROM users where email=\"".$p3_email."\";";
    
                    $result = mysqli_query($link,$query);
                    
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows == 1) 
                    {
                        $query   = "SELECT * FROM meetings where destination=\"".$p3_email."\" AND date =\"".$date."\";";
        
                        $result = mysqli_query($link,$query);
                        
                        while($row = mysqli_fetch_array($result))
                        {
                            $temp_1 = $row['start_time'];
                            $temp_2 = $row['end_time'];
                            
                            $i = 0;
                            
                            for($i=$temp_1 ; $i<$temp2 ; $i++)
                            {
                                array_push($busy_3,$i);
                            }
                        }
                        
                        $tj = array_intersect($busy_3,$duration);
                        
                        if (!empty($tj))
                        {
                            echo "<div class=\"alert alert-danger\"><strong>Executives not Free!</strong>Please Contact your secretary.</div>";
                            die("");
                        }
                        
                        //$query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p1_email."\"," . $date . "," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";
        
                        //$result = mysqli_query($link,$query);
                        
                        $flag_3 = 1;
                    }
                }
                
                if ($flag_1 or $flag_2 or $flag_3)
                {
                    $query  = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$_SESSION['login_user_email']."\",\"" . $date . "\"," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";

                    $result = mysqli_query($link,$query);
                }
                
                if ($flag_1 == 1)
                {
                    
                    $query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p1_email."\",\"" . $date . "\"," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";

                    $result = mysqli_query($link,$query);
                }
                
                if ($flag_2 == 1)
                {
                    $query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p2_email."\",\"" . $date . "\"," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";

                    $result = mysqli_query($link,$query);
                }
                
                if ($flag_3 == 1)
                {
                    $query   = "INSERT INTO meetings(destination,date,start_time,end_time,project_name,id) VALUES(\"".$p3_email."\",\"" . $date . "\"," . $start_time . "," . $end_time . ",\"" .$project_name. "\"," . $id . ");";
                    
                    $result = mysqli_query($link,$query);
                    
                }
                
                echo "<div class=\"alert alert-success\"><strong>Success!</strong> Appointment added.</div>";
                $link->close();
            }
        
            if(isset($_POST['submit']))
            {
                submit();
            } 
			
        ?>
    </body>
</html>