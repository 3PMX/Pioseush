<?php

if (isset($_POST['submit'])) {
include_once '../includes/dbh.inc.php';
$idkonta = mysqli_real_escape_string($conn, $_POST['id_konto']);
$fname = mysqli_real_escape_string($conn, $_POST['imie']);
$lname = mysqli_real_escape_string($conn, $_POST['nazwisko']);
$adress = mysqli_real_escape_string($conn, $_POST['adres']);
$phonenumber = mysqli_real_escape_string($conn, $_POST['telefon']);
$login = mysqli_real_escape_string($conn, $_POST['login']);
$pwd = mysqli_real_escape_string($conn, $_POST['haslo']);
$mail = mysqli_real_escape_string($conn, $_POST['e_mail']);
}
//error handling

if(empty($idkonta) || empty($fname) || empty($lname) || empty($adress) || empty($phonenumber) || empty($login) || empty($pwd) || empty($mail) )
{
    header("Location: signup.php?signup=empty");
    exit();

}
else {
//sprawdz poprawnosc inputow

    if(!preg_match("/^[0-9]*$/", $idkonta) || !preg_match("/^[a-zA-Z]*$/", $fname) ) {
        header("Location: signup.php?signup=invalid");
        exit();
    }
    //else {
//sprawdz mail
//if (filter_var($mail, FILTER_VALIDATE_EMAIL))
//{
 //   header("Location: signup.php?signup=email");
 //   exit();

//}
else {
$sql = "SELECT * FROM users WHERE id_konto = 'idkonta'";
$result = mysqli_query($conn, $sql);
$resultCheck = mysqli_num_rows($result);

if($resultCheck > 0) {
    header("Location: ../signup.php?signup=usertaken");
    exit();
}
else {
    //haszowanie
    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
    //dołóż usera do bazy
    $sql = "INSERT INTO users (id_konto, imie, nazwisko, adres, telefon, login, haslo, e_mail)
     VALUES ('$idkonta', '$fname', '$lname', '$adress', '$phonenumber', '$login', '$hashedpwd', '$mail');";
   $result = mysqli_query($conn, $sql);
    header("Location: ../signup.php?signup=success");
    exit();
}
}

    }




