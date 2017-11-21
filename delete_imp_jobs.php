<?php

    $link = mysqli_connect("localhost", "root", "", "TMS_DB");
    if($link === false)
    {
        echo "<div class=\"alert alert-danger\"><strong>Error!</strong>Could not connect. ".mysqli_error($link)."</div>";
        die("");
    }
    
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM imp_jobs WHERE id=" . $id.";"; 
    
    if($link->query($sql) === TRUE)
    {
        header("Location: show_imp_jobs_ee.php");
        die("");
    } 
    else 
    {
        echo "Error deleting record; ". $link->error;
    }
    
?>