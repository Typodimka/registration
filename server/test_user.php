<?php


session_start();

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
  
  $result = $mysqli->query("SELECT * FROM userss WHERE login = '$login' ");
  
  $myrow = $result->fetch_assoc();
  
  if (empty($myrow['$Login'])) {
    exit("Введенный логин или пароль не верный.");
  } else {
    if ($myrow['Pass'] == $pass) {
        $_SESSION['login'] = $myrow['Login'];
        $_SESSION['id'] = $myrow['ID'];
        echo "Вы успешно вошли на сайт! <a href='../index.php'>Главная страница</a>";
    }
    else {
        exit("Введеннный логин или пароль не верный");
    }
    
  }
?>