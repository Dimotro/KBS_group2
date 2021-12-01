<?php
include "header.php";
?>
<div id="CenteredContent">
    <h1>Inloggen</h1>

<form method="POST">
    <label for="email">Emailadres:</label>
    <input type="text" placeholder="example@email.com" name="email" id="email" required>
    <br>
    <label for="wachtwoord">Wachtwoord:</label>

    <input type="password" name="wachtwoord" id="wachtwoord" required>

    <button type="submit" name="submit"class="btn  mt-2 btn-primary">Log In</button>
    <br>
    <a href="/register" class="HrefDecoration">Ik heb nog geen account</a>
</form>

<?php
if (isset($_GET["login"])){
    if ($_GET["username"] == "inkoper" && $_GET["password"] == "spekkoper"){
        $_SESSION["ingelogd"] = TRUE;
        print "U bent ingelogd";
        $_SESSION["username"] = $_GET["username"];
    }else{
        $_SESSION["ingelogd"] = FALSE;
        print "De inlog gegevens zijn fout";
    }
}
?>

