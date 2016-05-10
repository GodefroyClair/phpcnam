<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>
            <?php 
                if (isset($_GET['titre'])){
                    echo $_GET['titre']; 
                }
            ?>
        </title>
        <meta http-equiv="Content-Language" content="fr" />
        <meta name="author" content="Godefroy Clair" />
        <meta name="generator" content="vim" />
        <meta name="keywords" lang="fr" content="" />
        <meta name="description" content="" />
        <style type="text/css">
            <?php 
                if (isset($_GET['css'])){
                    echo $_GET['css']; 
                } 
            ?>
        </style>
    </head>
    <body>
        <header>
            <h1>générer du code html et css avec php.</h1>
            <p>exo3 de l'ed1.</p>
        </header>
        <main>
            <?php 
                if (isset($_GET['body'])){
                    echo $_GET['body']; 
                }else{
                    echo "pas de body reçu";
                }
            ?>
        </main>
    </body>
</html>
