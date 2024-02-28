<?php
session_start();    
include("config.php");

if(isset($_POST["create_taskButton"])){

    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $create_task_query = "INSERT INTO `tasks`(`title`, `description`, `priority`, `due_date`) VALUES ('$title','$description','$priority','$due_date')";
    $create_task_result = mysqli_query($con, $create_task_query);

    if($create_task_result){
            $_SESSION['status'] = "Task Created Successfully!";
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

if(isset($_POST["edit_taskButton"])){

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $edit_task_query = "UPDATE `tasks` SET `title`='$title',`description`='$description',`priority`='$priority',`due_date`='$due_date' WHERE id = '$id'";
    $edit_task_result = mysqli_query($con, $edit_task_query);

    if($edit_task_result){
            $_SESSION['status'] = "Task Updated Successfully!";
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