<?php
    if (isset($_POST['zarejestruj']) && $_POST['zarejestruj'] == "Zarejestruj") {
        include_once 'rejestracja.php';
    }  else {
?>


<div class="container-fluid">
    <h1>Witaj na giełdzie pracy</h1>
    <div class="row">
        <div class="col-md-4">
            <p>Wyświetl Firmy</p>
        </div>

        <div class="col-md-4">
            <p>Wyświetl Oferty</p>
        </div>

        <div class="col-md-4">
            <p>Szukaj wg Kategorii</p>
        </div>

    </div>
</div>
<?php } ?>