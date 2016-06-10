FIRMY: </br>
<?php
$query = "SELECT * FROM firma";

$result = mysql_query($query);
if (!$result <= 0) {
    ?>
    <table class="table">
        <tr><td><b>Nazwa Firmy:</b></td><td><b>Opis Firmy:</b></td></tr>
        <?php
        while ($row = mysql_fetch_array($result)) {
            echo "<tr><td>$row[nazwa_firmy]</td><td>$row[opis_firmy]</td></tr>";
        }
    } else {
        echo"Błąd bazy danych";
    }
    ?>

</table>