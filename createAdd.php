<?php
ini_set('include_path', '/opt/lampp/htdocs/content');
include_once 'header.php';

if (isset($_POST['createAdd']) && $_POST['createAdd'] === "CreateAdd" && isset($_SESSION['zalogowano']) == true) {
    if ((strlen($_POST['addName']) >= 6) && (!empty($_POST['categories']))) {
        $addName = mysql_real_escape_string($_POST['addName']);
        $firmId = mysql_real_escape_string($_POST['checkedFirm']);
        $addDescribe = mysql_real_escape_string($_POST['describeAdd']);
        foreach ($_POST['categories'] as $check) {
            @$POSTcategories .= mysql_real_escape_string($check);
        }

        $query = "INSERT INTO oferta_pracy (tytul_oferty, id_firmy, opis_oferty, kategorie)
                    VALUES ('$addName', '$firmId', '$addDescribe' , '$POSTcategories')";

        mysql_query($query);

        echo "Dodano nową ofertę";
    } else {
        echo "Pola wypełnione niepoprawnie. Wybierz przynajmniej jedną kategorię.";
    }
} else {
    echo "Proszę wypełnić poprawnie wszystkie pola lub się zalogować.";
}
?>
<form action="createAdd.php" method="Post">
    <h2>Witaj w panelu tworzenia Oferty Pracy</h2></br>

    <?php
    $idwlasciciela = @$_SESSION['id_uz'];
    $query = "SELECT * FROM firma WHERE id_wlasciciela = $idwlasciciela";
    $firms = mysql_query($query);
    if (!$firms <= 0) {
        echo "Wybierz firmę do której ma należeć oferta: </br>";
        ?><select class="selectpicker" name="checkedFirm"><?php
            while ($row = mysql_fetch_array($firms)) {
                $addfirms = <<< EOADD
<option value="$row[id_firmy]">   $row[nazwa_firmy]</option></br>
EOADD;
                echo $addfirms;
            }
            ?> <select></br><?php
            } else {
                echo "<p>Brak firm. Proszę pierwsze stworzyć Firmę.</p>";
            }
            ?>
            </br>

            Nazwa Ogłoszenia <i>(6-25 znaków)</i></br>
            <p><input type="text" name="addName"/></p>
            Opisz Ofertę Pracy:</br>
            <textarea name="describeAdd" rows="10" cols="60">Opis Twojej Oferty</textarea>
            <fieldset>
                <legend>Wybierz Kategorie oferty pracy:</legend>
                <?php
                $file = file_get_contents("categories.txt");
                $categories = explode(",", $file);

                foreach ($categories as $category) {
                    $printcategory = <<< EOCAT
<input type="checkbox" name="categories[]" value="$category">   $category</br>
EOCAT;
                    echo $printcategory;
                }
                ?>
            </fieldset></br>
            <p><input class="btn btn-success" type="submit" name="createAdd" value="CreateAdd"/>
                <input class="btn btn-danger" type="reset" value="Reset" /></p>
            </form>
<p><a class="btn btn-warning" href="index.php"/>Wyjdź</a></p>

            <?php include_once 'footer.php'; ?>