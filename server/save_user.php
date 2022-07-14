<?php


if (isset($_POST['login'])) {
  $login = $_POST['login'];
  if ($login == '') {
    unset($login);
  }
}

if (isset($_POST['pass'])) {
  $pass = $_POST['pass'];
  if ($login == '') {
    unset($pass);
  }
}

if (empty($login) or empty($pass)) {
  exit("Вы не ввели логин или пароль!");
}

include("../server/dbconnect.php");

$result = $mysqli->query("SELECT ID FROM userss WHERE login = '$login' ");

$myrow = $result->fetch_assoc();

if (!empty($myrow['ID'])) {
  exit("Введенный логин уже зарегистрован.");
}

$result2 = $mysqli->query("INSERT INTO userss (Login, Pass) VALUES ('$login','$pass') ");

if ($result2 = 'TRUE') {
  echo "Вы успешно зарегистровались";
} else {
  echo "Ошибка, вы не зарегистрированы";
}
?>