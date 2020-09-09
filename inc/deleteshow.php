<?php
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    require('db.php');

    $sql = "DELETE FROM shows WHERE id={$id}";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../index.php?success=deleted');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    header('Location: ../index.php');
}