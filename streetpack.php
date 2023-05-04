<?php
require_once("db.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>UberStreet - Home</title>
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body class="body">
        <div id="main">
            <?php
            require_once("header.php");
            ?>

            <table class="streetpack_centre">

                <tr>
                    <td class="streetpack_case" id="b1">
                        <div class="streetpack_bouton">
                            <img class="streetpack_image" src="images/starterpack_background.png" onclick="Javascript:window.document.location.href='article.php?article=starterpack';"/>
                            <img class="streetpack_oeil" src="css/logo_seul.png"/>
                            <p class="streetpack_titre">Starter Pack</p>
                            <p class="streetpack_prix">69.99€</p>

                            <div class="streetpack_liste">
                                <p>• Chicha Céleste</p>
                                <p>• 3x Three kings</p>
                                <p>• Briquet UberStreet</p>
                                <p>• Chaise pliante</p>
                            </div>
                        </div>
                    </td>

                    <td class="streetpack_case" id="b2">
                        <div class="streetpack_bouton">
                            <img class="streetpack_image" src="images/packoldschool_background.png" onclick="Javascript:window.document.location.href='article.php?article=packoldschool';"/>
                            <img class="streetpack_oeil" src="css/logo_seul.png"/>
                            <p class="streetpack_titre">Pack OldSchool</p>
                            <p class="streetpack_prix">129.99€</p>

                            <div class="streetpack_liste">
                                <p>• Chicha traditionnel</p>
                                <p>• Régular Lee X UberStreet</p>
                                <p>• Sacoche UberStreet</p>
                                <p>• Album d'IAM</p>
                            </div>
                        </div>
                    </td>

                    <td class="streetpack_case" id="b3">
                        <div class="streetpack_bouton">
                            <img class="streetpack_image" src="images/packfestif_background.png" onclick="Javascript:window.document.location.href='article.php?article=packfestif';"/>
                            <img class="streetpack_oeil" src="css/logo_seul.png"/>
                            <p class="streetpack_titre">Pack Festif</p>
                            <p class="streetpack_prix">159.99€</p>

                            <div class="streetpack_liste">
                                <p>• Chicha Molotov X</p>
                                <p>• Kaloud</p>
                                <p>• Chalumeau</p>
                                <p>• 2x Bombone de gaz</p>
                                <p>• 3x Fumigène</p>
                                <p>• Barbecue</p>
                            </div>
                        </div>
                    </td>

                    <td class="streetpack_case" id="b4">
                        <div class="streetpack_bouton">
                            <img class="streetpack_image" src="images/packpremium_background.png" onclick="Javascript:window.document.location.href='article.php?article=packpremium';"/>
                            <img class="streetpack_oeil" src="css/logo_seul.png"/>
                            <p class="streetpack_titre">Pack Premium</p>
                            <p class="streetpack_prix">429.99€</p>

                            <div class="streetpack_liste">
                                <p>• Chicha Steamulation PRO X</p>
                                <p>• Foyer Cascada</p>
                                <p>• Kaloud</p>
                                <p>• Plaque allume charbon</p>
                                <p>• 1kg Fresh Coco Suprême</p>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <script>

                b1 = document.getElementById("b1");
                b2 = document.getElementById("b2");
                b3 = document.getElementById("b3");
                b4 = document.getElementById("b4");

                b1.addEventListener("mouseover", mouseOver);
                b1.addEventListener("mouseout", mouseOut);

                b2.addEventListener("mouseover", mouseOver);
                b2.addEventListener("mouseout", mouseOut);

                b3.addEventListener("mouseover", mouseOver);
                b3.addEventListener("mouseout", mouseOut);

                b4.addEventListener("mouseover", mouseOver);
                b4.addEventListener("mouseout", mouseOut);


                function mouseOver()
                {
                    b1.classList.add('streetpack_bouton_petit');
                    b2.classList.add('streetpack_bouton_petit');
                    b3.classList.add('streetpack_bouton_petit');
                    b4.classList.add('streetpack_bouton_petit');

                    this.classList.remove('streetpack_bouton_petit');
                    this.classList.add('streetpack_bouton_grand');
                }

                function mouseOut()
                {
                    b1.classList.remove('streetpack_bouton_petit');
                    b2.classList.remove('streetpack_bouton_petit');
                    b3.classList.remove('streetpack_bouton_petit');
                    b4.classList.remove('streetpack_bouton_petit');

                    this.classList.remove('streetpack_bouton_grand');
                }


            </script>

            <?php
            require_once("footer.php");
            ?>
        </div>

    </body>

</html>