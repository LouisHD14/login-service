<?php 

require 'db_conn.php';

if(isset($_GET['Del']))
{
    $UserID = $_GET['Del'];
    $query = "DELETE FROM users WHERE id = '".$UserID."'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        header("location:admin.php");
    }
    else
    {
        echo 'Please Check Your Query';
    }
}
else
{
    header("location:admin.php");
}

?>