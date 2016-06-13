<?php
ini_set('include_path', '/opt/lampp/htdocs/content');
include_once 'header.php';

echo "<h1>Profil Użytkownika</h1>";
if (isset($_POST['passworldChange']) && $_POST['passworldChange'] === "Zmień Hasło") {
    if ($_POST['passworldnew1'] === $_POST['passworldnew2']) {
        if (md5($_POST['passworldold']) == mysql_result(mysql_query("SELECT haslo FROM uzytkownik WHERE id_uz = $_SESSION[id_uz]"), 0)) {
            $password = md5($_POST['passworldnew1']);
            $query = "UPDATE uzytkownik SET haslo='$password' WHERE id_uz = $_SESSION[id_uz];";
            $result = query($query);
            echo "Hasło zmienione";
        } else {
            echo "Podano błędne hasło";
        }
    } else {
        echo "Hasła się nie zgadzają";
    }
} else {
    echo "<p>Formularz zmiany hasła</p><p>Wypełnij wszystkie pola aby zmienić hasło</p>";
}
?>


<form action="profile.php" method="Post">

    <p>Wprowadź obecne hasło:</br><input type="password" name="passworldold"></p>
    <p>Wprowadź nowe hasło:</br><input type="password" name="passworldnew1"><i>(6-25 znaków)</i></p>
    <p>Powtórz nowe hasło:</br><input type="password" name="passworldnew2"> </p>
    <p><input class="btn btn-success" type="submit" name="passworldChange" value="Zmień Hasło"></p>
</form>
<?php include_once 'footer.php'; ?>