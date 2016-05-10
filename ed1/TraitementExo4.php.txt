<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title></title>
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="author" content="Godefroy Clair" />
        <meta name="generator" content="vim" />
        <meta name="keywords" lang="fr" content="" />
        <meta name="description" content="" />
    </head>
    <body>
        <div id=list>
                <?php
                    /* 1) verif (filtre) */
                        if (isset($_GET['villes'])) {
                        /* 2) init */
                        $villes=$_GET['villes'];
                        /* fonction split(sep,stringTosplit) */
                        $villesArray = split(" ", $villes);

                        /* attention attributs entourés de guillemets */
                        echo '<label for="villes">selectionnez une ville : </label>';
                        echo "<select name=\"villes\" id=\"ville\">";
                        /* ou : */
                        /* $name="villes"; */
                        /* echo '<select name="', $name , '" id ="', $name, '" >'; */ 
                        /* 3) traitement */
                        /* for each */
                        foreach ( $villesArray as $ville) {
                            echo "<option value=\"${ville}\">${ville}</option>";
                        }
                        echo "</select>";
                    }
                ?>

        </div>
    </body>

</html>

