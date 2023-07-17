<?php
    require_once 'pdo.php';
    $categoryConnection = new CategoryConnection();

    $id = ['id' => $_GET['id']];
    $name = $_POST['name'];
    $data = [
        'id' => $id['id'],
        'name' => $name
    ];
    $categoryConnection->updateData($data);
    header("Location: http://localhost/phantichthietke/day11/category/index.php");
?>