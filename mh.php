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
    <div class="header">
<?php
if (isset($_SESSION['userid']))
{
  echo '<form action="includes/logout.inc.php" method="POST">
  <button type="submit" name="submit" style="width: 90px; float: right;">Wyloguj</button>
  </form>';
}

else {
echo 'jakiś error';

}

?>
<div class="sidenav" id="sidebar">

<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
<a href="#menu"> Menu: </a>
<a href="sth.php"> dokumenty </a>
  <a href="clientorders.php">zamowienia</a>
  <a href="konto.php">konto</a>
  <a href="kontakt.php">kontakt</a>
</div>
<button type="submit" name="submit" style="width: 90px; float: left;" onclick="openNav()">Menu</button>

</div>
<script>
function openNav() {
    document.getElementById("sidebar").style.width = "160px";

}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
}
</script>

<div class="main">



</div>
</header>