<?php include 'header.html' ?>
<?php include 'db.php' ?>
    <div class="wrap-1">
        <div class="wrapp-1__item">
            <h2 id="main_sub_title">Список студентов</h2>
        </div>
        <div class="wrapp-1__item">
            <button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Добавить студента</button>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Возраст</th>
            <th>Обновление</th>
            <th>Удаление</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = "SELECT * FROM `students`";
        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error());
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['first_name'] ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['age'] ?></td>
                    <td><a href="update_main_page.php?id=<?= $row['id'] ?>" class="btn btn-success">Обновить</a></td>
                    <td><a href="delete_main_page.php?id=<?= $row['id'] ?>" class="btn btn-danger">Удалить</a></td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>

<?php
if (isset($_GET['message'])){
    echo "<h6 id='error-message'>".$_GET['message']."</h6>";
}
if(isset($_GET['insert_msg'])){
    echo "<h6 id='success-message'>".$_GET['insert_msg']."</h6>";
}
if(isset($_GET['update_msg'])){
    echo "<h6 id='update-message'>".$_GET['update_msg']."</h6>";
}
if(isset($_GET['delete_msg'])){
    echo "<h6 id='delete-message'>".$_GET['delete_msg']."</h6>";
}
?>

<?php include 'modal.html' ?>
<?php include 'footer.html' ?>