<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>On débute avec Ajax</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
    <div class="col-12 my-1">
        <div class="p-2" id="discussion">
        </div>
    </div>
    <section class="container">
        <main class="row">
            <div class="col-12 saisie">
            <form method="POST">
                <div class="input-group">
                 
                    <input type="text" class="form-control" id="texte" placeholder="Entrez votre texte">
                    <div class="input-group-append">
                        <span class="input-group-text" id="valid">Envoyer</span>
                    </div>
                   
                    
                </div>
                </form>
                <div id="reponse"></div>
            </div>
        </main>
    </section>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>