<?php 
session_start();
include_once('include/header.php');
require_once('php/list.php'); ?>







   
    <section class="container">
    <div class="col-12 my-1" id="mychat">
        <div class="row h-100">
            <div class="col-4 h-100" id="imagepres">
            <div class="card">
  <img src="img.jpg" alt="John" style="width:100%">
  <h1>John Doe</h1>
  <p class="title">CEO & Founder, Example</p>

  <p><button>Déconnexion</button></p>
</div>
            <?php

if (isset($_SESSION['user'])) {
    echo "Bonjour ".$_SESSION['user']['pseudo']." <a href='deconnexion.php'>Déconnexion</a>";
} else {
   header('location:connexion.php');
}

?>

            </div>
            <div class="col-8 h-100 d-flex flex-wrap align-items-end"> <div class="p-2" id="discussion"></div>
            <div class="col-12 saisie mb-4">
            <form method="POST">
                <div class="input-group">
                 
                    <input type="text" class="form-control" id="texte" placeholder="Entrez votre texte">
                    <div class="input-group-append">
                        <span class="input-group-text" id="valid" style="cursor:pointer">Envoyer</span>
                    </div>
                   
                    
                </div>
                </form>
             
            </div>
        </div>
       
          
        </div>
   
  
    </section>
    </div>
    <script type="text/javascript" src="js/script.js"></script>
<?php include_once('include/footer.php'); ?>