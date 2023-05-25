<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/login.css" type="text/css" media="screen">
</head>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
if (isset($_POST['login'])) //если на входе есть логин 
{
    $login = addslashes($_POST['login']);
    unset($_GET['action']);//убираем аттрибут action (не помню зачем)
    require_once($_SERVER['DOCUMENT_ROOT'].'/db.php');
    $mysqli = new Database();// создаем новый класс дб 
    $mysqli->getConnection();// подключаемся к ДБ
   // var_dump($_Session);
    $sql = "SELECT * FROM Account WHERE login='$login'"; //запрос на вывод данных аккаунта
    $mysqli->runQuery($sql); //записываем в $mysqli массив массивов из getArray($sql) 
    if ($mysqli->num_rows) //если в $mysqli записалась строка, значит, что аккаунт уже существует
    {
        $error = "Login has already been registered";
    }
    else //если нет, то создаем запрос на вставку в ДБ
    {//запрос
        $sql = "INSERT INTO Account (Login, Name, Surname, PhoneNumber, Email, Password) VALUES 
        (
            '".addslashes($_POST['Login'])."',
            '".addslashes($_POST['Name'])."',
            '".addslashes($_POST['Surname'])."',
            '".addslashes($_POST['PhoneNumber'])."',
            '".addslashes($_POST['Email'])."',
            '".md5($_POST['Password'])."'
        )";//addslashes убирает спецзнаки из переменной внутри, полученной из ввода через POST, чтобы грамотно записать их в ДБ через sql запрос
        //md5 хеширует пароль и вводит его в ДБ через sql запрос
        $mysqli->runQuery($sql); // вводит sql запрос
    }
}else
{
    session_destroy(); // если на входе нет логина, то закрываем сессию
    unset($_SESSION);//освободжаем массив session, освобождаем кеш от удаленной сессии
}
?>
<body class="align">
  <div class="grid align__item">
    <div class="register">
      <h2>
        <?php if (isset($_GET['action']) && $_GET['action'] == 'log') { ?>
          Login
        <?php } else { ?>
          Sign up
        <?php } ?>
      </h2>
      <!-- если атррибут action существуит и равен log, то переходим на index.php. вопр. знак - тернальный иф, другая запись -->
      <form <?= isset($_GET['action']) && $_GET['action'] == 'log' ? 'action="index.php"' : '' ?> method="post" class="form">
        <div class="form__field">
          <p>Login</p>
          <input name="Login" type="text" required="required">
        </div>
        <?php if (!isset($_GET['action']) || $_GET['action'] != 'log') { ?>
          <div class="form__field">
            <p>First Name</p>
            <input name="Name" type="text" required="required">
          </div>
          <div class="form__field">
            <p>Last Name</p>
            <input name="Surname" type="text" required="required">
          </div>
          <div class="form__field">
            <p>Phone number</p>
            <input name="PhoneNumber" type="text" required="required">
          </div>
          <div class="form__field">
            <p>Email</p>
            <input name="Email" type="email" required="required">
          </div>
        <?php } ?>
        <div class="form__field">
          <p>Password</p>
          <input name="Password" type="password" required="required">
        </div>
        <div class="form__field">
          <input type="submit" onclick="reloadPage();"
            <?php if (isset($_GET['action']) && $_GET['action'] == 'log') { ?>
              value='Login'
            <?php } else { ?>
              value='Sign up'
            <?php } ?>>
        </div>
      </form>
      <div class="but">
        <!-- если action == log то мы возвращаемся обратно в sign in -->
        <?php if (isset($_GET['action']) && $_GET['action'] == 'log') { ?> 
          <a href="?">Back to sign up</a>
        <?php } else { ?>
           <!-- если action не == log то мы возвращаемся sign up -->
          <a href="?action=log">Already have an account?</a>
        <?php } ?>
      </div>
    </div>
  </div>
</body>
<script>
function reloadPage() {
  location.reload();
}
         </script>   
</html>