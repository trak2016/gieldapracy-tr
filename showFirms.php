<?php
$query = "SELECT * FROM firma";

$result = mysql_query($query);
if (!$result <= 0) {
    ?>
<h1> Firmy:</h1>
    <table class="table table-bordered table-striped">
        <thead class="thead-inverse" style="background-color: #262626; color:white;"><tr><td><b>Nazwa Firmy:</b></td><td><b>Opis Firmy:</b></td></tr></thead><tbody>
            <?php
            while ($row = mysql_fetch_array($result)) {
                echo "<tr><td>$row[nazwa_firmy]</td><td>$row[opis_firmy]</td></tr>";
            }
        } else {
            echo"Błąd bazy danych";
        }
        ?>

    </tbody></table>