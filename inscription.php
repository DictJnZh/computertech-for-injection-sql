<?php
require_once("db.php");
?>

<?php
$_SESSION["identite"] = null;

if (count($_POST) > 0) {
    $email = $_POST["email"];
    $mdp = $_POST["mdp"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $message = "email deja utiliser";

    $mdp = md5($mdp);


    $sql = mysqli_query($conn, "SELECT * FROM utilisateurs WHERE email = '".$_POST['email']."'");   //  Exécute une requête sur la base de données


    if(mysqli_num_rows($sql))    //  Retourne le nombre de lignes dans le jeu de résultats
    {
        echo "test";  
        echo "test";  
        echo "test"; 
         echo "test";  
         echo "test";  
         echo "test";  
         echo "test";  
         echo "test";  

    }
    else
    {
        $sql = "INSERT INTO utilisateurs VALUES(null, '" . $email . "','" . $mdp . "','" . $nom . "','" . $prenom . "','0')";
        mysqli_query($conn, $sql);
    
    
        $sql = "SELECT utilisateurs.id FROM utilisateurs WHERE email = '" . $email . "' AND mdp = '" . $mdp . "'";
    
       
    
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);
    
        $_SESSION["identite"] = $row["id"];
    
    
        header("Location:index.php");
    }


   
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>ComputerTech - Inscription</title>
        <link href="css/style.css" rel="stylesheet">
        <link rel="icon" href="images/logo.ico" type="image/x-icon">
        <script type="text/javascript" src="javascript.js"></script>
    </head>

    <body class="body">

       

        <div id="main">

            <img class="header_logo" src="images/logo.png" onclick="Javascript:window.document.location.href='index.php';"/>

            <div class="inscr_conn_center">
                <div class="inscr_conn_table">
                    <div class="titres">Créer un compte ComputerTech</div>

                    <br>

                    <form action="inscription.php" method="POST" onSubmit="return validationInscription();">
                        <p>
                            <input class="input_connexion" type="text" name="prenom" id="prenom" placeholder="Prénomm " />
                        </p>
                        <p>
                            <input class="input_connexion" type="text" name="nom" id="nom" placeholder="Nom " />
                        </p>
                        <p>
                            <input class="input_connexion" type="text" name="email" id="email" placeholder="Adresse e-mail" />
                        </p>
                        <p>
                            <input class="input_connexion" type="password" name="mdp" id="mdp" placeholder="Mot de passe" />
                        </p>
                        <p>
                            <input class="input_connexion" type="password" name="mdpconfirm" id="mdpconfirm" placeholder="Confirmer le mot de passe" />
                        </p>

                        <div>
                            <input class="inscription_checkbox" type="checkbox" name="bouton18" id="bouton18">
                            <label for="bouton18" id="label18" style="color: white;">Je confirme avoir + de 18 ans</label>
                        </div>

                        <br>
                        <hr>
                        <br>

                        <p>
                            <input class="bouton_vert" id="valider" type="submit" value="COMMENCER"/>
                        </p>
                    </form>
                </div>
            </div>

            <?php
            require_once("footer.php");
            ?>

        </div>
    </body>
</html>