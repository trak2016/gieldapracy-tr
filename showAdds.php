OFERTY PRACY: </br>
<?php
$query = "SELECT * FROM oferta_pracy";

$result = mysql_query($query);
if (!$result <= 0) {
    ?>
    <table class="table">
        <tr><td><b>Firma:</b></td><td><b>Nazwa Oferty:</b></td><td><b>Opis Oferty:</b></td><td><b>Kategorie:</b></td></tr>
        <?php
        while ($row = mysql_fetch_array($result)) {
            $id = $row['Id_firmy'];
            $query = "SELECT nazwa_firmy FROM firma WHERE id_firmy = $id";
            $firmname = mysql_result(mysql_query($query),0);
            echo "<tr><td>$firmname</td><td>$row[tytul_oferty]</td><td>$row[opis_oferty]</td><td>$row[kategorie]</td></tr>";
        }
    } else {
        echo"Błąd bazy danych";
    }
    ?>

</table>