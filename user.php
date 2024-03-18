<?php
if (isset($_REQUEST['email']) && isset( $_REQUEST['password'])){
//$password = "tajnehasło";
//$hash = password_hash($password, PASSWORD_ARGON2I);
//echo $hash;
$email= $_REQUEST['email'];
$password = $_REQUEST['password'];
$email = filter_var($email , FILTER_SANITIZE_EMAIL);

$bd = new mysqli("localhost" , "root", "", "auth");

$q = $db ->prepare("SELECT * FROM user WHERE eamil = ? LIMIT 1  ");
$q ->bind_param("s", $email);
$q ->execute();
$result = $q->get_result();

$userRow = $result->fetch_assoc();
if($userRow == null ){
    echo "błąd w logowaniu debilu <br>";
}else {
    //konto istnieje
    if (password_verify($password, $userRow, ['passwordHash'])){

        echo "zalogowano poprawnie <br>";
    }else{
         echo"błąd w logowaniu debilu <br>";
    }
}
}





?>

<form action="user.php"method="post">
<label for="emailimput">Email:</label>
<input type="email" name="email" id="emailimput">
<label for="passwordinput">Hasło; </label>
<input type="password" name="password" id="passwordimput">
<input type="submit" value="Zaloguj">

</form>

<h1>Zarajestruj się </h1>
<form action="user.php"method="post">
<form action="user.php"method="post">
<label for="emailimput">Email:</label>
<input type="email" name="email" id="emailimput">
<label for="passwordRepeat">Hasło; </label>
<input type="password" name="password" id="passwordRepeat">
<input type="submit" value="Zaloguj">
   
</form>