<?php
ini_set('include_path', '/opt/lampp/htdocs/content');
include_once 'header.php';


function zarejestruj(){
if (strlen($_POST['login']) <= 25 && strlen($_POST['haslo']) <= 25 && ($_POST['haslo'] == $_POST['haslo2']) && strlen($_POST['email']) >= 1) {
    if ((strlen($_POST['login']) >= 5) && (strlen($_POST['haslo']) >= 6)) {
        $login = strtolower($_POST['login']);
        $login = trim($login);
        $login = mysql_real_escape_string($login);

        $zapytanie = "SELECT login FROM uzytkownicy WHERE login='$login'";
        $wynik = mysql_query($zapytanie);

        if ($wynik && mysql_num_rows($wynik) > 0) {
            $wiadomosc = 'Wybrana nazwa użytkownika jest zajęta';
            return $wiadomosc;
        } else {
            $imie = mysql_real_escape_string($_POST['imie']);
            $nazwisko = mysql_real_escape_string($_POST['nazwisko']);
            $email = mysql_real_escape_string($_POST['email']);
            $haslo = md5($_POST['haslo']);
            $zapytanie = "INSERT INTO uzytkownik (login, haslo, Imie, Nazwisko, email)
							values ('$login', '$haslo', '$imie', '$nazwisko', '$email')";
            $wynik = mysql_query($zapytanie);

            if (!$wynik) {
                $wiadomosc = 'Błąd bazy danych';
                return $wiadomosc;
            } else {
                $wiadomosc = 'Utworzono nowe konto';
                return $wiadomosc;
            }
        }
    } else {
        $wiadomosc = 'Niewłaściwa nazwa użytkownika lub hasło';
        return $wiadomosc;
    }
} else {
    $wiadomosc = 'Proszę poprawnie wypełnić wszystkie pola';
    return $wiadomosc;
}
}

    if (isset($_POST['wyslij']) && $_POST['wyslij'] == 'Wyślij') {
        $wiadomosc = zarejestruj();
        echo $wiadomosc;
    } else {
        echo "W celu założenia konta proszę wypełnić wszystkie pola";
    }
?>

<form action="rejestracja.php" method="Post">
    <h2>Rejestracja</h2>
    <p><input type="text" name="login" maxlength="25" minlength="5" />Login <i>(5-25 znaków)</i></p>
    <p><input type="password" name="haslo" maxlength="25" minlength="6" />Hasło <i>(6-25 znaków)</i></p>
    <p><input type="password" name="haslo2" maxlength="25" />Powtórz hasło</p>
    <p><input type="text" name="imie" maxlength="25" />Imię</p>
    <p><input type="text" name="nazwisko" maxlength="25" />Nazwisko</p>
    <p><input type="text" name="email" maxlength="50" />Email</p>

    <p><input type="submit" name="wyslij" value="Wyślij" />
        <input type="reset" value="Reset" /></p>
    <p><input type="submit" name="wyjdz" value="Wyjdz" /></p>
</form>

<?php include_once 'footer.php'; ?>