<?php

session_start();
include("config.php");

if (isset($_GET['id'])) {
    
    $id = $_GET['id'];

    $delete_task_query = "DELETE FROM `tasks` WHERE id = '$id'";
    $delete_task_result = mysqli_query($con, $delete_task_query);

    if($delete_task_result){
            $_SESSION['status'] = "Task Deleted Successfully!";
            $_SESSION['status_code'] = "success";
            header("Location: index.php");
            exit();
    }else{
        $_SESSION['status'] = "Error";
        $_SESSION['status_code'] = "error";
        header("Location: index.php");
        exit();
    }
}

?>