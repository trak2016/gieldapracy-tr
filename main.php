<?php
if (isset($_POST['wyjdz']) && $_POST['wyjdz'] === "Wyjdz") {
    unset($_SESSION['rejestruj']);
    unset($_SESSION['createfirm']);
    unset($_SESSION['createadd']);
    
}
if ((isset($_POST['zarejestruj']) && $_POST['zarejestruj'] === "Zarejestruj") || isset($_SESSION['rejestruj'])) {
    include_once 'rejestracja.php';
    $wiadomość = rejestracjaWyślij();
    echo $wiadomość;
} elseif ((isset($_POST['nowafirma']) && $_POST['nowafirma'] === "Dodaj Firmę") || isset($_SESSION['createfirm']) && isset($_SESSION['zalogowano'])) {
    include_once 'createFirm.php';
    $wiadomość = createFirm();
    echo $wiadomość;
} elseif ((isset($_POST['noweogloszenie']) && $_POST['noweogloszenie'] === "Stwórz Ogłoszenie") || isset($_SESSION['createadd']) && isset($_SESSION['zalogowano'])) {
    include_once 'createAdd.php';
    $wiadomość = createAdd();
    echo $wiadomość;
} else {
    ?>
    <div class="container-fluid">
        <h1>Witaj na giełdzie pracy</h1>
        <div class="row">
            <?php
            if (!isset($_SESSION['zalogowano'])) {
                ?>
                <div class="col-md-6">
                    <p>Proszę się zalogować</p>
                </div>
            <?php } else { ?>
                <div class="col-md-6">
                    <form method="post" action="#">
                        <input type="submit" name="nowafirma" value="Dodaj Firmę">
                        <input type="submit" name="noweogloszenie" value="Stwórz Ogłoszenie">
                    </form>
                </div>
            <?php } ?>
            <div class="col-md-6">        
                <form method="post" action="#">
                    <input type="submit" name="showFirms" value="Wyświetl Firmy">
                    <input type="submit" name="showAdds" value="Wyświetl Oferty">
                    <input type="submit" name="searchByCategory" value="Szukaj wg. Kategorii">
                </form>
                <?php
                if (isset($_POST['showFirms']) && $_POST['showFirms'] === "Wyświetl Firmy") {
                    include_once 'showFirms.php';
                } elseif (isset($_POST['showAdds']) && $_POST['showAdds'] === "Wyświetl Oferty") {
                    include_once 'showAdds.php';
                } elseif (isset($_POST['searchByCategory']) && $_POST['searchByCategory'] === "Szukaj wg. Kategorii") {
                    include_once 'showAdds.php';
                }
                ?>
            </div>


        </div>
    </div>
<?php } ?>