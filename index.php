<?php
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ComputerTech - Home</title>
    <link href="css/style.css" rel="stylesheet">
    <link rel="icon" href="images/logo.ico" type="image/x-icon">
</head>

<body class="body">
    <div id="main">
        <?php
        require_once("header.php");
        ?>

        <!--            <img style="width: 100%" src="images/bannière.png"/>-->

        <br>
        <br>
        <br>
        <br>

        <div class="index_titre">Nos meilleurs ventes :</div>

        <div class="index_wrapper">
            <?php

            $idArticles = [10, 2, 3, 4, 5];

            for ($i = 0; $i < 5; $i++) {
                $sql = "SELECT * FROM articles WHERE articles.id = " . $idArticles[$i];

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($result);

                echo "<div class='index_articles'>";
                echo "<a class='recherche_a' href='article.php?article=" . $row["nom"] . "'>";
                echo    "<img class='recherche_image' src='images/articles/" . $row["nom"] . "-1.png'/>";
                echo    "<h1 class='recherche_titre'>" . $row["titre"] . "</h1>";
                echo "</a>";
                echo    "<h1 class='recherche_prix'>" . $row["prix"] . " €</h1>";
                echo "</div>";
            }
            ?>
        </div>

        <br>
        <br>
        <br>

        <div class="index_titre">Nos Meilleurs Offres :</div>

        <div class="index_wrapper">
            <?php

            $idArticles = [6, 7, 8, 9, 10];

            for ($i = 0; $i < 5; $i++) {
                $sql = "SELECT * FROM articles WHERE articles.id = " . $idArticles[$i];

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($result);

                echo "<div class='index_articles'>";
                echo "<a class='recherche_a' href='article.php?article=" . $row["nom"] . "'>";
                echo    "<img class='recherche_image' src='images/articles/" . $row["nom"] . "-1.png'/>";
                echo    "<h1 class='recherche_titre'>" . $row["titre"] . "</h1>";
                echo "</a>";
                echo    "<h1 class='recherche_prix'>" . $row["prix"] . " €</h1>";
                echo "</div>";
            }
            ?>
        </div>

        <br>
        <br>
        <br>

        <div class="index_titre">La sélection qui change le quotidien :</div>

        <div class="index_wrapper">
            <?php

            $idArticles = [11, 12, 13, 14, 15];

            for ($i = 0; $i < 5; $i++) {
                $sql = "SELECT * FROM articles WHERE articles.id = " . $idArticles[$i];

                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($result);

                echo "<div class='index_articles'>";
                echo "<a class='recherche_a' href='article.php?article=" . $row["nom"] . "'>";
                echo    "<img class='recherche_image' src='images/articles/" . $row["nom"] . "-1.png'/>";
                echo    "<h1 class='recherche_titre'>" . $row["titre"] . "</h1>";
                echo "</a>";
                echo    "<h1 class='recherche_prix'>" . $row["prix"] . " €</h1>";
                echo "</div>";
            }
            ?>
        </div>

        <br>

        <?php
        require_once("footer.php");
        ?>
    </div>

</body>

</html>