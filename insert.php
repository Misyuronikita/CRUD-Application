<?php
include 'db.php';
if(isset($_POST['add_students'])){
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $age = $_POST['age'];

    if(empty($firstName)){
        header('location:index.php?message=Необходимо заполнить поле "Имя"!');
    }
    elseif (empty($lastName)){
        header('location:index.php?message=Необходимо заполнить поле "Фамилия"!');
    }
    elseif(empty($age)){
        header('location:index.php?message=Необходимо заполнить поле "Возраст"!');
    }
    else{
        $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$firstName', '$lastName', '$age')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        if(!$result){
            die("Query failed" . mysqli_error());
        }
        else{
            header ('Location:index.php?insert_msg=Студент успешно добавлен');  // перенаправление на нужную страницу
        }


    }
}
