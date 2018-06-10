<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginpioseush";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// echo '<a class="btn btn-danger" href="delete.php?id='.$row['id_konto'].'">D</a>';

// sql to delete a record
$sql = "DELETE FROM users WHERE id_konto='" . $_GET["id_konto"] . "'";

if ($conn->query($sql) === TRUE) {


    header("Location: pracownik.php?delete=correct");
} else {


    header("Location: pracownik.php?delete=error&!@#tryagain");
}

?>

