<?php
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "login" ){
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

if (isset($_REQUEST['action']) && $_REQUEST['action'] == "login" )
{
$bd = new mysqli("localhost" , "root", "", "auth");
$email = $_REQUEST['email'];
$email = filter_var($email , FILTER_SANITIZE_EMAIL);
$password = $_REQUEST['password'];
$passwordReapeat = $_REQUEST['passwordRepeat'];

if($password == $passwordReapeatd );
}
$q = $db->prepare("INSERT INTO user VALUES (NULL,? , ? )");
$passwordHash = password_hash($password, PASSWORD_ARGON2I); 
$q->bind_praram("ss , $email , $passwordHash");
$result = $q->execute();
if($result){
    echo "Konto utworzone popawnie";

}else{
    echo "coś poszło nie tak";
}

}else{
    echo "hasła nie są zgodne - spróbuj ponownie";
}





?>

<form action="user.php"method="post">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput">
<label for="passwordInput">Hasło; </label>
<input type="password" name="password" id="passwordInput">
<input type="hidden" name="action" value="login">
<input type="submit" value="Zaloguj">

</form>

<h1>Zarajestruj się </h1>
<form action="user.php"method="post">
<label for="emailimput">Email:</label>
<input type="email" name="email" id="emailimput">
<label for="passwordInput">Hasło; </label>
<input type="password" name="password" id="passwordInput">
<label for="passwordRepeatInput">Hasło Ponownie</label>
<input type="password" name="passwordRepeat" id="passwordRepeatInput">
<input type="hidden" name="action" value="register">
<input type="submit" value="Zarejestruj">
   46 minuta
</form>