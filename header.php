<?php

session_start();
?>
<!DOCTYPE html>
<html>


<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta name="author" content="PioseushTeam">
<meta name="description" content="Monitoring zamówień.">
<meta NAME="Language" CONTENT="pl">
<meta name="owner" content="sklep">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="styles.css" rel="stylesheet" type="text/css">

</head>
<body>
<header>
<div style="text-align: center; margin-left: auto; margin-right: auto"><img src="img/applogo.jpg" alt="logo" style="display: block; margin-left: auto; margin-right: auto; max-width: 200px;"></img>


<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Logowanie</button> </div>

<div id="id01" class="modal">

  <form class="modal-content animate" action="includes/login.inc.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/applogo.jpg" alt="logo" class="avatar" style="width: 200px; height: 200px">
    </div>

    <div class="container">
      <label><b>Użytkownik</b></label>
      <input type="text" placeholder="nazwa uzytkownika" name="uname" required>

      <label><b>Haslo</b></label>
      <input type="password" placeholder="haslo" name="psw" required>

      <button type="submit" name="submit">Zaloguj</button>

    </div>


    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Anuluj</button>
      <span class="psw"> <a href="signup.php"> Chcesz założyć konto?</a></span>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</header>