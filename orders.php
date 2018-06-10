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



$sql = "SELECT id, id_konta, numer_zamowienia, wartosc, data_zlozenia, data_realizacji FROM zamowienie";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    echo "<h1> TABELA REALIZOWANYCH ZAMOWIEN </h1>";
    echo "<table cellpadding=\"2\" border=1>";
    echo "<tr>";
    echo "<td> ID </td>";
    echo "<td> ID_konta </td>";
    echo "<td> NR_zam </td>";
    echo "<td> WARTOSC </td>";
    echo "<td> DATA_ZLOZ </td>";
    echo "<td> DATA_REALIZACJI </td>";
    echo "</tr>";
    while($row = $result->fetch_assoc()) {

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['id_konta']."</td>";
        echo "<td>".$row['numer_zamowienia']."</td>";
        echo "<td>".$row['wartosc']."</td>";
        echo "<td>".$row['data_zlozenia']."</td>";
        echo "<td>".$row['data_realizacji']."</td>";
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
