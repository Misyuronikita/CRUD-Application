<?php include 'header.html' ?>
<?php include 'db.php' ?>
<?php include 'footer.html'?>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM `students` WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query failed" . mysqli_error());
    }
    else{
        $row = mysqli_fetch_row($result);
    }
}
?>

<?php
if(isset($_POST['update_students'])){
    $id = $_GET['id_new'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $age = $_POST['age'];

    $query = "UPDATE `students` 
              SET `first_name`='$first_name', `last_name`='$last_name', `age`=$age
              WHERE `id` = $id";
    $result = mysqli_query($connection, $query);
    if(!$result){
        die("Query Failed".mysqli_error());
    }
    else{
        header('Location:index.php?update_msg=Пользователь успешно обновлён');
    }
}
?>

<form action="update_main_page.php?id_new=<?php echo $id?>" method="post">
    <div class="form-group">
        <label for="first_name">Имя</label>
        <input type="text" name="first_name" class="form-control" value="<?=$row[1]?>">
    </div>
    <div class="form-group">
        <label for="last_name">Фамилия</label>
        <input type="text" class="form-control" name="last_name" value="<?=$row[2]?>">
    </div>
    <div class="form-group">
        <label for="age">Возраст</label>
        <input type="number" class="form-control" name="age" value="<?=$row[3]?>">
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" name = "update_students" value="Обновить">
    </div>
</form>



