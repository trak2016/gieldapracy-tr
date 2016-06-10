<?php
ini_set('include_path', '/opt/lampp/htdocs/content');
include_once 'header.php';

if (isset($_POST['createFirm']) && $_POST['createFirm'] === "CreateFirm") {
    if (!strlen($_POST['firmname']) < 3) {
        $nazwafirmy = mysql_real_escape_string($_POST['firmname']);
        $idwlasciciela = $_SESSION['id_uz'];
        $opisfirmy = mysql_real_escape_string($_POST['describe']);

        $query = "INSERT INTO firma (nazwa_firmy, id_wlasciciela, opis_firmy)
                    VALUES ('$nazwafirmy', '$idwlasciciela', '$opisfirmy')";

        mysql_query($query);

        unset($_SESSION['createfirm']);
        echo "Dodano nową firmę";
    } else {
        echo "Pola wypełnione niepoprawnie";
    }
} else {
    $_SESSION['createfirm'] = true;
    echo "Porszę wypełnić poprawnie wszystkie pola";
}
?>
<form action="#" method="Post">
    <h2>Witaj w panelu tworzenia firmy</h2></br>
    NazwaFirmy <i>(3-25 znaków)</i></br>
    <p><input type="text" name="firmname" maxlength="25" minlength="3" /></p>
    Opisz Firmę:</br>
    <textarea name="describe" rows="10" cols="60">Opis Twojej Firmy</textarea>
    <p><input type="submit" name="createFirm" value="CreateFirm"/>
        <input type="reset" value="Reset" /></p>
    <p><input type="submit" name="wyjdz" value="Wyjdz" /></p>
</form>

<?php include_once 'footer.php'; ?>