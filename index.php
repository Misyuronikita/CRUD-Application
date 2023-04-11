<?php include 'header.php' ?>
<?php include 'db.php' ?>
    <div class="wrap-1">
        <div class="wrapp-1__item">
            <h2 id="main_sub_title">All students</h2>
        </div>
        <div class="wrapp-1__item">
            <button class="btn btn-primary">Добавить студента</button>
        </div>
    </div>
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Фамилия</th>
            <th>Имя</th>
            <th>Возраст</th>
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
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
<?php include 'footer.php' ?>