<?php
include_once 'p1.php';
?>

<div class="tabelka" style="position: absolute; top: 20%; left:20%; float: left;">
<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "loginpioseush";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



$sql = "SELECT id_konto, imie, nazwisko, login, e_mail, telefon FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1> TABELA UZYTKOWNIKOW </h1>";
    echo "<table cellpadding=\"2\" border=1>";
    echo "<tr>";
    echo "<td> ID KONTO </td>";
    echo "<td> IMIE </td>";
    echo "<td> NAZWISKO </td>";
    echo "<td> LOGIN </td>";
    echo "<td> MAIL </td>";
    echo "<td> TELEFON </td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>".$row['id_konto']."</td>";
        echo "<td>".$row['imie']."</td>";
        echo "<td>".$row['nazwisko']."</td>";
        echo "<td>".$row['login']."</td>";
        echo "<td>".$row['e_mail']."</td>";
        echo "<td>".$row['telefon']."</td>";
        echo "</tr>";
    } 
    echo "</table>";
} else {
    echo "0 results";
}

?>
</div>

<?
include_once 'footer.php';
?>
