<nav class="navbar navbar-inverse container-fluid" >
    <div class="navbar-header">
        <img class="navbar-brand" src="https://www.icon.com.mt/wp-content/uploads/2014/10/work1.png">
        <a href="index.php" class="navbar-brand">Giełda Pracy</a>
    </div>

    <?php
    if (!isset($_SESSION['zalogowano'])) {
        if (isset($_POST['zaloguj']) && $_POST['zaloguj'] == "Zaloguj") {
            if (isset($_POST['username']) && isset($_POST['password'])) {
                $username = mysql_real_escape_string($_POST['username']);
                $password = md5($_POST['password']);
                $zapytanie = mysql_query("SELECT id_uz, Imie, Nazwisko FROM uzytkownik WHERE login='$username' AND haslo='$password'");

                $dane_uzytkownika = mysql_fetch_array($zapytanie);
                $n = mysql_num_rows($zapytanie);
                if ($n == 1) {
                    $_SESSION['id_uz'] = $dane_uzytkownika['id_uz'];
                    $_SESSION['Imie'] = $dane_uzytkownika['Imie'];
                    $_SESSION['Nazwisko'] = $dane_uzytkownika['Nazwisko'];
                    $_SESSION['zalogowano'] = true;
                } else {
                    echo "<div id=\"login-error\">Błędna nazwa użytkownika lub hasło</div>";
                }
            }
        }
    } else {
        if (isset($_POST['wyloguj']) && $_POST['wyloguj'] == "Wyloguj") {
            unset($_SESSION['id_uz']);
            unset($_SESSION['imie']);
            unset($_SESSION['nazwisko']);
            unset($_SESSION['zalogowano']);
        }
    }

    if (!isset($_SESSION['zalogowano'])) {
        ?>
        <form method="post" action="#" class="navbar-brand">
            <input type = "text" name = "username" placeholder = "Login">
            <input type = "password" name = "password" placeholder = "Hasło">
            <input type="submit" name="zaloguj" value="Zaloguj" />
        </form>
        <form method="post" action="#" class="navbar-brand">
            <input type="submit" name="zarejestruj" value="Zarejestruj" />
        </form>
        <?php
    } else {
        ?>
        <a href="Profil">Profil</a>
        <form method="post" action="#" class="navbar-brand">
            <input type="submit" name="wyloguj" value="Wyloguj"/>
        </form>

    <?php } ?>

</nav>
