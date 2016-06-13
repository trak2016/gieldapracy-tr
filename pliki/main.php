<?php
if (isset($_POST['wyjdz']) && $_POST['wyjdz'] === "Wyjdz") {
    cleanSession();
}
?>
<div class="container-fluid">
    <h1>Witaj na giełdzie pracy</h1></br>
    <div class="row">
        <?php
        if (!isset($_SESSION['zalogowano'])) {
            ?>
            <div class="col-md-6">
                <p class="alert alert-success">Proszę się zalogować</p>
            </div>
        <?php } else { ?>
            <div class="col-md-6">
                <form method="post" action="createFirm.php">
                    <input class="btn btn-success btn-block" type="submit" name="nowafirma" value="Dodaj Firmę">
                </form>
                </br></br>
                <form method="post" action="createAdd.php">
                    <input class="btn btn-success btn-block" type="submit" name="noweogloszenie" value="Stwórz Ogłoszenie">

                </form>                
            </div>
        <?php } ?>
        <div class="col-md-6">        
            <form method="post" action="index.php">
                <input class="btn btn-primary" type="submit" name="showFirms" value="Wyświetl Firmy">
                <input class="btn btn-primary" type="submit" name="showAdds" value="Wyświetl Oferty">

                <fieldset style="float:right;">
                    <input class="btn btn-primary" type="submit" name="searchByCategory" value="Szukaj wg. Kategorii"></br>
                    <?php
                    $file = file_get_contents("categories.txt");
                    $categories = explode(",", $file);

                    foreach ($categories as $category) {
                        $printcategory = <<< EOCAT
<input type="checkbox" name="categories[]" value="$category">   $category</br>
EOCAT;
                        echo $printcategory;
                    }
                    ?></fieldset>
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
