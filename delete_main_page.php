<?php include 'db.php'?>
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE 
              FROM `students`
              WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    else{
        header('Location:index.php?delete_msg=Пользователь успешно удален');
    }
}
?>
