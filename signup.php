<?php
    include_once 'paneladmina.php';
?>

    <form id="ktk" class="signup-form" action="../includes/signup.inc.php" method="POST">
        <input type="text" name="id_konto" placeholder="id_konta">
        <input type="text" name="imie" placeholder="imie">
        <input type="text" name="nazwisko" placeholder="nazwisko">
        <input type="text" name="adres" placeholder="adres" >
        <input type="text" name="telefon" placeholder="telefon">
        <input type="text" name="login" placeholder="login" >
        <input type="text" name="haslo" placeholder="haslo" >
        <input type="text" name="e_mail" placeholder="e_mail" >
    <button type="submit" name="submit">Załóż konto</button>
</form>


<?php

include_once 'footer.php';

?>

