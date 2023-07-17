<?php
    require_once 'pdo.php';
    $categoryConnection = new CategoryConnection();

    $id = $_POST['id'];
    $data = [
        'id' => $id
    ];
    $categoryConnection->deleteData($data);

    header("Location: http://localhost/phantichthietke/day11/category/index.php");
?>