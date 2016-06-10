<?php
$query = "SELECT * FROM oferta_pracy";

$result = mysql_query($query);
if (!$result <= 0) {
    ?>
    <h1>Oferty Pracy:</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-inverse" style="background-color: #262626; color:white;"><tr><th>Firma:</th><th><b>Nazwa Oferty:</b></th><th><b>Opis Oferty:</b></th><th><b>Kategorie:</b></th></tr></thead><tbody>
            <?php
            while ($row = mysql_fetch_array($result)) {
                $id = $row['Id_firmy'];
                $query = "SELECT nazwa_firmy FROM firma WHERE id_firmy = $id";
                $firmname = mysql_result(mysql_query($query), 0);
                echo "<tr><td>$firmname</td><td>$row[tytul_oferty]</td><td>$row[opis_oferty]</td><td>$row[kategorie]</td></tr>";
            }
        } else {
            echo"Błąd bazy danych";
        }
        ?>

    </tbody></table>