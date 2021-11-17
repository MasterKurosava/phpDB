<?php
  include "connectDB.php";
  if(isset($_POST['registerSubmit'])){
    $errs=[];
    if(!preg_match("/^[a-zA-Z0-9]+$/",$_POST['login'])){
        $errs[] = "Логин может состоять только из букв английского алфавита и цифр";
    } 
    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30){
        $errs[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    } 
    if(strlen($_POST['password']) < 3 or strlen($_POST['password']) > 30){
      $errs[] = "Пароль должен быть не меньше 3-х символов и не больше 30";
  }
    
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0){
        $errs[] = "Пользователь с таким логином уже существует в базе данных";
    }
    if(count($errs)==0){
      $login=$_POST['login'];
      $password=md5(md5(trim($_POST['password'])));
      mysqli_query($link,"INSERT INTO users SET user_login='".$login."', user_hash='".$password."'");
    } 
  }

?>
<h1 class="titleMsg">Зарегистрируйтесь</h1>
<form class="register" method="post">
  <input class="login"  name="login"  type="text" placeholder="Логин" maxlength="30"/>
  <input class="password" name="password" type="password" placeholder="Пароль" maxlength="30"/>
  <input class="registerBtn" type="submit" name="registerSubmit" value="Зарегистрироваться" maxlength="30"/>
</form>
<?php
  if(count($errs)){
    foreach($errs as $err){
      echo "<span>$err</span><br/>";
    }
  }
?>