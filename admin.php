<?php
ini_set('include_path', '/opt/lampp/htdocs/content');
include_once 'header.php';

if (isset($_SESSION['zalogowano']) && mysql_result(mysql_query("SELECT is_Admin FROM uzytkownik WHERE id_uz = $_SESSION[id_uz]"), 0)) {

    echo "<h2>Panel Administratora</h2>";
    if(isset($_POST['addNewCategories']) && $_POST['addNewCategories'] == "Dodaj kategorie"){
        $newCategories = mysql_real_escape_string($_POST['newCategories']);
        file_put_contents("categories.txt", ", $newCategories", FILE_APPEND);
        echo "Dodano nowe kategorie";
    }else{
        echo "";
    }
    ?>
    <form method="post" action="admin.php" >
        <p>Dodawanie nowych kategorii:</p>
        Podaj Kategorie do dodania.</br>
        <textarea name="newCategories" rows="10" cols="40"></textarea></br>
        <p><input class="btn btn-success" type="submit" name="addNewCategories" value="Dodaj kategorie"/></p>
    </form>

    <?php
} else {
    echo "Nie posiadasz uprawnień aby przeglądać tę stronę";
}
?>

<?php include_once 'footer.php'; ?>