<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Giełda Pracy</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- Latest compiled and minified CSS ....CDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">



    </head>
    <body>
        <?php
        include_once 'connect.php';
        include_once 'menu.php';
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

        <?php include_once 'footer.php'; ?>
                <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>