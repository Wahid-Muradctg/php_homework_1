<?php
session_start();
// info fron form
$title = $_REQUEST['title'];
$description = $_REQUEST['description'];
$date = $_REQUEST['date'];
$errors = [];
// info validation
if (empty($title)) {
    $errors['title_error'] = 'Please Enter The Title';
}elseif(strlen($title) < 3 || strlen($title) > 50) {
    $errors['title_error'] = 'Title shood be more then 3 char and less then 50 cher';
}
if (strlen($description) >200) {
    $errors['description_error'] = 'Your description bellow 200 char';
}
if(count($errors) > 0) {
    $_SESSION['formErrors'] = $errors;
    header('location:../index.php');
}else{
    $quarry = "INSERT INTO `tasks`( `title`, `description`, `date`) VALUES ('$title','$description','$date')";
    include_once "../databse/from-databse.php";
   $res = mysqli_query($db, $quarry);
   if ($res) {
    header("location:../daily-task.php");
   }
}
