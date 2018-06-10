<?php
include_once 'paneladmina.php';
?>

<div class="tabelka" style="position: absolute; top: 20%; left:20%; float: left;">
        <?php
        echo " Twoje dane w systemie: <br> ";
        echo "user id: ".$_SESSION['userid']."<br>";
        echo "imie: ".$_SESSION['fname']."<br>";
        echo "nazwisko: ".$_SESSION['lname']."<br>";
        echo "adres: ".$_SESSION['adress']."<br>";
        echo "telefon: ".$_SESSION['telefonn']."<br>";
        echo "login: ".$_SESSION['loginn']."<br>";
        echo "mail: ".$_SESSION['umail']."<br>";

        ?>
</div>

<?
include_once 'footer.php';
?>
