<?php
session_start();

if (isset($_POST['submit']))
{
    include_once 'dbh.inc.php';
    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $psw = mysqli_real_escape_string($conn, $_POST['psw']);

    if (empty($uname) || empty($psw))
    {
        header("Location: ../index.php?login=empty");
            exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE login = '$uname'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1)
        {
            header("Location: ../index.php?login=error1");
            exit();
        }
        else {
            if ($row = mysqli_fetch_assoc($result)) {
                // dehaszowanie
                $hashedPwdCheck = password_verify($psw, $row['haslo']);
                if($hashedPwdCheck == false ){
                    header("Location: ../index.php?login=error2");
                    exit();
                }
                elseif ($hashedPwdCheck == true) {
                    //logowanie usera

                    $_SESSION['userid'] = $row['id_konto'];
                    $_SESSION['fname'] = $row['imie'];
                    $_SESSION['lname'] = $row['nazwisko'];
                    $_SESSION['adress'] = $row['adres'];
                    $_SESSION['telefonn'] = $row['telefon'];
                    $_SESSION['loginn'] = $row['login'];
                    $_SESSION['pwd'] = $row['haslo'];
                    $_SESSION['umail'] = $row['e_mail'];
                    if ($row['id_konto'] >= '21'){             //clients, normalusers
                    header("Location: ../main.php");
                    exit();
                    }
                    elseif ($row['id_konto'] >= '11' && $row['idkonto'] <= '20') {        //workers
                        header("Location: ../paneladmina.php");
                        exit();
                    }
                    elseif ($row['id_konto'] >= '1' && $row['idkonto'] <= '10') {        //superusers
                        header("Location: ../pracownik.php");
                        exit();
                    }

                    else {
                        header("Location: ../index.php?login=error77");
                        exit();
                    }
                }

            }
        }
    }

}
else {

    header("Location: index.php?login=error3");
        exit();

}

?>