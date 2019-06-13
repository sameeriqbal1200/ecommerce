<?php
// include 'header.php'; 
include('../db_connection/connection.php');


//delete function.
$editresult = mysqli_query($database, "SELECT * FROM slider");

if(isset($_GET['id'])){

    $id = (int)$_GET['id'];

    $query = "DELETE FROM slider WHERE id =" . $id;
}else{
    echo 'No id set';
}

//query execution
$result = mysqli_query($database,$query);

//display message to user 
if($result){
    $_SESSION['success_message'] = 'User data deleted successfully';
    header('Location: index.php');
}else{
    $_SESSION['error_message'] = 'User data couldnot be deleted';
    header('Location: index.php');
}

if (isset($_POST['delete'])) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	$button_text = $_POST['button_text'];
	$button_url = $_POST['button_url'];
	$status = $_POST['status'];
}

?>